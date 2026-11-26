<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * UK Address Suggestion
 *
 * Represents a possible address given an autocomplete query.
 *
 * UK Address Suggestions will return a UDPRN attribute if it references a deliverable endpoint found on Royal Mail's Postcode Address File dataset.
 *
 * UK Address Suggestion will return a UMPRN if it references a multiple occupancy premise found on Royal Mail's Multiple Residence dataset.
 *
 * @phpstan-import-type UkAddressSuggestionUrlsArray from UkAddressSuggestionUrls
 * @phpstan-type UkAddressSuggestionArray array{id: string, suggestion: string, udprn: int, umprn?: int, urls: UkAddressSuggestionUrlsArray}
 *
 * @implements ResponseContract<UkAddressSuggestionArray>
 */
final class UkAddressSuggestion implements ResponseContract
{
    /** @use ArrayAccessible<UkAddressSuggestionArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Globally unique internally generated identifier for an address
         */
        public readonly string $id,
        /**
         * Address suggestion for a given query.
         */
        public readonly string $suggestion,
        /**
         * UDPRN stands for 'Unique Delivery Point Reference Number'. Royal Mail assigns a unique UDPRN code for each premise on PAF. Simple, unique reference number for each Delivery Point. Unlikely to be reused when an address expires.
         */
        public readonly int $udprn,
        /**
         * Optionally returned field, representing the UMPRN of a Multiple Residence household
         */
        public readonly ?int $umprn,
        /**
         * URLs
         */
        public readonly UkAddressSuggestionUrls $urls,
    ) {}

    /**
     * @param  UkAddressSuggestionArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'] ?? throw self::missing('id'),
            suggestion: $attributes['suggestion'] ?? throw self::missing('suggestion'),
            udprn: $attributes['udprn'] ?? throw self::missing('udprn'),
            umprn: $attributes['umprn'] ?? null,
            urls: UkAddressSuggestionUrls::from(($attributes['urls'] ?? throw self::missing('urls'))),
        );
    }

    public function toArray(): array
    {
        $array = [
            'id' => $this->id,
            'suggestion' => $this->suggestion,
            'udprn' => $this->udprn,
            'urls' => $this->urls->toArray(),
        ];

        if ($this->umprn !== null) {
            $array['umprn'] = $this->umprn;
        }

        return $array;
    }
}
