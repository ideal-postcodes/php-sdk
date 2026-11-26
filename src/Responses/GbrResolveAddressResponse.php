<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Responses;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;
use IdealPostcodes\Types\Address;

/**
 * Address Resolution Response (GBR)
 *
 * @phpstan-import-type AddressArray from Address
 * @phpstan-type GbrResolveAddressResponseArray array{code: 2000, message: 'Success', result: AddressArray}
 *
 * @implements ResponseContract<GbrResolveAddressResponseArray>
 */
final class GbrResolveAddressResponse implements ResponseContract
{
    /** @use ArrayAccessible<GbrResolveAddressResponseArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * @var 2000
         */
        public readonly int $code,
        /**
         * @var 'Success'
         */
        public readonly string $message,
        /**
         * The standard Ideal Postcodes address, which maps both UK and International addresses.
         */
        public readonly Address $result,
    ) {}

    /**
     * @param  GbrResolveAddressResponseArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            code: $attributes['code'] ?? throw self::missing('code'),
            message: $attributes['message'] ?? throw self::missing('message'),
            result: Address::from(($attributes['result'] ?? throw self::missing('result'))),
        );
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'result' => $this->result->toArray(),
        ];
    }
}
