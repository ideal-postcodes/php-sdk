<?php

declare(strict_types=1);

namespace IdealPostcodes\Contracts;

use IdealPostcodes\Exceptions\ApiException;
use IdealPostcodes\Exceptions\TransporterException;
use IdealPostcodes\Exceptions\UnserializableResponse;
use IdealPostcodes\ValueObjects\Payload;

/**
 * @internal
 */
interface TransporterContract
{
    /**
     * Send the request and decode its JSON body.
     *
     * @return array<string, mixed>
     *
     * @throws ApiException on an HTTP error
     * @throws TransporterException when the PSR-18 client fails
     * @throws UnserializableResponse when a success body is not JSON
     */
    public function requestObject(Payload $payload): array;

    /**
     * Send the request and return its body as text.
     *
     * @throws ApiException on an HTTP error
     * @throws TransporterException when the PSR-18 client fails
     */
    public function requestContent(Payload $payload): string;
}
