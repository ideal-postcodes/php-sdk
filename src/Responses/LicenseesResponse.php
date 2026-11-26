<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Responses;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;
use IdealPostcodes\Types\LicenseesResult;

/**
 * Licensee List Response
 *
 * @phpstan-import-type LicenseesResultArray from LicenseesResult
 * @phpstan-type LicenseesResponseArray array{result: LicenseesResultArray, message: 'Success', code: 2000}
 *
 * @implements ResponseContract<LicenseesResponseArray>
 */
final class LicenseesResponse implements ResponseContract
{
    /** @use ArrayAccessible<LicenseesResponseArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * List of licensees
         */
        public readonly LicenseesResult $result,
        /**
         * @var 'Success'
         */
        public readonly string $message,
        /**
         * @var 2000
         */
        public readonly int $code,
    ) {}

    /**
     * @param  LicenseesResponseArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            result: LicenseesResult::from(($attributes['result'] ?? throw self::missing('result'))),
            message: $attributes['message'] ?? throw self::missing('message'),
            code: $attributes['code'] ?? throw self::missing('code'),
        );
    }

    public function toArray(): array
    {
        return [
            'result' => $this->result->toArray(),
            'message' => $this->message,
            'code' => $this->code,
        ];
    }
}
