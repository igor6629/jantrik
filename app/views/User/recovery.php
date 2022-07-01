<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=PATH;?>">Главная</a></li>
                <li><a href="user/login">Вход</a></li>
                <li class="active">Восстановление пароля</li>
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
            <h4 class="mb-10">Восстановление пароля</h4>
        </div>
        <?php if(isset($_SESSION['error-recovery'])):?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error-recovery']; unset($_SESSION['error-recovery']);?>
            </div>
        <?php endif;?>
        <form class="form-horizontal pb-100" action="user/recovery" method="post" role="form">
            <fieldset>
                <div class="form-group">
                    <label class="control-label" for="f-name"><span class="require">*</span>Введите Ваш Email</label>
                    <br>
                    <div class="col-4">
                        <input type="email" class="form-control" name="email" id="email" placeholder="user@gmail.com">
                    </div>
                </div>
            </fieldset>
            <div class="buttons newsletter-input">
                <div class="pull-left">
                    <input type="submit" value="Восстановить" name="check-email" class="return-customer-btn">
                </div>
            </div>
        </form>
    </div>
    <!-- Container End -->
</div>
<!-- Register Account End -->