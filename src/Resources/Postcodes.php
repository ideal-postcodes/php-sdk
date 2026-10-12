<?php

declare(strict_types=1);

namespace IdealPostcodes\Resources;

use IdealPostcodes\Attributes\Endpoint;
use IdealPostcodes\Exceptions\ApiException;
use IdealPostcodes\Operation;
use IdealPostcodes\Params;
use IdealPostcodes\Responses\PostcodeLookup;
use IdealPostcodes\Responses\PostcodeResponse;
use IdealPostcodes\ValueObjects\Payload;

/**
 * @phpstan-import-type PostcodesParams from Params
 * @phpstan-import-type PostcodeResponseArray from PostcodeResponse
 */
final class Postcodes
{
    use Concerns\Transportable;

    /**
     * The addresses at a postcode. Throws `ApiException` with code `4040`
     * when the postcode is not found; `lookup()` returns the API's
     * suggestions instead.
     *
     * @param  PostcodesParams  $params  `filter`, `page`, `tags`, `dataset`, `context`
     */
    #[Endpoint(Operation::Postcodes)]
    public function retrieve(string $postcode, array $params = []): PostcodeResponse
    {
        /** @var PostcodeResponseArray $data */
        $data = $this->transporter->requestObject(new Payload(Operation::Postcodes, ['postcode' => $postcode], $params));

        return PostcodeResponse::from($data);
    }

    /**
     * The addresses at a postcode. An unknown postcode returns no addresses
     * and the API's closest matching postcodes instead of throwing. Other
     * errors still throw.
     *
     * @param  PostcodesParams  $params
     */
    public function lookup(string $postcode, array $params = []): PostcodeLookup
    {
        try {
            return PostcodeLookup::found($this->retrieve($postcode, $params));
        } catch (ApiException $exception) {
            if ($exception->getCode() !== 4040) {
                throw $exception;
            }

            return PostcodeLookup::notFound($exception);
        }
    }
}
