<?php $curr = \jantrik\App::$app->getProperty('currency'); ?>
<?php if (!empty($products)):?>
    <?php foreach ($products as $product) :?>
        <!-- Single Product Start -->
        <div class="col-lg-4 col-sm-6">
            <div class="single-product" style="height: 390px">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="product/<?= $product->alias;?>">
                        <img class="primary-img" src="images/product/<?=$product->img;?>" alt="single-product" height="235px" width="110px">
                    </a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <h4><a href="product/<?= $product->alias;?>"><?=$product->title;?></a></h4>
                    <?php price($product, $curr);?>
                    <div class="pro-actions">
                        <div class="actions-secondary">
                            <a href="wishlist.html" data-toggle="tooltip" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                            <a class="add-cart" id="productAdd" data-id="<?=$product->id;?>" href="cart/add?id=<?=$product->id?>"data-toggle="tooltip" title="В корзину">В корзину</a>
                            <a href="compare.html" data-toggle="tooltip" title="Add to Compare"><i class="fa fa-signal"></i></a>
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
    <div class="pagination-box fix">
        <?php if ($pagination->countPages > 1) :?>
            <?= $pagination;?>
        <?php endif;?>
        <div class="toolbar-sorter-footer">
            <label>show</label>
            <select class="sorter" name="sorter">
                <option value="Position" selected="selected">12</option>
                <option value="Product Name">15</option>
                <option value="Price">30</option>
            </select>
            <span>per page</span>
        </div>
    </div>