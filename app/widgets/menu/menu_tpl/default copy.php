<?php 

$parent = isset($category['childs']);
$count = isset($category['childs']) ? count($category['childs']) : null;
?>
<!-- <li> <a href="index.html">Home</a></li> -->
<li <?php if (isset($category['childs'])): ?>class="dropdown <?= $count > 4 ? 'mega-dropdown' : ''; ?>"<?php endif; ?>> 
    <a href="<?= $category['slug'] ?>" class="dropdown-toggle" data-toggle="dropdown"><?= $category['title'] ?> </a>
    <?php if (isset($category['childs'])): ?>
    <ul <?php if ($parent): ?>class="dropdown-menu <?= $count > 4 ? 'mega-dropdown-menu row' : ''; ?>"<?php endif; ?>>
        
        <?php if ($count > 4): ?>
            <?php $i = 0; ?>
            <?php foreach ($category['childs'] as $item): ?>
            <?php if ($i % 5 == 0): ?>
            <li class="col-md-3">
                <ul>
            <?php endif; ?>   
                <li><a href="#"><?= $item['title']; echo $i;?></a></li>
            <?php if ($i % 5 == 4 || $i == $count-1): ?>    
                </ul>
            </li>
            <?php endif; ?>   
            <?php $i++; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <?= $this->getMenuHtml($category['childs']); ?>
        <?php endif; ?> 
    </ul>
    <?php endif; ?>
</li>
<!-- <li> <a href="category_page.html">Shop</a></li>
<li> <a href="blog_page.html">Blog</a></li>
<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages </a>
    <ul class="dropdown-menu">
    <li> <a href="cart_page.html">Cart</a></li>
    <li> <a href="checkout_page.html">Checkout</a></li>
    <li> <a href="product_detail_page.html">Product Detail Page</a></li>
    <li> <a href="single_blog.html">Single Post</a></li>
    </ul>
</li>
<li> <a href="about.html">About us</a></li>
<li> <a href="contact_us.html">Contact us</a></li> -->