<?php if (!empty($products)): ?>
<div class="table-responsive">
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th class="text-left">Product Name</th>
        <th class="text-left">Model</th>
        <th class="text-right">Quantity</th>
        <th class="text-right">Unit Price</th>
        <th class="text-right">Total</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($products as $product): ?>
    <tr>
        <td class="text-left"><a href="products/<?= $product['slug'] ?>"><?= $product['title'] ?></a></td>
        <td class="text-left"><?= !empty($product['mod']) ? $product['mod'] : 'Standart' ?></td>
        <td class="text-right"><?= $product['qty'] ?></td>
        <td class="text-right"><span class="currencySymbol"><?= $currency['symbol_left'] ?></span><?= number_format($product['price'] * $currency['value'], 2, '.', '')  ?><span class="currencySymbol"><?= $currency['symbol_right'] ?></span></td>
        <td class="text-right"><span class="currencySymbol"><?= $currency['symbol_left'] ?></span><?= number_format($product['price'] * $currency['value'] * $product['qty'], 2, '.', '')  ?><span class="currencySymbol"><?= $currency['symbol_right'] ?></span></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <td class="text-right" colspan="4"><strong>Sub-Total:</strong></td>
        <td class="text-right"><?= $currency['symbol_left'] ?></span><?= number_format($_SESSION['cart_total']['total_price'] * $currency['value'] * $product['qty'], 2, '.', '')  ?><span class="currencySymbol"><?= $currency['symbol_right'] ?></td>
    </tr>
    <tr>
        <td class="text-right" colspan="4"><strong>Flat Shipping Rate:</strong></td>
        <td class="text-right"><?= $currency['symbol_left'] ?></span><?= $flat = number_format(5 * $currency['value'], 2, '.', '')  ?><span class="currencySymbol"><?= $currency['symbol_right'] ?></td>
    </tr>
    <tr>
        <td class="text-right" colspan="4"><strong>Total:</strong></td>
        <td class="text-right"><?= $currency['symbol_left'] ?></span><?= number_format($_SESSION['cart_total']['total_price'] * $currency['value'] * $product['qty'] + $flat, 2, '.', '')  ?><span class="currencySymbol"><?= $currency['symbol_right'] ?></td>
    </tr>
    </tfoot>
</table>
</div>
<div class="buttons">
<div class="pull-right">
    <input type="submit" data-loading-text="Loading..." class="btn" id="button-confirm" value="Confirm Order">
</div>
</div>
<?php else: ?>
    <h1>Your cart is empty.</h1>
<?php endif; ?>