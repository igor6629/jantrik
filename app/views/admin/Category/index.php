<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Список категорий (<?=$count;?>)
          <a href="<?=ADMIN;?>/category/add" class="btn btn-default btn-xs">Новая категория</a>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
          <li class="breadcrumb-item">Список категорий</li>
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
          <div class="box-body">
            <?php new \app\widgest\menu\Menu([
              'tpl' => WWW . '/menu/category_admin.php',
              'container' => 'div',
              'cache' => 0,
              'cacheKey' => 'admin_category',
              'class' => 'list-group list-group-root well',
            ])?>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
