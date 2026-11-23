<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test');

$response = $client->findAddress(['query' => '9 Malyons Road', 'limit' => 5]);

foreach ($response->result->hits as $hit) {
    echo $hit->id, ': ', $hit->suggestion, PHP_EOL;
}
