<!-- Content Header (Page header) -->
<div class="content-header" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Новый товар</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>/product">Список товаров</a></li>
                    <li class="breadcrumb-item">Новый товар</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="<?=ADMIN;?>/product/add" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Название товара*</label>
                                <input type="text" class="form-control" name="title" id="title" value="<?= isset($_SESSION['form_data']['title']) ? $_SESSION['form_data']['title'] : '' ?>" placeholder="Samsung Galaxy A71 6/128GB Black" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="alias">Адрес товара*</label>
                                <input type="text" class="form-control" name="alias" id="alias" value="<?= isset($_SESSION['form_data']['alias']) ? $_SESSION['form_data']['alias'] : '' ?>" placeholder="samsung-galaxy-a71-6-128gb-black" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Категория*</label>
                                <?php new \app\widgest\menu\Menu([
                                    'tpl' => WWW . '/menu/select.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cacheKey' => 'admin_select',
                                    'class' => 'form-control',
                                    'attrs' => [
                                        'name' => 'category_id',
                                        'id' => 'category_id',
                                    ],
                                    'prepend' => '<option>Выберите категорию</option>',
                                ])?>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" class="form-control" name="keywords" id="keywords" value="<?= isset($_SESSION['form_data']['keywords']) ? $_SESSION['form_data']['keywords'] : '' ?>" placeholder="samsung, a71, galaxy, samsunga71, mobile, phone, android">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="description">Описание*</label>
                                <input type="text" class="form-control" name="description" id="description" value="<?= isset($_SESSION['form_data']['description']) ? $_SESSION['form_data']['description'] : '' ?>" placeholder="Безграничный экран для потрясающих впечатлений.">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="price">Цена (руб.)*</label>
                                <input type="text" class="form-control" name="price" id="price" value="<?= isset($_SESSION['form_data']['price']) ? h($_SESSION['form_data']['price']) : '' ?>" placeholder="21000" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="old_price">Старая цена (руб.)</label>
                                <input type="text" class="form-control" name="old_price" id="old_price" pattern="^[0-9.]{1,}$" value="<?= isset($_SESSION['form_data']['old_price']) ? $_SESSION['form_data']['old_price'] : '' ?>" placeholder="23200">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="content">Контент*</label>
                                <textarea name="content" id="editor1" cols="80" rows="10"><?= isset($_SESSION['form_data']['content']) ? $_SESSION['form_data']['content'] : ''?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="related">Связанные товары</label>
                                        <select name="related[]" class="form-control select2" id="related" multiple="multiple"></select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mod">Модификация товара</label>
                                        <div class="card card-outline card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Модификатор</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body" style="display: block;">
                                                <div class="row" id="modification">
                                                    <div class="col-5" id="mod_title">
                                                        <input type="text" class="form-control" id="title_mods[]" name="title_mods[]" placeholder="Название">
                                                    </div>
                                                    <div class="col-5" id="mod_price">
                                                        <input type="text" class="form-control" id="price_mods[]" name="price_mods[]" placeholder="Цена">
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="button" class="btn btn-tool" id="mods">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" id="mods_delete">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" checked> Статус
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="hit"> Хит
                                </label>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="new" checked> Новый
                                </label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-primary file-upload">
                                            <div class="card-header">
                                                <h3 class="card-title">Базовое изображение</h3>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div id="single" class="btn btn-success" data-url="product/add-image" data-name="single">
                                                    Выбрать фото
                                                </div>
                                                <p><small>Рекомeндуемые размеры: 240x185</small></p>
                                                <div class="single"></div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="overlay" style="display: none; margin: 0 auto; align-items: center"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card card-warning file-upload">
                                            <div class="card-header">
                                                <h3 class="card-title">Фото галереи</h3>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div id="multi" class="btn btn-success" data-url="product/add-image" data-name="multi">
                                                    Выбрать фото
                                                </div>
                                                <p><small>Рекомeндуемые размеры: 470x470</small></p>
                                                <div class="multi">
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="overlay" style="display: none; margin: 0 auto"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

