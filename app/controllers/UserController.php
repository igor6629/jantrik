<?php

namespace app\controllers;

use app\models\EditUser;
use app\models\Recovery;
use app\models\User;
use jantrik\App;

class UserController extends AppController {

    // Регистрация
    public function signupAction() {
        // Проверяем введённые данные, если они есть
        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);

            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            }else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);

                if ($user->save('user')) {
                    $_SESSION['success']['signup'] = 'Вы успешно зарегистрировались!';
                } else {
                    $_SESSION['error']['signup'] = 'Ошибка!';
                }
            }

            redirect();
        }

        // Метаданные
        $this->setMeta('Регистрация');
    }

    // Авторизация
    public function loginAction(){
        // Проверяем данные, если они есть
        if (!empty($_POST)) {
            $user = new User();

            if ($user->login()) {
                redirect(PATH);
            }else {
                $_SESSION['error']['login'] = 'Логин или Пароль введены неверно';
                redirect();
            }
        }

        // Метаданные
        $this->setMeta('Вход');
    }

    // Восстановление пароля
    public function recoveryAction() {
        // Если пользователь не авторизован
        if (!User::checkAuth()) {
            if (!empty($_POST)) {
                $user = new User();

                if ($user->recoveryPassword()) {
                    User::sendCode($_POST['email']);
                    redirect('recovery-code');
                }
            }
            // Если пользователь авторизован, закрываем доступ к странице
        } else redirect();

        $this->setMeta('Восстановление аккаунта | Email');
    }

    // Код восстановления
    public function recoveryCodeAction() {
        // Если пользователь не авторизован и ввёл свой email
        if (!User::checkAuth() && !empty($_SESSION['email'])) {
                // Зафиксируем время отправки кода
                $time = time();

                if (User::getCode($time)) {
                    // Если пользователь ввёл правильный код - переадрессовываем на создание нового пароля
                    $_SESSION['confirm'] = 'OK';
                    unset($_SESSION['error']);
                    redirect('password-update');
                } else {
                    $_SESSION['error-recovery-code'] = 'Код введён неверно!';
                }
        } else {
            redirect();
        }

        $this->setMeta('Восстановление аккаунта | Код подтверждения');
    }

    // Создание нового пароля
    public function passwordUpdateAction() {
        // Если пользователь не авторизован
        if (!User::checkAuth() && isset($_SESSION['confirm'])) {
            // Если не пуст email и код
            if (!empty($_SESSION['email']) && !empty($_SESSION['code'])) {
                // Получим данные редактирования пользователя
                if (!empty($_POST)) {
                    $data = $_POST;
                    $user = new Recovery();
                    $user->load($data);

                    // Если пользователь неккоректно ввёл данные
                    if (!$user->validate($data)) {
                        $user->getErrors();
                        redirect();
                    }

                    // Создадим новый пароль пользователя
                    $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);

                    // Обновляем пароль пользователя
                    $update = \R::exec("UPDATE user SET password = ? WHERE email = ?", [$user->attributes['password'], $_SESSION['email']]);
                    unset($_SESSION['confirm']);
                    unset($_SESSION['code']);
                    unset($_SESSION['time']);
                    unset($_SESSION['email']);

                    if ($update) {
                        redirect('login');
                    }
                }
                // Если пользователь ввёл адрес через url - возвращаем на главную
            } else redirect(PATH);
        } else redirect();

        $this->setMeta('Восстановление аккаунта | Новый пароль');
    }

    // Выход
    public function logoutAction() {
        // Если не пуста сессия
        if (isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect(PATH);
    }

    // Кабинет
    public function accountAction() {
        // Если не авторизован
        if (!User::checkAuth())
            redirect();

        if (!empty($_POST)) {
            $user = new EditUser();
            $data = $_POST;
            $data['id'] = $_SESSION['user']['id'];
            $data['role'] = $_SESSION['user']['role'];
            $user->load($data);

            if (!$user->attributes['password']) {
                unset($user->attributes['password']);
                unset($user->attributes['newpassword']);
                unset($user->attributes['c-password']);
            } else {
                // Если был введен пароль, проверяем на коректность и обновляем
                if ($user->checkPassword($user, $_SESSION['user']['login']))
                    $user->attributes["password"] = password_hash($user->attributes["newpassword"], PASSWORD_DEFAULT);
                else {
                    unset($user->attributes['password']);
                }

                unset($user->attributes['newpassword']);
                unset($user->attributes['c-password']);
            }

            if (!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                redirect();
            }

            if ($user->update('user', $_SESSION['user']['id'])) {
                foreach ($user->attributes as $k => $v) {
                    if ($k != 'password' && $k != 'newpassword' && $k != 'c-password') $_SESSION['user'][$k] = $v;
                }

                unset($user->attributes['password']);
                $_SESSION['success'] = 'Изменения сохранены';
            }

            redirect();
        }

        // История заказов
        $orders = \R::findAll("order", "user_id = ? ORDER BY id DESC", [$_SESSION['user']['id']]);

        $this->setMeta("Личный кабинет");
        $this->set(compact('orders'));
    }
}