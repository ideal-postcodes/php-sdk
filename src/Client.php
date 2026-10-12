<?php

declare(strict_types=1);

namespace IdealPostcodes;

use IdealPostcodes\Contracts\ClientContract;
use IdealPostcodes\Contracts\TransporterContract;
use IdealPostcodes\Resources\Addresses;
use IdealPostcodes\Resources\Autocomplete;
use IdealPostcodes\Resources\Configs;
use IdealPostcodes\Resources\Emails;
use IdealPostcodes\Resources\Keys;
use IdealPostcodes\Resources\Licensees;
use IdealPostcodes\Resources\PhoneNumbers;
use IdealPostcodes\Resources\Places;
use IdealPostcodes\Resources\Postcodes;

final class Client implements ClientContract
{
    public function __construct(private readonly TransporterContract $transporter) {}

    /**
     * Addresses at a postcode.
     *
     * @see https://docs.ideal-postcodes.co.uk/docs/sdks/php/postcode-lookup
     */
    public function postcodes(): Postcodes
    {
        return new Postcodes($this->transporter);
    }

    /**
     * Address search and address cleanse.
     *
     * @see https://docs.ideal-postcodes.co.uk/docs/sdks/php/endpoints
     */
    public function addresses(): Addresses
    {
        return new Addresses($this->transporter);
    }

    /**
     * Address autocomplete: find suggestions, then resolve one to a full address.
     *
     * @see https://docs.ideal-postcodes.co.uk/docs/sdks/php/endpoints
     */
    public function autocomplete(): Autocomplete
    {
        return new Autocomplete($this->transporter);
    }

    /**
     * Place search: find suggestions, then resolve one to a full place.
     *
     * @see https://docs.ideal-postcodes.co.uk/docs/sdks/php/endpoints
     */
    public function places(): Places
    {
        return new Places($this->transporter);
    }

    /**
     * Email validation.
     *
     * @see https://docs.ideal-postcodes.co.uk/docs/sdks/php/endpoints
     */
    public function emails(): Emails
    {
        return new Emails($this->transporter);
    }

    /**
     * Phone number validation.
     *
     * @see https://docs.ideal-postcodes.co.uk/docs/sdks/php/endpoints
     */
    public function phoneNumbers(): PhoneNumbers
    {
        return new PhoneNumbers($this->transporter);
    }

    /**
     * API key availability, details, usage and logs.
     *
     * @see https://docs.ideal-postcodes.co.uk/docs/sdks/php/endpoints
     */
    public function keys(): Keys
    {
        return new Keys($this->transporter);
    }

    /**
     * Licensees of a sublicensed key.
     *
     * @see https://docs.ideal-postcodes.co.uk/docs/sdks/php/endpoints
     */
    public function licensees(): Licensees
    {
        return new Licensees($this->transporter);
    }

    /**
     * Named configuration payloads stored against a key.
     *
     * @see https://docs.ideal-postcodes.co.uk/docs/sdks/php/endpoints
     */
    public function configs(): Configs
    {
        return new Configs($this->transporter);
    }
}
