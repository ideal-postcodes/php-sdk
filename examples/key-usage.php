<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->keys()->usage('ak_test', [
    'start' => strtotime('-7 days') * 1000,
    'end' => time() * 1000,
]);

foreach ($response->result->dailyCount as $day) {
    echo $day->date, ': ', $day->count, PHP_EOL;
}

echo 'Total: ', $response->result->total, PHP_EOL;
