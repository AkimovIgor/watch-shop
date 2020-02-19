<?php

namespace App\Models;

use FW\App;
use RedBeanPHP\R;

class Order extends BaseModel
{
    public $attributes = [
        'user_id' => '',
        'currency' => '',
        'shipping_method' => '',
        'payment_method' => '',
        'note' => '',
    ];

    public $rules = [
        'required' => [
            ['shipping_method'],
            ['payment_method'],
        ],
        'lengthMax' => [
            ['note', 2000]
        ]
    ];

    public function saveOrder($data, $user)
    {
        $order = R::dispense('orders');
        $order->user_id = $user['id'];
        $order->currency = $_SESSION['cart_currency']['code'];
        $order->shipping_method = $this->attributes['shipping_method'];
        $order->payment_method = $this->attributes['payment_method'];
        $order->note = $this->attributes['note'];
        $orderId = R::store($order);
        $this->saveOrderProducts($orderId);
        return $orderId;
    }

    public function saveOrderProducts($orderId)
    {
        $values = '';
        foreach ($_SESSION['cart'] as $productId => $value) {
            $productId = (int) $productId;
            $values .= "($orderId, $productId, {$value['qty']}, '{$value['title']}', {$value['price']}, '{$value['mod']}'),";
            // if (! empty($value['mod'])) {
            //     $values .= ", {$value['mod']}), ";
            // } else {
            //     $values .= "), ";
            // }
        }
        $values = rtrim($values, ', ');
        $sql = "INSERT INTO order_products (order_id, product_id, quantity, title, price, modification) VALUES {$values}";
        R::exec($sql);
    }

    public function mailOrder($orderId, $email)
    {

        $transport = (new \Swift_SmtpTransport(App::$app->getProperty('smtp_host'),
            App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
        ->setUsername(App::$app->getProperty('smtp_login'))
        ->setPassword(App::$app->getProperty('smtp_password'));

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        ob_start();
        require APP . '/views/cart/mail_tpl.php';
        $body = ob_get_clean();

        // Create a message
        $message_client = (new \Swift_Message('Заказ № ' . $orderId))
        ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('site_name')])
        ->setTo($email)
        ->setBody($body, 'text/html');

        $message_admin = (new \Swift_Message('Заказ № ' . $orderId))
        ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('site_name')])
        ->setTo(App::$app->getProperty('admin_email'))
        ->setBody($body, 'text/html');

        // Send the message
        $result = $mailer->send($message_client);
        $result = $mailer->send($message_admin);

        unset($_SESSION['cart']);
        unset($_SESSION['cart_total']);

        $_SESSION['success'] = 'Заказ успешно оформлен. Ожидайте сообщения от администрации сайта';
    }
}