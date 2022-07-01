<?php

namespace app\controllers;

use app\models\Review;
use Valitron\Validator;

class ReviewController extends AppController {

    public function addAction() {
        $data = $_POST;

        if (empty($data)) {
            redirect(PATH);
        }

        $data['user_id'] = $_SESSION['user']['id'];
        $review = new Review();
        $review->load($data);

        // Если пользователь неккоректно ввёл данные
        if (!$review->validate($data)) {
            $review->getErrors();
            redirect();
        }

        $review->saveReview($data);

        redirect();
    }
}