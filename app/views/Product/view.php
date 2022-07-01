<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
  <div class="container">
    <div class="breadcrumb">
      <ul>
        <?=$breadcrumbs;?>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail pb-60">
  <div class="container">
    <div class="row">
      <!-- Main Thumbnail Image Start -->
      <?php if ($gallery) :?>
        <?php $first = array_shift($gallery); ?>
        <div class="col-lg-5">
          <!-- Thumbnail Large Image start -->
          <div class="tab-content">
            <div id="thumb1" class="tab-pane-active">
              <a data-fancybox="images" href="images/product/<?=$first->img?>"><img src="images/product/<?=$first->img?>" alt="product-view"></a>
            </div>
            <?php foreach ($gallery as $item) :?>
              <div id="thumb1" class="tab-pane">
                <a data-fancybox="images" href="images/product/<?=$item->img?>"><img src="images/product/<?=$item->img?>" alt="product-view"></a>
              </div>
            <?php endforeach;?>
          </div>
          <!-- Thumbnail Large Image End -->

          <!-- Thumbnail Image End -->
          <div class="product-thumbnail">
            <div class="thumb-menu nav">
              <?php foreach ($gallery as $item) :?>
                <a class="active" data-toggle="tab" href="images/product/<?=$item->img?>"> <img src="images/product/<?=$item->img?>" alt="product-thumbnail" style="margin-top: auto; margin-bottom: auto;"></a>
              <?php endforeach;?>
            </div>
          </div>
          <!-- Thumbnail image end -->
        </div>
      <?php endif;?>
      <!-- Main Thumbnail Image End -->
      <!-- Thumbnail Description Start -->
      <?php
      $curr = \jantrik\App::$app->getProperty('currency');
      $cats = \jantrik\App::$app->getProperty('cats');
      ?>
      <div class="col-lg-7">
        <div class="thubnail-desc fix">
          <h3 class="product-header"><?=$product->title;?></h3>
          <br><h5 style="font-size: 13px">Категория: <a href="category/<?=$cats[$product->category_id]['alias']?>"><?=$cats[$product->category_id]['title']?></a></h5>
          <div class="rating-summary fix mtb-10">
            <?php rating($product);?>
            <div class="rating_inf">
              <span>Средняя оценка: <b><?= $product->rating != NULL ? round($product->rating, 1) : 0;?> </b></span>
              <a href="product/<?=$product->alias?>/#review_lst" class="rvw pl-10">(Всего отзывов: <?= count($reviews)!= 0 ? count($reviews) : 0;?>) </a>
              <a href="product/<?=$product->alias?>/#review_add" class="add_rvw pl-10" style="font-size: 14px;">Добавить Ваш отзыв</a>
            </div>
          </div>
        </div>
        <div class="pro-price mt-20 price_product">
          <?php price($product, $curr);?>
        </div>
        <div class="box-quantity">
          <form action="#">
            <input class="number" id="numeric" type="number" min="1" value="1" name="quantity">
            <?php if ($mods): ?>
              <div class="mods">
                <ul><li style="margin-top: 13px">Память: <br><select style="margin-top:15px; width: 150px; border: 1px solid #ebebeb; background: none;">
                  <option>Выбрать память</option>
                  <?php foreach ($mods as $mod):?>
                    <option data-title="<?=$mod->title?>" data-price="<?=$mod->price * $curr['value']?>" value="<?=$mod->id?>"><?=$mod->title?></option>
                  <?php endforeach; ?>
                </select>
              </li></ul>
            </div>
          <?php endif ?>
          <a class="add-cart" href="cart/add?id=<?=$product->id;?>" id="productAdd" data-id="<?=$product->id;?>" style="margin-top: 20px;">В корзину</a>
        </form>
      </div>
      <div class="product-link">
        <ul class="list-inline">
          <li><a href="wishlist/add?id=<?=$product->id;?>">Добавить в список желаний</a></li>
          <li><a href="compare/add?id=<?=$product->id;?>">Добавить в список сравнений</a></li>
        </ul>
      </div>
      <p class="ptb-20"><?=$product->description;?></p>
    </div>
  </div>
  <!-- Thumbnail Description End -->
</div>
<!-- Row End -->
</div>
<!-- Container End -->
</div>
<!-- Product Thumbnail End -->
<!-- Product Thumbnail Description Start -->
<div class="thumnail-desc pb-60">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="main-thumb-desc nav">
          <li><a  class="detail active" data-toggle="tab" href="#dtail">Характеристики</a></li>
          <li><a  class="review" data-toggle="tab"  href="#review">Отзывы</a></li>
        </ul>
        <!-- Product Thumbnail Tab Content Start -->
        <div class="tab-content thumb-content border-default">
          <div id="dtail" class="tab-pane dt in active">
            <?=$product->content;?>
          </div>
          <div id="review" class="tab-pane dr">
            <!-- Reviews Start -->
            <div class="review">
              <div class="group-title">
                <h2 id="review_lst">Отзывы пользователей</h2>
              </div>
              <?php if ($reviews):?>
                <?php foreach ($reviews as $review):?>
                  <div class="reviews_user mb-20 pl-20 pt-10">
                    <h4 class="review-mini-title rew"><?=h($review['name']);?> </h4>
                    <ul class="review-list mb-4">
                      <!-- Single Review List Start -->
                      <li>
                        <span class="mr-2">Качество</span>
                        <?php for ($i = 0; $i < 5; $i++):?>
                          <?php if ($i < $review['quality']): ?>
                            <i class="fa fa-star" style="font-size: 20px"></i>
                            <?php else:?>
                              <i class="fa fa-star-o" style="font-size: 20px"></i>
                            <?php endif;?>
                          <?php endfor; ?>
                        </li>
                        <!-- Single Review List End -->
                        <!-- Single Review List Start -->
                        <li>
                          <span class="mr-2">Цена</span>
                          <?php for ($i = 0; $i < 5; $i++):?>
                            <?php if ($i < $review['price']): ?>
                              <i class="fa fa-star" style="font-size: 20px"></i>
                              <?php else:?>
                                <i class="fa fa-star-o" style="font-size: 20px"></i>
                              <?php endif;?>
                            <?php endfor; ?>
                          </li>
                          <!-- Single Review List End -->
                          <!-- Single Review List Start -->
                          <li>
                            <span class="mr-2">Доставка</span>
                            <?php for ($i = 0; $i < 5; $i++):?>
                              <?php if ($i < $review['delivery']): ?>
                                <i class="fa fa-star" style="font-size: 20px"></i>
                                <?php else:?>
                                  <i class="fa fa-star-o" style="font-size: 20px"></i>
                                <?php endif;?>
                              <?php endfor; ?>
                            </li>
                            <!-- Single Review List End -->
                          </ul>
                          <div class="mes pb-20 pr-10">
                            <h5>Тема: </h5> <span class="pb-20 pl-10"><?=h($review['theme']);?> </span>
                            <h5>Сообщение: </h5> <span class="pb-20 pl-10"> <?= h($review['message']);?> </span>
                            <br> <h5 class="text-right">  Дата: <?= $review['date'];?> </h5>
                          </div>
                        </div>
                      <?php endforeach;?>
                      <?php else:?>
                        <h4>К сожалению, отзывов к этому товару ещё не оставили</h4>
                        <br> <h5>Будьте первым! </h5>
                      <?php endif;?>
                    </div>
                    <!-- Reviews End -->
                    <!-- Reviews Start -->
                    <div class="review border-default universal-padding mt-30">
                      <h2 class="review-title mb-30" id="review_add">Оставьте Свой Отзыв<br></h2>
                      <p class="review-mini-title mb-2">Поделитесь Своим мнением насчёт этого товара</p>
                      <form autocomplete="on" action="review/add" method="post" class="rvl mt-20">
                        <ul class="review-list">
                          <!-- Single Review List Start -->
                          <li>
                            <span>Качество <span class="text-danger">*</span></span>
                            <div class="simple-rating_quality ml-10">
                              <div class="simple-rating__items_quality">
                                <input id="simple-rating__5_quality" type="radio" class="simple-rating__item_quality" name="simple-rating_quality" value="5">
                                <label for="simple-rating__5_quality" class="simple-rating__label_quality"></label>
                                <input id="simple-rating__4_quality" type="radio" class="simple-rating__item_quality" name="simple-rating_quality" value="4">
                                <label for="simple-rating__4_quality" class="simple-rating__label_quality"></label>
                                <input id="simple-rating__3_quality" type="radio" class="simple-rating__item_quality" name="simple-rating_quality" value="3">
                                <label for="simple-rating__3_quality" class="simple-rating__label_quality"></label>
                                <input id="simple-rating__2_quality" type="radio" class="simple-rating__item_quality" name="simple-rating_quality" value="2">
                                <label for="simple-rating__2_quality" class="simple-rating__label_quality"></label>
                                <input id="simple-rating__1_quality" type="radio" class="simple-rating__item_quality" name="simple-rating_quality" value="1" required>
                                <label for="simple-rating__1_quality" class="simple-rating__label_quality"></label>
                              </div>
                            </div>
                          </li>
                          <!-- Single Review List End -->
                          <!-- Single Review List Start -->
                          <li>
                            <span>Цена <span class="text-danger">*</span></span>
                            <div class="simple-rating_price ml-10">
                              <div class="simple-rating__items_price">
                                <input id="simple-rating__5_price" type="radio" class="simple-rating__item_price" name="simple-rating_price" value="5">
                                <label for="simple-rating__5_price" class="simple-rating__label_price"></label>
                                <input id="simple-rating__4_price" type="radio" class="simple-rating__item_price" name="simple-rating_price" value="4">
                                <label for="simple-rating__4_price" class="simple-rating__label_price"></label>
                                <input id="simple-rating__3_price" type="radio" class="simple-rating__item_price" name="simple-rating_price" value="3">
                                <label for="simple-rating__3_price" class="simple-rating__label_price"></label>
                                <input id="simple-rating__2_price" type="radio" class="simple-rating__item_price" name="simple-rating_price" value="2">
                                <label for="simple-rating__2_price" class="simple-rating__label_price"></label>
                                <input id="simple-rating__1_price" type="radio" class="simple-rating__item_price" name="simple-rating_price" value="1" required>
                                <label for="simple-rating__1_price" class="simple-rating__label_price"></label>
                              </div>
                            </div>
                          </li>
                          <!-- Single Review List End -->
                          <!-- Single Review List Start -->
                          <li>
                            <span>Доставка <span class="text-danger">*</span></span>
                            <div class="simple-rating_delivery ml-10">
                              <div class="simple-rating__items_delivery">
                                <input id="simple-rating__5_delivery" type="radio" class="simple-rating__item_delivery" name="simple-rating_delivery" value="5">
                                <label for="simple-rating__5_delivery" class="simple-rating__label_delivery"></label>
                                <input id="simple-rating__4_delivery" type="radio" class="simple-rating__item_delivery" name="simple-rating_delivery" value="4">
                                <label for="simple-rating__4_delivery" class="simple-rating__label_delivery"></label>
                                <input id="simple-rating__3_delivery" type="radio" class="simple-rating__item_delivery" name="simple-rating_delivery" value="3">
                                <label for="simple-rating__3_delivery" class="simple-rating__label_delivery"></label>
                                <input id="simple-rating__2_delivery" type="radio" class="simple-rating__item_delivery" name="simple-rating_delivery" value="2">
                                <label for="simple-rating__2_delivery" class="simple-rating__label_delivery"></label>
                                <input id="simple-rating__1_delivery" type="radio" class="simple-rating__item_delivery" name="simple-rating_delivery" value="1" required>
                                <label for="simple-rating__1_delivery" class="simple-rating__label_delivery"></label>
                              </div>
                            </div>
                          </li>
                          <!-- Single Review List End -->
                        </ul>
                        <!-- Reviews Field Start -->
                        <div class="riview-field mt-40">
                          <div class="form-group">
                            <label>Ваше имя <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($_SESSION['user']['name'])) echo h($_SESSION['user']['name']);?>" required="required">
                          </div>
                          <div class="form-group">
                            <label class="req" for="subject">Самое главное <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="theme" name="theme" required="required">
                          </div>
                          <div class="form-group">
                            <label class="req" for="comments">Ваш отзыв <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="5" id="message" name="message" required="required"></textarea>
                          </div>
                          <?php if (!isset($_SESSION['user'])):?>
                            <a class="btn-submit" href="user/login">Отправить отзыв</a>
                            <?php else:?>
                              <input type="hidden" name="product_id" value="<?=$product->id;?>">
                              <button type="submit" class="btn-submit">Отправить отзыв</button>
                            <?php endif;?>
                          </form>
                        </div>
                        <!-- Reviews Field Start -->
                      </div>
                      <!-- Reviews End -->
                    </div>
                  </div>
                  <!-- Product Thumbnail Tab Content End -->
                </div>
              </div>
              <!-- Row End -->
            </div>
            <!-- Container End -->
          </div>
          <!-- Product Thumbnail Description End -->
          <!-- Realted Product Start -->
          <?php if ($related):?>
            <div class="related-product pb-30">
              <div class="container">
                <div class="related-box">
                  <div class="group-title">
                    <h2>похожие товары</h2>
                  </div>
                  <!-- Realted Product Activation Start -->
                  <div class="new-upsell-pro owl-carousel">
                    <?php foreach ($related as $item):?>
                      <!-- Single Product Start -->
                      <div class="single-product main_product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                          <a href="product/<?=$item['alias']?>">
                            <img class="primary-img" src="images/product/<?=$item['img']?>" alt="single-product" height="160px" style="width: 130px">
                          </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                          <div class="rating_star" style="left: 30%; position: relative">
                            <?php ratingForArray($item);?>
                          </div>
                        </div>
                        <h4 style="margin-top: -20px"><a href="product/<?=$item['alias']?>" class="product_main_new"><?=$item['title']?></a></h4>
                        <div class="price_new"><?php priceForArray($item, $curr);?></div>
                        <div class="pro-actions">
                          <div class="actions-secondary">
                            <a href="wishlist/add?id=<?=$item['id'];?>" data-toggle="tooltip" title="Добавить в список желаний"><i class="fa fa-heart"></i></a>
                            <a class="add-cart" href="cart/add?id<?=$item['id']?>" data-toggle="tooltip" title="В корзину" id="productAdd" data-id="<?=$item['id'];?>">В корзину</a>
                            <a href="compare/add?id=<?=$item['id'];?>" data-toggle="tooltip" title="Добавить в список сравнений"><i class="fa fa-signal"></i></a>
                          </div>
                        </div>
                      </div>
                      <!-- Product Content End -->
                      <?php discountForArray($item); ?>
                    </div>
                    <!-- Single Product End -->
                  <?php endforeach;?>
                </div>
                <!-- Realted Product Activation End -->
              </div>
            </div>
          </div>
        <?php endif;?>
        <!-- Realted Product End -->
        <!-- Upsell Product Start -->
        <?php if ($recentlyViewed) :?>
          <div class="related-product pb-30">
            <div class="container">
              <div class="usel-product">
                <div class="group-title">
                  <h2>Недавно просмотренные товары</h2>
                </div>
                <!-- Upsell Product Activation Start -->
                <div class="new-upsell-pro owl-carousel">
                  <?php foreach ($recentlyViewed as $item) :?>
                    <!-- Single Product Start -->
                    <div class="single-product main_product">
                      <!-- Product Image Start -->
                      <div class="pro-img">
                        <a href="product/<?=$item->alias?>">
                          <img class="primary-img" src="images/product/<?=$item->img?>" alt="single-product">
                        </a>
                      </div>
                      <!-- Product Image End -->
                      <!-- Product Content Start -->
                      <div class="pro-content">
                        <div class="rating_star" style="left: 30%; position: relative">
                          <?php rating($item);?>
                        </div>
                      </div>
                      <h4 style="margin-top: -20px"><a href="product/<?=$item->alias?>" class="product_main_new"><?=$item->title?></a></h4>
                      <div class="price_new"><?php price($item, $curr);?></div>
                      <div class="pro-actions">
                        <div class="actions-secondary">
                          <a href="wishlist/add?id=<?=$item->id;?>" data-toggle="tooltip" title="Добавить в список желаний"><i class="fa fa-heart"></i></a>
                          <a class="add-cart" href="cart/add?id<?=$item->id;?>" data-toggle="tooltip" title="В корзину" id="productAdd" data-id="<?=$item->id;?>">В корзину</a>
                          <a href="compare/add?id=<?=$item->id;?>" data-toggle="tooltip" title="Добавить в список сравнений"><i class="fa fa-signal"></i></a>
                        </div>
                      </div>
                    </div>
                    <!-- Product Content End -->
                    <?php discount($item); ?>
                  </div>
                  <!-- Single Product End -->
                <?php endforeach;?>
              </div>
              <!-- Upsell Product Activation End -->
            </div>
          </div>
        </div>
      <?php endif;?>
<!-- Upsell Product End -->