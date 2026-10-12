<?php

declare(strict_types=1);

namespace IdealPostcodes\Resources;

use IdealPostcodes\Attributes\Endpoint;
use IdealPostcodes\Operation;
use IdealPostcodes\Params;
use IdealPostcodes\Responses\PlaceResponse;
use IdealPostcodes\Responses\ResolvePlaceResponse;
use IdealPostcodes\ValueObjects\Payload;

/**
 * @phpstan-import-type FindPlaceParams from Params
 * @phpstan-import-type ResolvePlaceParams from Params
 * @phpstan-import-type PlaceResponseArray from PlaceResponse
 * @phpstan-import-type ResolvePlaceResponseArray from ResolvePlaceResponse
 */
final class Places
{
    use Concerns\Transportable;

    /**
     * Place suggestions for a partial query: towns, regions and other administrative areas.
     *
     * @param  FindPlaceParams  $params  `limit`, `context`, biases and filters
     */
    #[Endpoint(Operation::FindPlace)]
    public function find(string $query, array $params = []): PlaceResponse
    {
        /** @var PlaceResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::FindPlace, [], ['query' => $query] + $params));

        return PlaceResponse::from($data);
    }

    /**
     * The full place for a suggestion's `id`.
     *
     * @param  ResolvePlaceParams  $params
     */
    #[Endpoint(Operation::ResolvePlace)]
    public function resolve(string $place, array $params = []): ResolvePlaceResponse
    {
        /** @var ResolvePlaceResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::ResolvePlace, ['place' => $place], $params));

        return ResolvePlaceResponse::from($data);
    }
}
