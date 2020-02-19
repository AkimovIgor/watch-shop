<?php 
    $user = isset($_COOKIE['user']) ? $_COOKIE['user'] : isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
<div class="container">
    <div class="row ">
    <!-- =====  BANNER STRAT  ===== -->
    <div class="col-sm-12">
        <div class="breadcrumb ptb_20">
        <h1>Shopping Cart</h1>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li class="active">Shopping Cart</li>
        </ul>
        </div>
    </div>
    <!-- =====  BREADCRUMB END===== -->
    <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
        <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
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
        <div class="left_banner left-sidebar-widget mb_50 mt_30"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
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
        
        <div class="panel-group" id="accordion">
        <div class="panel panel-default  ">
            <div class="panel-heading">
            <h4 class="panel-title"> <span>Checkout Options</span></h4>
            </div>
            <div id="collapseOne" class="panel-collapse">
            <div class="panel-body">
                <div class="row">
                <?php if (isset($_SESSION['user']) || isset($_COOKIE['user'])): ?>
                    <h2 class="mt_20 mb_20">Current customer: <span style="color: #fa4251"><?= isset($_COOKIE['user']) ? $_COOKIE['user']['login'] : $_SESSION['user']['login'] ?></span></h2>
                <?php else: ?>
                    <div class="col-sm-6 register-ajax">
                        <?php require APP . '/views/cart/checkout-register.php' ?>
                    </div>
                    <div class="col-sm-6 login-ajax">
                        <?php require APP . '/views/cart/checkout-login.php' ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
        </div>
        <?php if ($user): ?>
        <form action="cart/confirm-order" method="POST">
        <div class="panel panel-default ">
            <div class="panel-heading">
            <h4 class="panel-title"> <span>Delivery Method</span> </h4>
            </div>
            <div id="collapsefour" class="panel-collapse">
            <div class="panel-body">
                <p>Please select the preferred shipping method to use on this order.</p>
                <p><strong>Flat Rate</strong></p>
                <div class="radio">
                <label>
                    <input type="radio" checked="checked" value="flat" name="shipping_method"> Flat Shipping Rate - $5.00</label>
                </div>
                <div class="buttons">
                <div class="pull-left">
                    <!-- <input type="button" class="btn mt_20 button-account" data-loading-text="Loading..." id="button-shipping-method" value="Continue"> -->
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading">
            <h4 class="panel-title"> <span>Payment Method</span> </h4>
            </div>
            <div id="collapsefive" class="panel-collapse">
            <div class="panel-body">
                <p>Please select the preferred payment method to use on this order.</p>
                <div class="radio">
                <label>
                    <input type="radio" checked="checked" value="cod" name="payment_method"> Cash On Delivery </label>
                </div>
                <p><strong>Add Comments About Your Order</strong></p>
                <p>
                <textarea class="form-control" rows="8" name="note"></textarea>
                </p>
                <div class="buttons">
                <!-- <div class="pull-right mt_20">I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a>
                    <input type="checkbox" value="1" name="agree"> &nbsp;
                </div> -->
                </div>
            </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading">
            <h4 class="panel-title"> <span>Confirm Order</span> </h4>
            </div>
            <div id="collapsesix" class="panel-collapse ">
            <div class="panel-body order-ajax">
                <?php require APP . '/views/cart/checkout-order.php' ?>
            </div>
            </div>
        </div>
    </form>
    <?php endif; ?>
    </div>
    
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
</div>