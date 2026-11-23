<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->createLicensee('ak_test', [
    'name' => 'Acme Ltd',
    'address' => '9 Malyons Road, Swanley',
    'postcode' => 'BR8 7RE',
    'whitelist' => ['https://www.acme.example'],
]);

echo 'Licensee key: ', $response->result->key, PHP_EOL;
