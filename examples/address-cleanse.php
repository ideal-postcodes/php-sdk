<?php

declare(strict_types=1);

use IdealPostcodes\IdealPostcodes;
use IdealPostcodes\Types\GbrCleanseMatch;

require __DIR__.'/../vendor/autoload.php';

$client = IdealPostcodes::client('ak_test');

$response = $client->addresses()->cleanse([
    'query' => '10 Downing St, London, SW1A',
    'postcode' => 'SW1A 2AA',
]);

$result = $response->result;

if ($result instanceof GbrCleanseMatch) {
    echo $result->match->line1, ', ', $result->match->postcode, PHP_EOL;
    echo 'Confidence: ', $result->confidence, PHP_EOL;
    echo 'Postcode match: ', $result->postcodeMatch, PHP_EOL;
} else {
    echo 'No match for ', $result->query, PHP_EOL;
}
