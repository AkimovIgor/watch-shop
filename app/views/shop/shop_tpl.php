<?php if ($products): ?>
    <div class="category-page-wrapper mb_30">
        <div class="list-grid-wrapper pull-left">
            <div class="btn-group btn-list-grid">
                <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                <!-- <button type="button" id="list-view" class="btn btn-default list-view"></button> -->
            </div>
        </div>
        <div class="page-wrapper pull-right">
            <label class="control-label" for="input-limit">Show :</label>
            <div class="limit">
                <select id="input-limit" class="form-control">
                    <option value="6" <?php if ($perpage == "6"): ?>selected="selected"<?php endif; ?>>6</option>
                    <option value="15" <?php if ($perpage == "15"): ?>selected="selected"<?php endif; ?>>15</option>
                    <option value="30" <?php if ($perpage == "30"): ?>selected="selected"<?php endif; ?>>30</option>
                    <option value="60" <?php if ($perpage == "60"): ?>selected="selected"<?php endif; ?>>60</option>
                    <option value="90" <?php if ($perpage == "90"): ?>selected="selected"<?php endif; ?>>90</option>
                </select>
            </div>
            <!-- <span><i class="fa fa-angle-down" aria-hidden="true"></i></span> -->
        </div>
        <div class="sort-wrapper pull-right">
            <label class="control-label" for="input-sort">Sort By :</label>
            <div class="sort-inner">
                <select id="input-sort" name="sort" class="form-control">
                    <option value="title|DESC" <?php if ($order == "title|DESC"): ?>selected="selected"<?php endif; ?>>Name (Z - A)</option>
                    <option value="title|ASC" <?php if ($order == "title|ASC"): ?>selected="selected"<?php endif; ?>>Name (A - Z)</option>
                    <option value="price|ASC" <?php if ($order == "price|ASC"): ?>selected="selected"<?php endif; ?>>Price (Low &gt; High)</option>
                    <option value="price|DESC" <?php if ($order == "price|DESC"): ?>selected="selected"<?php endif; ?>>Price (High &gt; Low)</option>
                    <option value="rating|DESC" <?php if ($order == "rating|DESC"): ?>selected="selected"<?php endif; ?>>Rating (Highest)</option>
                    <option value="rating|ASC" <?php if ($order == "rating|ASC"): ?>selected="selected"<?php endif; ?>>Rating (Lowest)</option>
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
    <h1>Товаров не найдено.</h1>
<?php endif; ?>
