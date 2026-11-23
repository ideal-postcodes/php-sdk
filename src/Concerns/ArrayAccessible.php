<?php

declare(strict_types=1);

namespace IdealPostcodes\Concerns;

use BadMethodCallException;
use IdealPostcodes\Contracts\ResponseContract;
use IdealPostcodes\Exceptions\MissingResponseField;

/**
 * Read-only array access and JSON serialisation over `toArray()`.
 *
 * @template TArray of array
 *
 * @mixin ResponseContract<TArray>
 */
trait ArrayAccessible
{
    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->toArray());
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->toArray()[$offset]; // @phpstan-ignore offsetAccess.notFound
    }

    public function offsetSet(mixed $offset, mixed $value): never
    {
        throw new BadMethodCallException('Response objects are read-only.');
    }

    public function offsetUnset(mixed $offset): never
    {
        throw new BadMethodCallException('Response objects are read-only.');
    }

    /**
     * @return TArray
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    private static function missing(string $field): MissingResponseField
    {
        return new MissingResponseField(self::class, $field);
    }

    /**
     * Whether a decoded object looks like one `oneOf` variant: each
     * discriminating field holds one of its values and every listed key is
     * present.
     *
     * @param  array<string, mixed>  $value
     * @param  array<string, list<scalar|null>>  $enums
     * @param  list<string>  $required
     */
    private static function matches(array $value, array $enums, array $required): bool
    {
        foreach ($enums as $key => $allowed) {
            if (! array_key_exists($key, $value) || ! in_array($value[$key], $allowed, true)) {
                return false;
            }
        }

        foreach ($required as $key) {
            if (! array_key_exists($key, $value)) {
                return false;
            }
        }

        return true;
    }
}
