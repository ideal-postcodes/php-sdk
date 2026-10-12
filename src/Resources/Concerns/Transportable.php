<?php

declare(strict_types=1);

namespace IdealPostcodes\Resources\Concerns;

use IdealPostcodes\Contracts\TransporterContract;

/**
 * @internal
 */
trait Transportable
{
    public function __construct(private readonly TransporterContract $transporter) {}
}
