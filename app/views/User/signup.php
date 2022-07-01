<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
  <div class="container">
    <div class="breadcrumb">
      <ul>
        <li><a href="<?=PATH?>">Главная</a></li>
        <li class="active">Регистрация</li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Register Account Start -->
<div class="register-account pb-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if (isset($_SESSION['error'])) :?>
          <div class="alert alert-danger">
            <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
          </div>
        <?php endif;?>
        <?php if (isset($_SESSION['success']['signup'])) :?>
          <div class="alert alert-success">
            <?php echo $_SESSION['success']['signup']; unset($_SESSION['success']['signup']);?>
          </div>
        <?php endif;?>
      </div>
      <div class="col-sm-12">
        <div class="register-title">
          <h3 class="mb-10">Регистрация аккаунта</h3>
          <p class="mb-10">Если у вас уже есть учетная запись, пожалуйста, войдите на страницу входа.</p>
        </div>
      </div>
    </div>
    <!-- Row End -->
    <div class="row">
      <div class="col-sm-12">
        <form method="post" data-toggle="validator" class="form-horizontal"  action="user/signup" id="signup" role="form">
          <fieldset>
            <legend>Ваши персональные данные</legend>
            <div class="form-group has-feedback">
              <label class="control-label" for="f-name"><span class="require">*</span>Введите Ваш Логин</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="login" id="login" style="font-size: 12px" placeholder="Логин" value="<?= isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']) : '';?>" required>
                <div class="valid-feedback">
                  <i id="check" class="fa fa-check" aria-hidden="true"></i>
                </div>
                <div class="invalid-feedback">
                  <i class="fa fa-times myicon" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <div class="form-group has-feedback">
              <label class="control-label" for="f-name"><span class="require">*</span>Введите Ваше Имя</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="name" id="name" style="font-size: 12px" placeholder="Имя" value="<?= isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '';?>" required>
                <div class="valid-feedback">
                  <i class="fa fa-check" aria-hidden="true"></i>
                </div>
                <div class="invalid-feedback">
                  <i class="fa fa-times myicon" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <div class="form-group has-feedback">
              <label class="control-label" for="email"><span class="require">*</span>Введите Ваш E-mail</label>
              <div class="col-sm-6">
                <input type="email" class="form-control" name="email" id="email" style="font-size: 12px" placeholder="E-mail" value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '';?>" required>
                <div class="valid-feedback">
                  <i class="fa fa-check" aria-hidden="true"></i>
                </div>
                <div class="invalid-feedback">
                  <i class="fa fa-times myicon" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <div class="form-group has-feedback">
              <label class="control-label" for="number"><span class="require">*</span>Введите Ваш адрес</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="address" id="address" style="font-size: 12px" placeholder="Адрес" value="<?= isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : '';?>" required>
                <div class="valid-feedback">
                  <i class="fa fa-check" aria-hidden="true"></i>
                </div>
                <div class="invalid-feedback">
                  <i class="fa fa-times myicon" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </fieldset>
          <fieldset>
            <legend>Ваш пароль</legend>
            <div class="form-group has-feedback">
              <label class="control-label" for="pwd"><span class="require">*</span>Введите Ваш пароль</label>
              <div class="col-sm-6">
                <input type="password" class="form-control" name="password" id="password" style="font-size: 12px" placeholder="Пароль" data-error="Пароль должен содержать не менее 8 символов" data-minlength="8" required>
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
          <div class="buttons newsletter-input">
            <div class="pull-right">
              <input type="submit" id="submit" value="Регистрация" class="newsletter-btn">
            </div>
          </div>
        </form>
        <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data'])?>
      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</div>
<!-- Register Account End -->
