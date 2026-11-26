<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * API Key Monthly Limit
 *
 * @phpstan-type ApiKeyMonthlyLimitArray array{limit: int|null, consumed: int}
 *
 * @implements ResponseContract<ApiKeyMonthlyLimitArray>
 */
final class ApiKeyMonthlyLimit implements ResponseContract
{
    /** @use ArrayAccessible<ApiKeyMonthlyLimitArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * `number` or `null`. The monthly lookup limit currently set on your key. `null` means the limit is currently disabled.
         */
        public readonly ?int $limit,
        /**
         * Number of lookups performed this month which count towards your monthly limit.
         */
        public readonly int $consumed,
    ) {}

    /**
     * @param  ApiKeyMonthlyLimitArray  $attributes
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
