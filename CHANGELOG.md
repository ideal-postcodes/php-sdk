# Changelog

## 0.1.0 (2026-11-23)

### ⚠ BREAKING CHANGES

* Resource accessors such as $client->postcodes()->retrieve() are replaced by flat methods such as $client->postcodes().

### Features

* Add the Laravel package (ideal-postcodes/laravel)
* Add the PHP SDK
* Identify the PHP SDK as ideal-postcodes-php-sdk
* Let the addresses search run on filters alone
* Add remove_organisation to postcode, address, resolve and cleanse parameters
* Add the PHP version to the User-Agent
* Call each API operation as one method on the client
* Send both keys as Authorization: Bearer

### Bug Fixes

* Fail PHP SDK generation when two schemas map to one class
* Keep the PHP SDK green on PHP 8.5 and the test account
* Pick PHP SDK union variants by one discriminator
* Regenerate the PHP SDK from the current spec
* Throw MissingResponseField when the API omits a required field
* Append the SDK identifier to a custom User-Agent
* Put the release-please marker on the VERSION line

## Changelog
