<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->configs()->delete('ak_test', 'woocommerce');

echo 'Deleted: ', $response->result->deleted, PHP_EOL;
