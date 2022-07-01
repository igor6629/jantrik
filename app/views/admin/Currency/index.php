<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список валют
                    <a href="<?=ADMIN;?>/currency/add" class="btn btn-default btn-xs">Новая валюта</a>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item">Валюты</li>
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
                                        <th>Наименование</th>
                                        <th>Код</th>
                                        <th>Значение</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($currencies as $currency):?>
                                        <tr>
                                            <td><?=$currency->id?></td>
                                            <td><?=$currency->title?></td>
                                            <td><?=$currency->code?></td>
                                            <td><?=$currency->value?></td>
                                            <td class="text-center"><a href="<?=ADMIN;?>/currency/edit?id=<?=$currency->id?>"><i class="fas fa-pencil-alt pr-2"></i></a><a href="<?=ADMIN;?>/currency/delete?id=<?=$currency->id;?>" class="delete"><i class="fas fa-trash-alt text-danger pl-2"></i></a></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
