<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * Unknown Email Object
 *
 * @phpstan-type UnknownEmailArray array{result: 'unknown', deliverable: null|null, disposable: null|null, free: null|null, role: null|null, catchall: null|null, suggestions: list<string>}
 *
 * @implements ResponseContract<UnknownEmailArray>
 */
final class UnknownEmail implements ResponseContract
{
    /** @use ArrayAccessible<UnknownEmailArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * @var 'unknown'
         */
        public readonly string $result,
        /**
         * Deliverability is not known
         */
        public readonly null $deliverable,
        /**
         * Disposability is not known
         */
        public readonly null $disposable,
        /**
         * Free email provider is not known
         */
        public readonly null $free,
        /**
         * Role is not known
         */
        public readonly null $role,
        /**
         * Catch-all status is not known
         */
        public readonly null $catchall,
        /**
         * Suggestions will be empty
         *
         * @var list<string>
         */
        public readonly array $suggestions,
    ) {}

    /**
     * @param  UnknownEmailArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            result: $attributes['result'] ?? throw self::missing('result'),
            deliverable: $attributes['deliverable'] ?? null,
            disposable: $attributes['disposable'] ?? null,
            free: $attributes['free'] ?? null,
            role: $attributes['role'] ?? null,
            catchall: $attributes['catchall'] ?? null,
            suggestions: $attributes['suggestions'] ?? throw self::missing('suggestions'),
        );
    }

    public function toArray(): array
    {
        return [
            'result' => $this->result,
            'deliverable' => $this->deliverable,
            'disposable' => $this->disposable,
            'free' => $this->free,
            'role' => $this->role,
            'catchall' => $this->catchall,
            'suggestions' => $this->suggestions,
        ];
    }
}
