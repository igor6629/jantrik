<?php $curr = \jantrik\App::$app->getProperty('currency'); ?>
<!-- Breadcrumb Start -->
<div class="breadcrumb-area ptb-60 ptb-sm-30">
  <div class="container">
    <div class="breadcrumb">
      <ul>
        <?= $breadcrumbs;?>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Shop Page Start -->
<div class="main-shop-page pb-60">
  <div class="container">
    <!-- Row End -->
    <div class="row">
      <!-- Sidebar Shopping Option Start -->
      <?php include APP . "/widgest/filter/filter_tpl.php"; ?>
      <!-- Sidebar Shopping Option End -->
      <!-- Product Categorie List Start -->
      <div class="col-lg-9 order-lg-2">
        <!-- Grid & List View Start -->
        <div class="grid-list-top border-default universal-padding fix mb-30">
          <div class="grid-list-view f-left">
            <ul class="list-inline nav">
              <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
              <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
              <li><span class="grid-item-list"> Товара (ов) <?=count($products);?> из <?=$total;?></span></li>
            </ul>
          </div>
        </div>
        <!-- Grid & List View End -->
        <div class="main-categorie">
          <!-- Grid & List Main Area End -->
          <div class="tab-content fix">
            <div id="grid-view" class="tab-pane active">
              <div class="row">
                <?php if (!empty($products)):?>
                  <?php foreach ($products as $product) :?>
                    <!-- Single Product Start -->
                    <div class="col-lg-4 col-sm-6">
                      <div class="single-product" style="height: 390px">
                        <?php discount($product);?>
                        <!-- Product Image Start -->
                        <div class="pro-img">
                          <a href="product/<?= $product->alias;?>">
                            <img class="primary-img" src="images/product/<?=$product->img;?>" alt="single-product" height="235px" width="110px">
                          </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                          <div class="rating_star" style="left: 30%; position: relative; line-height: 0.75;">
                            <?php rating($product);?>
                          </div>
                        </div>
                        <h4 style="margin-top: 10px"><a href="product/<?= $product->alias;?>"><?=$product->title;?></a></h4>
                        <div class="price_new"><?php price($product, $curr);?></div>
                        <div class="pro-actions">
                          <div class="actions-secondary">
                            <a href="wishlist/add?id=<?=$product['id'];?>" data-toggle="tooltip" title="Добавить в список желаний"><i class="fa fa-heart"></i></a>
                            <a class="add-cart" id="productAdd" data-id="<?=$product->id;?>" href="cart/add?id=<?=$product->id?>"data-toggle="tooltip" title="В корзину">В корзину</a>
                            <a href="compare/add?id=<?=$product['id'];?>" data-toggle="tooltip" title="Добавить в список сравнений"><i class="fa fa-signal"></i></a>
                          </div>
                        </div>
                      </div>
                      <!-- Product Content End -->
                    </div>
                  </div>
                  <!-- Single Product End -->
                <?php endforeach;?>
                <?php else:?>
                  <h5 style="margin-left:15px">В этой категории товаров нет...</h5>
                <?php endif;?>
              </div>
            </div>
            <!-- #grid view End -->
            <div id="list-view" class="tab-pane">
              <?php if (!empty($products)):?>
                <?php foreach ($products as $product) :?>
                  <!-- Single Product Start -->
                  <div class="single-product">
                    <?php discount($product);?>
                    <!-- Product Image Start -->
                    <div class="pro-img">
                      <a href="product/<?= $product->alias;?>">
                        <img class="primary-img" src="images/product/<?=$product->img;?>" alt="single-product" height="235px" width="110px">
                      </a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content" style="line-height: 0.75;">
                      <?php rating($product);?>
                    </div>
                    <h4 style="margin-top: 10px"><a href="product/<?= $product->alias;?>"><?= $product->title;?></a></h4>
                    <?php price($product, $curr);?>
                    <p><?= $product->description;?></p>
                    <div class="pro-actions">
                      <div class="actions-secondary">
                        <a href="wishlist/add?id=<?=$product['id'];?>" data-toggle="tooltip" title="Добавить в список желаний"><i class="fa fa-heart"></i></a>
                        <a class="add-cart" id="productAdd" data-id="<?=$product->id;?>" href="cart/add?id=<?=$product->id?>"data-toggle="tooltip" title="В корзину">В корзину</a>
                        <a href="compare/add?id=<?=$product['id'];?>" data-toggle="tooltip" title="Добавить в список сравнений"><i class="fa fa-signal"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- Product Content End -->
                </div>
                <!-- Single Product Start -->
              <?php endforeach;?>
              <?php else:?>
                <h5>В этой категории товаров нет...</h5>
              <?php endif;?>
            </div>
            <!-- #list view End -->
          </div>
          <!-- Grid & List Main Area End -->
        </div>
        <!--Breadcrumb and Page Show Start -->
        <?php if ($pagination->countPages > 1) :?>
          <div class="pagination-box fix">
            <?= $pagination;?>
          </div>
        <?php endif;?>
        <!--Breadcrumb and Page Show End -->
      </div>
      <!-- product Categorie List End -->
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</div>
<!-- Shop Page End -->
