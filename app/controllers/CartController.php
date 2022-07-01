<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\User;
use Valitron\Validator;

class CartController extends AppController {

    public function addAction() {
        // Получим параметры товара, добавленные в корзину
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : 1;
        $mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : null;
        $mod = null;

        if ($id) {
            $product = \R::findOne('product', 'id = ?', [$id]);
            if (!$product) {
                return false;
            }

            if ($mod_id) {
                $mod = \R::findOne('modification', 'id = ? AND product_id = ?', [$mod_id, $id]);
            }
        }

        // Создадим объект класса и вызовем его метод
        $cart = new Cart();
        $cart->addToCart($product, $qty, $mod);

        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }

        redirect();
    }

    // Ссылка на корзину
    public function viewAction() {
        $this->setMeta('Корзина', 'Корзина', 'Корзина');
    }

    // Удаление товара из корзины
    public function deleteAction() {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;

        if (isset($_SESSION['cart'][$id])) {
            $cart = new Cart();
            $cart->deleteItem($id);
        }

        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }

        redirect();
    }

    // Очистка корзины
    public function clearAction() {
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);

        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }

        redirect();
    }

    // Оформление товара
    public function checkoutAction() {
        if (!isset($_SESSION['user']) || empty($_SESSION['cart'])) {
            redirect(PATH);
        }

        $this->setMeta('Подтверждение', 'Подтверждение', 'Подтверждение');
    }

    public function confirmAction() {
        $user = new Cart();
        $data = $_POST;
        $user->load($data);

        // Если данные пришли, тогда
        if (!empty($_SESSION['cart'])) {
            // Если пользователь неккоректно ввёл данные
            if (!$user->validate($data)) {
                $user->getErrors();
                redirect();
            }

            $data["note"] = h($data["note"]);
            $id['user_id'] = $_SESSION['user']['id'];
            $user_email = $_SESSION['user']['email'];
            $order_id = Order::saveOrder($id, $data);
            Order::mailOrder($order_id, $user_email);
            $_SESSION['success-cart'] = 'Заказ подтверждён';
        }

        redirect(PATH);
    }
}