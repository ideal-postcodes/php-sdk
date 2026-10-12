<?php

declare(strict_types=1);

namespace IdealPostcodes\Attributes;

use Attribute;
use IdealPostcodes\Operation;

/**
 * Marks the resource method that implements one spec operation. The
 * inventory test and the docs generator read it, so every operation has
 * exactly one method and every method has a page.
 */
#[Attribute(Attribute::TARGET_METHOD)]
final readonly class Endpoint
{
    public function __construct(public Operation $operation) {}
}
