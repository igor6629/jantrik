<?php

namespace app\controllers\admin;
use jantrik\libs\Pagination;

class ReviewController extends AppController {

    public function indexAction() {
        // Пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;

        // Кол-во отзывов
        $count = \R::count('review');

        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        // Вывод из таблицы отзывов
        $reviews = \R::findAll("review","ORDER BY id DESC LIMIT $start, $perpage");

        $this->setMeta('Список отзывов');
        $this->set(compact('reviews', 'pagination', 'count'));
    }

    public function deleteAction() {
        // Получим ID заказа
        $review_id = $this->getRequestId();
        // Получим заказ
        $review = \R::load('review', $review_id);
        // Удаляем заказ
        \R::trash($review);
        $_SESSION['success'] = 'Отзыв успешно удалён';

        redirect(ADMIN . '/review');
    }
}