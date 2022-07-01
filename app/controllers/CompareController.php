<?php

namespace app\controllers;

use app\models\Compare;

class CompareController extends AppController {

    public function indexAction() {
        $this->setMeta('Список сравнений');
    }

    public function addAction() {
        // Получим параметры товара, добавленные в список сравнений
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;

        if ($id) {
            $product = \R::findOne('product', 'id = ?', [$id]);

            if (!$product) {
                return false;
            }
        }

        $wishlist = new Compare();
        $wishlist->addToCompare($product);

        redirect(PATH . '/compare');
    }

    public function deleteAction() {
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;

        if (isset($_SESSION['compare'][$id])) {
            $item = new Compare();
            $item->deleteItem($id);
        }

        redirect();
    }
}