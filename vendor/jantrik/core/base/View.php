<?php

namespace jantrik\base;

class View {

    public $route;
    public $controller;
    public $model;
    public $view;
    public $layout;
    public $prefix;
    public $data = [];
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->meta = $meta;
        $this->model = $route['controller'];
        $this->prefix = $route['prefix'];

        if ($layout === false) {
            $this->layout = false;
        }else {
            // Если передан какой-то шаблон, мы возьмём его, в противном случае мы возьмём LAYOUT
            $this->layout = $layout ?: LAYOUT;
        }
    }

    // Формирует страницу для пользователя
    public function render($data) {
        if (is_array($data)) extract($data);

        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";

        // Если существует такой файл - подключим его
        if (is_file($viewFile)) {
            // Включим буферизацию
            ob_start();
            require_once $viewFile;

            // Поместим код вида в $content
            $content = ob_get_clean();
        } else {
            throw new \Exception("Не найден вид: {$viewFile}", 500);
        }

        // Если шаблон не выключен пользователем, то подключим его
        if (false !== $this->layout) {
            $layoutFile = APP . "/views/layouts/{$this->layout}.php";

            if (is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new \Exception("Не найден шаблон: {$this->layout}", 500);
            }
        }
    }

    // Вернёт метаданные
    public function getMeta() {
        $output = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">' . PHP_EOL;

        return $output;
    }
}