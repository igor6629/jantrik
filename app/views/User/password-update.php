<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=PATH;?>">Главная</a></li>
                <li><a href="user/login">Вход</a></li>
                <li class="active">Восстановление пароля</li>
                <li class="active">Код восстановления</li>
                <li class="active">Новый пароль</li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Register Account Start -->
<div class="register-account pb-20">
    <div class="container">
        <div class="register-title">
            <h4 class="mb-10 text-center">Создайте новый пароль</h4>
        </div>
        <?php if(isset($_SESSION['error'])):?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
            </div>
        <?php endif;?>
        <form class="form-horizontal pb-100"  data-toggle="validator" id="update" action="user/password-update" method="post">
            <fieldset>
                <div class="form-group has-feedback">
                    <label class="control-label" for="pwd"><span class="require">*</span>Введите Ваш пароль</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password" id="password" style="font-size: 12px" placeholder="Пароль" required>
                        <div class="valid-feedback">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <div class="invalid-feedback">
                            <i class="fa fa-times myicon" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="control-label" for="pwd-confirm"><span class="require">*</span>Повторите пароль</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password-confirm" style="font-size: 12px" id="password-confirm" placeholder="Повторите пароль" required>
                        <div class="valid-feedback">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <div class="invalid-feedback">
                            <i class="fa fa-times myicon" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="buttons newsletter-input text-center">
                <input type="submit" value="Сохранить" name="check-email" class="return-customer-btn">
            </div>
        </form>
    </div>
    <!-- Container End -->
</div>
<!-- Register Account End -->

