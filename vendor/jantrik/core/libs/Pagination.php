<?php

namespace jantrik\libs;

class Pagination {

    // Текущая страница
    public $currentPage;

    // Сколько записей выводить на страницу
    public $perpage;

    // Общее кол-во записей
    public $total;

    // Общее кол-во страниц
    public $countPages;
    public $uri;

    public function __construct($page, $perpage, $total) {
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }

    public function __toString() {
        return $this->getHtml();
    }

    // Формирование пагинации (возвращает готовый html код)
    public function getHtml() {
        $back = null; // ссылка НАЗАД
        $forward = null; // ссылка ВПЕРЕД
        $startpage = null; // ссылка В НАЧАЛО
        $endpage = null; // ссылка В КОНЕЦ
        $page2left = null; // вторая страница слева
        $page1left = null; // первая страница слева
        $page2right = null; // вторая страница справа
        $page1right = null; // первая страница справа

        if( $this->currentPage > 1 ) {
            $back = "<li><a href='{$this->uri} page=" .($this->currentPage - 1). "'><i class='fa fa-angle-left'></i></a></li>";
        }

        if( $this->currentPage < $this->countPages ) {
            $forward = "<li><a href='{$this->uri}page=" .($this->currentPage + 1). "'><i class='fa fa-angle-right'></i></a></li>";
        }

        if( $this->currentPage > 3 ) {
            $startpage = "<li><a href='{$this->uri}page=1'><i class='fa fa-angle-double-left'></i></a></li>";
        }

        if( $this->currentPage < ($this->countPages - 2) ) {
            $endpage = "<li><a  href='{$this->uri}page={$this->countPages}'><i class='fa fa-angle-double-right'></i></a></li>";
        }

        if( $this->currentPage - 2 > 0 ) {
            $page2left = "<li><a  href='{$this->uri}page=" .($this->currentPage-2). "'>" .($this->currentPage - 2). "</a></li>";
        }

        if( $this->currentPage - 1 > 0 ) {
            $page1left = "<li><a href='{$this->uri}page=" .($this->currentPage-1). "'>" .($this->currentPage-1). "</a></li>";
        }

        if( $this->currentPage + 1 <= $this->countPages ) {
            $page1right = "<li><a href='{$this->uri}page=" .($this->currentPage + 1). "'>" .($this->currentPage+1). "</a></li>";
        }

        if( $this->currentPage + 2 <= $this->countPages ) {
            $page2right = "<li><a href='{$this->uri}page=" .($this->currentPage + 2). "'>" .($this->currentPage + 2). "</a></li>";
        }

        return '<ul class="blog-pagination">' . $startpage.$back.$page2left.$page1left.'<li class="active"><a>'.$this->currentPage.'</a></li>'.$page1right.$page2right.$forward.$endpage . '</ul>';
    }

    // Общее кол-во страниц
    public function getCountPages() {
        return ceil($this->total / $this->perpage) ?: 1 ;
    }

    // Текущая страница
    public function getCurrentPage($page) {
        if (!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    // Показ товаров на определенной странице
    public function getStart() {
        return ($this->currentPage - 1) * $this->perpage;
    }

    public function getParams() {
        $url = $_SERVER['REQUEST_URI'];

        // Получим GET параметры в адресной строке (?page=)
        $url = explode('?', $url);
        $uri = $url[0] . '?';

        // Если существует запрос после ? и он не пустой
        if(isset($url[1]) && $url[1] != '') {
            // Разедлим все запросы по &
            $params = explode('&', $url[1]);

            foreach ($params as $param) {
                if (!preg_match("#page=#", $param)) $uri .= "{$param}&amp;";
            }
        }

        return urldecode($uri);
    }
}