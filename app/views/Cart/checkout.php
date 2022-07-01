<!-- Breadcrumb Start -->
<div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=PATH;?>">Главная</a></li>
                <li><a href="cart/view">Корзина</a></li>
                <li class="active">Подтверждение</li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- checkout-area start -->
<div class="checkout-area pt-30  pb-60">
    <div class="container">
        <?php if (isset($_SESSION['error'])) :?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
            </div>
        <?php endif;?>
        <form action="cart/confirm" method="post">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="checkbox-form">
                        <h3>Детали доставки</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Имя <span class="required">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?=$_SESSION['user']['name'];?>" required>
                                    <div class="cart_valid">
                                        <div class="valid-feedback">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fa fa-times myicon" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>Фамилия <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" required/>
                                    <div class="cart_valid">
                                        <div class="valid-feedback">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fa fa-times myicon" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label>Адрес <span class="required">*</span></label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Россия, Псковская обл, рп. Плюсса, ул. Мелиораторов, д. 18" value="<?=htmlspecialchars($_SESSION['user']['address'])?>" required/>
                                    <div class="cart_valid">
                                        <div class="valid-feedback">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fa fa-times myicon" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list mb-30">
                                    <label>Индекс <span class="required">*</span></label>
                                    <input type="text" id="index" class="form-control" name="index" placeholder="76156" required/>
                                    <div class="cart_valid">
                                        <div class="valid-feedback">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fa fa-times myicon" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email"  class="form-control" id="email" name="email" placeholder="" value="<?=$_SESSION['user']['email'];?>" required/>
                                    <div class="cart_valid">
                                        <div class="valid-feedback">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="fa fa-times myicon" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label>Номер телефона <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="phone" name="number" placeholder="+380 (66) 451-53-70" required/>
                                    <div class="valid-feedback">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>
                                    <div class="invalid-feedback">
                                        <i class="fa fa-times myicon" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Примечания к заказу</label>
                                        <textarea id="checkout-mess" name="note" cols="30" rows="10" placeholder="Примечания к вашему заказу, например особые примечания к доставке."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="your-order">
                        <h3>Ваш заказ</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Наименование</th>
                                        <th class="product-total">Цена</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['cart'] as $id => $item) :?>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                <?= $item['title'];?> <strong class="product-quantity"> × <?=$item['qty'];?></strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount"><?=$_SESSION['cart.currency']['symbol_left'].$item['qty'] * $item['price'].$_SESSION['cart.currency']['symbol_right'];?></span>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Итоговое количество</th>
                                        <td><span class="amount"><?=$_SESSION['cart.qty']?></span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Итоговая стоимость</th>
                                        <td><strong><span class="amount"><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right']?></span></strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Прямой Банковский Перевод
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse  in show" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <p>Прямой Банковский Перевод
                                                Произведите оплату непосредственно на наш банковский счет. Ваш заказ не будет отправлен до тех пор, пока средства не будут переведены на наш счет.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Оплата Чеком
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <p>Пожалуйста, отправьте свой чек на Магазин Jantrik,One Apple Park Way
                                                Cupertino, CA 95014.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    PayPal
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                <p>Оплата через PayPal. Вы можете оплатить с помощью кредитной карты, если у вас нет счета PayPal.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input type="submit" name="confirm" value="Подтвердить заказ" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- checkout-area end -->