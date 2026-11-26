<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * DeleteLicenseeResponseResult
 *
 * @phpstan-type DeletedLicenseeArray array{deleted: int}
 *
 * @implements ResponseContract<DeletedLicenseeArray>
 */
final class DeletedLicensee implements ResponseContract
{
    /** @use ArrayAccessible<DeletedLicenseeArray> */
    use ArrayAccessible;

    private function __construct(
        public readonly int $deleted,
    ) {}

    /**
     * @param  DeletedLicenseeArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            deleted: $attributes['deleted'] ?? throw self::missing('deleted'),
        );
    }

    public function toArray(): array
    {
        return [
            'deleted' => $this->deleted,
        ];
    }
}
