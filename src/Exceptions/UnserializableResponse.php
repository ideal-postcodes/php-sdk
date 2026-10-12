<?php

declare(strict_types=1);

namespace IdealPostcodes\Exceptions;

use Exception;
use JsonException;
use Psr\Http\Message\ResponseInterface;

/**
 * A success response whose body is not a JSON object.
 */
final class UnserializableResponse extends Exception implements IdealPostcodesException
{
    public function __construct(public readonly ResponseInterface $response, ?JsonException $previous = null)
    {
        parent::__construct(
            $previous?->getMessage() ?? 'The response body is not a JSON object.',
            0,
            $previous,
        );
    }
}
