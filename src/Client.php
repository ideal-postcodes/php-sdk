<?php

declare(strict_types=1);

namespace IdealPostcodes;

use IdealPostcodes\Contracts\ClientContract;
use IdealPostcodes\Contracts\TransporterContract;
use IdealPostcodes\Exceptions\ApiException;

/**
 * One method per API operation, generated from the spec into the
 * `Operations` trait, plus the `lookup()` convenience.
 *
 * @phpstan-import-type PostcodesParams from Params
 */
final class Client implements ClientContract
{
    use Operations;

    public function __construct(private readonly TransporterContract $transporter) {}

    /**
     * The addresses at a postcode. An unknown postcode returns no addresses
     * and the API's closest matching postcodes instead of throwing. Other
     * errors still throw.
     *
     * @param  PostcodesParams  $params
     *
     * @see https://docs.ideal-postcodes.co.uk/docs/sdks/php/postcode-lookup
     */
    public function lookup(string $postcode, array $params = []): PostcodeLookup
    {
        try {
            return PostcodeLookup::found($this->postcodes($postcode, $params));
        } catch (ApiException $exception) {
            if ($exception->getCode() !== 4040) {
                throw $exception;
            }

            return PostcodeLookup::notFound($exception);
        }
    }
}
