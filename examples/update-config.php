<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->updateConfig('ak_test', 'woocommerce', [
    'payload' => json_encode(['removeOrganisation' => true], JSON_THROW_ON_ERROR),
]);

echo $response->result->name, ' updated ', $response->result->updatedAt, PHP_EOL;
