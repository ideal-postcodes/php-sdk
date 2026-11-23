<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test');

$response = $client->addresses(['query' => '9 Malyons Road, Swanley', 'limit' => 5]);

foreach ($response->result->hits as $address) {
    echo $address->line1, ', ', $address->postTown, ', ', $address->postcode, PHP_EOL;
}

echo $response->result->total, ' addresses matched', PHP_EOL;
