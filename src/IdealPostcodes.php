<?php

declare(strict_types=1);

namespace IdealPostcodes;

final class IdealPostcodes
{
    /** The SDK version, sent as the User-Agent. */
    public const VERSION = '0.1.0'; // x-release-please-version

    /**
     * The SDK and PHP versions, as sent in the User-Agent.
     *
     * @internal
     */
    public static function userAgent(): string
    {
        return sprintf('ideal-postcodes-php-sdk/%s php/%d.%d.%d', self::VERSION, PHP_MAJOR_VERSION, PHP_MINOR_VERSION, PHP_RELEASE_VERSION);
    }

    /**
     * Create a client with an API key and, for account operations, a Management Key.
     */
    public static function client(string $apiKey, ?string $managementKey = null): Client
    {
        return self::factory()
            ->withApiKey($apiKey)
            ->withManagementKey($managementKey)
            ->make();
    }

    /**
     * Create a factory to configure a client: base URI, PSR-18 client, default headers.
     */
    public static function factory(): Factory
    {
        return new Factory();
    }
}
