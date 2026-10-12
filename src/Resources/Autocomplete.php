<?php

declare(strict_types=1);

namespace IdealPostcodes\Resources;

use IdealPostcodes\Attributes\Endpoint;
use IdealPostcodes\Operation;
use IdealPostcodes\Params;
use IdealPostcodes\Responses\AutocompleteResponse;
use IdealPostcodes\Responses\GbrResolveAddressResponse;
use IdealPostcodes\ValueObjects\Payload;

/**
 * @phpstan-import-type FindAddressParams from Params
 * @phpstan-import-type ResolveAddressParams from Params
 * @phpstan-import-type AutocompleteResponseArray from AutocompleteResponse
 * @phpstan-import-type GbrResolveAddressResponseArray from GbrResolveAddressResponse
 */
final class Autocomplete
{
    use Concerns\Transportable;

    /**
     * Address suggestions for a partial query, as the user types.
     *
     * @param  FindAddressParams  $params  `limit`, `context`, biases and filters
     */
    #[Endpoint(Operation::FindAddress)]
    public function find(string $query, array $params = []): AutocompleteResponse
    {
        /** @var AutocompleteResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::FindAddress, [], ['query' => $query] + $params));

        return AutocompleteResponse::from($data);
    }

    /**
     * The full address for a suggestion's `id`.
     *
     * @param  ResolveAddressParams  $params  `filter`, `tags`
     */
    #[Endpoint(Operation::ResolveAddress)]
    public function resolve(string $address, array $params = []): GbrResolveAddressResponse
    {
        /** @var GbrResolveAddressResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::ResolveAddress, ['address' => $address], $params));

        return GbrResolveAddressResponse::from($data);
    }
}
