<?php

declare(strict_types=1);

namespace IdealPostcodes\Contracts;

use ArrayAccess;
use JsonSerializable;

/**
 * A typed object built from an API response. `toArray()` and array access
 * return the API's own field names, so `$address->line1` and
 * `$address['line_1']` are the same value.
 *
 * @template TArray of array
 *
 * @extends ArrayAccess<key-of<TArray>, value-of<TArray>>
 */
interface ResponseContract extends ArrayAccess, JsonSerializable
{
    /**
     * @return TArray
     */
    public function toArray(): array;
}
