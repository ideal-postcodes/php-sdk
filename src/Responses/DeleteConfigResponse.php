<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Responses;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;
use IdealPostcodes\Types\DeletedConfig;

/**
 * Config Delete Response
 *
 * @phpstan-import-type DeletedConfigArray from DeletedConfig
 * @phpstan-type DeleteConfigResponseArray array{result: DeletedConfigArray, code: 2000, message: 'Success'}
 *
 * @implements ResponseContract<DeleteConfigResponseArray>
 */
final class DeleteConfigResponse implements ResponseContract
{
    /** @use ArrayAccessible<DeleteConfigResponseArray> */
    use ArrayAccessible;

    private function __construct(
        public readonly DeletedConfig $result,
        /**
         * @var 2000
         */
        public readonly int $code,
        /**
         * @var 'Success'
         */
        public readonly string $message,
    ) {}

    /**
     * @param  DeleteConfigResponseArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            result: DeletedConfig::from(($attributes['result'] ?? throw self::missing('result'))),
            code: $attributes['code'] ?? throw self::missing('code'),
            message: $attributes['message'] ?? throw self::missing('message'),
        );
    }

    public function toArray(): array
    {
        return [
            'result' => $this->result->toArray(),
            'code' => $this->code,
            'message' => $this->message,
        ];
    }
}
