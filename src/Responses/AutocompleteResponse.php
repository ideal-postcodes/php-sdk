<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Responses;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;
use IdealPostcodes\Types\AutocompleteResult;

/**
 * Address Autocomplete Response
 *
 * @phpstan-import-type AutocompleteResultArray from AutocompleteResult
 * @phpstan-type AutocompleteResponseArray array{result: AutocompleteResultArray, code: 2000, message: 'Success'}
 *
 * @implements ResponseContract<AutocompleteResponseArray>
 */
final class AutocompleteResponse implements ResponseContract
{
    /** @use ArrayAccessible<AutocompleteResponseArray> */
    use ArrayAccessible;

    private function __construct(
        public readonly AutocompleteResult $result,
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
     * @param  AutocompleteResponseArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            result: AutocompleteResult::from(($attributes['result'] ?? throw self::missing('result'))),
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
