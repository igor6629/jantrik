<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Пользователь <?=$user->login;?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>/user">Список пользователей</a></li>
                    <li class="breadcrumb-item"><?=$user->login;?></li>
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
            <div class="col-md-4">
                <div class="box">
                    <h3 class="text-center">Имя</h3>
                    <p class="text-center text-lightblue"><?= $user->name;?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3 class="text-center">Логин</h3>
                    <p class="text-center text-lightblue"><?= $user->login;?></p>
                </div>
            </div><div class="col-md-4">
                <div class="box">
                    <h3 class="text-center">Email</h3>
                    <p class="text-center text-lightblue"><?= $user->email;?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3 class="text-center">Адрес</h3>
                    <p class="text-center text-lightblue"><?= $user->address;?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <h3 class="text-center">Роль</h3>
                    <p class="text-center text-lightblue"><?= $user->role;?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box">
                    <p class="text-center text-lightblue">
                        <a href="<?=ADMIN;?>/user/edit?id=<?=$user->id;?>" class="btn btn-app">
                            <i class="fas fa-edit text-center"></i>Редактировать</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <br>
                    <h3>Заказы пользователя</h3>
                    <div class="box">
                        <div class="box-body">
                            <?php if ($orders):?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" style="background: #fff;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Статус</th>
                                                <th>Сумма</th>
                                                <th>Дата создания</th>
                                                <th>Дата изменения</th>
                                                <th>Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($orders as $order):?>
                                                <?php $class = $order['status'] ? 'success' : ''?>
                                                <tr class="<?=$class;?>">
                                                    <td><?=$order['id'];?></td>
                                                    <td><?=$order['status'] ? 'Завершен' : 'Новый';?></td>
                                                    <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                                    <td><?=$order['date'];?></td>
                                                    <td><?=$order['update_up'];?></td>
                                                    <td class="text-center"><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="fa fa-fw fa-eye"></i></a></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else:?>
                                <p class="text-danger">Пользователь не совершал покупки</p>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

