<?php

declare(strict_types=1);

namespace IdealPostcodes;

/**
 * The credential an operation declares in the OpenAPI spec.
 */
enum Auth
{
    /** Address, place, email and phone operations: the API key. */
    case ApiKey;

    /** Key, licensee and config management: the Management Key. */
    case ManagementKey;

    /** Public operations such as key availability. */
    case None;
}
