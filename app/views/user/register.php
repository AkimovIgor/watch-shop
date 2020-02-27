<div class="container mt_30">
    <div class="row ">
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
    </div>
    <div class="col-sm-8 col-lg-9 mtb_20">
        <!-- contact  -->
        <div class="row">
        <div class="col-md-6 col-md-offset-3 auth-ajax">
            <?php require APP . '/views/user/register_tpl.php' ?>
        </div>
        </div>
    </div>
    </div>
</div>
<?php
unset($_SESSION['errors']);
?>