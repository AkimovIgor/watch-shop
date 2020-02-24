<?php 

$parent = isset($category['childs']);
$count = isset($category['childs']) ? count($category['childs']) : null;
?>
<li <?php if (isset($category['childs']) && $category['parent_id'] == 0): ?>class="dropdown<?= $count > 7 ? ' mega-dropdown' : ''; ?>"<?php endif; ?>>
    <a href="<?= $category['slug'] ?>" <?php if (isset($category['childs'])): ?>class="dropdown-toggle" data-toggle="dropdown"<?php endif; ?>><?= $category['title'] ?> </a>
    <?php if (isset($category['childs'])): ?>
    <ul <?php if ($parent): ?>class="dropdown-menu<?= $count > 7 ? ' mega-dropdown-menu row' : ''; ?>"<?php endif; ?>>
        <?php if ($count > 7): ?>
            <?php $i = 0; ?>
            <?php foreach ($category['childs'] as $item): ?>
            <?php if ($i % 8 == 0): ?>
            <li class="col-md-3">
                <ul>
            <?php endif; ?>   
                <li><a href="categories/<?= $item['slug'];?>"><?= $item['title'];?></a></li>
            <?php if ($i % 8 == 7 || $i == $count-1): ?>
                </ul>
            </li>
            <?php endif; ?>   
            <?php $i++; ?>
            <?php endforeach; ?>
            <li class="col-md-3">
                <ul>
                <li id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <div class="item"> <a href="#"><img src="images/menu-banner1.jpg" class="img-responsive" alt="Banner1"></a></div>
                    <!-- End Item -->
                    <div class="item active"> <a href="#"><img src="images/menu-banner2.jpg" class="img-responsive" alt="Banner1"></a></div>
                    <!-- End Item -->
                    <div class="item"> <a href="#"><img src="images/menu-banner3.jpg" class="img-responsive" alt="Banner1"></a></div>
                    <!-- End Item -->
                    </div>
                    <!-- End Carousel Inner -->
                </li>
                <!-- /.carousel -->
                </ul>
            </li>
        <?php else: ?>
            <?= $this->getMenuHtml($category['childs']); ?>
        <?php endif; ?> 
    </ul>
    <?php endif; ?>
</li>