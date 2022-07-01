<?php

namespace app\widgest\filter;

use jantrik\Cache;

class Filter {
    // Свойство групп
    public $groups;
    // Свойство аттрибут
    public $attrs;
    // Шаблон для фильтров
    public $tpl;

    public function __construct() {
        $this->tpl = __DIR__ . '/filter_tpl.php';
        $this->run();
    }

    protected function run() {
        // Кешируем фильтры
        $cache = Cache::insctance();

        // Получим группы из кэша
        $this->groups = $cache->get('filter_group');

        // Если не получили из кэша группы, получим из БД
        if (!$this->groups) {
            $this->groups = $this->getGroups();
            $cache->set('filter_group', $this->groups, 1);
        }

        $this->attrs = $cache->get('filter_attrs');

        // Если не получили из кэша аттрибуты, получим из БД
        if (!$this->attrs) {
            $this->attrs = $this->getAttrs();
            $cache->set('filter_attrs', $this->attrs, 1);
        }

        $filters = $this->getHtml();

        echo $filters;
    }

    // Получение HTML кода
    protected function getHtml() {
        ob_start();

        require $this->tpl;

        return ob_get_clean();
    }

    // Получение всех групп из таблицы
    protected function getGroups() {
        return \R::getAssoc('SELECT id, title FROM attribute_group');
    }

    // Получение всех аттрибутов из таблицы
    protected function getAttrs() {
        $data = \R::getAssoc('SELECT * FROM attribute_value ');
        $attrs = [];

        foreach ($data as $k => $v) {
            $attrs[$v['attr_group_id']][$k] = $v['value'];
        }

        return $attrs;
    }

    public static function getFilter() {
        $filter = null;

        if(!empty($_GET['filter'])) {
            $filter = preg_replace("#[^\d,]+#" , '', $_GET['filter']);
            $filter = trim($filter, ',');
        }

        return $filter;
    }
}