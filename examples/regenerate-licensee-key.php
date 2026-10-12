<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->licensees()->regenerateKey('ak_test', '56a11209ebe230380bf104c3');

echo 'New licensee key: ', $response->result->key, PHP_EOL;
