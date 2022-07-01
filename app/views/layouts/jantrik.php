<!doctype html>
<html class="no-js" lang="en-US" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="">

<head>
  <base href="/">
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <?= $this->getMeta();?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="images/icon/favicon.svg">
  <!-- Google Font css -->
  <link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet">
  <!-- mobile menu css -->
  <link rel="stylesheet" href="/css/meanmenu.min.css">
  <!-- animate css -->
  <link rel="stylesheet" href="/css/animate.css">
  <!-- nivo slider css -->
  <link rel="stylesheet" href="/css/nivo-slider.css">
  <!-- owl carousel css -->
  <link rel="stylesheet" href="/css/owl.carousel.min.css">
  <!-- slick css -->
  <link rel="stylesheet" href="/css/slick.css">
  <!-- price slider css -->
  <link rel="stylesheet" href="/css/jquery-ui.min.css">
  <!-- fontawesome css -->
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <!-- fancybox css -->
  <link rel="stylesheet" href="/css/jquery.fancybox.css">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <!-- default css  -->
  <link rel="stylesheet" href="/css/default.css">
  <!-- style css -->
  <link rel="stylesheet" href="style.css">
  <!-- responsive css -->
  <link rel="stylesheet" href="/css/responsive.css">
  <!-- MY MENU STYLE-->
  <link href="megamenu/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
  <link href="megamenu/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" href="/css/_variables.scss">
  
  <script type="text/javascript" src="js/bootstrap-validate.js"></script>
</head>

<body>
  <!-- Wrapper Start -->
  <div class="wrapper homepage">
    <!-- Header Area Start -->
    <header>
      <!-- Header Top Start -->
      <div class="header-top">
        <div class="container">
          <div class="row">
            <!-- Header Top left Start -->
            <div class="col-lg-4 col-md-12 d-center">
              <div class="header-top-left">
                <img src="images/icon/call.png" alt="">Позвоните нам: +380 (50) 000-00-01
              </div>
            </div>
            <!-- Header Top left End -->
            <!-- Search Box Start -->
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
              <div class="search-box-view">
                <form action="search" method="get" autocomplete="off">
                  <input type="text" class="typeahead" id="typeahead" placeholder="Поиск" name="s">
                  <button type="submit" class="submit"></button>
                </form>
              </div>
            </div>
            <!-- Search Box End -->
            <!-- Header Top Right Start -->
            <div class="col-lg-4 col-md-12">
              <div class="header-top-right">
                <ul class="header-list-menu f-right">
                  <li><a href="shop">Каталог</a></li>
                  <!-- Language Start -->
                  <li><a href="#">Язык: Русский <i class="fa fa-angle-down"></i></a>
                    <ul class="ht-dropdown">
                      <li>English</li>
                    </ul>
                  </li>
                  <!-- Language End -->
                  <!-- Currency Start -->
                  <?php new \app\widgest\currency\Currency();?>
                  <!-- Currency End -->
                </ul>
                <!-- Header-list-menu End -->
              </div>
            </div>
            <!-- Header Top Right End -->
          </div>
        </div>
        <!-- Container End -->
      </div>
      <!-- Header Top End -->
      <!-- Header Bottom Start -->
      <div class="header-bottom header-sticky">
        <div class="container">
          <div class="row">
            <div class="col-xl-3 col-lg-2 col-sm-5 col-5">
              <div class="logo">
                <a href="<?=PATH?>"><img src="images/logo/logo.png" alt="logo-image"></a>
              </div>
            </div>
            <!-- Primary Vertical-Menu End -->
            <!-- Search Box Start -->
            <div class="d-none d-lg-block">
              <div class="middle-menu pull-right">
                <nav>
                  <div class="menu-container">
                    <div class="menu">
                      <?php new \app\widgest\menu\Menu([
                        'tpl' => WWW . '/menu/menu.php',
                      ]); ?>
                    </div>
                  </div>
                </nav>
              </div>
            </div>
            <!-- Search Box End -->
            <!-- Cartt Box Start -->
            <div class="shop-cart">
              <div class="d-none d-lg-block">
                <div class="cart-box text-right pull-right">
                  <ul>
                    <li><a href="<?php if (!empty($_SESSION['user'])){ echo "user/account";} else { echo "user/login"; }?>"><i class="fa fa-cog"></i></a>
                      <ul class="ht-dropdown">
                        <?php if (!empty($_SESSION['user'])) :?>
                          <li><a href="#" style="font-size: 9px">Добро пожаловать, <?= h($_SESSION['user']['name']);?></a></li>
                          <li><a href="user/logout">Выход</a></li>
                          <li><a href="user/account">Кабинет</a></li>
                          <li><a href="shop">Каталог</a></li>
                          <li><a href="compare">Сравнения</a></li>
                          <?php if ($_SESSION['user']['role'] == 'admin') :?>
                            <li><a href="<?=ADMIN;?>">Панель управления</a></li>
                          <?php endif;?>
                          <?php else:?>
                            <li><a href="user/login">Вход</a></li>
                            <li><a href="user/signup">Регистрация</a></li>
                            <li><a href="shop">Каталог</a></li>
                            <li><a href="compare">Сравнения</a></li>
                          <?php endif;?>
                        </ul>
                      </li>
                      <li><a href="/wishlist"><i class="fa fa-heart-o"></i></a></li>
                      <li><a href="cart/view" onclick="getCart(); return false;"><i class="fa fa-shopping-basket"></i><span class="cart-counter"><?php if (!empty($_SESSION['cart.qty'])) echo $_SESSION['cart.qty']; else echo 0;?></span></a>
                        <ul class="ht-dropdown main-cart-box">
                          <li>
                            <!-- Cart Box Start -->
                            <?php if (!empty($_SESSION['cart'])) :?>
                              <?php foreach ($_SESSION['cart'] as $id => $item) :?>
                                <div class="single-cart-box">
                                  <div class="cart-img">
                                    <a href="product/<?=$item['alias'];?>"><img src="images/product/<?=$item['img'];?>" alt="cart-image"></a>
                                  </div>
                                  <div class="cart-content">
                                    <h6><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></h6>
                                    <span><?=$item['qty'];?> × <?=$_SESSION['cart.currency']['symbol_left'] . $item['price'] . $_SESSION['cart.currency']['symbol_right'];?></span>
                                  </div>
                                  <a href="/cart/delete/?id=<?=$id ?>"><i class="fa fa-window-close-o del-icone" style="cursor: pointer"></i></a>
                                </div>
                              <?php endforeach;?>
                              <!-- Cart Box End -->
                              <!-- Cart Footer Inner Start -->
                              <div class="cart-footer fix">
                                <h5>К оплате:<span class="f-right"><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right']?></span></h5>
                                <div class="cart-actions">
                                  <a class="checkout" href="cart/view">К оформлению</a>
                                </div>
                              </div>
                              <?php else: ?>
                                <h6>Товаров в корзине нет</h6>
                              <?php endif; ?>
                              <!-- Cart Footer Inner End -->
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Row End -->
            </div>
            <!-- Container End -->
          </div>
          <!-- Header Bottom End -->
        </header>
        <!-- Header Area End -->

        <div class="content">
          <?=$content?>
        </div>

        <!-- Brand Logo Start -->
        <div class="brand-area pb-60">
          <div class="container">
            <!-- Brand Banner Start -->
            <div class="brand-banner owl-carousel">
              <div class="single-brand">
                <a href="#"><img class="img" src="images/brand/1.png" alt="brand-image"></a>
              </div>
              <div class="single-brand">
                <a href="#"><img src="images/brand/2.png" alt="brand-image"></a>
              </div>
              <div class="single-brand">
                <a href="#"><img src="images/brand/3.png" alt="brand-image"></a>
              </div>
              <div class="single-brand">
                <a href="#"><img src="images/brand/4.png" alt="brand-image"></a>
              </div>
              <div class="single-brand">
                <a href="#"><img src="images/brand/5.png" alt="brand-image"></a>
              </div>
              <div class="single-brand">
                <a href="#"><img class="img" src="images/brand/1.png" alt="brand-image"></a>
              </div>
              <div class="single-brand">
                <a href="#"><img src="images/brand/2.png" alt="brand-image"></a>
              </div>
              <div class="single-brand">
                <a href="#"><img src="images/brand/3.png" alt="brand-image"></a>
              </div>
              <div class="single-brand">
                <a href="#"><img src="images/brand/4.png" alt="brand-image"></a>
              </div>
              <div class="single-brand">
                <a href="#"><img src="images/brand/5.png" alt="brand-image"></a>
              </div>
            </div>
            <!-- Brand Banner End -->
          </div>
        </div>
        <!-- Brand Logo End -->

        <footer class="off-white-bg">
          <!-- Footer Top Start -->
          <div class="footer-top pt-50 pb-60">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 mr-auto ml-auto">
                  <div class="newsletter text-center">
                    <div class="main-news-desc">
                      <div class="news-desc">
                        <h3>Подпишитесь на рассылку новостей</h3>
                        <p>Получайте по электронной почте обновления о наших специальных предложениях</p>
                      </div>
                    </div>
                    <div class="newsletter-box">
                      <form action="#">
                        <input class="subscribe" placeholder="Введите Ваш Email" name="email" id="subscribe" type="text">
                        <button type="submit" class="submit">Подписаться</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Single Footer Start -->
                <div class="col-lg-4  col-md-7 col-sm-6">
                  <div class="single-footer">
                    <h3>Связаться с нами</h3>
                    <div class="footer-content">
                      <div class="loc-address">
                        <span><i class="fa fa-map-marker"></i>184 Main Rd E, St Albans VIC 3021, Australia.</span>
                        <span><i class="fa fa-envelope-o"></i>Email : magazinjantrik@gmail.com</span>
                        <span><i class="fa fa-phone"></i>Телефон: +380 (50) 000-00-01</span>
                      </div>
                      <div class="payment-mth"><a href="<?=PATH;?>"><img class="img" src="images/footer/1.png" alt="payment-image"></a></div>
                    </div>
                  </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-2  col-md-4 col-md-4 col-sm-6 footer-full pull-right">
                  <div class="single-footer">
                    <h3 class="footer-title">Мой аккаунт</h3>
                    <div class="footer-content">
                      <ul class="footer-list">
                        <?php if (!empty($_SESSION['user'])) :?>
                          <li><a href="/user/account">Кабинет</a></li>
                          <li><a href="/user/logout">Выход</a></li>
                          <?php if ($_SESSION['user']['role'] == 'admin') :?>
                            <li><a href="<?=ADMIN;?>">Панель управления</a></li>
                          <?php endif;?>
                          <?php else:?>
                            <li><a href="user/login">Вход</a></li>
                            <li><a href="user/signup">Регистрация</a></li>
                          <?php endif;?>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- Single Footer Start -->
                </div>
                <!-- Row End -->
              </div>
              <!-- Container End -->
            </div>
            <!-- Footer Top End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom off-white-bg2">
              <div class="container">
                <div class="footer-bottom-content">
                  <p class="copy-right-text">Copyright © <a  href="<?=PATH;?>">Jantrik</a> Все Права Защищены.</p>
                  <div class="footer-social-content">
                    <ul class="social-content-list">
                      <li><a href="mailto:magazinjantrik@gmail.com"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
          </footer>
          <!-- Footer End -->
        </div>
        <!-- Wrapper End -->

        <!-- Modal -->
        <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Корзина</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="cart/view" type="button" class="btn btn-primary">Оформить заказ</a>
                <button type="button" class="btn btn-danger" onclick="clean()">Очистить корзину</button>
              </div>
            </div>
          </div>
        </div>

        <!-- modernizr js -->



        <div class="preloader"><img src="images/icon/Display-Loading.gif" alt=""></div>

        <?php $curr = \jantrik\App::$app->getProperty('currency');?>

        <script>
          var path = '<?=PATH;?>',
          course = '<?=$curr['value'];?>',
          symboleLeft =  '<?=$curr['symbol_left'];?>',
          symboleRight = '<?=$curr['symbol_right'];?>';
        </script>


        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- jquery 3.12.4 -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Маска для номера телефона-->
        <script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
        <!-- mobile menu js  -->
        <script src="js/jquery.meanmenu.min.js"></script>
        <!-- scroll-up js -->
        <script src="js/jquery.scrollUp.js"></script>
        <!-- owl-carousel js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- slick js -->
        <script src="js/slick.min.js"></script>
        <!-- wow js -->
        <script src="js/wow.min.js"></script>
        <!-- price slider js -->
        <script src="js/jquery-ui.min.js"></script>

        <script src="js/jquery.countdown.min.js"></script>
        <!-- nivo slider js -->
        <script src="js/jquery.nivo.slider.js"></script>
        <!-- fancybox js -->
        <script src="js/jquery.fancybox.min.js"></script>
        <!-- bootstrap -->
        <script src="js/bootstrap.min.js"></script>

        <script src="js/typeahead.bundle.js"></script>
        <!-- popper -->
        <script src="js/popper.js"></script>
        <!-- plugins -->
        <script src="js/plugins.js"></script>
        <!-- main js -->
        <script src="megamenu/js/megamenu.js"></script>

        <script src="js/main.js"></script>

      </body>
      </html>
