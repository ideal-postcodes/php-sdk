<?php

declare(strict_types=1);

namespace IdealPostcodes\ValueObjects;

use IdealPostcodes\Auth;
use IdealPostcodes\Credentials;
use IdealPostcodes\Operation;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * One call to one operation: path parameters, query parameters and an optional JSON body.
 *
 * @internal
 */
final readonly class Payload
{
    /**
     * @param  array<string, string|int>  $path
     * @param  array<string, mixed>  $query
     * @param  array<string, mixed>|null  $body
     */
    public function __construct(
        public Operation $operation,
        public array $path = [],
        public array $query = [],
        public ?array $body = null,
    ) {}

    /**
     * The operation path with its parameters filled in, such as `/postcodes/SW1A%202AA`.
     */
    public function uriPath(): string
    {
        $path = $this->operation->path();

        foreach ($this->path as $name => $value) {
            $path = str_replace('{'.$name.'}', rawurlencode((string) $value), $path);
        }

        return $path;
    }

    /**
     * Query parameters as the API reads them: nulls dropped, booleans as
     * `true`/`false`, lists comma-joined (the spec's `filter` and `tags` form).
     *
     * @return array<string, string>
     */
    public function queryParams(): array
    {
        $params = [];

        foreach ($this->query as $name => $value) {
            if ($value === null) {
                continue;
            }

            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            } elseif (is_array($value)) {
                $value = implode(',', array_map(static fn (mixed $item): string => self::stringify($item), $value));
            } else {
                $value = self::stringify($value);
            }

            $params[$name] = $value;
        }

        return $params;
    }

    /**
     * @param  array<string, string>  $headers
     */
    public function toRequest(
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory,
        BaseUri $baseUri,
        Credentials $credentials,
        array $headers,
    ): RequestInterface {
        $uri = $baseUri->withPath($this->uriPath());
        $query = $this->queryParams();

        if ($query !== []) {
            $uri .= '?'.http_build_query($query, '', '&', PHP_QUERY_RFC3986);
        }

        $request = $requestFactory->createRequest($this->operation->method(), $uri);

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        // A per-call `api_key` or `user_token` in the query takes the place of the header.
        $credentialInQuery = match ($this->operation->auth()) {
            Auth::ApiKey => isset($query['api_key']),
            Auth::ManagementKey => isset($query['user_token']),
            Auth::None => true,
        };

        if (! $credentialInQuery) {
            $authorization = $credentials->authorization($this->operation->auth());

            if ($authorization !== null) {
                $request = $request->withHeader('Authorization', $authorization);
            }
        }

        if ($this->body !== null) {
            $request = $request
                ->withHeader('Content-Type', 'application/json')
                ->withBody($streamFactory->createStream(json_encode($this->body, JSON_THROW_ON_ERROR)));
        }

        return $request;
    }

    private static function stringify(mixed $value): string
    {
        if ($value instanceof \BackedEnum) {
            return (string) $value->value;
        }

        if ($value instanceof \Stringable || is_scalar($value)) {
            return (string) $value;
        }

        throw new \InvalidArgumentException('Query parameters must be scalars, enums or lists of them.');
    }
}
