<?php

namespace app\controllers;

use app\models\Wishlist;

class WishlistController extends AppController {

    public function addAction() {
        // Получим параметры товара, добавленные в корзину
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;

        if ($id) {
            $product = \R::findOne('product', 'id = ?', [$id]);

            if (!$product) {
                return false;
            }
        }

        $wishlist = new Wishlist();
        $wishlist->addToWishlist($product);

        redirect(PATH . '/wishlist');
    }

    public function deleteAction() {
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;

        if (isset($_SESSION['wishlist'][$id])){
            $item = new Wishlist();
            $item->deleteItem($id);
        }
        redirect();
    }

    public function indexAction() {
        $this->setMeta('Список желаний');
    }
}