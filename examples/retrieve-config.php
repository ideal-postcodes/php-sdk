<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test');

$response = $client->retrieveConfig('ak_test', 'woocommerce');

echo $response->result->payload, PHP_EOL;
