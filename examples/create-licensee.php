<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->licensees()->create('ak_test', [
    'name' => 'Acme Ltd',
    'address' => '1 High Street, London',
    'postcode' => 'SW1A 2AA',
    'whitelist' => ['https://www.acme.example'],
]);

echo 'Licensee key: ', $response->result->key, PHP_EOL;
