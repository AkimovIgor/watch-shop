<!-- =====  BANNER STRAT  ===== -->
<div class="banner">
    <div class="main-banner owl-carousel">
    <div class="item"><a href="shop"><img src="images/main_banner1.jpg" alt="Main Banner" class="img-responsive" /></a></div>
    <div class="item"><a href="shop"><img src="images/main_banner2.jpg" alt="Main Banner" class="img-responsive" /></a></div>
    </div>
</div>
<!-- =====  BANNER END  ===== -->
<!-- =====  CONTAINER START  ===== -->
<div class="container">
    <!-- =====  SUB BANNER  STRAT ===== -->
    <div class="row">
        <div class="col-sm-3 mt_20 cms-icon ">
            <div class="feature-i-left ptb_30 ">
            <div class="icon-right Shipping"></div>
            <h6>Free Shipping</h6>
            <p>Free dedlivery worldwide</p>
            </div>
        </div>
        <div class="col-sm-3 mt_20 cms-icon ">
            <div class="feature-i-left ptb_30 ">
            <div class="icon-right Order"></div>
            <h6>Order Onlivne</h6>
            <p>Hours : 8am - 11pm</p>
            </div>
        </div>
        <div class="col-sm-3 mt_20 cms-icon ">
            <div class="feature-i-left ptb_30 ">
            <div class="icon-right Save"></div>
            <h6>Shop And Save</h6>
            <p>For All Spices & Herbs</p>
            </div>
        </div>
        <div class="col-sm-3 mt_20 cms-icon ">
            <div class="feature-i-left ptb_30 ">
            <div class="icon-right Safe"></div>
            <h6>Safe Shoping</h6>
            <p>Ensure genuine 100%</p>
            </div>
        </div>
    </div>
    <div class="row ">
    
        <div class="col-sm-12 mt_30">
            <!-- =====  PRODUCT TAB  ===== -->
            <div id="product-tab" class="mt_10">
            <div class="heading-part mb_10 ">
                <h2 class="main_title">Featured Products</h2>
            </div>
            <ul class="nav text-right">
                <li class="active"> <a href="#nArrivals" data-toggle="tab">New Arrivals</a> </li>
                <li><a href="#Bestsellers" data-toggle="tab">Bestsellers</a> </li>
                <li><a href="#Featured" data-toggle="tab">Featured</a> </li>
            </ul>
            <div class="tab-content clearfix box">
                <div class="tab-pane active" id="nArrivals">
                    <div class="nArrivals owl-carousel">
                        <?php foreach ($new_products as $product): ?>
                        <div class="product-grid">
                            <div class="item">
                                <div class="product-thumb  mb_30">
                                    <div class="image product-imageblock"> <a href="products/<?= $product->slug ?>"> <img data-name="product_image" src="images/product/<?= $product->image ?>" alt="<?= $product->title ?>" title="<?= $product->title ?>" class="img-responsive"> </a>
                                        <div class="button-group text-center">
                                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                                        <div class="add-to-cart" data-id="<?= $product->id ?>"><a href="cart/add?id=<?= $product->id ?>"><span>Add to cart</span></a></div>
                                        </div>
                                    </div>
                                    <div class="caption product-detail text-center">
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
                                        <h6 data-name="product_name" class="product-name"><a href="product/<?= $product->slug ?>" title="<?= $product->title ?>"><?= $product->title ?></a></h6>
                                        <span class="price">
                                            <span class="amount"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"> <?= $currency['symbol_right'] ?></span></span>
                                            <?php if ($product->old_price > 0): ?>
                                            <span class="amount" style="color: #424242; font-size: smaller;"><del><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->old_price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"><?= $currency['symbol_right'] ?> </span></del></span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="tab-pane" id="Bestsellers">
                    <div class="Bestsellers owl-carousel">
                        <?php foreach ($bestsellers as $product): ?>
                        <div class="product-grid">
                            <div class="item">
                                <div class="product-thumb  mb_30">
                                    <div class="image product-imageblock"> <a href="products/<?= $product->slug ?>"> <img data-name="product_image" src="images/product/<?= $product->image ?>" alt="<?= $product->title ?>" title="<?= $product->title ?>" class="img-responsive"> </a>
                                        <div class="button-group text-center">
                                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                                        <div class="add-to-cart" data-id="<?= $product->id ?>"><a href="cart/add?id=<?= $product->id ?>"><span>Add to cart</span></a></div>
                                        </div>
                                    </div>
                                    <div class="caption product-detail text-center">
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
                                        <h6 data-name="product_name" class="product-name"><a href="product/<?= $product->slug ?>" title="<?= $product->title ?>"><?= $product->title ?></a></h6>
                                        <span class="price">
                                            <span class="amount"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"> <?= $currency['symbol_right'] ?></span></span>
                                            <?php if ($product->old_price > 0): ?>
                                            <span class="amount" style="color: #424242; font-size: smaller;"><del><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->old_price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"><?= $currency['symbol_right'] ?> </span></del></span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="tab-pane" id="Featured">
                    <?php if (! empty($featured)): ?>
                    <div class="Featured owl-carousel">
                        <?php foreach ($featured as $product): ?>
                        <div class="product-grid">
                            <div class="item">
                                <div class="product-thumb  mb_30">
                                    <div class="image product-imageblock"> <a href="products/<?= $product->slug ?>"> <img data-name="product_image" src="images/product/<?= $product->image ?>" alt="<?= $product->title ?>" title="<?= $product->title ?>" class="img-responsive"> </a>
                                        <div class="button-group text-center">
                                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                                        <div class="add-to-cart" data-id="<?= $product->id ?>"><a href="cart/add?id=<?= $product->id ?>"><span>Add to cart</span></a></div>
                                        </div>
                                    </div>
                                    <div class="caption product-detail text-center">
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
                                        <h6 data-name="product_name" class="product-name"><a href="product/<?= $product->slug ?>" title="<?= $product->title ?>"><?= $product->title ?></a></h6>
                                        <span class="price">
                                            <span class="amount"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"> <?= $currency['symbol_right'] ?></span></span>
                                            <?php if ($product->old_price > 0): ?>
                                            <span class="amount" style="color: #424242; font-size: smaller;"><del><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->old_price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"><?= $currency['symbol_right'] ?> </span></del></span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            </div>
            <!-- =====  PRODUCT TAB  END ===== -->
        </div>
    </div>
    <div class="row">
    <div class="cms_banner">
        <div class="col-xs-12 mt_60">
        <div id="subbanner4" class="sub-hover">
            <div class="sub-img"><a><img src="images/sub5.jpg" alt="Sub Banner5" class="img-responsive"></a></div>
        </div>
        </div>
    </div>
    <?php if (!empty($deals)): ?>
    <div class="col-sm-12 mtb_10">
        <!-- =====  PRODUCT TAB  ===== -->
        <div class="mt_60">
        <div class="heading-part mb_10 ">
            <h2 class="main_title">Deals of the Week</h2>
        </div>
        <div class="latest_pro box">
            <div class="latest owl-carousel">
                <?php foreach ($deals as $product): ?>
                <div class="product-grid">
                    <div class="item">
                    <div class="product-thumb">
                        <div class="image product-imageblock"> <a href="products/<?= $product->slug ?>"> <img data-name="product_image" src="images/product/<?= $product->image ?>" alt="iPod Classic" title="<?= $product->title ?>" class="img-responsive">  </a>
                        <div class="button-group text-center">
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart" data-id="<?= $product->id ?>"><a href="cart/add?id=<?= $product->id ?>"><span>Add to cart</span></a></div>
                        </div>
                        </div>
                        <div class="caption product-detail text-center">
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
                            <h6 data-name="product_name" class="product-name"><a href="product/<?= $product->slug ?>" title="<?= $product->title ?>"><?= $product->title ?></a></h6>
                            <span class="price">
                                <span class="amount"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"> <?= $currency['symbol_right'] ?></span></span>
                                <?php if ($product->old_price > 0): ?>
                                <span class="amount" style="color: #424242; font-size: smaller;"><del><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->old_price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"><?= $currency['symbol_right'] ?> </span></del></span>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- =====  Blog =====
    <div class="col-sm-12 mtb_10">
        <div id="Blog" class="mt_50">
        <div class="heading-part mb_10 ">
            <h2 class="main_title">Latest News</h2>
        </div>
        <div class="blog-contain box">
            <div class="blog owl-carousel ">
            <div class="item">
                <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_01.jpg" alt="themini"> </a>
                    <div class="date-time text-center">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                    </div>
                    <div class="post-image-hover"> </div>
                    <div class="post-info">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="view-blog">
                        <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                        <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="item">
                <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_02.jpg" alt="themini"> </a>
                    <div class="date-time text-center">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                    </div>
                    <div class="post-image-hover"> </div>
                    <div class="post-info">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="view-blog">
                        <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                        <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="item">
                <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_03.jpg" alt="themini"> </a>
                    <div class="date-time text-center">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                    </div>
                    <div class="post-image-hover"> </div>
                    <div class="post-info">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="view-blog">
                        <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                        <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="item">
                <div class="box-holder">
                <div class="thumb post-img"><a href="#"> <img src="images/blog/blog_img_04.jpg" alt="themini"> </a>
                    <div class="date-time text-center">
                    <div class="day"> 11</div>
                    <div class="month">Aug</div>
                    </div>
                    <div class="post-image-hover"> </div>
                    <div class="post-info">
                    <h6 class="mb_10 text-uppercase"> <a href="single_blog.html">Fashions fade, style is eternal</a> </h6>
                    <p>Aliquam egestas pellentesque est. Etiam a orci Nulla id enim feugiat ligula ullamcorper scelerisque. Morbi eu luctus nisl.</p>
                    <div class="view-blog">
                        <div class="write-comment pull-left"> <a href="single_blog.html"> 0 Comments</a> </div>
                        <div class="read-more pull-right"> <a href="single_blog.html"> <i class="fa fa-link"></i> read more</a> </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
         
        </div>
    </div>
    =====  Blog end ===== -->
    </div>
    <!-- =====  SUB BANNER END  ===== -->
    <?php if (!empty($brands)): ?>
    <div id="brand_carouse" class="ptb_60 text-center">
        <div class="type-01">
            <div class="heading-part mb_10 ">
            <h2 class="main_title">Brand Logo</h2>
            </div>
            <div class="row">
            <div class="col-sm-12">
                <div class="brand owl-carousel ptb_20">
                    <?php foreach ($brands as $brand): ?>
                        <div class="item text-center">
                            <a href="brands/<?= $brand->slug ?>">
                                <img src="images/brand/<?= $brand->image ?>" alt="<?= $brand->title ?>" class="img-responsive" />
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<!-- =====  CONTAINER END  ===== -->