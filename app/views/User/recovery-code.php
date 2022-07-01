<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=PATH;?>">Главная</a></li>
                <li><a href="user/login">Вход</a></li>
                <li class="active">Восстановление пароля</li>
                <li class="active">Код восстановления</li>
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
            <h4 class="mb-10">Код восстановления</h4>
        </div>
        <?php if(isset($_SESSION['success']['send-code'])) :?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']['send-code']; unset($_SESSION['success']['send-code']);?>
            </div>
            <?php elseif(isset($_SESSION['error-recovery-code']) || isset($_SESSION['error-time'])) :?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error-recovery-code']; unset($_SESSION['error-recovery-code']);?>
            </div>
        <?php endif;?>
        <form class="form-horizontal pb-100" action="user/recovery-code" method="post" id="recovery">
            <fieldset>
                <div class="form-group">
                    <label class="control-label" for="f-name"><span class="require">*</span>Введите Код подтверждения</label>
                    <br>
                    <div class="col-4">
                        <input type="text" class="form-control" name="code" id="code" required>
                    </div>
                </div>
            </fieldset>
            <div class="buttons newsletter-input">
                <input type="submit" value="Восстановить" name="check-code" class="return-customer-btn">
            </div>
        </form>
    </div>
    <!-- Container End -->
</div>
<!-- Register Account End -->