<?php

namespace app\controllers\admin;

use app\models\User;
use jantrik\libs\Pagination;

class UserController extends AppController {
    public function indexAction() {
        // Пагинация
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $perpage = 10;

        $count = \R::count('user');

        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        // Получим всех пользователей
        $users= \R::findAll('user', "LIMIT $start, $perpage");

        $this->setMeta('Список пользователей');
        $this->set(compact('users', 'pagination', 'count'));
    }

    public function editAction() {
        // Получим данные редактирования пользователя
        if (!empty($_POST)) {
            $id = $this->getRequestId(false);
            $user = new \app\models\admin\User();

            // Принимаем переданные данные
            $data = $_POST;

            // Добавляем в модель
            $user->load($data);

            if(!$user->attributes['password']) {
                unset($user->attributes['password']);
            }else {
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }

            if(!$user->validate($data) || !$user->checkUnique()) {
                $user->getErrors();
                redirect();
            }

            if($user->update('user', $id)) {
                $_SESSION['success'] = 'Изменения сохранены';
            }

            redirect();
        }

        // Получим ID пользователя
        $user_id = $this->getRequestId();
        $user = \R::load('user', $user_id);

        // Получим заказы пользователя
        $orders = \R::getAll("SELECT `order`.`id`, `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_up`, `order`.`currency`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order` JOIN `order_product` ON `order`.`id` = `order_product`.`order_id` WHERE user_id = {$user_id} GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` DESC");

        $this->setMeta('Редактирование пользователя');
        $this->set(compact('user', 'orders'));
    }

    public function addAction() {
        $this->setMeta('Новый пользователь');
    }

    public function viewAction() {
        // Получим ID пользователя
        $user_id = $this->getRequestId();
        $user = \R::load('user', $user_id);

        // Получим заказы пользователя
        $orders = \R::getAll("SELECT `order`.`id`, `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_up`, `order`.`currency`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order` JOIN `order_product` ON `order`.`id` = `order_product`.`order_id` WHERE user_id = {$user_id} GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` DESC");

        $this->set(compact('user', 'orders'));
        $this->setMeta("Пользователь {$user->login}");
    }

    public function loginAdminAction() {
        // Проверяем авторизацию
        if (!empty($_POST)) {
            $user = new User();

            if (!$user->login(true)) {
                $_SESSION['error'] = 'Логин или пароль указаны неверно';
            }

            if (User::isAdmin()) {
                redirect(ADMIN);
            }else {
                redirect();
            }
        }

        $this->layout = 'login';
    }
}