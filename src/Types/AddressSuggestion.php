<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * Address Suggestion
 *
 * Represents an address suggestion for any address in the world
 *
 * @phpstan-type AddressSuggestionArray array{id: string, suggestion: string, urls: array<string, mixed>}
 *
 * @implements ResponseContract<AddressSuggestionArray>
 */
final class AddressSuggestion implements ResponseContract
{
    /** @use ArrayAccessible<AddressSuggestionArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Globally unique internally generated identifier for an address
         */
        public readonly string $id,
        /**
         * Address Suggestion to be displayed to the user
         */
        public readonly string $suggestion,
        /**
         * Always an empty object (`{}`). Retrieve the full address with `id`
         *
         * @var array<string, mixed>
         */
        public readonly array $urls,
    ) {}

    /**
     * @param  AddressSuggestionArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'] ?? throw self::missing('id'),
            suggestion: $attributes['suggestion'] ?? throw self::missing('suggestion'),
            urls: $attributes['urls'] ?? throw self::missing('urls'),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'suggestion' => $this->suggestion,
            'urls' => $this->urls,
        ];
    }
}
