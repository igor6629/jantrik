<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Создание нового пользователя</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>/user">Список пользователей</a></li>
                    <li class="breadcrumb-item">Новый пользователь</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="/user/signup" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Логин*</label>
                                <input class="form-control" name="login" id="login" type="text" value="<?= isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '' ?>" placeholder="Andrey721" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="password">Пароль*</label>
                                <input class="form-control" name="password" id="password" type="password" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="password-confirm">Повторите пароль*</label>
                                <input class="form-control" type="password" name="password-confirm" id="password-confirm" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email*</label>
                                <input class="form-control" name="email" id="email" type="email" value="<?= isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '' ?>" placeholder="andrey1987@gmail.com" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">Имя*</label>
                                <input class="form-control" name="name" id="name" type="text" value="<?= isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '' ?>" placeholder="Андрей" required>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">Адрес*</label>
                                <input class="form-control" name="address" id="address" value="<?= isset($_SESSION['form_data']['address']) ? $_SESSION['form_data']['address'] : '' ?>" placeholder="Псковская обл, рп Плюсса, ул Мелиораторов, д 18" required>
                            </div>
                            <div class="form-group">
                                <label>Роль</label>
                                <select class="form-control" name="role">
                                    <option value="user">Пользователь</option>
                                    <option value="admin">Администратор</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

