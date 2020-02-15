<?php if($products): ?>
<form enctype="multipart/form-data" method="post" action="#">
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td class="text-center">Image</td>
                <td class="text-center">Product Name</td>
                <td class="text-center">Model</td>
                <td class="text-center">Quantity</td>
                <td class="text-center">Unit Price</td>
                <td class="text-center">Total</td>
                <td class="text-center">Actions</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $id => $product): ?>
            <tr>
                <td class="text-center"><a href="products/<?= $product['slug'] ?>"><img style="width: 70px;" src="images/product/<?= $product['image'] ?>" alt="<?= $product['title'] ?>" title="<?= $product['title'] ?>"></a></td>
                <td class="text-center"><a href="products/<?= $product['slug'] ?>"><?= $product['title'] ?></a></td>
                <td class="text-center"><?= !empty($product['mod']) ? $product['mod'] : 'Standart' ?></td>
                <td class="text-center">
                    <div style="max-width: 200px;" class="input-group btn-block">
                        <input type="text" data-id="<?= $id ?>" class="form-control quantity" max="20" size="1" value="<?= $product['qty'] ?>" name="quantity">
                    </div>
                </td>
                <td class="text-center"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><span><?= number_format($product['price'] * $currency['value'], 2, '.', '') ?></span><span class="currencySymbol"><?= $currency['symbol_right'] ?></span></td>
                <td class="text-center"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><span><?= number_format($product['price'] * $currency['value'] * $product['qty'], 2, '.', '') ?></span><span class="currencySymbol"><?= $currency['symbol_right'] ?></span></td>
                <td class="text-center">
                    <span class="input-group-btn">
                        <!-- <button class="btn" title="" data-toggle="tooltip" type="submit" data-original-title="Update"><i class="fa fa-refresh"></i></button> -->
                        <button  class="btn btn-danger cart-del" data-id="<?= $id ?>" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><i class="fa fa-times-circle"></i></button>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</form>

<div class="row">
<div class="col-sm-4 col-sm-offset-8">
    <table class="table table-bordered">
    <tbody>
        <tr>
            <td class="text-right"><strong>Total:</strong></td>
            <td class="text-right"><span class="currencySymbol"><?= $currency['symbol_left'] ?> </span><span id="total-price" data-qty="<?= $_SESSION['cart_total']['total_qty'] ?>"><?= number_format($_SESSION['cart_total']['total_price'] * $currency['value'], 2, '.', '') ?></span><span class="currencySymbol"><?= $currency['symbol_right'] ?></span></td>
        </tr>
    </tbody>
    </table>
</div>
</div>
<a href="shop">
<input class="btn pull-left mt_30" type="submit" value="Continue Shopping" />
</a>
<a href="checkout">
<input class="btn pull-right mt_30" type="submit" value="Checkout" />
</a>
<?php else: ?>
<h1>Your cart is empty.</h1>
<?php endif; ?>