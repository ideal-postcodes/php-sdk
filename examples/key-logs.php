<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$csv = $client->keys()->logs('ak_test', [
    'start' => strtotime('-7 days') * 1000,
    'end' => time() * 1000,
]);

echo $csv;
