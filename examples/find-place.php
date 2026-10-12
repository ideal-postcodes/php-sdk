<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test');

$response = $client->places()->find('Strumpshaw', ['country_iso' => 'GBR']);

foreach ($response->result->hits as $place) {
    echo $place->id, ': ', $place->descriptiveName, PHP_EOL;
}
