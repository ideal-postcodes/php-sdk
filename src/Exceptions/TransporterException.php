<?php

declare(strict_types=1);

namespace IdealPostcodes\Exceptions;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * The PSR-18 client could not complete the request: DNS, connection, TLS or
 * timeout failures. The client's own exception is `getPrevious()`.
 */
final class TransporterException extends Exception implements IdealPostcodesException
{
    public function __construct(ClientExceptionInterface $exception)
    {
        parent::__construct($exception->getMessage(), 0, $exception);
    }
}
