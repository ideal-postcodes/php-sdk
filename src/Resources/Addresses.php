<?php

declare(strict_types=1);

namespace IdealPostcodes\Resources;

use IdealPostcodes\Attributes\Endpoint;
use IdealPostcodes\Operation;
use IdealPostcodes\Params;
use IdealPostcodes\Responses\AddressResponse;
use IdealPostcodes\Responses\CleanseResponse;
use IdealPostcodes\ValueObjects\Payload;

/**
 * @phpstan-import-type AddressesParams from Params
 * @phpstan-import-type AddressCleanseParams from Params
 * @phpstan-import-type AddressCleanseBody from Params
 * @phpstan-import-type AddressResponseArray from AddressResponse
 * @phpstan-import-type CleanseResponseArray from CleanseResponse
 */
final class Addresses
{
    use Concerns\Transportable;

    /**
     * Addresses matching a free text query, such as `10 Downing Street`.
     * Leave `$query` null to look up by filter alone, such as
     * `search(params: ['uprn' => 50002012147])`.
     *
     * @param  AddressesParams  $params  `limit`, `page`, `filter`, biases and filters
     */
    #[Endpoint(Operation::Addresses)]
    public function search(?string $query = null, array $params = []): AddressResponse
    {
        /** @var AddressResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::Addresses, [], ['query' => $query] + $params));

        return AddressResponse::from($data);
    }

    /**
     * Match a messy address to the closest deliverable address, with match
     * indicators for each element.
     *
     * @param  AddressCleanseBody  $body  `query` plus optional `postcode`, `post_town` and other known elements
     * @param  AddressCleanseParams  $params  `context`
     */
    #[Endpoint(Operation::AddressCleanse)]
    public function cleanse(array $body, array $params = []): CleanseResponse
    {
        /** @var CleanseResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::AddressCleanse, [], $params, $body));

        return CleanseResponse::from($data);
    }
}
