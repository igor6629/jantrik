<?php

namespace app\widgest\menu;

use jantrik\App;
use jantrik\Cache;

class Menu{
    // Данные
    protected $data;

    // Массив дерева из данных
    protected $tree;

    // Готовый html код
    protected $menuHtml;

    // Шаблон для меню
    protected $tpl;

    // Контейнер меню
    protected $container = 'ul';

    // Класс в меню
    protected $class = '';

    // Таблица для меню
    protected $table = 'category';

    // Кэширование
    protected $cache = 0;

    // Ключ под которым буду сохраняться данные
    protected $cacheKey = 'jantrik_menu';

    // Массив доп. аттрибутов
    protected $attrs = [];

    // Свойство для админки
    protected $prepend = '';

    public function __construct($options = []) {
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    // Получает опции
    protected function getOptions($options) {
        // Если найдём в свойствах этого класса, значение из $options, тогда переопределим наше свойство
        foreach ($options as $k => $v) {
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }

    // Метод формирует нашу меню
    protected function run() {
        // Получаем объект кэша
        $cache = Cache::insctance();
        $this->menuHtml = $cache->get($this->cacheKey);

        // Если не получили данные из кэша, тогда сформируем их, иначе, выведем из кэша
        if (!$this->menuHtml) {
            $this->data = App::$app->getProperty('cats');

            // Если в контейнере нет данных, возьмём их из таблицы
            if (!$this->data) {
                $this->data = $cats = \R::getAssoc("SELECT * FROM {$this->table}");
            }

            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);

            if ($this->cache) {
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }

        $this->output();
    }

    // Вывод меню
    protected function output() {
        $attrs = '';

        if (!empty($this->attrs)) {
            foreach ($this->attrs as $k => $v) {
                $attrs .= " $k='$v' ";
            }
        }

        echo "<{$this->container} class='{$this->class}' $attrs>";
        echo $this->prepend;
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    // Получение дерева
    protected function getTree() {
        $tree = [];
        $data = $this->data;

        foreach ($data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            }else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }

        return $tree;
    }

    // Получает html код
    protected function getMenuHtml($tree, $tab = '') {
        $str = '';

        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }

        return $str;
    }

    // Сформируем категорию в html код
    protected function catToTemplate($category, $tab, $id) {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}