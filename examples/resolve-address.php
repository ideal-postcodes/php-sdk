<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test');

$response = $client->autocomplete()->resolve('paf_23747771');

$address = $response->result;

echo $address->line1, PHP_EOL;
echo $address->postTown, ', ', $address->postcode, PHP_EOL;
echo 'UPRN ', $address->uprn, ' from ', $address->dataset, PHP_EOL;
