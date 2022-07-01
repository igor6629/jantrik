<?php

namespace jantrik;

class Router {

    // Все имеющиеся адреса сайта
    protected static $routes = [];

    // Текущий адрес
    protected static $route = [];

    // Добавим возможные маршруты в свойство $routes
    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }

    // Вернет таблицу всех маршрутов
    public static function getRoutes() {
        return self::$routes;
    }

    // Вернёт текущий маршрут
    public static function getRoute() {
        return self::$route;
    }

    // В зависимости что вернёт matchRoute выведет нужную  информацию
    public static function dispatch($url) {
        $url = self::removeQueryString($url);

        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';

            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';

                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Метод $controller::$action не найден", 404);
                }
            } else {
                throw new \Exception("Контроллер $controller не найден", 404);
            }
        } else {
            throw new \Exception("Страница не найдена", 404);
        }
    }

    // Ищет соответсвие в таблице маршрутов
    public static function matchRoute($url) {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }

                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }

                if (!isset($route['prefix'])) {
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] .= '\\';
                }

                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;

                return true;
            }
        }

        return false;
    }

    // Найдём в строке адреса '-', заменим на ' ', каждое слово с большой буквы
    protected static function upperCamelCase($name) {
        return $name = str_replace( ' ', '', ucwords( str_replace( '-', ' ', $name)));
    }

    // Запишем первое слово с маленькой буквы
    protected static function lowerCamelCase($name) {
        return lcfirst(self::upperCamelCase($name));
    }

    // Вернем строку, отрезанную от _GET запросов
    protected static function removeQueryString($url) {
        if ($url) {
            $params = explode('&', $url, 2);

            if (false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            } else {
                return '';
            }
        }
    }
}