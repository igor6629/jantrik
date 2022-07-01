<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список пользователей (<?=$count;?>)
                    <a href="<?=ADMIN;?>/user/add" class="btn btn-default btn-xs">Новый пользователь</a>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item">Пользователи</li>
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
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" style="background: #fff;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Логин</th>
                                        <th>Email</th>
                                        <th>Имя</th>
                                        <th>Адрес</th>
                                        <th>Роль</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user):?>
                                        <tr>
                                            <td><?=$user->id;?></td>
                                            <td><?=$user->login;?></td>
                                            <td><?=$user->email;?></td>
                                            <td><?=$user->name;?></td>
                                            <td><?=$user->address;?></td>
                                            <td><?=$user->role;?></td>
                                            <td class="text-center"><a href="<?=ADMIN;?>/user/view?id=<?=$user->id;?>"><i class="fa fa-fw fa-eye pr-2"></i></a><a href="<?=ADMIN;?>/user/edit?id=<?=$user->id;?>" style="color: #333333"><i class="fas fa-pencil-alt pl-2"></i></a></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <?php if ($pagination->countPages > 1):?>
                                <?= $pagination;?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
