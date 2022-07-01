<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=PATH?>">Главная</a></li>
                <li class="active">Личный кабинет</li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- My Account Page Start Here -->
<div class="my-account pb-60">
    <div class="container">
        <?php if (isset($_SESSION['error'])) :?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
            </div>
        <?php endif;?>
        <div class="account-dashboard">
            <div class="dashboard-upper-info">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="d-single-info">
                            <p class="user-name">Добро пожаловать, <span><?= h($_SESSION['user']['name']);?></span></p>
                            <p class="text-right"><a href="user/logout">(Выход)</a></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-single-info">
                            <p>Нужна помощь? Напишите нам.</p>
                            <p class="text-lowercase"><a href="mailto:magazinjantrik@gmail.com">magazinjantrik@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-single-info text-center">
                            <a class="view-cart mr-10" href="wishlist" title="Список желаний"><i class="fa fa-heart" aria-hidden="true"></i>Желания</a>
                            <a class="view-cart ml-10" href="compare" title="Список сравнений"><i class="fa fa-signal" aria-hidden="true"></i>Сравнения</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-single-info text-center">
                            <a class="view-cart" href="cart/view"><i class="fa fa-cart-plus" aria-hidden="true"></i>Корзина</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <!-- Nav tabs -->
                    <ul class="nav flex-column dashboard-list" role="tablist">
                        <li><a class="active" data-toggle="tab" href="#orders">История Заказов</a></li>
                        <li><a data-toggle="tab" href="#account-details">Редактировать Профиль</a></li>
                        <li><a href="user/logout" href="#logout">Выход</a></li>
                    </ul>
                </div>
                <div class="col-lg-10">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard-content mt-all-40">
                        <div id="orders" class="tab-pane active">
                            <h3>История заказов</h3>
                            <div class="table-responsive">
                                <?php if ($orders) : ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Заказ</th>
                                                <th>Дата</th>
                                                <th>Статус</th>
                                                <th>Сумма</th>
                                                <th>Примечание</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $order) : ?>
                                                <tr>
                                                    <td><?=$order->id?></td>
                                                    <td><?=$order->date?></td>
                                                    <td><?=$order['status'] ? 'Завершен' : 'Новый';?></td>
                                                    <td> <?php
                                                    $sum = (string)$order->sum;

                                                    if ($order->currency == "USD" || $order->currency == "EUR")
                                                        $sum = $order->currency." ".$sum;
                                                    else
                                                        $sum = $sum ." ".$order->currency;?>
                                                    <span style="font-weight: bold"><?=$sum; ?></span> за <span style="font-weight: bold"><?= countProducts($order->id) ?></span> товар(а)</td>
                                                </td>
                                                <td><?= $order->note?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <h5>К сожалению, Вы ещё не сделали ни одного заказа</h5>
                                    <br> <a class="view-cart" href="shop"><i class="fa fa-cart-plus" aria-hidden="true"></i>Каталог</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div id="account-details" class="tab-pane">
                            <h3>Редактирование Профиля </h3>
                            <div class="register-form login-form clearfix">
                                <form action="user/account" method="post" id="edit_profile">
                                    <div class="form-group row align-items-center">
                                        <label class="col-lg-3 col-md-4 col-form-label">Логин</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input type="text" class="form-control is-valid" name="login" id="login" value="<?= h($_SESSION['user']['login']);?>">
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
                                    <div class="form-group row">
                                        <label for="f-name" class="col-lg-3 col-md-4 col-form-label">Имя</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input type="text" class="form-control is-valid " name="name" id="f-name" value="<?= h($_SESSION['user']['name']);?>">
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
                                    <div class="form-group row">
                                        <label for="email" class="col-lg-3 col-md-4 col-form-label">Email</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input type="text" class="form-control is-valid" name="email" id="email" value="<?= h($_SESSION['user']['email']);?>">
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
                                    <div class="form-group row">
                                        <label for="address_f" class="col-lg-3 col-md-4 col-form-label">Адрес</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input type="text" class="form-control is-valid" name="address" id="address_f" value="<?= h($_SESSION['user']['address']);?>">
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
                                    <div class="form-group row">
                                        <label for="inputpassword" class="col-lg-3 col-md-4 col-form-label">Текущий пароль</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input type="password" class="form-control" name="password" id="inputpassword">
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
                                    <div class="form-group row">
                                        <label for="newpassword" class="col-lg-3 col-md-4 col-form-label">Новый пароль</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input type="password" class="form-control" name="newpassword" id="newpassword">
                                            <button class="btn show-btn" type="button">Show</button>
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
                                    <div class="form-group row">
                                        <label for="v-password" class="col-lg-3 col-md-4 col-form-label">Подтверждение пароля</label>
                                        <div class="col-lg-6 col-md-8">
                                            <input type="password" class="form-control" name="c-password" id="c-password">
                                            <button class="btn show-btn" type="button">Show</button>
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
                                    <div class="register-box mt-40">
                                        <button type="submit" class="return-customer-btn f-right" name="sub">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account Page End Here -->