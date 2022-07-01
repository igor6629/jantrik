<?php

namespace app\controllers\admin;

class MainController extends AppController {

    public function indexAction() {
        // Получим новые заказы
        $countNewOrders = \R::count('order', "status = '0'");
        // Получим кол-во пользователей
        $countReviews = \R::count('review');
        // Кол-во товаров
        $countProducts = \R::count('product');
        // Кол-во категорий
        $countCategories = \R::count('category');

        $this->setMeta('Панель управления');
        $this->set(compact('countNewOrders', 'countReviews', 'countProducts', 'countCategories'));

    }
}