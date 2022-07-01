<?php

namespace app\controllers\admin;

use jantrik\Cache;

class CacheController extends AppController {

    // Показать таблицу с вариантами кэша
    public function indexAction() {
        $this->setMeta('Очистка кэша');
    }

    public function deleteAction() {
        // Найдём ключ для удаления
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::insctance();

        // Проверим значение $key
        switch ($key) {
            case 'category':
                $cache->delete('cats');
                $cache->delete('jantrik_menu');
                break;
            case 'filter':
                $cache->delete('filter_group');
                $cache->delete('filter_attrs');
                break;
        }

        $_SESSION['success'] = 'Выбранный кэш удалён';
        redirect();
    }
}