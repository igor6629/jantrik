<?php

namespace app\controllers\admin;

use app\models\AppModel;
use app\models\User;
use jantrik\base\Controller;

class AppController extends Controller {

    // Переопределяем шаблон
    public $layout = 'admin';

    public function __construct($route) {
        parent::__construct($route);

        // Проверяем если авторизован не админ
        if (!User::isAdmin() && $route['action'] != 'login-admin') {
            redirect(ADMIN . '/user/login-admin');
        }

        new AppModel;
    }

    // Получаем ID в массиве
    public function getRequestId($get = true, $id = 'id') {
        if ($get) {
            $data = $_GET;
        }else {
            $data = $_POST;
        }

        $id = !empty($data[$id]) ? (int)$data[$id] : null;

        if (!$id) {
            throw new \Exception('Страница не найдена', 404);
        }

        return $id;
    }

}