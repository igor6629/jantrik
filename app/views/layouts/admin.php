<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="/adminlte/">
  <?= $this->getMeta();?>
  <link rel="shortcut icon" type="image/x-icon" href="<?=PATH;?>/images/icon/favicon.svg">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Select2 + -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <!-- summernote + -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- my style + -->
  <link rel="stylesheet" href="style/style.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?=ADMIN;?>" class="nav-link">Главная</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?=PATH;?>" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?=ADMIN;?>/user/view?id=<?=$_SESSION['user']['id'];?>" class="d-block"><?=$_SESSION['user']['name'];?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="<?= ADMIN;?>" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Главная
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= ADMIN ?>/order" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>
                    Заказы
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= ADMIN ?>/review" class="nav-link">
                  <i class="nav-icon fas fa-comments"></i>
                  <p>
                    Отзывы
                  </p>
                </a>
              </li>
              <li class="nav-item open">
                <a href="/" class="nav-link"><i class="nav-icon fas fa-cubes"></i>
                  <p>
                    Товары
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= ADMIN ?>/product" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Список товаров</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= ADMIN ?>/product/add" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Добавить товар</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item open">
                <a href="#" class="nav-link"><i class="nav-icon fas fa-server"></i>
                  <p>
                    Категории
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= ADMIN ?>/category" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Список категорий</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= ADMIN ?>/category/add" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Добавить категорию</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item open">
                <a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i>
                  <p>
                    Пользователи
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= ADMIN ?>/user" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Список пользователей</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= ADMIN ?>/user/add" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Добавить пользователя</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item open">
                <a href="#" class="nav-link"><i class="nav-icon fas fa-dollar-sign"></i>
                  <p>
                    Валюты
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= ADMIN ?>/currency" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Список валют</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= ADMIN ?>/currency/add" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Добавить валюту</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="<?= ADMIN ?>/cache" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>
                    Кэширование
                  </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php if (isset($_SESSION['error'])) :?>
          <div class="alert alert-danger">
            <i class="icon fa fa-ban"></i>
            <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
          </div>
        <?php endif;?>
        <?php if (isset($_SESSION['success'])) :?>
          <div class="alert alert-success">
            <i class="icon fa fa-check"></i>
            <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
          </div>
        <?php endif;?>
        <?= $content;?>
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.1.0-rc
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="text-center mt-2">
          <h5>
            <a href="/user/logout">Выход</a>
          </h5>
        </div>
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>
      let path = '<?= PATH;?>',
      adminpath = '<?=ADMIN;?>';
    </script>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Автозагрузчик фоток + -->
    <script src="js/ajaxupload.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote + -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Select2 + -->
    <script src="plugins/select2/js/select2.full.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- my js + -->
    <script src="js/script.js"></script>

  </body>
  </html>
