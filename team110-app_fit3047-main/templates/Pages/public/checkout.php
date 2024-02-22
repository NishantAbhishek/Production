<?php


$stripeSecretKey = 'sk_test_51NvdNDEXQiq7kUw7cLPU4Rw39RQqXXWeH8NLHjW1uQeU3bwJ3PBcJcptlyuPZlfUdIwYI3i9X6Lo1FLG5wlHfY4200fw0DngYB';

//require_once '../products.php';
$stripe = new \Stripe\StripeClient('sk_test_51NvdNDEXQiq7kUw7cLPU4Rw39RQqXXWeH8NLHjW1uQeU3bwJ3PBcJcptlyuPZlfUdIwYI3i9X6Lo1FLG5wlHfY4200fw0DngYB');

    $paymentOrder = $_POST['paymentOrder'];

$order_id = $_POST['order_id'];
$order_type = $_POST['order_type'];

$quote = $_POST['quote'];
$user_id = $_POST['user_id'];


//  retrieve the info from Stripe database
$checkPrice = $stripe->prices->search([
    'query' => "product:'$paymentOrder'",
]);
// talking to external server takes a while
// this is the only way to prevent timeout error
while (empty($checkPrice->data)) {
    sleep(1);
    $checkPrice = $stripe->prices->search([
        'query' => "product:'$paymentOrder'",
    ]);
}

$moPriceId = $checkPrice->data[0]->id;

//echo $result;


\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$this->response = $this->response->withHeader('Content-Type', 'application/json');



$YOUR_DOMAIN = 'http://localhost:4242';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => $moPriceId, # '{{PRICE_ID}}',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
    'success_url' => \Cake\Routing\Router::url(['controller' => 'Pages', 'action' => 'public/success', '?' => ['order_id' => $order_id, 'order_type' => $order_type, 'user_id' => $user_id, 'quote' => $quote]], true),
    'cancel_url' => \Cake\Routing\Router::url(['controller' => 'Pages', 'action' => 'public/cancel', '?' => ['order_id' => $order_id]], true),
]);

// call Stripe API
$this->response = $this->response->withStatus(303, 'See Other');
$this->response = $this->response->withLocation($checkout_session->url);

