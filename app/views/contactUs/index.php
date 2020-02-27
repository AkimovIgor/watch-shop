<div class="container mt_30">
    <div class="row ">
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
            <div class="left_banner left-sidebar-widget mt_30 mb_40"> <a href="#"><img src="images/left1.jpg" alt="Left Banner" class="img-responsive" /></a> </div>
        </div>
        <div class="col-sm-8 col-lg-9 mtb_20">
            <!-- contact  -->
            <div class="row">
                <div class="col-md-4 col-xs-12 contact">
                    <div class="location mb_50">
                        <h5 class="capitalize mb_20"><strong>Our Location</strong></h5>
                        <div class="address">Office address
                            <br> 124,Lorem Ipsum has been
                            <br> text ever since the 1500</div>
                        <div class="call mt_10"><i class="fa fa-phone" aria-hidden="true"></i>+91-9987-654-321</div>
                    </div>
                    <div class="Career mb_50">
                        <h5 class="capitalize mb_20"><strong>Careers</strong></h5>
                        <div class="address">dummy text ever since the 1500s, simply dummy text of the typesetting industry. </div>
                        <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:careers@yourdomain.com" target="_top">careers@yourdomain.com</a></div>
                    </div>
                    <div class="Hello mb_50">
                        <h5 class="capitalize mb_20"><strong>Say Hello</strong></h5>
                        <div class="address">simply dummy text of the printing and typesetting industry.</div>
                        <div class="email mt_10"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@yourdomailname.com" target="_top">info@yourdomailname.com</a></div>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12 contact-form mb_50">
                    <!-- Contact FORM -->
                    <?php require APP . '/views/contactUs/contact_tpl.php'?>
                    <!-- END Contact FORM -->
                </div>
            </div>
            <!-- map  -->
<!--            <div class="row">-->
<!--                <div class="col-xs-12 map mb_80">-->
<!--                    <div id="map"></div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
</div>
