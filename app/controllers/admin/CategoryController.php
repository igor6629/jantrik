<?php

namespace app\controllers\admin;

use app\models\Category;
use jantrik\App;

class CategoryController extends AppController {

    public function indexAction() {
        $count = \R::count("category");
        $this->setMeta('Список категорий');
        $this->set(compact('count'));
    }

    public function deleteAction() {
        // Получим ID категории
        $id = $this->getRequestId();

        // Получим потомков категории
        $child = \R::count('category', "parent_id = ?", [$id]);
        $errors = '';

        if ($child) {
            $errors .= 'Удаление невозможно, в категории есть вложенные категории';
        }

        $products = \R::count('product', "category_id = ?", [$id]);

        if ($products) {
            $errors .= 'Удаление невозможно, в категории есть товары';
        }

        if ($errors) {
            $_SESSION['error'] = $errors;
            redirect();
        }

        // Получим категорию для удаления
        $category = \R::load('category', $id);
        \R::trash($category);
        $_SESSION['success'] = 'Категория удалена';

        redirect();
    }

    public function addAction() {
        // Получим данные новой категории
        if (!empty($_POST)){
            $category = new Category();
            $data = $_POST;
            $category->load($data);

            if (!$category->validate($data)){
                $category->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            // Сохраняем категорию
            if($id = $category->save('category')){
                $category = \R::load('category', $id);
                \R::store($category);
                $_SESSION['success'] = 'Категория добавлена';
            }

            redirect();
        }

        $this->setMeta('Новая категория');
    }

    public function editAction() {
        // Получим данные новой категории
        if (!empty($_POST)) {
            // Получим ID категории
            $id = $this->getRequestId(false);
            $category = new Category();
            $data = $_POST;
            $category->load($data);

            if (!$category->validate($data)){
                $category->getErrors();
                redirect();
            }

            // Обновляем отредактированную запись
            if ($category->update('category', $id)){
                $category = \R::load('category', $id);
                \R::store($category);
                $_SESSION['success'] = 'Изменения сохранены';
            }

            redirect();
        }

        $id = $this->getRequestId();
        $category = \R::load('category', $id);
        App::$app->setProperty('parent_id', $category->parent_id);

        $this->setMeta("Редактирование категории {$category->title}");
        $this->set(compact('category'));
    }
}