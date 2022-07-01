<div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-25">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="<?=PATH;?>">Главная</a></li>
                <li class="active">Список желаний</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Wish List Start -->
<?php $curr = \jantrik\App::$app->getProperty('currency');?>
<div class="cart-main-area wish-list pb-60">
    <div class="container">
        <!-- Section Title Start -->
        <h2 class="text-capitalize sub-heading">Список желаний</h2>
        <!-- Section Title Start End -->
        <div class="row">
            <div class="col-md-12">
                <!-- Form Start -->
                <form action="#">
                    <!-- Table Content Start -->
                    <?php if(!empty($_SESSION['wishlist'])) : ?>
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-remove">Удалить</th>
                                        <th class="product-thumbnail">Фото</th>
                                        <th class="product-name">Название</th>
                                        <th class="product-price">Цена</th>
                                        <th class="product-quantity">В наличии</th>
                                        <th class="product-subtotal">Добавить в корзину</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_SESSION['wishlist'] as $id => $item) :?>
                                        <tr>
                                            <td class="product-remove"> <a href="wishlist/delete?id=<?=$id;?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                            <td class="product-thumbnail">
                                                <a href="product/<?=$item['alias'];?>"><img src="images/product/<?=$item['img'];?>" alt="cart-image" /></a>
                                            </td>
                                            <td class="product-name"><a href="product/<?=$item['alias'];?>"><?=$item['title'];?></a></td>
                                            <td class="product-price"><span class="amount"><?=$curr['symbol_left']?><?=$item['price'] * $curr['value']?><?=$curr['symbol_right']?></span></td>
                                            <td class="product-stock-status"><span><?php if($item['status'] == 1) echo "В наличии"; else echo 'Нет на складе';?></span></td>
                                            <td class="product-add-to-cart"><a href="cart/add?id=<?=$id?>">добавить в корзину</a></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <?php else:?>
                            <h5>Вы ещё не добавили товар в список желаний</h5> <br>
                        <?php endif;?>
                        <!-- Table Content Start -->
                    </form>
                    <!-- Form End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </div>
<!-- Wish List End -->