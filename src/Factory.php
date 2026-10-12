<?php

declare(strict_types=1);

namespace IdealPostcodes;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use IdealPostcodes\Transporters\HttpTransporter;
use IdealPostcodes\ValueObjects\BaseUri;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class Factory
{
    public const DEFAULT_BASE_URI = 'https://api.ideal-postcodes.co.uk/v1';

    private ?string $apiKey = null;

    private ?string $managementKey = null;

    private ?ClientInterface $httpClient = null;

    private ?RequestFactoryInterface $requestFactory = null;

    private ?StreamFactoryInterface $streamFactory = null;

    private ?string $baseUri = null;

    /**
     * @var array<string, string>
     */
    private array $headers = [];

    /**
     * The API key (`ak_…`) or licensee key (`sl_…`) sent with address operations.
     */
    public function withApiKey(string $apiKey): self
    {
        $this->apiKey = trim($apiKey);

        return $this;
    }

    /**
     * The Management Key (`uk_…`) sent with key, licensee and config operations.
     * Keep it on your server.
     */
    public function withManagementKey(?string $managementKey): self
    {
        $this->managementKey = $managementKey === null ? null : trim($managementKey);

        return $this;
    }

    /**
     * The PSR-18 client to send requests with. Found by discovery when not set.
     * Configure timeouts, proxies and retries on this client.
     */
    public function withHttpClient(ClientInterface $client): self
    {
        $this->httpClient = $client;

        return $this;
    }

    /**
     * The PSR-17 request factory. Found by discovery when not set.
     */
    public function withRequestFactory(RequestFactoryInterface $factory): self
    {
        $this->requestFactory = $factory;

        return $this;
    }

    /**
     * The PSR-17 stream factory for JSON request bodies. Found by discovery when not set.
     */
    public function withStreamFactory(StreamFactoryInterface $factory): self
    {
        $this->streamFactory = $factory;

        return $this;
    }

    /**
     * The API base URI. Defaults to `https://api.ideal-postcodes.co.uk/v1`.
     */
    public function withBaseUri(string $baseUri): self
    {
        $this->baseUri = $baseUri;

        return $this;
    }

    /**
     * A header sent with every request, such as a `User-Agent` naming your application.
     */
    public function withHttpHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;

        return $this;
    }

    public function make(): Client
    {
        $apiKey = $this->apiKey;

        if ($apiKey === null || $apiKey === '') {
            throw new \InvalidArgumentException('An API key is required. Pass it to IdealPostcodes::client() or Factory::withApiKey().');
        }

        $transporter = new HttpTransporter(
            client: $this->httpClient ?? Psr18ClientDiscovery::find(),
            requestFactory: $this->requestFactory ?? Psr17FactoryDiscovery::findRequestFactory(),
            streamFactory: $this->streamFactory ?? Psr17FactoryDiscovery::findStreamFactory(),
            baseUri: BaseUri::from($this->baseUri ?? self::DEFAULT_BASE_URI),
            credentials: new Credentials($apiKey, $this->managementKey),
            headers: $this->headers + ['User-Agent' => 'ideal-postcodes-php-sdk/'.IdealPostcodes::VERSION],
        );

        return new Client($transporter);
    }
}
