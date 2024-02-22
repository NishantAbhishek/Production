<?php


$stripe = new \Stripe\StripeClient('sk_test_51Nu1u6K87UliSLXQB0DJOTRQxkBLdcotuwQ9yKuMZXu8a9IvPcIJ0qVY7zv7nMHsHUEDKIRy9cB8Uo20KL8ZpEIY00S6vgikHY');


//$stripe->products->create([
//    'id' => 'order_xxx',
//    'name' => 'product_003',
//]);
//
//$stripe->prices->create([
////    'id' => 'price_002',
//    'unit_amount' => 100,
//    'currency' => 'aud',
//    'product' => 'product_003',
//]);



//$product = $stripe->products->retrieve(
//    'product_003',
//    []
//);


//echo "<pre>";
//print_r($product);
//echo "</pre>";

$result = $stripe->prices->search([
    'query' => 'product:\'product_003\'',
]);
//
//echo "<pre>";
//print_r($result);
//echo "</pre>";

// Assuming $search_result holds the Stripe\SearchResult Object
$priceId = $result->data[0]->id;

// Now you can use $priceId anywhere you need
//echo $priceId;  // This should print "price_1Nubk8K87UliSLXQJLrpQ7wT"
