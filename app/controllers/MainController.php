<?php

namespace app\controllers;

use jantrik\Cache;

class MainController extends AppController {

    public function indexAction() {
        // Выведем бренды из БД
        $brands = \R::find('brand', 'LIMIT 3');

        // Выведем популярное из БД
        $hits = \R::find('product', "hit='1' AND status='1' ORDER BY id DESC LIMIT 4");

        // Популярное в первом экране
        $hits_top = \R::find('product', "status='1' ORDER BY id DESC LIMIT 4");

        // Новые товары
        $new_products = \R::find('product', "new='1' AND status='1' ORDER BY id DESC LIMIT 12");

        // Акции
        $discounts = \R::findAll('product', "status='1' ORDER BY id DESC LIMIT 32");

        // Товары по рейтингу
        $top_ratings = \R::find('product', "status='1' ORDER BY rating DESC LIMIT 12");

        // Рекомендуемое
        $advices = \R::find('product', "status='1' AND new='1' AND hit='1' ORDER BY id DESC LIMIT 12");

        $this->setMeta('Магазин Jantrik', 'Описание страницы', 'Ключевые слова');
        $this->set(compact('brands', 'hits', 'hits_top', 'new_products', 'discounts', 'top_ratings', 'advices'));
    }
}
