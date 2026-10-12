<?php

declare(strict_types=1);

namespace IdealPostcodes;

use IdealPostcodes\Exceptions\MissingManagementKey;

/**
 * @internal
 */
final readonly class Credentials
{
    public function __construct(
        public string $apiKey,
        public ?string $managementKey = null,
    ) {}

    /**
     * The `Authorization` header value for an operation, or null when it needs none.
     *
     * The API accepts the key as `Authorization: api_key="…"` and the Management
     * Key as `Authorization: user_token="…"`. Sending each only to the
     * operations that declare it keeps the Management Key off address traffic.
     *
     * @throws MissingManagementKey when the operation needs a Management Key and none is set
     */
    public function authorization(Auth $auth): ?string
    {
        return match ($auth) {
            Auth::None => null,
            Auth::ApiKey => sprintf('api_key="%s"', $this->apiKey),
            Auth::ManagementKey => sprintf(
                'user_token="%s"',
                $this->managementKey ?? throw new MissingManagementKey(),
            ),
        };
    }
}
