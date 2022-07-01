<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=PATH;?>">Главная</a></li>
                <li class="active">Список сравнений</li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Compare Page Start -->
<?php $curr = \jantrik\App::$app->getProperty('currency');?>
<div class="compare-product pb-40">
    <div class="container">
        <?php if(!empty($_SESSION['compare'])) : ?>
            <div class="table-responsive">
                <table class="table text-center compare-content">
                    <tbody>
                        <tr>
                            <td class="product-title">Товар</td>
                            <?php foreach ($_SESSION['compare'] as $id => $item):?>
                                <td class="product-description">
                                    <div class="compare-details">
                                        <div class="compare-detail-img">
                                            <a href="product/<?=$item['alias'];?>"><img src="images/product/<?=$item['img'];?>" alt="compare-product" class="compare_img" style="width: 200px"></a>
                                        </div>
                                        <div class="compare-detail-content">
                                            <br><h4 class="text-center"><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></h4>
                                        </div>
                                    </div>
                                </td>
                            <?php endforeach;?>
                        </tr>
                        <tr>
                            <td class="product-title">Описание</td>
                            <?php foreach ($_SESSION['compare'] as $id => $item):?>
                                <td class="product-description">
                                    <p><?=$item['description'];?></p>
                                </td>
                            <?php endforeach;?>
                        </tr>
                        <tr>
                            <td class="product-title">Цена</td>
                            <?php foreach ($_SESSION['compare'] as $id => $item):?>
                                <td class="product-description"><?=$curr['symbol_left']?><?=$item['price'] * $curr['value']?><?=$curr['symbol_right']?></td>
                            <?php endforeach;?>
                        </tr>
                        <tr>
                            <td class="product-title">В наличии</td>
                            <?php foreach ($_SESSION['compare'] as $id => $item):?>
                                <td class="product-description"><?php if($item['status'] == 1) echo "В наличии"; else echo 'Нет на складе';?></td>
                            <?php endforeach;?>
                        </tr>
                        <tr>
                            <td class="product-title">Добавить в корзину</td>
                            <?php foreach ($_SESSION['compare'] as $id => $item):?>
                                <td class="product-description">
                                    <a class="compare-cart text-uppercase" href="cart/add?id=<?=$id;?>">В корзину</a>
                                </td>
                            <?php endforeach;?>
                        </tr>
                        <tr>
                            <td class="product-title">Рейтинг</td>
                            <?php foreach ($_SESSION['compare'] as $id => $item):?>
                                <td class="product-description">
                                    <div class="rating_compare">
                                        <?php ratingForArray($item);?>
                                    </div>
                                </td>
                            <?php endforeach;?>
                        </tr>
                        <tr>
                            <td class="product-title">Удалить</td>
                            <?php foreach ($_SESSION['compare'] as $id => $item):?>
                                <td class="product-description"><a href="compare/delete?id=<?=$id;?>"><i class="fa fa-trash-o"></i></a></td>
                            <?php endforeach;?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php else:?>
                <h5>Вы ещё не добавили товар в список сравнений</h5> <br>
            <?php endif;?>
        </div>
    </div>
<!-- Compare Page End -->