<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список отзывов (<?=$count;?>)</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item">Отзывы</li>
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
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group-sm" data-widget="sidebar-search" style="width: 150px;">
                                <input type="search" name="table_search" class="form-control-sidebar form-control float-right" aria-label="Search" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" style="background: #fff;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Имя Пользователя</th>
                                            <th>Товар</th>
                                            <th>Оценка<small> (К., Ц., Д.)</small></th>
                                            <th>Тема</th>
                                            <th>Сообщение</th>
                                            <th>Дата</th>
                                            <th>Действие</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($reviews as $review):?>
                                            <tr>
                                                <?php $product = titleProduct($review->product_id);?>
                                                <td><?=$review->id;?></td>
                                                <td><a href="<?=ADMIN;?>/user/view?id=<?=$review->user_id?>"><?=$review->name;?></a></td>
                                                <td><a href="<?=ADMIN;?>/product/edit?id=<?=$product->id?>"><?= $product->title;?></a></td>
                                                <td><?=round($review->general, 1);?> (<?= $review->quality?>, <?= $review->price?>, <?= $review->delivery?>)</td>
                                                <td><?=$review->theme;?></td>
                                                <td><?=$review->message;?></td>
                                                <td><?=$review->date;?></td>
                                                <td class="text-center"><a href="<?=ADMIN;?>/review/delete?id=<?=$review->id;?>" class="delete"><i class="fas fa-trash-alt text-danger pl-2"></i></a></td>
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
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->