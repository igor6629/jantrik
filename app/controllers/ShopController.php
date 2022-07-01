<?php

namespace app\controllers;

use jantrik\App;
use jantrik\libs\Pagination;

class ShopController extends AppController {

    public function indexAction() {
        // Пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');

        // Общее кол-во товаров
        $count = \R::count('product');

        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $products = \R::getAll("SELECT id, title, alias, price, old_price, rating, description, img FROM product WHERE status = '1' ORDER BY id DESC LIMIT $start, $perpage");

        $this->setMeta('Каталог товаров');
        $this->set(compact('products', 'pagination', 'count'));
    }
}