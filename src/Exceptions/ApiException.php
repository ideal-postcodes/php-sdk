<?php

declare(strict_types=1);

namespace IdealPostcodes\Exceptions;

use Exception;
use JsonException;
use Psr\Http\Message\ResponseInterface;

/**
 * An HTTP error response from the API.
 *
 * `getCode()` is the API error code, such as `4040`, or `0` when the body
 * carries none. `getMessage()` is the API's message, or the HTTP reason
 * phrase. The error codes guide lists every code:
 * https://docs.ideal-postcodes.co.uk/docs/guides/error-codes
 */
final class ApiException extends Exception implements IdealPostcodesException
{
    /**
     * @param  array<string, mixed>|string  $body  the decoded JSON body, or the raw text when it is not JSON
     */
    private function __construct(
        public readonly int $status,
        public readonly array|string $body,
        public readonly ResponseInterface $response,
        string $message,
        int $code,
    ) {
        parent::__construct($message, $code);
    }

    public static function fromResponse(ResponseInterface $response): self
    {
        $status = $response->getStatusCode();
        $contents = (string) $response->getBody();

        try {
            $decoded = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            $decoded = null;
        }

        /** @var array<string, mixed>|string $body */
        $body = is_array($decoded) ? $decoded : $contents;
        $code = is_array($body) && is_int($body['code'] ?? null) ? $body['code'] : 0;
        $message = is_array($body) && is_string($body['message'] ?? null) && $body['message'] !== ''
            ? $body['message']
            : ($response->getReasonPhrase() !== '' ? $response->getReasonPhrase() : 'HTTP '.$status);

        return new self($status, $body, $response, $message, $code);
    }

    /**
     * The HTTP status, such as `404`.
     */
    public function getStatusCode(): int
    {
        return $this->status;
    }

    /**
     * The decoded JSON body, or the raw text when it is not JSON.
     *
     * @return array<string, mixed>|string
     */
    public function getBody(): array|string
    {
        return $this->body;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
