<?php

declare(strict_types=1);

namespace IdealPostcodes\Resources;

use IdealPostcodes\Attributes\Endpoint;
use IdealPostcodes\Operation;
use IdealPostcodes\Params;
use IdealPostcodes\Responses\ApiKeyDetailsResponse;
use IdealPostcodes\Responses\ApiKeyResponse;
use IdealPostcodes\Responses\ApiKeyUsageResponse;
use IdealPostcodes\ValueObjects\Payload;

/**
 * @phpstan-import-type UpdateKeyDetailsBody from Params
 * @phpstan-import-type KeyUsageParams from Params
 * @phpstan-import-type KeyLogsParams from Params
 * @phpstan-import-type ApiKeyResponseArray from ApiKeyResponse
 * @phpstan-import-type ApiKeyDetailsResponseArray from ApiKeyDetailsResponse
 * @phpstan-import-type ApiKeyUsageResponseArray from ApiKeyUsageResponse
 */
final class Keys
{
    use Concerns\Transportable;

    /**
     * Whether a key can currently perform lookups, and its available contexts. Needs no credentials.
     */
    #[Endpoint(Operation::KeyAvailability)]
    public function availability(string $key): ApiKeyResponse
    {
        /** @var ApiKeyResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::KeyAvailability, ['key' => $key]));

        return ApiKeyResponse::from($data);
    }

    /**
     * A key's name, balance, limits, allowed URLs and datasets. Needs the Management Key.
     */
    #[Endpoint(Operation::KeyDetails)]
    public function details(string $key): ApiKeyDetailsResponse
    {
        /** @var ApiKeyDetailsResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::KeyDetails, ['key' => $key]));

        return ApiKeyDetailsResponse::from($data);
    }

    /**
     * Update a key's editable details. Needs the Management Key.
     *
     * @param  UpdateKeyDetailsBody  $body  the fields to change, such as `name`, `allowed_urls` or `daily_limit`
     */
    #[Endpoint(Operation::UpdateKeyDetails)]
    public function updateDetails(string $key, array $body): ApiKeyDetailsResponse
    {
        /** @var ApiKeyDetailsResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::UpdateKeyDetails, ['key' => $key], [], $body));

        return ApiKeyDetailsResponse::from($data);
    }

    /**
     * Paid lookups over a period, by day. Needs the Management Key.
     *
     * @param  KeyUsageParams  $params  `start`, `end`, `tags`, `licensee`
     */
    #[Endpoint(Operation::KeyUsage)]
    public function usage(string $key, array $params = []): ApiKeyUsageResponse
    {
        /** @var ApiKeyUsageResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::KeyUsage, ['key' => $key], $params));

        return ApiKeyUsageResponse::from($data);
    }

    /**
     * Lookup logs over a period as CSV text. Needs the Management Key.
     *
     * @param  KeyLogsParams  $params  `start`, `end`, `tags`, `licensee`
     */
    #[Endpoint(Operation::KeyLogs)]
    public function logs(string $key, array $params = []): string
    {
        return $this->transporter->requestContent(new Payload(Operation::KeyLogs, ['key' => $key], $params));
    }
}
