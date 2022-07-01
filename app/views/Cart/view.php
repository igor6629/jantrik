<!-- Breadcrumb Start -->
<div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
  <div class="container">
    <div class="breadcrumb">
      <ul>
        <li><a href="<?=PATH?>">Главная</a></li>
        <li class="active"><a href="cart/view">Корзина</a></li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Cart Main Area Start -->
<div class="cart-main-area pb-80 pb-sm-50" id="cart-shop">
  <div class="container">
    <?php if (isset($_SESSION['success-cart'])) :?>
      <div class="alert alert-success">
        <?php echo $_SESSION['success-cart']; unset($_SESSION['success-cart']);?>
      </div>
    <?php endif;?>
    <h2 class="text-capitalize sub-heading">корзина</h2>
    <div class="row">
      <div class="col-md-12">
        <!-- Form Start -->
        <form method="post" action="cart/view" role="form">
          <!-- Table Content Start -->
          <?php if(!empty($_SESSION['cart'])) : ?>
            <div class="table-content table-responsive mb-50 body" >
              <table>
                <thead>
                  <tr>
                    <th class="product-thumbnail">Фото</th>
                    <th class="product-name">Название</th>
                    <th class="product-price">Цена</th>
                    <th class="product-quantity">Кол-во</th>
                    <th class="product-subtotal">Общая стоимость</th>
                    <th class="product-remove">Удалить</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($_SESSION['cart'] as $id => $item) :?>
                    <tr>
                      <td class="product-thumbnail">
                        <a href="product/<?=$item['alias'];?>"><img src="images/product/<?=$item['img'];?>" alt="cart-image" /></a>
                      </td>
                      <td class="product-name"><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></td>
                      <td class="product-price"><span class="amount"><?=$_SESSION['cart.currency']['symbol_left'].$item['price'].$_SESSION['cart.currency']['symbol_right'];?></span></td>
                      <td class="product-quantity"><?=$item['qty'];?></td>
                      <td class="product-subtotal"><?=$item['qty'] * $item['price'];?></td>
                      <td class="product-remove"><a href="/cart/delete/?id=<?=$id ?>"><i class="fa fa-times icon-delete" aria-hidden="true"></i></a></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <?php else:?>
              <h5>Корзину пуста</h5> <br>
            <?php endif;?>
            <!-- Table Content Start -->
            <div class="row">
              <!-- Cart Button Start -->
              <div class="col-lg-8 col-md-7">
                <div class="buttons-cart">
                  <a href="<?= PATH;?>">Продолжить покупки</a>
                  <?php if(!empty($_SESSION['cart'])) : ?>
                    <input type="submit" value="Очистить корзину" />
                  <?php endif;?>
                </div>
              </div>
              <!-- Cart Button Start -->
              <!-- Cart Totals Start -->
              <?php if(!empty($_SESSION['cart'])) : ?>
                <div class="col-lg-4 col-md-12">
                  <div class="cart_totals">
                    <h2>Общая стоимость</h2>
                    <br />
                    <table>
                      <tbody>
                        <tr class="cart-subtotal">
                          <th>Общее количество</th>
                          <td><span class="amount"><?=$_SESSION['cart.qty']?></span></td>
                        </tr>
                        <tr class="order-total">
                          <th>Общая сумма</th>
                          <td>
                            <strong><span class="amount"><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right']?></span></strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="wc-proceed-to-checkout">
                      <?php if (!isset($_SESSION['user'])):?>
                        <a href="user/login">Детали заказа</a>
                        <?php else:?>
                          <a href="cart/checkout">Детали заказа</a>
                        <?php endif;?>
                      </div>
                    </div>
                  </div>
                <?php endif;?>
                <!-- Cart Totals End -->
              </div>
              <!-- Row End -->
            </form>
            <!-- Form End -->
          </div>
        </div>
        <!-- Row End -->
      </div>
    </div>
    <!-- Cart Main Area End -->
