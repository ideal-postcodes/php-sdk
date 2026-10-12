<?php

declare(strict_types=1);

namespace IdealPostcodes\Responses;

use IdealPostcodes\Exceptions\ApiException;
use IdealPostcodes\Types\AddressListItem;

/**
 * The result of `postcodes()->lookup()`: the addresses at a postcode, or the
 * API's suggestions when the postcode is not found.
 */
final readonly class PostcodeLookup
{
    /**
     * @param  list<AddressListItem>  $addresses  addresses on this page, `[]` when the postcode is not found
     * @param  list<string>  $suggestions  closest matching postcodes when not found, otherwise `[]`
     * @param  int  $total  addresses at the postcode across all pages, `0` when not found
     */
    private function __construct(
        public bool $found,
        public array $addresses,
        public array $suggestions,
        public int $total,
    ) {}

    public static function found(PostcodeResponse $response): self
    {
        return new self(true, $response->result, [], $response->total);
    }

    public static function notFound(ApiException $exception): self
    {
        $body = $exception->getBody();
        $suggestions = is_array($body) && is_array($body['suggestions'] ?? null)
            ? array_values(array_filter($body['suggestions'], is_string(...)))
            : [];

        return new self(false, [], $suggestions, 0);
    }
}
