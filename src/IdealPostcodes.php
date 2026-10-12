<?php

declare(strict_types=1);

namespace IdealPostcodes;

final class IdealPostcodes
{
    /**
     * The SDK version, sent as the User-Agent.
     *
     * x-release-please-version
     */
    public const VERSION = '0.0.0';

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
