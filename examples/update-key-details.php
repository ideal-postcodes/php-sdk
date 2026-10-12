<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->keys()->updateDetails('ak_test', [
    'name' => 'Checkout',
    'allowed_urls' => ['https://www.example.com'],
]);

echo $response->result->name, PHP_EOL;
