<?php

declare(strict_types=1);

namespace IdealPostcodes\Resources;

use IdealPostcodes\Attributes\Endpoint;
use IdealPostcodes\Operation;
use IdealPostcodes\Params;
use IdealPostcodes\Responses\PhoneNumberResponse;
use IdealPostcodes\ValueObjects\Payload;

/**
 * @phpstan-import-type PhoneNumberValidationParams from Params
 * @phpstan-import-type PhoneNumberResponseArray from PhoneNumberResponse
 */
final class PhoneNumbers
{
    use Concerns\Transportable;

    /**
     * Whether a phone number is valid, with its national and international formats and carrier.
     *
     * @param  PhoneNumberValidationParams  $params  `current_carrier`
     */
    #[Endpoint(Operation::PhoneNumberValidation)]
    public function validate(string $phoneNumber, array $params = []): PhoneNumberResponse
    {
        /** @var PhoneNumberResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::PhoneNumberValidation, [], ['query' => $phoneNumber] + $params));

        return PhoneNumberResponse::from($data);
    }
}
