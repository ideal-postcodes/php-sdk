<?php

declare(strict_types=1);

namespace IdealPostcodes\Exceptions;

use UnexpectedValueException;

/**
 * A success response without a field the SDK's types require, such as an API
 * change the spec does not yet describe.
 */
final class MissingResponseField extends UnexpectedValueException implements IdealPostcodesException
{
    /**
     * @param  class-string  $type
     */
    public function __construct(public readonly string $type, public readonly string $field)
    {
        parent::__construct("The API response has no `$field` field, which $type requires.");
    }
}
