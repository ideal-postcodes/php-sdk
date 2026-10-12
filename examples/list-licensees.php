<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->licensees()->list('ak_test', ['limit' => 10]);

foreach ($response->result->licensees ?? [] as $licensee) {
    echo $licensee->id, ': ', $licensee->name, ' (', $licensee->key, ')', PHP_EOL;
}

echo 'More pages: ', var_export($response->result->hasMore ?? false, true), PHP_EOL;
