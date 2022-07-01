<?php

namespace app\models;

class Product extends AppModel {

    // Добавление просмотренного товара
    public function setRecentlyViewed($id) {
        $recentlyViewed = $this->getAllRecentlyViewed();

        // Если в просмотренных товарах ничего нет - создадим куки
        if (!$recentlyViewed) {
            setcookie('recentlyViewed', $id, time()+3600*24, '/');
        }else {
            // Иначе, заполняем наши куки просмотренными товарами, разбивая их по точкам
            $recentlyViewed = explode('.', $recentlyViewed);

            if (!in_array($id, $recentlyViewed)) {
                $recentlyViewed[] = $id;
                $recentlyViewed = implode('.',$recentlyViewed);
                setcookie('recentlyViewed', $recentlyViewed, time()+3600*24, '/');
            }
        }
    }

    // Получение просмотренного товара
    public function getRecentlyViewed() {
        if (!empty($_COOKIE['recentlyViewed'])) {
            $recentlyViewed = $_COOKIE['recentlyViewed'];
            $recentlyViewed = explode('.', $recentlyViewed);

            return array_slice($recentlyViewed, -6);
        }

        return false;
    }

    // Получение всех просмотренных товаров (по желанию)
    public function getAllRecentlyViewed() {
        // Если не пустые куки, тогда вернём их
        if (!empty($_COOKIE['recentlyViewed'])) {
            return $_COOKIE['recentlyViewed'];
        }

        return false;
    }
}