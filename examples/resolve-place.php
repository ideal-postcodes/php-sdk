<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test');

$response = $client->places()->resolve('geonames_7296662');

$place = $response->result;

echo $place->descriptiveName, ' (', $place->countryIso, ')', PHP_EOL;
echo $place->latitude, ', ', $place->longitude, PHP_EOL;
