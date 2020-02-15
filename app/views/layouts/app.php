<?php

use App\Widgets\Currency\Currency;
use App\Widgets\Menu\MainMenu;
use FW\App;

?>
<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
  <base href="/">
  <!-- =====  BASIC PAGE NEEDS  ===== -->
  <meta charset="utf-8">
  <title>Dark look E-commerce Bootstrap Template</title>
  <!-- =====  SEO MATE  ===== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="distribution" content="global">
  <meta name="revisit-after" content="2 Days">
  <meta name="robots" content="ALL">
  <meta name="rating" content="8 YEARS">
  <meta name="Language" content="en-us">
  <meta name="GOOGLEBOT" content="NOARCHIVE">
  <!-- =====  MOBILE SPECIFICATION  ===== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="viewport" content="width=device-width">
  <!-- =====  CSS  ===== -->
  <!-- <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" /> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/> -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
</head>

<body>
  <!-- =====  LODER  ===== -->
  <div class="loder"></div>
  <div class="wrapper">
    <div id="subscribe-me" class="modal animated fade in" role="dialog" data-keyboard="true" tabindex="-1">
      <div class="newsletter-popup"> <img class="offer" src="images/newsbg.jpg" alt="offer">
        <div class="newsletter-popup-static newsletter-popup-top">
          <div class="popup-text">
            <div class="popup-title">50% <span>off</span></div>
            <div class="popup-desc">
              <div>Sign up and get 50% off your next Order</div>
            </div>
          </div>
          <form onsubmit="return  validatpopupemail();" method="post">
            <div class="form-group required">
              <input type="email" name="email-popup" id="email-popup" placeholder="Enter Your Email" class="form-control input-lg" required />
              <button type="submit" class="btn btn-default btn-lg" id="email-popup-submit">Subscribe</button>
              <label class="checkme">
                <input type="checkbox" value="" id="checkme" /> Dont show again</label>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- =====  HEADER START  ===== -->
    <header id="header">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="header-top-left">
                <div class="contact"><span class="hidden-xs hidden-sm hidden-md">Days a week from 9:00 am to 7:00 pm</span></div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-8">
              <ul class="header-top-right text-right">
                <li class="account"><a href="login.html">My Account</a></li>
                <li class="language dropdown"> <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">Language <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">German</a></li>
                  </ul>
                </li>
                <li class="currency dropdown"> <span class="dropdown-toggle" id="dropdownMenu12" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button"><?= isset($_COOKIE['currency']) ? $_COOKIE['currency'] : 'Currency'; ?> <span class="caret"></span> </span>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu12">
                    <!-- CURRENCY START -->
                    <?php new Currency(); ?>
                    <!-- CURRENCY END -->
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <form action="search" class="main-search mt_40" style="background: #000;">
                <input id="search-input" name="s" value="" placeholder="Search" class="form-control input-lg typeahead" autocomplete="off" type="text">
                <span class="input-group-btn">
              <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
              </span> 
            </form>
            </div>
            <div class="navbar-header col-xs-6 col-sm-4"> <a class="navbar-brand" href="/"> <img alt="themini" src="images/logo.png"> </a> </div>
            <div class="col-xs-6 col-sm-4 shopcart">
              <div id="cart" class="btn-group btn-block mtb_40">
                <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true"><span id="shippingcart">Shopping cart</span><span id="cart-total">items (<span><?= isset($_SESSION['cart_total']['total_qty']) ? $_SESSION['cart_total']['total_qty'] : 0 ?></span>)</span> </button>
              </div>
              <!-- CART START -->
              <?php if (!empty($_SESSION['cart'])): ?>
              <div id="cart-dropdown" class="cart-menu collapse">
                <ul>
                  <li class="table-responsive" style="max-height: 230px">
                    <table class="table table-striped">
                      <tbody>
                        <?php foreach($_SESSION['cart'] as $id => $item): ?>
                        <tr>
                          <td class="text-center"><a href="products/<?= $item['slug'] ?>"><img style="height: 84px; width: 70px;" src="images/product/<?= $item['image'] ?>" alt="<?= $item['title'] ?>" title="<?= $item['title'] ?>"></a></td>
                          <td class="text-left product-name"><a href="products/<?= $item['slug'] ?>"><?= $item['title'] ?></a> <span class="text-left price"><span class="currencySymbol"><?= $currency['symbol_left'] ?></span><span><?= number_format($item['price'] * $currency['value'], 2, '.', '')  ?></span><span class="currencySymbol"><?= $currency['symbol_right'] ?></span>
                            <input class="cart-qty" data-id="<?= $id ?>" name="product_quantity" min="1" value="<?= $item['qty'] ?>" type="number"></span>
                            <span><?= $item['mod'] ?></span>
                          </td>
                          <td class="text-center"><a class="close-cart" data-id="<?= $id ?>"><i class="fa fa-times-circle"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </li>
                  <li>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right"><span class="currencySymbol"><?= $currency['symbol_left'] ?><span><?= number_format($_SESSION['cart_total']['total_price'] * $currency['value'], 2, '.', '') ?></span><span class="currencySymbol"><?= $currency['symbol_right'] ?></span></td>
                        </tr>
                      </tbody>
                    </table>
                  </li>
                  <li>
                    <a href="cart">
                      <input class="btn pull-left mt_10" value="View cart" type="submit">
                    </a>
                    <a href="checkout">
                      <input class="btn pull-right mt_10" value="Checkout" type="submit">
                    </a>
                  </li>
                </ul>
              </div>
              <?php else: ?>
              <div id="cart-dropdown" class="cart-menu collapse">
                <p style="margin: 10px;">Your cart is empty</p>
              </div>
              <?php endif; ?>
              <!-- CART END -->
            </div>
          </div>
          <nav class="navbar">
            <p>menu</p>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="i-bar"><i class="fa fa-bars"></i></span></button>
            <div class="collapse navbar-collapse js-navbar-collapse">
              <!-- MENU START -->
              <?php new MainMenu([
                'attributes' => [
                  'id' => 'menu',
                ],
                'class' => 'nav navbar-nav',
              ]) ?>
              <!-- MENU END -->
            </div>
            <!-- /.nav-collapse -->
          </nav>
        </div>
      </div>
    </header>
    <!-- =====  HEADER END  ===== -->

    <!-- =====  CONTENT START  ===== -->
    <?= $content ?>
    <!-- =====  CONTENT END  ===== -->

    <!-- =====  FOOTER START  ===== -->
    <div class="footer pt_60">
      <div class="container">
        <div class="newsletters mt_30 mb_50">
          <div class="row">
            <div class="col-sm-6">
              <div class="news-head pull-left">
                <h2>Follow Our Updates !</h2>
                <div class="new-desc">Be the First to know about our Fresh Arrivals and much more!</div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="news-form pull-right">
                <form onsubmit="return validatemail();" method="post">
                  <div class="form-group required">
                    <input name="email" id="email" placeholder="Enter Your Email" class="form-control input-lg" required="" type="email">
                    <button type="submit" class="btn btn-default btn-lg">Subscribe</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Information</h6>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Delivery Information</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="contact.html">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Services</h6>
            <ul>
              <li><a href="#">Returns</a></li>
              <li><a href="#">Site Map</a></li>
              <li><a href="#">Wish List</a></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Order History</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Extras</h6>
            <ul>
              <li><a href="#">Brands</a></li>
              <li><a href="#">Gift Certificates</a></li>
              <li><a href="#">Affiliates</a></li>
              <li><a href="#">Specials</a></li>
              <li><a href="#">Newsletter</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-block">
            <h6 class="footer-title ptb_20">Contacts</h6>
            <ul>
              <li>Warehouse & Offices,</li>
              <li>12345 Street name, California USA</li>
              <li>(+024) 666 888</li>
              <li>yourid@domain.com</li>
              <li><a href="#">www.yoursite.com</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-bottom mt_60 ptb_20">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="social_icon">
                <ul>
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-google"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="copyright-part text-center">@ 2019 All Rights Reserved Darklook</div>
            </div>
            <div class="col-sm-4">
              <div class="payment-icon text-right">
                <ul>
                  <li><i class="fa fa-cc-paypal "></i></li>
                  <li><i class="fa fa-cc-visa"></i></li>
                  <li><i class="fa fa-cc-discover"></i></li>
                  <li><i class="fa fa-cc-mastercard"></i></li>
                  <li><i class="fa fa-cc-amex"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- =====  FOOTER END  ===== -->
  </div>

  <div class="alert alert-success alert-dismissible" style="position: fixed; z-index: 9999; top: 0; right: 0; width: auto; display: none;" role="alert">
    <span class="alert-text" style="padding-right: 10px;"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <span id="scrollup"></span>
  <script src="https://use.fontawesome.com/72227fcc65.js"></script>
  <script src="js/jQuery_v3.1.1.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/typeahead.bundle.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
  <!-- <script src="js/jquery.magnific-popup.js"></script> -->
  <!-- <script src="js/jquery.firstVisitPopup.js"></script> -->
  <script src="js/jquery.mousewheel.js"></script>
  <script src="js/jquery.ez-plus.js"></script>
  <script> 
    $("#img_01").ezPlus({
      responsive: false,
      borderColour:'#fff',
      borderSize: 1,

      gallery:'product-thumbnail',
      cursor:'pointer',
      galleryActiveClass:"active",
      imageCrossfade:false,

      zoomWindowWidth: 212,
      zoomWindowHeight: 272,
      zoomWindowFadeIn: true,
      zoomWindowFadeOut: true,
      zoomType: 'inner',
      containLensZoom: true,
      scrollZoom: true,

    }); 

    $('#img_01').bind('click', function (e) {
        var ez = $('#img_01').data('ezPlus');
        return false;
    });
  </script>
  
  
  <?php $currency = App::$app->getProperty('currency'); ?>
  <script>
    var curVal = '<?= $currency['value'] ?>';
    var curTitle = '<?= $currency['title'] ?>';
    var symbolLeft = '<?= $currency['symbol_left'] ?>';
    var symbolRight = '<?= $currency['symbol_right'] ?>';
    var path = '<?= URL ?>';
  </script>
  <script src="js/main.js"></script>
</body>

</html>