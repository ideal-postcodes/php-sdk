<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * API Key Daily Limit
 *
 * @phpstan-type ApiKeyDailyLimitArray array{limit: int|null, consumed: int}
 *
 * @implements ResponseContract<ApiKeyDailyLimitArray>
 */
final class ApiKeyDailyLimit implements ResponseContract
{
    /** @use ArrayAccessible<ApiKeyDailyLimitArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * `number` or `null`. The daily lookup limit currently set on your key. `null` means the limit is currently disabled.
         */
        public readonly ?int $limit,
        /**
         * Number of lookups performed today which count towards your daily limit.
         */
        public readonly int $consumed,
    ) {}

    /**
     * @param  ApiKeyDailyLimitArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            limit: $attributes['limit'] ?? null,
            consumed: $attributes['consumed'] ?? throw self::missing('consumed'),
        );
    }

    public function toArray(): array
    {
        return [
            'limit' => $this->limit,
            'consumed' => $this->consumed,
        ];
    }
}
