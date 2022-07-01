<?php

namespace app\controllers\admin;

use app\models\admin\Product;
use jantrik\App;
use jantrik\libs\Pagination;

class ProductController extends AppController {

    public function indexAction() {
        // Пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 15;

        // Общее кол-во товаров
        $count = \R::count('product');

        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        // Получение товаров
        $products = \R::getAll("SELECT product.id, product.category_id, product.title, product.price, product.old_price, product.status, product.hit, category.title AS cat FROM product JOIN category ON category.id = product.category_id ORDER BY product.id DESC LIMIT $start, $perpage");

        $this->setMeta('Список товаров');
        $this->set(compact('products', 'pagination', 'count'));
    }

    public function addImageAction() {
        if(isset($_GET['upload'])) {
            if($_POST['name'] == 'single') {
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');
            }else {
                $wmax = App::$app->getProperty('gallery_width');
                $hmax = App::$app->getProperty('gallery_height');
            }

            $name = $_POST['name'];
            $product = new Product();
            $product->uploadImg($name, $wmax, $hmax);
        }
    }

    public function editAction() {
        if (!empty($_POST)) {
            $id = $this->getRequestId(false);
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? '1' : '0';
            $product->attributes['hit'] = $product->attributes['hit'] ? '1' : '0';
            $product->attributes['old_price'] = $product->attributes['old_price'] ? $product->attributes['old_price'] : null;
            $product->attributes['new'] = $product->attributes['new'] ? '1' : '0';
            $product->getImg();

            if (!$product->validate($data)) {
                $product->getErrors();
                redirect();
            }

            if($product->update('product', $id)) {
                $product->editRelatedProduct($id, $data);
                $product->editModification($id, $data);
                $product->saveGallery($id);
                $product =  \R::load('product', $id);
                \R::store($product);
                $_SESSION['success'] = 'Товар успешно изменён';
                redirect();
            }
        }

        $id = $this->getRequestId();
        $product = \R::load('product', $id);

        // Получим родительскую категорию
        App::$app->setProperty('parent_id', $product->category_id);

        // Получим связанные товары
        $related_product = \R::getAll("SELECT related_product.related_id, product.title FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$id]);

        // Получим галлерею товара
        $gallery = \R::getCol('SELECT img FROM gallery WHERE product_id = ?', [$id]);

        // Получим модификатор товара
        $mods = \R::getAll("SELECT modification.product_id, modification.title, modification.price FROM modification JOIN product ON product.id = modification.product_id WHERE modification.product_id = ?", [$id]);

        $this->setMeta("Редактирование товара | {$product->title}");
        $this->set(compact('product', 'related_product', 'gallery', 'mods'));
    }

    public function addAction() {
        // Получим данные нового товара
        if (!empty($_POST)) {
            // Создадим модель продукта
            $product = new Product();
            $data = $_POST;
            $product->load($data);
            $product->attributes['status'] = $product->attributes['status'] ? '1' : '0';
            $product->attributes['hit'] = $product->attributes['hit'] ? '1' : '0';
            $product->attributes['old_price'] = $product->attributes['old_price'] ? $product->attributes['old_price'] : null;
            $product->attributes['new'] = $product->attributes['new'] ? '1' : '0';
            $product->getImg();

            if (!$product->validate($data)) {
                $product->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if ($id = $product->save('product')) {
                $product->saveGallery($id);
                $product->editRelatedProduct($id, $data);
                $product->editModification($id, $data);
                $_SESSION['success'] = 'Товар успешно добавлен';
            }

            redirect();
        }

        $this->setMeta('Добавление товара');
    }

    public function relatedProductAction() {
        // Получение запросв связанного товара
        $q = isset($_GET['q']) ? $_GET['q'] : '';
        $data['items'] = [];

        // Получим товары похожие на запрос
        $products = \R::getAssoc('SELECT id, title FROM product WHERE title LIKE ? LIMIT 10', ["%{$q}%"]);

        if($products) {
            $i = 0;

            foreach ($products as $id => $title) {
                $data['items'][$i]['id'] = $id;
                $data['items'][$i]['text'] = $title;
                $i++;
            }
        }

        echo json_encode($data);
        die();
    }

    public function modificationProductAction() {

    }

    public function deleteGalleryAction() {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;

        if (!$id || !$src) {
            return;
        }

        if (\R::exec("DELETE FROM gallery WHERE product_id = ? AND img = ?",[$id, $src])) {
            exit('1');
        }

        return;
    }

    public function deleteAction() {
        // Получим id товара
        $id = $this->getRequestId();

        // Найдём фото галереи товара и удалим
        $gallery = \R::exec("DELETE FROM gallery WHERE product_id = ?", [$id]);

        // Найдём связанные товары и удалим их
        $related_product = \R::exec("DELETE FROM related_product WHERE product_id = ?", [$id]);

        // Найдём товар в БД
        $product = \R::load('product', $id);
        \R::trash($product);
        $_SESSION['success'] = 'Товар успешно удалён';

        redirect();
    }
}