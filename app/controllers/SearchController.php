<?php

namespace app\controllers;

use jantrik\libs\Pagination;
use jantrik\App;

class SearchController extends AppController {

    public function typeaheadAction() {
        if ($this->isAjax()) {
            // Если пришёл запрос методом ajax, обрежем концевые пробелы, иначе пустое значение
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;

            if ($query) {
                $products = \R::getAll("SELECT id, title FROM product WHERE title LIKE ? AND status = '1' LIMIT 11", ["%{$query}%"]);
                echo json_encode($products);
            }
        }

        die;
    }

    public function indexAction() {
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;

        // Получим номер текущей страницы
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Пагинация (кол-во товаров на старнице)
        $perpage = App::$app->getProperty('pagination');

        // Кол-во записей
        $total = \R::count('product', "title LIKE ? AND status = '1'", ["%{$query}%"]);
        $pagination = new Pagination($page, $perpage, $total);

        // С какой записи выбирать
        $start = $pagination->getStart();

        if ($query) {
            $products = \R::find('product', "title LIKE ? AND status = '1' LIMIT $start, $perpage", ["%{$query}%"]);
        }

        // Добавление мета данных
        $this->setMeta("Результат поиска для '" . h($query) . "'");
        // Передаём полученные данные в вид
        $this->set(compact('products', 'query', 'pagination', 'total'));
    }
}