<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <table style="border-color: #e5e5e5; border-style: solid; border-width: 1px 0 0 1px; text-align: center; width: 100%;">
    <thead>
      <tr>
        <th class="product-name" style="border-bottom: 1px solid #e5e5e5; border-right: 1px solid #e5e5e5;">Название</th>
        <th class="product-price" style="border-bottom: 1px solid #e5e5e5; border-right: 1px solid #e5e5e5;">Цена</th>
        <th class="product-quantity" style="border-bottom: 1px solid #e5e5e5; border-right: 1px solid #e5e5e5;">Кол-во</th>
        <th class="product-subtotal" style="border-bottom: 1px solid #e5e5e5; border-right: 1px solid #e5e5e5;">Общая стоимость</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['cart'] as $item) :?>
        <tr>
          <td class="product-name" style="width: 120px; border-bottom: 1px solid #e5e5e5; border-right: 1px solid #e5e5e5; border-top: medium none; padding: 20px 10px; vertical-align: middle; font-size: 13px;"><?=$item['title'];?></td>
          <td class="product-price" style="width: 120px; border-bottom: 1px solid #e5e5e5; border-right: 1px solid #e5e5e5; border-top: medium none; padding: 20px 10px; vertical-align: middle; font-size: 13px;"><span class="amount"><?=$_SESSION['cart.currency']['symbol_left'].$item['price'].$_SESSION['cart.currency']['symbol_right'];?></span></td>
          <td class="product-quantity" style="width: 120px; border-bottom: 1px solid #e5e5e5; border-right: 1px solid #e5e5e5; border-top: medium none; padding: 20px 10px; vertical-align: middle; font-size: 13px;"><?=$item['qty'];?></td>
          <td class="product-subtotal" style="width: 120px; border-bottom: 1px solid #e5e5e5; border-right: 1px solid #e5e5e5; border-top: medium none; padding: 20px 10px; vertical-align: middle; font-size: 13px;"><?=$item['qty'] * $item['price'];?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  <div class="cart_totals" style="text-align: right; ">
    <h2 style="border-bottom: 2px solid #222; display: inline-block; font-size: 22px; margin: 0 -480px 25px; text-transform: uppercase; font-weight: 500; margin-right: -460px;">Общая стоимость</h2>
    <br />
    <table style="border: medium none; float: right; margin: 0; text-align: right;">
      <tbody>
        <tr class="cart-subtotal">
          <th style="font-size: 13px; font-weight: 500; padding: 0 20px 12px 0; text-align: right; text-transform: uppercase; vertical-align: top;">Общее количество</th>
          <td style="padding: 0 0 12px; vertical-align: top;"><span class="amount" style="color: #f1ac06; font-size: 13px; margin-left: 5px; text-align: right; text-transform: uppercase;"><?=$_SESSION['cart.qty']?></span></td>
        </tr>
        <tr class="order-total">
          <th style="font-size: 13px; font-weight: 700; padding: 12px 20px 12px 0; text-align: right; text-transform: uppercase; vertical-align: top;">Общая сумма</th>
          <td>
            <strong><span class="amount" style="font-size: 18px; text-transform: uppercase; white-space: nowrap; font-weight: 600; color: #f1ac06; margin-right:-480px; "><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right']?></span></strong>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
