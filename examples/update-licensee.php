<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->updateLicensee('ak_test', '56a11209ebe230380bf104c3', [
    'name' => 'Acme Limited',
]);

echo $response->result->name, PHP_EOL;
