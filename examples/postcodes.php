<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test');

$response = $client->postcodes()->retrieve('SW1A 2AA');

foreach ($response->result as $address) {
    echo $address->line1, ', ', $address->postTown, ', ', $address->postcode, PHP_EOL;
}
