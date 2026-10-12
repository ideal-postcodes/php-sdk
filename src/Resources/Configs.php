<?php

declare(strict_types=1);

namespace IdealPostcodes\Resources;

use IdealPostcodes\Attributes\Endpoint;
use IdealPostcodes\Operation;
use IdealPostcodes\Params;
use IdealPostcodes\Responses\ConfigResponse;
use IdealPostcodes\Responses\ConfigsResponse;
use IdealPostcodes\Responses\DeleteConfigResponse;
use IdealPostcodes\ValueObjects\Payload;

/**
 * Named configuration payloads stored against a key, such as a widget's
 * settings. Reading one needs no credentials; the rest need the Management Key.
 *
 * @phpstan-import-type CreateConfigBody from Params
 * @phpstan-import-type UpdateConfigBody from Params
 * @phpstan-import-type ConfigsResponseArray from ConfigsResponse
 * @phpstan-import-type ConfigResponseArray from ConfigResponse
 * @phpstan-import-type DeleteConfigResponseArray from DeleteConfigResponse
 */
final class Configs
{
    use Concerns\Transportable;

    #[Endpoint(Operation::ListConfigs)]
    public function list(string $key): ConfigsResponse
    {
        /** @var ConfigsResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::ListConfigs, ['key' => $key]));

        return ConfigsResponse::from($data);
    }

    /**
     * @param  CreateConfigBody  $body  `name` and the serialised `payload`
     */
    #[Endpoint(Operation::CreateConfig)]
    public function create(string $key, array $body): ConfigResponse
    {
        /** @var ConfigResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::CreateConfig, ['key' => $key], [], $body));

        return ConfigResponse::from($data);
    }

    /**
     * A config by name. Needs no credentials, so a browser can read widget settings with it.
     */
    #[Endpoint(Operation::RetrieveConfig)]
    public function retrieve(string $key, string $config): ConfigResponse
    {
        /** @var ConfigResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::RetrieveConfig, ['key' => $key, 'config' => $config]));

        return ConfigResponse::from($data);
    }

    /**
     * @param  UpdateConfigBody  $body  the new `payload`
     */
    #[Endpoint(Operation::UpdateConfig)]
    public function update(string $key, string $config, array $body): ConfigResponse
    {
        /** @var ConfigResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::UpdateConfig, ['key' => $key, 'config' => $config], [], $body));

        return ConfigResponse::from($data);
    }

    #[Endpoint(Operation::DeleteConfig)]
    public function delete(string $key, string $config): DeleteConfigResponse
    {
        /** @var DeleteConfigResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::DeleteConfig, ['key' => $key, 'config' => $config]));

        return DeleteConfigResponse::from($data);
    }
}
