<?php

require_once ROOT . '/templates/pages/vendor/autoload.php';

//require_once '../secrets.php';
$stripeSecretKey = 'sk_test_51NvdNDEXQiq7kUw7cLPU4Rw39RQqXXWeH8NLHjW1uQeU3bwJ3PBcJcptlyuPZlfUdIwYI3i9X6Lo1FLG5wlHfY4200fw0DngYB';

//require_once '../products.php';
$stripe = new \Stripe\StripeClient('sk_test_51NvdNDEXQiq7kUw7cLPU4Rw39RQqXXWeH8NLHjW1uQeU3bwJ3PBcJcptlyuPZlfUdIwYI3i9X6Lo1FLG5wlHfY4200fw0DngYB');

// retrieve order id and quote
$order_id = $this->request->getQuery('order_id');
$order_type = $this->request->getQuery('order_type');
$quote = $this->request->getQuery('quote');
$user_id = $this->request->getQuery('user_id');



$currentTime = date("c");
//echo $currentTime;
$paymentOrder = $order_type.'_'.$order_id;

// check if order is already in Stripe
$checkOrder = $stripe->products->search([
    'query' => "name:'$paymentOrder'",
]);

if (empty($checkOrder->data)) {
    // The data attribute is empty
    // setup order & pricing info in Stripe database
    $stripe->products->create([
        'id' => $paymentOrder,
        'name' => $paymentOrder,
    ]);

    $stripe->prices->create([
        'product' => $paymentOrder,
        'unit_amount' => $quote*100,
        'currency' => 'aud',
    ]);
} else {
    // Data is present proceed to checkout

}


// drastic measures...
sleep(2);

// ... to try and hide the slow external DB
echo 'process payment in Stripe ?';
?>
<form action="checkout" method="post">
    <input type="hidden" name="paymentOrder" value="<?= $paymentOrder ?>">
    <input type="hidden" name="order_id" value="<?= $order_id ?>">
    <input type="hidden" name="order_type" value="<?= $order_type ?>">
    <input type="hidden" name="quote" value="<?= $quote ?>">
    <input type="hidden" name="user_id" value="<?= $user_id ?>">
    <input type="submit" value="Proceed to Checkout">
</form>

