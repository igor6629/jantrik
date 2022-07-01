<!-- Content Header (Page header) -->
<div class="content-header" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Новая категория</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>/category">Список категорий</a></li>
                    <li class="breadcrumb-item">Новая категория</li>
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
                    <form action="<?=ADMIN;?>/category/add" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Наименование категории*</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Asus" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="alias">Адрес ссылки*</label>
                                <input type="text" class="form-control" name="alias" id="alias" placeholder="laptops-asus" required>
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Родительская категория*</label>
                                <?php new \app\widgest\menu\Menu([
                                    'tpl' => WWW . '/menu/select.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cacheKey' => 'admin_select',
                                    'class' => 'form-control',
                                    'attrs' => [
                                        'name' => 'parent_id',
                                        'id' => 'parent_id',
                                    ],
                                    'prepend' => '<option value="0">Самостоятельная категория</option>',
                                ])?>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="asus, notebook, laptops, ноутбук">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="description">Описание</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="asus">
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

