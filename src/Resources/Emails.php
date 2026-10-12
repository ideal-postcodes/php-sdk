<?php

declare(strict_types=1);

namespace IdealPostcodes\Resources;

use IdealPostcodes\Attributes\Endpoint;
use IdealPostcodes\Operation;
use IdealPostcodes\Params;
use IdealPostcodes\Responses\EmailResponse;
use IdealPostcodes\ValueObjects\Payload;

/**
 * @phpstan-import-type EmailValidationParams from Params
 * @phpstan-import-type EmailResponseArray from EmailResponse
 */
final class Emails
{
    use Concerns\Transportable;

    /**
     * Whether an email address is deliverable, with suggestions for common typos.
     *
     * @param  EmailValidationParams  $params
     */
    #[Endpoint(Operation::EmailValidation)]
    public function validate(string $email, array $params = []): EmailResponse
    {
        /** @var EmailResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::EmailValidation, [], ['query' => $email] + $params));

        return EmailResponse::from($data);
    }
}
