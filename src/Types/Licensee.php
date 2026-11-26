<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * Licensee
 *
 * @phpstan-import-type LicenseeDailyUsageArray from LicenseeDailyUsage
 * @phpstan-type LicenseeArray array{id: string, key: string, createdAt: string, name: string, address: string, postcode: string, whitelist: list<string>, daily: LicenseeDailyUsageArray}
 *
 * @implements ResponseContract<LicenseeArray>
 */
final class Licensee implements ResponseContract
{
    /** @use ArrayAccessible<LicenseeArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * An immutable ID provided for every licensee. Primarily used for paginated list requests.
         */
        public readonly string $id,
        /**
         * Uniquely identifies a licensee for a key.
         */
        public readonly string $key,
        /**
         * Timestamp for when the licensee was created
         */
        public readonly string $createdAt,
        /**
         * Licensee individual or organisation name
         */
        public readonly string $name,
        /**
         * Licensee's first, second and third line address as well as post town concatenated by commas
         */
        public readonly string $address,
        /**
         * Licensee's postcode
         */
        public readonly string $postcode,
        /**
         * A list of allowed URLs. An empty list disables the check.
         *
         * @var list<string>
         */
        public readonly array $whitelist,
        public readonly LicenseeDailyUsage $daily,
    ) {}

    /**
     * @param  LicenseeArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'] ?? throw self::missing('id'),
            key: $attributes['key'] ?? throw self::missing('key'),
            createdAt: $attributes['createdAt'] ?? throw self::missing('createdAt'),
            name: $attributes['name'] ?? throw self::missing('name'),
            address: $attributes['address'] ?? throw self::missing('address'),
            postcode: $attributes['postcode'] ?? throw self::missing('postcode'),
            whitelist: $attributes['whitelist'] ?? throw self::missing('whitelist'),
            daily: LicenseeDailyUsage::from(($attributes['daily'] ?? throw self::missing('daily'))),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'key' => $this->key,
            'createdAt' => $this->createdAt,
            'name' => $this->name,
            'address' => $this->address,
            'postcode' => $this->postcode,
            'whitelist' => $this->whitelist,
            'daily' => $this->daily->toArray(),
        ];
    }
}
