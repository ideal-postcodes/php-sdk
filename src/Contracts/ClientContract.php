<?php

declare(strict_types=1);

namespace IdealPostcodes\Contracts;

use IdealPostcodes\Params;
use IdealPostcodes\PostcodeLookup;

/**
 * @phpstan-import-type PostcodesParams from Params
 */
interface ClientContract extends OperationsContract
{
    /**
     * The addresses at a postcode, or the API's suggestions when it is not found.
     *
     * @param  PostcodesParams  $params
     */
    public function lookup(string $postcode, array $params = []): PostcodeLookup;
}
