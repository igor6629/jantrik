<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Category;
use app\widgest\filter\Filter;
use jantrik\App;
use jantrik\libs\Pagination;

class CategoryController extends AppController {

    public function viewAction() {
        // Получаем ссылку
        $alias = $this->route['alias'];

        // Получим информацию о категории
        $category = \R::findOne('category', 'alias = ?', [$alias]);

        // Если нет такой категори - 404
        if (!$category) {
            throw new \Exception('Страница не найдена', 404);
        }

        // Хлебные крошки (путь к товару по категориям)
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

        // Вызовем модель Категории
        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);

        // Если в id категории ничего нет, тогда положем туда $category->id, в противном пристыкуем в $category->id
        $ids = !$ids ? $category->id : $ids . $category->id;

        // Получим номер текущей страницы
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Пагинация (кол-во товаров на старнице)
        $perpage = App::$app->getProperty('pagination');
        $sql_part = '';

        // Фильтры
        if(!empty($_GET['filter'])) {
            $filter = Filter::getFilter();
            $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter))";
        }

        // Кол-во записей
        $total = \R::count('product', "category_id IN ($ids) $sql_part");
        $pagination = new Pagination($page, $perpage, $total);

        // С какой записи выбирать
        $start = $pagination->getStart();

        // Выбираем товары по категории (где поле category_id находится в диапозоне множеств IN)
        $products = \R::find('product', "status = '1' AND category_id IN ($ids) $sql_part LIMIT $start, $perpage");

        // Выбор фильтров
        if ($this->isAjax()) {
            $this->loadView('filter', compact('products', 'total', 'pagination'));
        }

        // Метаданные страницы
        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products', 'breadcrumbs', 'pagination', 'total'));
    }
}