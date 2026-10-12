<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;
use IdealPostcodes\Types\PhoneNumber;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test');

$response = $client->phoneNumbers()->validate('+44 20 7112 8019');

$result = $response->result;

if ($result instanceof PhoneNumber) {
    echo $result->internationalFormat, ' (', $result->country, ')', PHP_EOL;
} else {
    echo 'Invalid phone number', PHP_EOL;
}
