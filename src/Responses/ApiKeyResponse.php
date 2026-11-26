<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Responses;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;
use IdealPostcodes\Types\ApiKey;

/**
 * API Key Response
 *
 * @phpstan-import-type ApiKeyArray from ApiKey
 * @phpstan-type ApiKeyResponseArray array{result: ApiKeyArray, message: 'Success', code: 2000}
 *
 * @implements ResponseContract<ApiKeyResponseArray>
 */
final class ApiKeyResponse implements ResponseContract
{
    /** @use ArrayAccessible<ApiKeyResponseArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Key
         */
        public readonly ApiKey $result,
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
     * @param  ApiKeyResponseArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            result: ApiKey::from(($attributes['result'] ?? throw self::missing('result'))),
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
