<?php

declare(strict_types=1);

namespace IdealPostcodes\Contracts;

use IdealPostcodes\Resources\Addresses;
use IdealPostcodes\Resources\Autocomplete;
use IdealPostcodes\Resources\Configs;
use IdealPostcodes\Resources\Emails;
use IdealPostcodes\Resources\Keys;
use IdealPostcodes\Resources\Licensees;
use IdealPostcodes\Resources\PhoneNumbers;
use IdealPostcodes\Resources\Places;
use IdealPostcodes\Resources\Postcodes;

interface ClientContract
{
    public function postcodes(): Postcodes;

    public function addresses(): Addresses;

    public function autocomplete(): Autocomplete;

    public function places(): Places;

    public function emails(): Emails;

    public function phoneNumbers(): PhoneNumbers;

    public function keys(): Keys;

    public function licensees(): Licensees;

    public function configs(): Configs;
}
