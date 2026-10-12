<?php

declare(strict_types=1);

namespace IdealPostcodes\ValueObjects;

/**
 * @internal
 */
final readonly class BaseUri
{
    private function __construct(private string $uri) {}

    /**
     * Accepts `https://api.ideal-postcodes.co.uk/v1`, with or without the scheme or a trailing slash.
     */
    public static function from(string $uri): self
    {
        $uri = rtrim(trim($uri), '/');

        if (! str_contains($uri, '://')) {
            $uri = 'https://'.$uri;
        }

        return new self($uri);
    }

    public function withPath(string $path): string
    {
        return $this->uri.'/'.ltrim($path, '/');
    }

    public function toString(): string
    {
        return $this->uri;
    }
}
