<?php $curr = \jantrik\App::$app->getProperty('currency');?>
<!-- Slider Area Start -->
<div class="slider-area slider-style-three">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="slider-wrapper theme-default">
                    <!-- Slider Background  Image Start-->
                    <div id="slider" class="nivoSlider">
                        <a href="shop.html"> <img src="images/banner/banner1.jpg" data-thumb="img/slider/5.jpg" alt="" title="#slider-1-caption1"/></a>
                        <a href="shop.html"><img src="images/banner/banner2.jpg" data-thumb="img/slider/6.jpg" alt="" title="#slider-1-caption2"/></a>
                    </div>
                    <!-- Slider Background  Image Start-->
                    <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
                        <div class="text-content-wrapper">
                            <div class="text-content">
                                <div class="banner-readmore wow bounceInUp mt-30 ml-40" data-wow-duration="1s" data-wow-delay="1s">
                                    <a class="button slider-btn" style="left: -5px; top: 100px" href="category/smartphones-oneplus">Смотреть</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="slider-1-caption2" class="nivo-html-caption nivo-caption">
                        <div class="text-content-wrapper">
                            <div class="text-content slide-2">
                                <div class="banner-readmore wow bounceInUp" data-wow-duration="1s" data-wow-delay="1s">
                                    <br>
                                    <a class="button slider-btn" style="left: 45px; top: 95px;" href="product/microsoft-xbox-series-s-512gb-white">Смотреть</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Single Banner Start -->
                <div class="single-banner zoom mb-20">
                    <a href="<?=PATH?>/category/tablet"><img src="images/banner/banner3.jpg" alt="slider-banner"></a>
                </div>
                <!-- Single Banner End -->
                <!-- Single Banner Start -->
                <div class="single-banner zoom" style="top: -3px">
                    <a href="category/smart-chasy"><img src="images/banner/banner4.jpg" alt="slider-banner"></a>
                </div>
                <!-- Single Banner End -->
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End -->
<!-- Product Area Start -->
<div class="product-area pt-30">
    <div class="container">
        <div class="row">
            <!-- Single Product Start -->
            <?php if ($hits_top):?>
                <?php foreach ($hits_top as $hit_top): ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-product" style="height: 400px">
                            <?php discount($hit_top);?>
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="/product/<?=$hit_top->alias?>">
                                    <img class="primary-img" src="images/product/<?=$hit_top->img?>" alt="single-product">
                                </a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <div class="rating_star" style="left: 30%; position: relative; line-height: 0.75;">
                                    <?php rating($hit_top);?>
                                </div>
                            </div>
                            <h4 style="margin-top: 10px"><a href="/product/<?=$hit_top->alias?>"><?=$hit_top->title?></a></h4>
                            <div class="price_new"><?php price($hit_top, $curr);?></div>
                            <div class="pro-actions">
                                <div class="actions-secondary">
                                    <a href="wishlist/add?id=<?=$hit_top->id;?>" data-toggle="tooltip" title="Добавить в список желаний"><i class="fa fa-heart"></i></a>
                                    <a class="add-cart" id="productAdd" data-id="<?=$hit_top->id;?>" href="cart/add?id=<?=$hit_top->id?>" data-toggle="tooltip" title="В корзину">В корзину</a>
                                    <a href="compare/add?id=<?=$hit_top->id;?>" data-toggle="tooltip" title="Добавить в список сравнений"><i class="fa fa-signal"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                </div>
            <?php endforeach;?>
        <?php endif; ?>
        <!-- Single Product End -->
    </div>
</div>
</div>
<!-- Product Area End -->
<!-- Banner Start -->
<?php if ($brands):?>
    <div class="upper-banner banner pb-60">
        <div class="container">
            <div class="row">
                <?php foreach ($brands as $brand): ?>
                    <!-- Single Banner Start -->
                    <div class="col-sm-4">
                        <div class="single-banner zoom">
                            <a href="/search?s=<?=$brand->title?>"><img src="images/brand/<?=$brand->img?>" alt="slider-banner"></a>
                        </div>
                    </div>
                    <!-- Single Banner End -->
                <?php endforeach; ?>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
<?php endif; ?>
<!-- Banner End -->
<!-- New Products Start -->
<div class="new-products pb-60">
    <div class="container">
        <div class="row">
            <?php if ($hits): ?>
                <div class="col-xl-3 col-lg-4 order-2">
                    <div class="side-product-list">
                        <div class="group-title">
                            <h2>Популярное</h2>
                        </div>
                        <!-- Deal Pro Activation Start -->
                        <div class="slider-right-content side-product-list-active owl-carousel">
                            <!-- Double Product Start -->
                            <div class="double-pro">
                                <?php foreach ($hits as $hit): ?>
                                    <!-- Single Product Start -->
                                    <div class="single-product">
                                        <?php discount($hit);?>
                                        <div class="pro-img">
                                            <a href="product/<?=$hit->alias?>"><img class="img" src="images/product/<?=$hit->img?>" alt="product-image"></a>
                                        </div>
                                        <div class="pro-content" style="line-height: 0.75">
                                            <?php rating($hit); ?>
                                        </div>
                                        <h4 style="margin-top: 10px"><a href="product/<?=$hit->alias?>"><?=$hit->title?></a></h4>
                                        <p><a class="add-to-cart-link" id="productAdd" data-id="<?=$hit->id;?>" href="cart/add?id=<?=$hit->id?>">В корзину</a>
                                         <?php price($hit, $curr);?>
                                     </div>
                                 </div>
                             <?php endforeach;?>
                         </div>
                         <!-- Double Product End -->
                     </div>
                     <!-- Deal Pro Activation End -->
                 </div>
             </div>
         <?php endif;?>
         <div class="col-xl-9 col-lg-8  order-lg-2">
            <!-- New Pro Content End -->
            <div class="new-pro-content">
                <div class="pro-tab-title border-line">
                    <!-- Featured Product List Item Start -->
                    <ul class="nav product-list product-tab-list">
                        <li><a  class="active" data-toggle="tab" href="#new-arrival">Новые поступления</a></li>
                        <li><a data-toggle="tab" href="#toprated">Рекомендуемое</a></li>
                        <li><a data-toggle="tab" href="#toprating">Рейтинг</a></li>
                    </ul>
                    <!-- Featured Product List Item End -->
                </div>
                <div class="tab-content product-tab-content jump">
                    <div id="new-arrival" class="tab-pane active">
                        <!-- New Products Activation Start -->
                        <?php if ($new_products): ?>
                            <div class="new-pro-active owl-carousel">
                                <!-- Single Product Start -->
                                <?php foreach ($new_products as $new_product): ?>
                                    <div class="single-product main_product">
                                        <?php discount($new_product);?>
                                        <!-- Product Image Start -->
                                        <div class="pro-img">
                                            <a href="product/<?=$new_product->alias?>">
                                                <img class="primary-img" src="images/product/<?=$new_product->img?>" alt="single-product" height="190px">
                                            </a>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="pro-content">
                                            <div class="rating_star" style="left: 30%; position: relative">
                                                <?php rating($new_product);?>
                                            </div>
                                        </div>
                                        <h4 style="margin-top: -20px"><a href="/product/<?=$new_product->alias?>" class="product_main_new"><?=$new_product->title?></a></h4>
                                        <div class="price_new"> <?php price($new_product, $curr);?> </div>
                                        <div class="pro-actions">
                                            <div class="actions-secondary">
                                                <a href="wishlist/add?id=<?=$new_product->id;?>" data-toggle="tooltip" title="Добавить в список желаний"><i class="fa fa-heart"></i></a>
                                                <a class="add-cart" id="productAdd" data-id="<?=$new_product->id;?>" href="cart/add?id=<?=$new_product->id?>" data-toggle="tooltip" title="В корзину">В корзину</a>
                                                <a href="compare/add?id=<?=$new_product->id;?>" data-toggle="tooltip" title="Добавить в список сравнений"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                            <?php endforeach; ?>
                            <!-- Single Product End -->
                        </div>
                    <?php endif; ?>
                    <!-- New Products Activation End -->
                    <!-- New Products End -->
                </div>
                <div id="toprated" class="tab-pane">
                    <!-- New Products Activation Start -->
                    <?php if ($advices): ?>
                        <div class="new-pro-active owl-carousel">
                            <!-- Single Product Start -->
                            <?php foreach ($advices as $advice): ?>
                                <div class="single-product main_product">
                                    <?php discount($advice);?>
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product/<?=$advice->alias?>">
                                            <img class="primary-img" src="images/product/<?=$advice->img?>" alt="single-product" height="190px">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="rating_star" style="left: 30%; position: relative">
                                            <?php rating($advice);?>
                                        </div>
                                    </div>
                                    <h4 style="margin-top: -20px"><a href="/product/<?=$advice->alias?>" class="product_main_new"><?=$advice->title?></a></h4>
                                    <div class="price_new"> <?php price($advice, $curr);?> </div>
                                    <div class="pro-actions">
                                        <div class="actions-secondary">
                                            <a href="wishlist/add?id=<?=$advice->id;?>" data-toggle="tooltip" title="Добавить в список желаний"><i class="fa fa-heart"></i></a>
                                            <a class="add-cart" id="productAdd" data-id="<?=$advice->id;?>" href="cart/add?id=<?=$advice->id?>" data-toggle="tooltip" title="В корзину">В корзину</a>
                                            <a href="compare/add?id=<?=$advice->id;?>" data-toggle="tooltip" title="Добавить в список сравнений"><i class="fa fa-signal"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                            </div>
                        <?php endforeach; ?>
                        <!-- Single Product End -->
                    </div>
                <?php endif; ?>
                <!-- New Products Activation End -->
            </div>
            <!-- New Products End -->
            <div id="toprating" class="tab-pane">
                <!-- New Products Activation Start -->
                <?php if ($top_ratings): ?>
                    <div class="new-pro-active owl-carousel">
                        <!-- Single Product Start -->
                        <?php foreach ($top_ratings as $top_rating): ?>
                            <div class="single-product main_product">
                                <?php discount($top_rating);?>
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="product/<?=$top_rating->alias?>">
                                        <img class="primary-img" src="images/product/<?=$top_rating->img?>" alt="single-product" height="190px">
                                    </a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="rating_star" style="left: 30%; position: relative">
                                        <?php rating($top_rating);?>
                                    </div>
                                </div>
                                <h4 style="margin-top: -20px"><a href="/product/<?=$top_rating->alias?>" class="product_main_new"><?=$top_rating->title?></a></h4>
                                <div class="price_new"> <?php price($top_rating, $curr);?> </div>
                                <div class="pro-actions">
                                    <div class="actions-secondary">
                                        <a href="wishlist/add?id=<?=$top_rating->id;?>" data-toggle="tooltip" title="Добавить в список желаний"><i class="fa fa-heart"></i></a>
                                        <a class="add-cart" id="productAdd" data-id="<?=$top_rating->id;?>" href="cart/add?id=<?=$top_rating->id?>" data-toggle="tooltip" title="В корзину">В корзину</a>
                                        <a href="compare/add?id=<?=$top_rating->id;?>" data-toggle="tooltip" title="Добавить в список сравнений"><i class="fa fa-signal"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                    <?php endforeach; ?>
                    <!-- Single Product End -->
                </div>
            <?php endif; ?>
            <!-- New Products Activation End -->
        </div>
    </div>
    <!-- Tab-Content End -->
    <div class="single-banner zoom mt-30 mt-sm-10 my-banner">
        <a href="shop"><img src="images/banner/banner5.jpg" alt="slider-banner"></a>
    </div>
</div>
<!-- New Pro Content End -->
</div>
</div>

</div>
<!-- Container End -->
</div>
<!-- New Products End -->

<!-- Company Policy Start -->
<div class="company-policy pb-60">
    <div class="container">
        <div class="row">
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="images/icon/1.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Бесплатная доставка</h3>
                        <p>Бесплатная доставка для Вас</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="images/icon/2.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Онлайн Поддержка 24/7</h3>
                        <p>Поддержка онлайн 24 часа</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="images/icon/3.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Возрат средств</h3>
                        <p>Гарантия возврата до 7 дней</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
            <!-- Single Policy Start -->
            <div class="col-lg-3 col-sm-6">
                <div class="single-policy">
                    <div class="icone-img">
                        <img src="images/icon/4.png" alt="">
                    </div>
                    <div class="policy-desc">
                        <h3>Скидки для клиентов</h3>
                        <p>На каждый заказ, дороже 1.500р</p>
                    </div>
                </div>
            </div>
            <!-- Single Policy End -->
        </div>
    </div>
</div>
<!-- Company Policy End -->

<!-- Best Products Start -->
<div class="best-seller-product pb-40">
    <div class="container">
        <div class="group-title">
            <h2>Акция</h2>
        </div>
        <?php if ($discounts) : ?>
            <!-- Best Product Activation Start -->
            <div class="best-seller-pro-active  owl-carousel slider-right-content">
                <?php foreach ($discounts as $discount) : ?>
                    <?php if ($discount->old_price) : ?>
                        <!-- Double Product Start -->
                        <div class="double-pro">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <?php discount($discount);?>
                                <div class="pro-img">
                                    <a href="/product/<?=$discount->alias?>"><img class="img" src="images/product/<?=$discount->img?>" alt="product-image"></a>
                                </div>
                                <div class="pro-content" style="line-height: 0.75;">
                                    <?php rating($discount);?>
                                </div>
                                <h4 style="margin-top: 10px"><a href="/product/<?=$discount->alias?>"><?=$discount->title?></a></h4>
                                <div class="price_new"> <?php price($discount, $curr);?> </div>
                            </div>
                        </div>
                        <!-- Single Product End -->
                    </div>
                    <!-- Double Product End -->
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <!-- Best Product Activation End -->
    <?php endif; ?>
</div>
<!-- Container End -->
</div>
<!-- Best Product End -->
