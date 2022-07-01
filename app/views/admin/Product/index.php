<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список товаров (<?=$count;?>)
                    <a href="<?=ADMIN;?>/product/add" class="btn btn-default btn-xs">Новый товар</a>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item">Товары</li>
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
                                        <th>Категория</th>
                                        <th>Наименование</th>
                                        <th>Цена</th>
                                        <th>Старая цена</th>
                                        <th>Статус</th>
                                        <th>Хит</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($products as $product):?>
                                        <tr>
                                            <td><?=$product['id'];?></td>
                                            <td><?=$product['cat'];?></td>
                                            <td><?=$product['title'];?></td>
                                            <td><?=$product['price'];?></td>
                                            <td><?=$product['old_price'];?></td>
                                            <td><?=$product['status'] ? 'В наличии' : 'Нет на складе'?></td>
                                            <td><?=$product['hit'] ? 'Да' : 'Нет'?></td>
                                            <td class="text-center"><a href="<?=ADMIN;?>/product/edit?id=<?=$product['id'];?>"><i class="fa fa-fw fa-cog pr-2"></i></i></a><a href="<?=ADMIN;?>/product/delete?id=<?=$product['id'];?>" class="delete"><i class="fas fa-trash-alt text-danger pl-2"></i></a></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>(<?=count($products);?> товара(ов) из <?=$count;?>)</p>
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
