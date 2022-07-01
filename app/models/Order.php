<?php

namespace app\models;

use jantrik\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Order extends AppModel {

    // Сохранение заказа в таблицу order
    public static function saveOrder($id, $data) {
        $order = \R::dispense('order');

        // Заполняем данными таблицу
        $order->user_id = $id['user_id'];
        $order->name = $data['name'];
        $order->lastname = $data['lastname'];
        $order->address = $data['address'];
        $order->index = $data['index'];
        $order->number = $data['number'];
        $order->note = $data['note'];
        $order->currency = $_SESSION['cart.currency']['code'];
        $order->sum = $_SESSION['cart.sum'];
        $order_id = \R::store($order);

        // Заполним таблицу заказанного товара
        self::saveOrderProduct($order_id);

        return $order_id;
    }

    // Сохраняем продукт данного заказа в таблицу order_product
    public static function saveOrderProduct($order_id) {
        $sql_part = '';

        // Подготавливаем строку для внесения в БД
        foreach ($_SESSION['cart'] as $product_id => $product) {
            // Уберём модификатор из id, привидя его к числу
            $product_id = (int)$product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']}),";
        }

        // Обрежем , в коце
        $sql_part = rtrim($sql_part, ',');

        // Формируем запрос в БД
        \R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES $sql_part");
    }

    // Отправляет письмо админу магазину
    public static function mailOrder($order_id, $user_email) {
        // Create the Transport
        $transport = (new Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'))
        ;
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Создание письма
        ob_start();
        require APP . '/views/mail/mail_order.php';
        $body = ob_get_clean();

        // Письмо клиенту
        $message_client = (new Swift_Message("Заказ №{$order_id}"))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo($user_email)
            ->setBody($body, 'text/html')
        ;

        // Письмо администратору
        $message_admin = (new Swift_Message("Заказ №{$order_id}"))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo(App::$app->getProperty('admin_email'))
            ->setBody($body, 'text/html')
        ;

        // Send the message
        $result = $mailer->send($message_client);
        $result = $mailer->send($message_admin);

        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);

        $_SESSION['success'] = 'Ваш заказ оформлен! Спасибо за покупку!';
    }
}