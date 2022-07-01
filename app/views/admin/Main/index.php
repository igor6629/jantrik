<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Панель управления</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
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
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?=$countNewOrders;?></h3>
            <p>Новые заказы</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?=ADMIN;?>/order" class="small-box-footer">Все заказы <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?=$countProducts;?></h3>
            <p>Количество товаров</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="<?=ADMIN;?>/product" class="small-box-footer">Все товары <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?=$countReviews;?></h3>
            <p>Количество отзывов</p>
          </div>
          <div class="icon">
            <i class="fas fa-comments"></i>
          </div>
          <a href="<?=ADMIN;?>/review" class="small-box-footer">Все отзывы <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?=$countCategories;?></h3>
            <p>Количество категорий</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="<?=ADMIN;?>/category" class="small-box-footer">Все категории <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
