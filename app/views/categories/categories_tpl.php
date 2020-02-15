<?php if ($products): ?>
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
</div>
<?php if ($pagination->countPages > 1): ?>
    <div class="pagination-nav text-center mt_50">
    <?= $pagination ?>
    </div>
<?php endif; ?>    
<?php else: ?>
    <h1>Товаров данной категории пока нет.</h1>
<?php endif; ?>