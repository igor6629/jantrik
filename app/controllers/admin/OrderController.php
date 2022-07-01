<?php

namespace app\controllers\admin;

use jantrik\libs\Pagination;

class OrderController extends AppController {

    public function indexAction() {
        // Пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;

        // Кол-во заказов
        $count = \R::count('order');

        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        // Вывод из таблицы заказов
        $orders = \R::getAll("SELECT `order`.`id`, `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_up`, `order`.`currency`, `user`.`name`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order` JOIN `user` ON `order`.`user_id` = `user`.`id` JOIN `order_product` ON `order`.`id` = `order_product`.`order_id` GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` DESC LIMIT $start, $perpage");

        $this->setMeta('Список заказов');
        $this->set(compact('orders', 'pagination', 'count'));
    }

    public function viewAction() {
        // Получим ID заказа
        $order_id = $this->getRequestId();
        // Вытащим нужный заказ
        $order = \R::getRow("SELECT `order`.*, `user`.`name`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order` JOIN `user` ON `order`.`user_id` = `user`.`id` JOIN `order_product` ON `order`.`id` = `order_product`.`order_id` WHERE `order`.`id` = ? GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT 1", [$order_id]);

        if (!$order) {
            throw new \Exception("Страница не найдена", 404);
        }

        // Вытащим товары заказа
        $order_products = \R::findAll('order_product', "order_id = ?", [$order_id]);

        $this->setMeta("Заказ №{$order_id}");
        $this->set(compact('order', 'order_products'));
    }

    public function changeAction() {
        // Получим ID заказа
        $order_id = $this->getRequestId();
        // Получим статус заказа
        $status = !empty($_GET['status']) ? '1' : '0';
        // Получим заказ
        $order = \R::load('order', $order_id);

        if (!$order) {
            throw new \Exception("Страница не найдена", 404);
        }

        // Обновляем статус
        $order['status'] = $status;
        // Обновляем время
        $order->update_up = date("Y-m-d H:i:s");
        // Выгружаем данные обратно в БД
        \R::store($order);

        if($_GET['status']) {
            $_SESSION['success'] = 'Заказ подтверждён';
        }else {
            $_SESSION['success'] = 'Заказ возвращён на доработку';
        }

        redirect();
    }

    public function deleteAction() {
        // Получим ID заказа
        $order_id = $this->getRequestId();
        // Получим заказ
        $order = \R::load('order', $order_id);
        // Удаляем заказ
        \R::trash($order);
        $_SESSION['success'] = 'Заказ успешно удалён';

        redirect(ADMIN . '/order');
    }
}