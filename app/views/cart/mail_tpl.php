<?php
$currency = \FW\App::$app->getProperty('currency');
?>
<table border="1" cellspacing="0" cellpadding="5">
    <thead>
    <tr>
        <th class="text-left">Наименование</th>
        <th class="text-left">Модель</th>
        <th class="text-right">Количество</th>
        <th class="text-right">Цена за шт.</th>
        <th class="text-right">Цена за все</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($_SESSION['cart'] as $product): ?>
    <tr>
        <td class="text-left"><?= $product['title'] ?></td>
        <td class="text-left"><?= !empty($product['mod']) ? $product['mod'] : 'Standart' ?></td>
        <td class="text-right"><?= $product['qty'] ?></td>
        <td class="text-right"><span class="currencySymbol"><?= $currency['symbol_left'] ?></span><?= number_format($product['price'] * $currency['value'], 2, '.', '')  ?><span class="currencySymbol"><?= $currency['symbol_right'] ?></span></td>
        <td class="text-right"><span class="currencySymbol"><?= $currency['symbol_left'] ?></span><?= number_format($product['price'] * $currency['value'] * $product['qty'], 2, '.', '')  ?><span class="currencySymbol"><?= $currency['symbol_right'] ?></span></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <td class="text-right" colspan="4"><strong>Сумма без доставки</strong></td>
        <td class="text-right"><?= $currency['symbol_left'] ?></span><?= number_format($_SESSION['cart_total']['total_price'] * $currency['value'] * $product['qty'], 2, '.', '')  ?><span class="currencySymbol"><?= $currency['symbol_right'] ?></td>
    </tr>
    <tr>
        <td class="text-right" colspan="4"><strong>Цена доставки:</strong></td>
        <td class="text-right"><?= $currency['symbol_left'] ?></span><?= $flat = number_format(5 * $currency['value'], 2, '.', '')  ?><span class="currencySymbol"><?= $currency['symbol_right'] ?></td>
    </tr>
    <tr>
        <td class="text-right" colspan="4"><strong>Общая сумма:</strong></td>
        <td class="text-right"><?= $currency['symbol_left'] ?></span><?= number_format($_SESSION['cart_total']['total_price'] * $currency['value'] * $product['qty'] + $flat, 2, '.', '')  ?><span class="currencySymbol"><?= $currency['symbol_right'] ?></td>
    </tr>
    </tfoot>
</table>