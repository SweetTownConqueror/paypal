<?php

require '../vendor/autoload.php';

//////////////capturate order

use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\PayPalHttpClient;

$ids = require('paypal.php');
$environment = new SandboxEnvironment($ids['id'], $ids['secret']);
$client = new PayPalHttpClient($environment);
// Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
// $response->result->id gives the orderId of the order created above
//print($response->result->id);
$request = new OrdersCaptureRequest($_GET['token']);
$request->prefer('return=representation');
try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);
    
    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    dump($response);
}catch (HttpException $ex) {
    echo $ex->statusCode;
    dump($ex->getMessage());
}