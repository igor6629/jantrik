<?php

namespace app\controllers\admin;

use app\models\admin\Currency;

class CurrencyController extends AppController {

    public function indexAction() {
        // Выберем все валюты
        $currencies = \R::findAll('currency');

        $this->setMeta('Список валют');
        $this->set(compact('currencies'));
    }

    public function deleteAction() {
        // Получим ID для удаления
        $id = $this->getRequestId();

        $currency = \R::load('currency', $id);
        \R::trash($currency);
        $_SESSION['success'] = 'Валюта удалена';

        redirect();
    }

    public function addAction() {
        if(!empty($_POST)) {
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';

            if(!$currency->validate($data)) {
                $currency->getErrors();
                redirect();
            }

            if($currency->save('currency')) {
                $_SESSION['success'] = 'Валюта добавлена';
                redirect();
            }
        }

        $this->setMeta('Добавить валюту');
    }

    public function editAction() {
        if(!empty($_POST)) {
            // Получим ID валюты
            $id = $this->getRequestId(false);
            $currency = new Currency();
            $data = $_POST;
            $currency->load($data);
            $currency->attributes['base'] = $currency->attributes['base'] ? '1' : '0';

            if(!$currency->validate($data)) {
                $currency->getErrors();
                redirect();
            }

            if($currency->update('currency', $id)) {
                $_SESSION['success'] = "Изменения сохранены";
                redirect();
            }
        }

        $id = $this->getRequestId();
        $currency = \R::load('currency', $id);

        $this->setMeta("Редактирование валюты | {$currency->title}");
        $this->set(compact('currency'));
    }
}