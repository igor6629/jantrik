<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Product;

class ProductController extends AppController {

    public function viewAction() {
        // Получаем ссылку
        $alias = $this->route['alias'];

        // Получим информацию о продукте
        $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias]);

        // Исключение, если не найдём товар
        if (!$product) {
            throw new \Exception('Страница не найдена', 404);
        }

        // Путь к товару по категориям
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);

        // Похожие товары
        $related = \R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$product->id]);

        // Записать в куки просмотренные товары
        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);

        // Просмотренные товары из куков
        $r_viewed = $p_model->getRecentlyViewed();
        $recentlyViewed = null;

        if ($r_viewed) {
            $recentlyViewed = \R::find('product', 'id IN(' .\R::genSlots($r_viewed). ') LIMIT 6', $r_viewed);
        }

        // Галерея
        $gallery = \R::findAll('gallery', 'product_id = ?', [$product->id]);

        // Модификация товара
        $mods = \R::findAll('modification', 'product_id = ?', [$product->id]);

        // Отзывы товара
        $reviews = \R::findAll('review', 'product_id = ? ORDER BY id DESC', [$product->id]);

        // Метаданные страницы
        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'related', 'gallery', 'recentlyViewed', 'breadcrumbs', 'mods', 'reviews'));
    }
}
