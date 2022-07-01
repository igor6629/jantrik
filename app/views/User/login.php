<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
  <div class="container">
    <div class="breadcrumb">
      <ul>
        <li><a href="<?=PATH;?>">Главная</a></li>
        <li class="active">Вход</li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- LogIn Page Start -->
<div class="log-in pb-60">
  <div class="container">
    <div class="row">
      <!-- New Customer Start -->
      <div class="col-sm-6">
        <div class="well">
          <div class="new-customer">
            <h3>Новый пользователь?</h3>
            <p class="mtb-10"><strong>Регистрация</strong></p>
            <p>Создав учетную запись, вы сможете совершать покупки быстрее, быть в курсе статуса заказа и отслеживать заказы, которые вы ранее сделали.</p>
            <a class="customer-btn" href="user/signup">Зарегистрироваться</a>
          </div>
        </div>
      </div>
      <!-- New Customer End -->
      <!-- Returning Customer Start -->
      <div class="col-sm-6">
        <?php if (isset($_SESSION['error']['login'])) :?>
          <div class="alert alert-danger">
            <?php echo $_SESSION['error']['login']; unset($_SESSION['error']);?>
          </div>
        <?php endif;?>
        <div class="well">
          <div class="return-customer">
            <h3 class="mb-10">Вход</h3>
            <form action="user/login" method="post" data-toggle="validator">
              <div class="form-group has-feedback">
                <label class="control-label">Введите Ваш Логин</label>
                <input type="text" class="form-control" name="login" placeholder="Логин" style="font-size: 12px" required>
              </div>
              <div class="form-group has-feedback">
                <label class="control-label">Введите Ваш Пароль</label>
                <input type="password" name="password" placeholder="Пароль" style="font-size: 12px" class="form-control" required>
              </div>
              <p class="lost-password"><a href="user/recovery">Забыли пароль?</a></p>
              <input type="submit" value="Вход" class="return-customer-btn">
            </form>
          </div>
        </div>
      </div>
      <!-- Returning Customer End -->
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</div>
<!-- LogIn Page End -->
