<div class="container">
    <div class="row ">
    <!-- =====  BANNER STRAT  ===== -->
    <div class="col-sm-12">
        <div class="breadcrumb ptb_20">
        <h1>Products</h1>
        <ul>
            <li><a href="/">Home</a></li>
            <li class="active">Search by: "<?= $query ?>"</li>
        </ul>
        </div>
    </div>
    <!-- =====  BREADCRUMB END===== -->
    <div id="column-left" class="col-sm-4 col-lg-3 ">
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
        <div class="filter left-sidebar-widget mb_50">
        <div class="heading-part mtb_20 ">
            <h2 class="main_title">Refinr Search</h2>
        </div>
        <div class="filter-block">
            <p>
            <label for="amount">Price range:</label>
            <input type="text" id="amount" readonly>
            </p>
            <div id="slider-range" class="mtb_20 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                <!-- <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 14.8%; width: 71.4%;"></div> -->
                <!-- <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 14.8%;"></span> -->
                <!-- <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 86.2%;"></span> -->
            </div>
            <div class="list-group">
            <div class="list-group-item mb_10">
                <label>Color</label>
                <div id="filter-group1">
                <div class="checkbox">
                    <label>
                    <input value="White" type="checkbox"> White </label>
                </div>
                <div class="checkbox">
                    <label>
                    <input value="Black" type="checkbox"> Black </label>
                </div>
                <div class="checkbox ">
                    <label>
                    <input value="Gold" type="checkbox"> Gold
                    </label>
                </div>
                <div class="checkbox ">
                    <label>
                    <input value="Onyx" type="checkbox"> Onyx
                    </label>
                </div>
                </div>
            </div>
            <!-- <div class="list-group-item mb_10">
                <label>Size</label>
                <div id="filter-group3">
                <div class="checkbox">
                    <label>
                    <input value="" type="checkbox"> Big (3)</label>
                </div>
                <div class="checkbox">
                    <label>
                    <input value="" type="checkbox"> Medium (2)</label>
                </div>
                <div class="checkbox">
                    <label>
                    <input value="" type="checkbox"> Small (1)</label>
                </div>
                </div>
            </div> -->
            <button type="button" class="btn">Refine Search</button>
            </div>
        </div>
        </div>
        <div class="left_banner left-sidebar-widget mb_50"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
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
    <?php if ($products): ?>
    <div class="col-sm-8 col-lg-9 mtb_20">
        <div class="category-page-wrapper mb_30">
        <div class="list-grid-wrapper pull-left">
            <div class="btn-group btn-list-grid">
            <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
            <button type="button" id="list-view" class="btn btn-default list-view"></button>
            </div>
        </div>
        <div class="page-wrapper pull-right">
            <label class="control-label" for="input-limit">Show :</label>
            <div class="limit">
            <select id="input-limit" class="form-control">
                <option value="10" selected="selected">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="75">75</option>
                <option value="100">100</option>
            </select>
            </div>
            <!-- <span><i class="fa fa-angle-down" aria-hidden="true"></i></span> -->
        </div>
        <div class="sort-wrapper pull-right">
            <label class="control-label" for="input-sort">Sort By :</label>
            <div class="sort-inner">
            <select id="input-sort" class="form-control">
                <option value="ASC" selected="selected">Default</option>
                <option value="ASC">Name (A - Z)</option>
                <option value="DESC">Name (Z - A)</option>
                <option value="ASC">Price (Low &gt; High)</option>
                <option value="DESC">Price (High &gt; Low)</option>
                <option value="DESC">Rating (Highest)</option>
                <option value="ASC">Rating (Lowest)</option>
            </select>
            </div>
            <!-- <span><i class="fa fa-angle-down" aria-hidden="true"></i></span> -->
        </div>
        </div>
        <div class="row">
            <?php foreach($products as $product): ?>
            <div class="product-layout product-grid col-md-4 col-xs-6">
                <div class="item">
                <div class="product-thumb clearfix mb_30">
                    <div class="image product-imageblock"> <a href="products/<?= $product->slug ?>"> <img data-name="product_image" src="images/product/<?= $product->image ?>" alt="<?= $product->title ?>" title="<?= $product->title ?>" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart" data-id="<?= $product->id ?>"><a href="cart/add?id=<?= $product->id ?>"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="products/<?= $product->slug ?>" title="<?= $product->title ?>"><?= $product->title ?></a></h6>
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
                    <span class="price">
                        <span class="amount"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"> <?= $currency['symbol_right'] ?></span></span>
                        <?php if ($product->old_price > 0): ?>
                        <span class="amount" style="color: #424242; font-size: smaller;"><del><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><?= number_format($product->old_price * $currency['value'], 2, '.', '') ?><span class="currencySymbol"><?= $currency['symbol_right'] ?> </span></del></span>
                        <?php endif; ?>
                    </span>
                    <p class="product-desc mt_20 mb_60"><?= $product->description ?></p>
                    </div>
                </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb clearfix mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product4.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product4-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb clearfix mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product5.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product5-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb clearfix mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product6.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product6-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb clearfix mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product7.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product7-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb  mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product8.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product8-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb  mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product9.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product9-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb  mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product10.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product10-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb  mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product1-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb  mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product2.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product2-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb  mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product3.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product3-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="product-layout product-grid col-md-4 col-xs-6 ">
                <div class="item">
                <div class="product-thumb  mb_30">
                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img data-name="product_image" src="images/product/product4.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> <img src="images/product/product4-1.jpg" alt="iPod Classic" title="iPod Classic" class="img-responsive" /> </a>
                    <div class="button-group text-center">
                        <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                        <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                        <div class="compare"><a href="#"><span>Compare</span></a></div>
                        <div class="add-to-cart"><a href="#"><span>Add to cart</span></a></div>
                    </div>
                    </div>
                    <div class="caption product-detail text-center">
                    <h6 data-name="product_name" class="product-name mt_20"><a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a></h6>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> </div>
                    <span class="price"><span class="amount"><span class="currencySymbol">$</span>70.00</span>
                    </span>
                    <p class="product-desc mt_20 mb_60"> More room to move. With 80GB or 160GB of storage and up to 40 hours of battery life, the new iPod classic lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.Cover Flow. Browse through your music collection by flipping..</p>
                    </div>
                </div>
                </div>
            </div> -->
        </div>
        <div class="pagination-nav text-center mt_50">
        <ul>
            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
        </div>
    </div>
    <?php else: ?>
        <h1>No results were found for your search request.</h1>
    <?php endif; ?>
    </div>
    <?php if (!empty($brands)): ?>
    <div id="brand_carouse" class="ptb_60 text-center">
        <div class="type-01">
            <div class="heading-part mb_10">
            <h2 class="main_title">Brand Logo</h2>
            </div>
            <div class="row">
            <div class="col-sm-12">
                <div class="brand owl-carousel ptb_20 owl-loaded owl-drag">
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