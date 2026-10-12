<?php

declare(strict_types=1);

namespace IdealPostcodes\Exceptions;

use Throwable;

/**
 * Every exception the SDK throws implements this, so one catch covers them all.
 */
interface IdealPostcodesException extends Throwable {}
