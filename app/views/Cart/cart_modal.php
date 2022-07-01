<?php if (!empty($_SESSION['cart'])) :?>
  <div class="table-responsive">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>Фото</th>
          <th>Наименование</th>
          <th>Цена</th>
          <th>Кол-во</th>
          <th>Удалить из корзины</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION['cart'] as $id => $item) :?>
          <tr>
            <td><a href="product/<?=$item['alias'];?>"><img src="images/product/<?=$item['img'];?>" width="80px" height="100px"></a></td>
            <td><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></td>
              <td><?=$_SESSION['cart.currency']['symbol_left'] . $item['price'] . $_SESSION['cart.currency']['symbol_right'];?></td>
              <td><?=$item['qty'];?></td>
              <td><i class="fa fa-times icon-delete" aria-hidden="true" data-id="<?=$id?>" style="cursor: pointer"></i></td>
            </tr>
          <?php endforeach;?>
          <tr>
            <td>Итого:</td>
            <td colspan="4" class="text-right cart-qty"><?=$_SESSION['cart.qty']?></td>
          </tr>
          <tr>
            <td>Общая стоимость:</td>
            <td colspan="4" class="text-right cart-sum"><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right']?></td>
          </tr>
        </tbody>
      </table>
    </div>
  <?php else:?>
    <h3>Корзина пуста</h3>
  <?php endif;?>
