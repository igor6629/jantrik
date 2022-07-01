<?php

namespace app\models\admin;

use app\models\AppModel;

class Product extends AppModel {

    // Массив аттрибутов
    public $attributes = [
        'title' => '',
        'category_id' => '',
        'alias' => '',
        'keywords' => '',
        'description' => '',
        'price' => '',
        'old_price' => '',
        'content' => '',
        'status' => '',
        'hit' => '',
        'new' => '',
    ];

    // Массив правил
    public $rules = [
        'required' => [
            ['title'],
            ['category_id'],
            ['description'],
            ['price'],
            ['content'],
            ['price'],
            ['alias'],
        ],
        'integer' => [
            ['category_id'],
            ['price'],
            ['old_price'],
        ],
    ];

    public function editRelatedProduct($id, $data) {
        // получим данные для создания связанных товаров
        $related_product = \R::getCol('SELECT related_id FROM related_product WHERE product_id = ?', [$id]);

        // Если были убраны связанные товары - удаляем их
        if(empty($data['related']) && !empty($related_product)) {
            \R::exec('DELETE FROM related_product WHERE product_id = ?', [$id]);
            return;
        }

        // Если связанные товары добавляются
        if(empty($related_product) && !empty($data['related'])) {
            $sql_part = '';

            foreach($data['related'] as $v) {
                $v = (int)$v;
                $sql_part .= "($id, $v),";
            }

            $sql_part = rtrim($sql_part, ',');
            \R::exec("INSERT INTO related_product (product_id, related_id) VALUES $sql_part");
        }

        // Если изменились свзяанные товары - удалим их и запишем новые
        if(!empty($data['related'])) {
            // Сравнивает массивы и находит в них разницу
            $result = array_diff($related_product, $data['related']);

            if (!empty($result) || count($related_product) != count($data['related'])) {
                \R::exec('DELETE FROM related_product WHERE product_id = ?', [$id]);
                $sql_part = '';

                foreach($data['related'] as $v) {
                    $v = (int)$v;
                    $sql_part .= "($id, $v),";
                }

                $sql_part = rtrim($sql_part, ',');
                \R::exec("INSERT INTO related_product (product_id, related_id) VALUES $sql_part");
            }
        }
    }

    public function editModification($id, $data) {
        // Все модификации товара
        $mods = \R::getAssoc('SELECT title, price FROM modification WHERE product_id = ?', [$id]);

        $title = [];
        $price = [];
        $res = [];

        foreach ($_POST['title_mods'] as $k => $v) {
            if (!empty($v)) {
                $title[$k] = $v;
            }
        }

        foreach ($_POST['price_mods'] as $k => $v) {
            if (!empty($v)) {
                $price[$k] = $v;
            }
        }

        for ($i = 0; $i < count($title); $i++) {
            $res[$title[$i]] = $price[$i];
        }

        // Удаление модификаций
        if(empty($data['mod_title']) && empty($title) || empty($price)) {
            \R::exec('DELETE FROM modification WHERE product_id = ?', [$id]);
            return;
        }
        
        // Если модификации добавляются
        if(!empty($res) && empty($mods)) {
            $sql_part = '';

            foreach ($res as $k => $v) {
                $v = (int)$v;
                $sql_part .= "($id, '$k', $v),";
            }

            $sql_part = rtrim($sql_part, ',');
            \R::exec("INSERT INTO modification (product_id, title, price) VALUES $sql_part");
        }

        // Обновление модификаций
        if (!empty($mods) && !empty($res)) {
            $result = array_diff($mods, $res);

            if (!empty($result) || count($mods) != count($res)) {
                \R::exec('DELETE FROM modification WHERE product_id = ?', [$id]);
                $sql_part = '';

                foreach ($res as $k => $v) {
                    $v = (int)$v;
                    $sql_part .= "($id, '$k', $v),";
                }

                $sql_part = rtrim($sql_part, ',');
                \R::exec("INSERT INTO modification (product_id, title, price) VALUES $sql_part");
            }
        }
    }

    // Получение загруженного изображения
    public function getImg() {
        if(!empty($_SESSION['single'])) {
            $this->attributes['img'] = $_SESSION['single'];
            unset($_SESSION['single']);
        }
    }

    // Сохранение в галлерею
    public function saveGallery($id) {
        if(!empty($_SESSION['multi'])) {
            $sql_part = '';

            foreach ($_SESSION['multi'] as $v) {
                $sql_part .= "('$v', $id),";
            }

            $sql_part = rtrim($sql_part, ',');
            \R::exec("INSERT INTO gallery (img, product_id) VALUES $sql_part");

            unset($_SESSION['multi']);
        }
    }

    public function uploadImg($name, $wmax, $hmax) {
            $uploaddir = WWW . '/images/product/';
            $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES[$name]['name'])); // расширение картинки
            $types = array("image/gif", "image/png", "image/jpeg", "image/jpg", "image/x-png"); // массив допустимых расширений

            if($_FILES[$name]['size'] > 2097152) {
                $res = array("error" => "Ошибка! Максимальный вес файла - 2 Мб!");
                exit(json_encode($res));
            }

            if($_FILES[$name]['error']) {
                $res = array("error" => "Ошибка! Возможно, файл слишком большой.");
                exit(json_encode($res));
            }

            if(!in_array($_FILES[$name]['type'], $types)) {
                $res = array("error" => "Допустимые расширения - .gif, .jpg, .png");
                exit(json_encode($res));
            }

            $new_name = $_FILES[$name]['name'];
            $uploadfile = $uploaddir.$new_name;

            if(@move_uploaded_file($_FILES[$name]['tmp_name'], $uploadfile)) {
                if($name == 'single') {
                    $_SESSION['single'] = $new_name;
                }else {
                    $_SESSION['multi'][] = $new_name;
                }

                self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
                $res = array("file" => $new_name);

                exit(json_encode($res));
            }
        }

        /**
         * @param string $target путь к оригинальному файлу
         * @param string $dest путь сохранения обработанного файла
         * @param string $wmax максимальная ширина
         * @param string $hmax максимальная высота
         * @param string $ext расширение файла
         */
        public static function resize($target, $dest, $wmax, $hmax, $ext) {
            list($w_orig, $h_orig) = getimagesize($target);
            $ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

            if (($wmax / $hmax) > $ratio) {
                $wmax = $hmax * $ratio;
            } else {
                $hmax = $wmax / $ratio;
            }

            $img = "";
            // imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
            switch ($ext) {
                case("gif"):
                    $img = imagecreatefromgif($target);
                    break;
                case("png"):
                    $img = imagecreatefrompng($target);
                    break;
                default:
                    $img = imagecreatefromjpeg($target);
            }

            $newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки

            if ($ext == "png") {
                imagesavealpha($newImg, true); // сохранение альфа канала
                $transPng = imagecolorallocatealpha($newImg, 0, 0, 0, 127); // добавляем прозрачность
                imagefill($newImg, 0, 0, $transPng); // заливка
            }

            imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
            switch ($ext) {
                case("gif"):
                    imagegif($newImg, $dest);
                    break;
                case("png"):
                    imagepng($newImg, $dest);
                    break;
                default:
                    imagejpeg($newImg, $dest);
            }
            imagedestroy($newImg);
    }
}