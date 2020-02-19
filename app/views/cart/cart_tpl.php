<?php if (!empty($_SESSION['cart'])): ?>
<ul>
    <li class="table-responsive" style="max-height: 230px">
        <table class="table table-striped">
            <tbody>
            <?php foreach($_SESSION['cart'] as $id => $item): ?>
            <tr>
                <td class="text-center"><a href="products/<?= $item['slug'] ?>"><img style="width: 70px;" src="images/product/<?= $item['image'] ?>" alt="<?= $item['title'] ?>" title="<?= $item['title'] ?>"></a></td>
                <td class="text-left product-name"><a href="products/<?= $item['slug'] ?>"><?= $item['title'] ?></a> <span class="text-left price"><span class="currencySymbol"><?= $currency['symbol_left'] ?></span><span><?= number_format($item['price'] * $currency['value'], 2, '.', '')  ?></span><span class="currencySymbol"><?= $currency['symbol_right'] ?></span>
                <input class="cart-qty" data-id="<?= $id ?>" name="product_quantity" min="1" value="<?= $item['qty'] ?>" type="number"></span>
                <span><?= $item['mod'] ?></span><span style="display: none" id="total-qty"><?= $_SESSION['cart_total']['total_qty'] ?></span>
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
    <a href="cart/checkout">
        <input class="btn pull-right mt_10" value="Checkout" type="submit">
    </a>
    </li>
</ul>
<?php else: ?>
<p style="margin: 10px;">Your cart is empty</p>
<?php endif; ?>