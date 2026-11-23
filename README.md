# Ideal Postcodes PHP SDK

Typed calls to the Ideal Postcodes API over any PSR-18 HTTP client. PHP 8.2 or later.

```bash
composer require ideal-postcodes/sdk
```

The SDK finds the PSR-18 client and PSR-17 factories already in your project. If Composer reports none, add one, such as `composer require guzzlehttp/guzzle`.

```php
use IdealPostcodes\IdealPostcodes;

$client = IdealPostcodes::client('ak_test');

$lookup = $client->lookup('BR8 7RE');
foreach ($lookup->addresses as $address) {
    echo $address->line1, ', ', $address->postTown, ', ', $address->postcode, PHP_EOL;
}

$response = $client->findAddress(['query' => '9 Malyons Road']);
foreach ($response->result->hits as $hit) {
    echo $hit->suggestion, PHP_EOL;
}
```

Each API operation is one method on the client, named from its operation ID, such as `postcodes()`, `addressCleanse()` or `keyUsage()`. Every response is a read-only object with camelCase properties, the API's own field names through array access and `toArray()` for the decoded body. An HTTP error throws `ApiException`, with the HTTP status from `getStatusCode()` and the API error code from `getCode()`.

Key, licensee and configuration operations take your Management Key as the second argument to `IdealPostcodes::client()`. Keep it on your server.

[Documentation](https://docs.ideal-postcodes.co.uk/docs/sdks/php) covers setup, postcode and UPRN lookup, autocomplete, address cleanse, email and phone validation, keys, licensees, responses, errors, the Symfony bundle, the Laravel package and a reference page for every operation. Coding agents can install the `ideal-postcodes-php-sdk` skill with `npx skills add ideal-postcodes/skills`.

## License

SEE LICENSE IN LICENSE
