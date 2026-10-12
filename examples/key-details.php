<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test', 'uk_test');

$response = $client->keys()->details('ak_test');

echo $response->result->name, ': ', $response->result->lookupsRemaining, ' lookups remaining', PHP_EOL;
