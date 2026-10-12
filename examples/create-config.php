<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->configs()->create('ak_test', [
    'name' => 'woocommerce',
    'payload' => json_encode(['removeOrganisation' => false], JSON_THROW_ON_ERROR),
]);

echo $response->result->name, ' created ', $response->result->createdAt, PHP_EOL;
