<!-- Sidebar Shopping Option Start -->
<div class="col-lg-3  order-2">
    <div class="sidebar white-bg">
        <div class="single-sidebar">
            <div class="group-title">
                <h2>Категории</h2>
            </div>
            <ul>
                <li>Телефоны (9)</a></li>
                <li>Планшеты (11)</a></li>
                <li>Ноутбуки (8)</li>
                <li>Наушники (10)</li>
                <li>Смарт-часы (5)</li>
            </ul>
        </div>
        <div class="single-sidebar">
            <div class="group-title">
                <h2>Цена</h2>
            </div>
            <form action="#">
                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    <div class="ui-slider-range ui-corner-all ui-widget-header" ></div>
                </div>
                <input id="amount" class="amount" readonly="" type="text">
            </form>
        </div>
        <div class="single-sidebar">
            <div class="group-title">
                <h2>Производитель</h2>
            </div>
            <ul class="manufactures-list">
                <li>Samsung (14)</li>
                <li>Xiaomi (13)</li>
                <li>Aplle (13)</li>
                <li>Lenovo (14)</li>
                <li>Honor (13)</li>
            </ul>
        </div>
        <?php if(!empty($_SESSION['compare'])):?>
            <div class="single-sidebar">
                <div class="group-title">
                    <h2>Товары в сравнении</h2>
                </div>
                <div class="best-seller-pro-two compare-pro best-seller-pro-two owl-carousel">
                    <?php foreach ($_SESSION['compare'] as $compare):?>
                        <!-- Best Seller Multi Product Start -->
                        <div class="best-seller-multi-product">
                            <!-- Single Product Start -->
                            <div class="single-product main_product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product/<?=$compare['alias'];?>">
                                        <img class="primary-img" src="images/product/<?=$compare['img'];?>" alt="single-product">
                                    </a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <h4 style="margin-top: 10px"><a href="product/<?=$compare['alias'];?>"><?=$compare['title'];?></a></h4>
                                    <div class="rating_star" style="left: 29%; position: absolute; bottom: 45px">
                                        <?php ratingForArray($compare);?>
                                    </div>
                                </div>
                                <div class="price_new"> <?php priceForArray($compare, $curr);?> </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                        <!-- Single Product End -->
                    </div>
                    <!-- Best Seller Multi Product End -->
                <?php endforeach;?>
            </div>
        </div>
    <?php endif;?>
    <?php if(!empty($_SESSION['wishlist'])):?>
        <div class="single-sidebar">
            <div class="group-title">
                <h2>Мой список желаний</h2>
            </div>
            <div class="best-seller-pro-two compare-pro best-seller-pro-two owl-carousel">
                <?php foreach ($_SESSION['wishlist'] as $wishlist):?>
                    <!-- Best Seller Multi Product Start -->
                    <div class="best-seller-multi-product">
                        <!-- Single Product Start -->
                        <div class="single-product main_product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="product/<?=$wishlist['alias'];?>">
                                    <img class="primary-img" src="images/product/<?=$wishlist['img'];?>" alt="single-product">
                                </a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <h4 style="margin-top: 10px"><a href="product/<?=$wishlist['alias'];?>"><?=$wishlist['title'];?></a></h4>
                                <div class="rating_star" style="left: 29%; position: absolute; bottom: -5px">
                                    <?php ratingForArray($wishlist);?>
                                </div>
                            </div>
                            <div class="price_new"><?php priceForArray($wishlist, $curr);?></div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    <!-- Single Product End -->
                </div>
                <!-- Best Seller Multi Product End -->
            <?php endforeach;?>
        </div>
    </div>
<?php endif;?>
<!-- Single Banner Start -->
<div class="single-sidebar single-banner zoom pt-20">
    <a href="product/apple-watch-series-5-40mm-space-gray" class="hidden-sm"><img src="images/banner/banner6.jpg" alt="slider-banner"></a>
</div>
<!-- Single Banner End -->
</div>
</div>
<!-- Sidebar Shopping Option End -->
