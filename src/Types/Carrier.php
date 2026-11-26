<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * Carrier Object
 *
 * @phpstan-type CarrierArray array{network_code: string|null, name: string|null, country: string|null, network_type: 'mobile'|'landline'|'landline_premium'|'landline_tollfree'|'virtual'|'unknown'|'pager'|'mobile_or_landline'|'shared_cost'|'uan'|'voicemail'|null}
 *
 * @implements ResponseContract<CarrierArray>
 */
final class Carrier implements ResponseContract
{
    /** @use ArrayAccessible<CarrierArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * The [Mobile Country Code](https://en.wikipedia.org/wiki/Mobile_country_code) for the carrier.
         */
        public readonly ?string $networkCode,
        /**
         * The full name of the carrier that number is associated with.
         */
        public readonly ?string $name,
        /**
         * Country that number is associated with. In ISO 3166-1 alpha-2 format.
         */
        public readonly ?string $country,
        /**
         * Type of network that number is associated with.
         *
         * @var 'mobile'|'landline'|'landline_premium'|'landline_tollfree'|'virtual'|'unknown'|'pager'|'mobile_or_landline'|'shared_cost'|'uan'|'voicemail'|null
         */
        public readonly ?string $networkType,
    ) {}

    /**
     * @param  CarrierArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            networkCode: $attributes['network_code'] ?? null,
            name: $attributes['name'] ?? null,
            country: $attributes['country'] ?? null,
            networkType: $attributes['network_type'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'network_code' => $this->networkCode,
            'name' => $this->name,
            'country' => $this->country,
            'network_type' => $this->networkType,
        ];
    }
}
