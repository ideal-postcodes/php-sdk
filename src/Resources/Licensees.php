<?php

declare(strict_types=1);

namespace IdealPostcodes\Resources;

use IdealPostcodes\Attributes\Endpoint;
use IdealPostcodes\Operation;
use IdealPostcodes\Params;
use IdealPostcodes\Responses\DeleteLicenseeResponse;
use IdealPostcodes\Responses\LicenseeResponse;
use IdealPostcodes\Responses\LicenseesResponse;
use IdealPostcodes\ValueObjects\Payload;

/**
 * Licensees of a sublicensed key. Every operation needs the Management Key.
 *
 * @phpstan-import-type ListLicenseesParams from Params
 * @phpstan-import-type CreateLicenseeBody from Params
 * @phpstan-import-type UpdateLicenseeBody from Params
 * @phpstan-import-type LicenseesResponseArray from LicenseesResponse
 * @phpstan-import-type LicenseeResponseArray from LicenseeResponse
 * @phpstan-import-type DeleteLicenseeResponseArray from DeleteLicenseeResponse
 */
final class Licensees
{
    use Concerns\Transportable;

    /**
     * Licensees of a key, paginated with `starting_after` and `limit`.
     *
     * @param  ListLicenseesParams  $params  `starting_after`, `limit`, `query`
     */
    #[Endpoint(Operation::ListLicensees)]
    public function list(string $key, array $params = []): LicenseesResponse
    {
        /** @var LicenseesResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::ListLicensees, ['key' => $key], $params));

        return LicenseesResponse::from($data);
    }

    /**
     * Create a licensee. The response carries its `sl_` key.
     *
     * @param  CreateLicenseeBody  $body  `name`, `address`, `postcode`, `whitelist`, `daily`
     */
    #[Endpoint(Operation::CreateLicensee)]
    public function create(string $key, array $body): LicenseeResponse
    {
        /** @var LicenseeResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::CreateLicensee, ['key' => $key], [], $body));

        return LicenseeResponse::from($data);
    }

    #[Endpoint(Operation::RetrieveLicensee)]
    public function retrieve(string $key, string $licensee): LicenseeResponse
    {
        /** @var LicenseeResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::RetrieveLicensee, ['key' => $key, 'licensee' => $licensee]));

        return LicenseeResponse::from($data);
    }

    /**
     * @param  UpdateLicenseeBody  $body  the fields to change
     */
    #[Endpoint(Operation::UpdateLicensee)]
    public function update(string $key, string $licensee, array $body): LicenseeResponse
    {
        /** @var LicenseeResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::UpdateLicensee, ['key' => $key, 'licensee' => $licensee], [], $body));

        return LicenseeResponse::from($data);
    }

    /**
     * Cancel a licensee. Its key stops working.
     */
    #[Endpoint(Operation::DeleteLicensee)]
    public function delete(string $key, string $licensee): DeleteLicenseeResponse
    {
        /** @var DeleteLicenseeResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::DeleteLicensee, ['key' => $key, 'licensee' => $licensee]));

        return DeleteLicenseeResponse::from($data);
    }

    /**
     * Issue the licensee a new `sl_` key. The old key stops working.
     */
    #[Endpoint(Operation::RegenerateLicenseeKey)]
    public function regenerateKey(string $key, string $licensee): LicenseeResponse
    {
        /** @var LicenseeResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::RegenerateLicenseeKey, ['key' => $key, 'licensee' => $licensee]));

        return LicenseeResponse::from($data);
    }
}
