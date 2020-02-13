<div class="container">
    <div class="row ">
    <!-- =====  BANNER STRAT  ===== -->
    <div class="col-sm-12">
        <div class="breadcrumb ptb_20">
        <h1>New LCDScreen...</h1>
        <ul>
            <?= $breadcrumbs; ?>
        </ul>
        </div>
    </div>
    <!-- =====  BREADCRUMB END===== -->
    <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
        <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" role="button">
        <div class="nav-responsive">
            <div class="heading-part">
            <h2 class="main_title">Top category</h2>
            </div>
            <ul class="nav  main-navigation collapse in">
                <?php foreach ($categories as $category): ?>
                    <?php if ($category['parent_id'] != 0): ?>
                        <li><a href="categories/<?= $category['slug'] ?>"><?= $category['title'] ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        </div>
        <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
        <div class="left-special left-sidebar-widget mb_50">
        <div class="heading-part mb_10 ">
            <h2 class="main_title">Top Products</h2>
        </div>
        <div id="left-special" class="owl-carousel">
            <?php $i = 0; ?>
            <?php foreach($tops as $top): ?>
            <?php if($i % 3 == 0): ?>
            <ul class="row">
            <?php endif; ?>
                <li class="item product-layout-left mb_20">
                    <div class="product-list col-xs-4">
                    <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="products/<?= $top->slug ?>"> <img class="img-responsive" title="<?= $top->title ?>" alt="<?= $top->title ?>" src="images/product/<?= $top->image ?>"> </a> </div>
                    </div>
                    </div>
                    <div class="col-xs-8">
                    <div class="caption product-detail">
                        <h6 class="product-name"><a href="products/<?= $top->slug ?>"><?= $top->title ?></a></h6>
                        <div class="rating">
                            <?php for ($j = 1; $j <= 5; $j++): ?>
                            <span class="fa fa-stack">
                                <i class="fa fa-star-o fa-stack-1x"></i>
                                <?php if ($j <= $top->rating): ?>
                                <i class="fa fa-star fa-stack-1x"></i>
                                <?php else: ?>
                                <i class="fa fa-star fa-stack-x"></i> 
                                <?php endif; ?>
                            </span> 
                            <?php endfor; ?>
                        </div>
                        <span class="price">
                            <span class="amount"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($top->price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"> <?= $currency['symbol_right'] ?></span></span>
                            <?php if ($top->old_price > 0): ?>
                            <span class="amount" style="color: #424242; font-size: smaller;"><del><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($top->old_price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"><?= $currency['symbol_right'] ?> </span></del></span>
                            <?php endif; ?>
                        </span>
                    </div>
                    </div>
                </li>
            <?php if($i % 3 == 2 || $i == count($tops)-1): ?>
            </ul>
            <?php endif; ?>
            <?php $i++; ?>
            <?php endforeach; ?>
        </div>
        </div>
    </div>
    <div class="col-sm-8 col-lg-9 mtb_20">
        <div class="row mt_10 ">
        <div class="col-md-6">
            <div><a class="thumbnails"> <img class="main-image" id="img_01" data-zoom-image="images/product/<?= $product->image ?>" src="images/product/<?= $product->image ?>" alt="" /></a></div>
            <?php if ($images): ?>
            <div id="product-thumbnail" class="owl-carousel gallery">
                <div class="item">
                    <a style="display: block" class="" data-image="images/product/<?= $product->image ?>" data-zoom-image="images/product/<?= $product->image ?>"> <img id="img_01" src="images/product/<?= $product->image ?>" alt="" /></a>
                </div>
                <?php foreach ($images as $item): ?>
                    <div class="item">
                    <a style="display: block" class="" data-image="images/product/<?= $item->image ?>" data-zoom-image="images/product/<?= $item->image ?>"> <img id="img_01" src="images/product/<?= $item->image ?>" alt="" /></a>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-md-6 prodetail caption product-thumb">
            <h4 data-name="product_name" class="product-name"><a href="products/<?= $product->slug ?>" title="<?= $product->title ?>"><?= $product->title ?></a></h4>
            <div class="rating">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                <span class="fa fa-stack">
                    <i class="fa fa-star-o fa-stack-1x"></i>
                    <?php if ($i <= $product->rating): ?>
                    <i class="fa fa-star fa-stack-1x"></i>
                    <?php else: ?>
                    <i class="fa fa-star fa-stack-x"></i> 
                    <?php endif; ?>
                </span> 
                <?php endfor; ?>
            </div>
            <span class="price mb_20">
                <span class="amount"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><span class="base-price" data-price="<?= number_format($product->price * $currency['value'], 2, '.', '') ?>"><?= number_format($product->price * $currency['value'], 2, '.', '') ?></span><span class="currencySymbol"> <?= $currency['symbol_right'] ?></span></span>
                <?php if ($product->old_price > 0): ?>
                <span class="amount" style="color: #424242; font-size: smaller;"><del><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->old_price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"><?= $currency['symbol_right'] ?> </span></del></span>
                <?php endif; ?>
            </span>
            <hr>
            <ul class="list-unstyled product_info mtb_20">
            <li>
                <label>Brand:</label>
                <span> <a href="<?= $brand->slug ?>"><?= $brand->title ?></a></span>
            </li>
            <li>
                <label>Product Code:</label>
                <span> <?= $product->id ?></span>
            </li>
            <li>
                <label>Availability:</label>
                <?php if ($product->status): ?>
                    <span> In Stock</span>
                <?php else: ?>
                    <span> Out Of Stock</span>
                <?php endif; ?>
            </li>
            <li>
                <label>Category:</label>
                <span> <?= $categories[$product->category_id]['title'] ?></span>
            </li>
            </ul>
            <hr>
            <p class="product-desc mtb_30"> <?= $product->description ?></p>
            <div id="product">
            <div class="form-group">
                <div class="row">
                    <!-- <div class="Sort-by col-md-6">
                        <label>Sort by</label>
                        <select name="product_size" id="select-by-size" class="selectpicker form-control">
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Large</option>
                        </select>
                    </div> -->
                    <div class="color col-md-6">
                        <label>Color</label>
                        <select name="product_color" id="select-by-color" class="selectpicker form-control">
                            <option data-title="" data-price="0" value="0">Select color</option>
                            <?php foreach($mods as $mod): ?>
                            <option data-title="<?= $mod->title ?>" data-price="<?= $mod->price * $currency['value'] ?>" value="<?= $mod->id ?>"><?= $mod->title ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="qty mt_30 form-group2">
                <label>Qty</label>
                <input name="product_quantity" min="<?= $product->quantity > 0 ? 1 : 0 ?>" value="<?= $product->quantity > 0 ? 1 : 0 ?>" type="number" max="<?= $product->quantity ?>">
            </div>
            <div class="button-group mt_30">
                <div class="add-to-cart" data-id="<?= $product->id ?>"><a href="cart/add?id=<?= $product->id ?>"><span>Add to cart</span></a></div>
                <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                <div class="compare"><a href="#"><span>Compare</span></a></div>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-12">
            <div id="exTab5" class="mtb_30">
            <ul class="nav nav-tabs">
                <li class="active"> <a href="#1c" data-toggle="tab">Overview</a> </li>
                <li><a href="#2c" data-toggle="tab">Reviews (1)</a> </li>
                <li><a href="#3c" data-toggle="tab">Solution</a> </li>
            </ul>
            <div class="tab-content ">
                <div class="tab-pane active pt_20" id="1c">
                <p>CLorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis malesuada mi id tristique. Sed ipsum nisi, dapibus at faucibus non, dictum a diam. Nunc vitae interdum diam. Sed finibus, justo vel maximus facilisis, sapien turpis euismod tellus, vulputate semper diam ipsum vel tellus.</p>
                </div>
                <div class="tab-pane" id="2c">
                <form class="form-horizontal">
                    <div id="review"></div>
                    <h4 class="mt_20 mb_30">Write a review</h4>
                    <div class="form-group required">
                    <div class="col-sm-12">
                        <label class="control-label" for="input-name">Your Name</label>
                        <input name="name" value="" id="input-name" class="form-control" type="text">
                    </div>
                    </div>
                    <div class="form-group required">
                    <div class="col-sm-12">
                        <label class="control-label" for="input-review">Your Review</label>
                        <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                        <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                    </div>
                    </div>
                    <div class="form-group required">
                    <div class="col-md-6">
                        <label class="control-label">Rating</label>
                        <div class="rates"><span>Bad</span>
                        <input name="rating" value="1" type="radio">
                        <input name="rating" value="2" type="radio">
                        <input name="rating" value="3" type="radio">
                        <input name="rating" value="4" type="radio">
                        <input name="rating" value="5" type="radio">
                        <span>Good</span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="buttons pull-right">
                        <button type="submit" class="btn btn-md btn-link">Continue</button>
                        </div>
                    </div>
                    </div>
                </form>
                </div>
                <div class="tab-pane pt_20" id="3c">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut lobortis malesuada mi id tristique. Sed ipsum nisi, dapibus at faucibus non, dictum a diam. Nunc vitae interdum diam. Sed finibus, justo vel maximus facilisis, sapien turpis euismod tellus, vulputate semper diam ipsum vel tellus.applied clearfix to the tab-content to rid of the gap between the tab and the content</p>
                </div>
            </div>
            </div>
        </div>
        </div>
        <?php if ($related): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading-part text-center mb_10">
                <h2 class="main_title mt_50">Related Products</h2>
                </div>
                <div class="related_pro box">
                <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
                    <?php foreach ($related as $product): ?>
                    <div class="item">
                        <div class="product-thumb">
                            <div class="image product-imageblock"> <a href="products/<?= $product['slug'] ?>"> <img data-name="product_image" src="images/product/<?= $product['image'] ?>" alt="<?= $product['title'] ?>" title="<?= $product['title'] ?>" class="img-responsive"> </a>
                            <div class="button-group text-center">
                                <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                                <div class="compare"><a href="#"><span>Compare</span></a></div>
                                <div class="add-to-cart" data-id="<?= $product['id'] ?>"><a href="cart/add?id=<?= $product['id'] ?>"><span>Add to cart</span></a></div>
                            </div>
                            </div>
                            <div class="caption product-detail text-center">
                            <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem"><?= $product['title'] ?></a></h6>
                            <div class="rating">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="fa fa-stack">
                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                    <?php if ($i <= $product['rating']): ?>
                                    <i class="fa fa-star fa-stack-1x"></i>
                                    <?php else: ?>
                                    <i class="fa fa-star fa-stack-x"></i> 
                                    <?php endif; ?>
                                </span> 
                                <?php endfor; ?>
                            </div>
                            <span class="price">
                                <span class="amount"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product['price'] * $currency['value'], 2, '.', '') ?><span class="currencySymbol"> <?= $currency['symbol_right'] ?></span></span>
                                <?php if ($product['old_price'] > 0): ?>
                                <span class="amount" style="color: #424242; font-size: smaller;"><del><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product['old_price'] * $currency['value'], 2, '.', '') ?><span class="currencySymbol"><?= $currency['symbol_right'] ?> </span></del></span>
                                <?php endif; ?>
                            </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($recentlyViewed): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="heading-part text-center mb_10">
                <h2 class="main_title mt_50">Recently Viewed</h2>
                </div>
                <div class="related_pro box">
                <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
                    <?php foreach ($recentlyViewed as $product): ?>
                    <div class="item">
                        <div class="product-thumb">
                            <div class="image product-imageblock"> <a href="products/<?= $product['slug'] ?>"> <img data-name="product_image" src="images/product/<?= $product['image'] ?>" alt="<?= $product['title'] ?>" title="<?= $product['title'] ?>" class="img-responsive"> </a>
                            <div class="button-group text-center">
                                <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                                <div class="compare"><a href="#"><span>Compare</span></a></div>
                                <div class="add-to-cart" data-id="<?= $product['id'] ?>"><a href="cart/add?id=<?= $product['id'] ?>"><span>Add to cart</span></a></div>
                            </div>
                            </div>
                            <div class="caption product-detail text-center">
                            <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem"><?= $product['title'] ?></a></h6>
                            <div class="rating">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="fa fa-stack">
                                    <i class="fa fa-star-o fa-stack-1x"></i>
                                    <?php if ($i <= $product['rating']): ?>
                                    <i class="fa fa-star fa-stack-1x"></i>
                                    <?php else: ?>
                                    <i class="fa fa-star fa-stack-x"></i> 
                                    <?php endif; ?>
                                </span> 
                                <?php endfor; ?>
                            </div>
                            <span class="price">
                                <span class="amount"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product['price'] * $currency['value'], 2, '.', '') ?><span class="currencySymbol"> <?= $currency['symbol_right'] ?></span></span>
                                <?php if ($product['old_price'] > 0): ?>
                                <span class="amount" style="color: #424242; font-size: smaller;"><del><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product['old_price'] * $currency['value'], 2, '.', '') ?><span class="currencySymbol"><?= $currency['symbol_right'] ?> </span></del></span>
                                <?php endif; ?>
                            </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    </div>
    <div id="brand_carouse" class="ptb_30 text-center">
    <div class="type-01">
        <div class="heading-part mb_10 ">
        <h2 class="main_title">Brand Logo</h2>
        </div>
        <div class="row">
        <div class="col-sm-12">
            <div class="brand owl-carousel ptb_20">
            <div class="item text-center"> <a href="#"><img src="images/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="images/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="images/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="images/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="images/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="images/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="images/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="images/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>
            <div class="item text-center"> <a href="#"><img src="images/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>