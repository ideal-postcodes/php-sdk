<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;
use IdealPostcodes\Types\Email;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test');

$response = $client->emails()->validate('support@ideal-postcodes.co.uk');

$result = $response->result;

if ($result instanceof Email) {
    echo $result->result, PHP_EOL;
    echo 'Deliverable: ', var_export($result->deliverable, true), PHP_EOL;
    echo 'Disposable: ', var_export($result->disposable, true), PHP_EOL;
} else {
    echo 'Deliverability unknown', PHP_EOL;
}
