<?php

require '../vendor/autoload.php';

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

//////////////create order
$ids = require('paypal.php');

$environment = new SandboxEnvironment($ids['id'], $ids['secret']);
$client = new PayPalHttpClient($environment);

// Construct a request object and set desired parameters
// Here, OrdersCreateRequest() creates a POST request to /v2/checkout/orders
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

$request = new OrdersCreateRequest();
$request->prefer('return=representation');
$request->body = [
                     "intent" => "CAPTURE",
                     "purchase_units" => [[
                         "reference_id" => "test_ref_id1",
                         "amount" => [
                             "value" => "0.01",
                             "currency_code" => "EUR"
                         ]
                     ]],
                     "application_context" => [
                          "cancel_url" => "http://example.com/cancel",
                          "return_url" => "http://127.0.0.1:8000/return.php"
                     ] 
                 ];

try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);
    header('Location: ' . $response->result->links[1]->href );
}catch (HttpException $ex) {
    echo $ex->statusCode;
    dump($ex->getMessage());
}