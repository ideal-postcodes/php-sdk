<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * AddressBase Core Address
 *
 * An address from Ordnance Survey's AddressBase Core, a flat cut of the approved addresses in Great Britain. Each record is one UPRN drawn from the local authority gazetteers: the National Land and Property Gazetteer for England and Wales, the One Scotland Address Gazetteer for Scotland. It carries the Royal Mail delivery point where one has been matched, property level coordinates, a classification (`classification_code`), the key identifiers (`uprn`, `parent_uprn`, `udprn`, `usrn`, `toid`), the contributing authority (`gss_code`), coordinate quality (`rpc`) and the change the latest supply applied (`change_code`). Ordnance Survey publishes around 35 million records and refreshes them weekly.
 *
 * How it differs from the neighbouring datasets:
 *
 * - **AddressBase Premium** (`abp`) is the full gazetteer: around 40 million UPRNs including historic and provisional records, the local authority address breakdown (`pao_*`, `sao_*`), lifecycle (`logical_status`, `blpu_state`), Welsh alternatives, the street record and cross references to the Valuation Office Agency and ONS, refreshed every six weeks. AddressBase Core carries none of these. Use it when one approved address per UPRN, with coordinates and a classification, is enough.
 * - **Royal Mail PAF** (`paf`) lists delivery points only, keyed by UDPRN. AddressBase Core keys on UPRN and also holds non-postal objects (substations, car parks, land parcels, parent shells) with no delivery point. On those records `udprn` is `0` and `delivery_point_suffix` is empty. Where a record matches PAF, `ab` renders the same `line_1` to `line_3` as `paf` for that UDPRN, bar a handful of records with a trailing range in the building name, which AddressBase Core keeps whole.
 * - The Ordnance Survey end of life notice for autumn 2027 covers AddressBase and AddressBase Plus, not AddressBase Core.
 *
 * @phpstan-type AbAddressArray array{id: string, country_iso: string, dataset: 'ab', language: 'en'|'ar'|'as'|'az'|'be'|'bg'|'bn'|'bs'|'ca'|'cs'|'cy'|'da'|'de'|'el'|'es'|'et'|'eu'|'fi'|'fo'|'fr'|'ga'|'gl'|'gn'|'he'|'hi'|'hr'|'hu'|'hy'|'id'|'is'|'it'|'ja'|'ka'|'kk'|'km'|'kn'|'ko'|'lt'|'lv'|'mk'|'mn'|'ms'|'mt'|'my'|'nl'|'no'|'pl'|'pt'|'rm'|'ro'|'ru'|'sk'|'sl'|'sq'|'sr'|'sv'|'ta'|'th'|'tr'|'uk'|'uz'|'vi'|'wa'|'zh', line_1: string, line_2: string, line_3: string, premise: string, uprn: string, udprn: int, parent_uprn: string, usrn: int, toid: string, classification_code: string, eastings: float|int, northings: float|int, latitude: float|int, longitude: float|int, single_address_line: string, street_name: string, locality: string, town_name: string, delivery_point_suffix: string, post_town: string, gss_code: string, rpc: int, last_update_date: string, island: string, change_code: 'I'|'U'|'D', building_name: string, building_number: string, sub_building: string, postcode: string, po_box: string, organisation: string, country: string, county: string, district: string, ward: string, traditional_county: string, administrative_county: string, postal_county: string}
 *
 * @implements ResponseContract<AbAddressArray>
 */
final class AbAddress implements ResponseContract
{
    /** @use ArrayAccessible<AbAddressArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Globally unique internally generated identifier for an address
         */
        public readonly string $id,
        /**
         * 3 letter country code (ISO 3166-1)
         */
        public readonly string $countryIso,
        /**
         * Indicates the provenance of an address
         *
         * @var 'ab'
         */
        public readonly string $dataset,
        /**
         * Language represented by 2 letter ISO Code (639-1)
         *
         * @var 'en'|'ar'|'as'|'az'|'be'|'bg'|'bn'|'bs'|'ca'|'cs'|'cy'|'da'|'de'|'el'|'es'|'et'|'eu'|'fi'|'fo'|'fr'|'ga'|'gl'|'gn'|'he'|'hi'|'hr'|'hu'|'hy'|'id'|'is'|'it'|'ja'|'ka'|'kk'|'km'|'kn'|'ko'|'lt'|'lv'|'mk'|'mn'|'ms'|'mt'|'my'|'nl'|'no'|'pl'|'pt'|'rm'|'ro'|'ru'|'sk'|'sl'|'sq'|'sr'|'sv'|'ta'|'th'|'tr'|'uk'|'uz'|'vi'|'wa'|'zh'
         */
        public readonly string $language,
        /**
         * First Address Line. Often contains premise and thoroughfare information. In the case of a commercial premise, the first line is always the full name of the registered organisation. Never empty.
         */
        public readonly string $line1,
        /**
         * Second Address Line. Often contains thoroughfare and locality information. May be empty
         */
        public readonly string $line2,
        /**
         * Third address line. Takes the address elements left after `line_1` and `line_2` are filled; where the address needs more than three lines the remaining elements are joined into `line_3`, comma separated. May be empty.
         */
        public readonly string $line3,
        /**
         * A pre-computed string which sensibly combines the building name, sub-building and building number fields into a single, simple premise string. Ideal if you want to pull premise information and thoroughfare information separately instead of using the address lines.
         */
        public readonly string $premise,
        /**
         * Unique Property Reference Number (UPRN) assigned by the LLPG Custodian or Ordnance Survey.
         */
        public readonly string $uprn,
        /**
         * Royal Mail's Unique Delivery Point Reference Number (UDPRN). `0` where the record has no matching PAF delivery point.
         */
        public readonly int $udprn,
        /**
         * UPRN of the parent record where a parent-child relationship exists. Empty where the record has no parent.
         */
        public readonly string $parentUprn,
        /**
         * Unique Street Reference Number assigned by the Street Name and Numbering Custodian or by Ordnance Survey, depending on the address record.
         */
        public readonly int $usrn,
        /**
         * The Topographic Identifier taken from OS MasterMap Topography Layer. This TOID is assigned to the UPRN by performing a spatial intersection between the two identifiers. It consists of the letters 'osgb' followed by up to sixteen digits. May be empty.
         */
        public readonly string $toid,
        /**
         * A code that describes the classification of the address record to a maximum of a secondary level. The first letter is the primary class (e.g. `R` residential, `C` commercial, `L` land), the second the secondary class (e.g. `RD` dwelling).
         */
        public readonly string $classificationCode,
        /**
         * A value in metres defining the x location in accordance with the British National Grid.
         */
        public readonly float $eastings,
        /**
         * A value in metres defining the y location in accordance with the British National Grid.
         */
        public readonly float $northings,
        /**
         * A value defining the Latitude location in accordance with the ETRS89 coordinate reference system.
         */
        public readonly float $latitude,
        /**
         * A value defining the Longitude location in accordance with the ETRS89 coordinate reference system.
         */
        public readonly float $longitude,
        /**
         * A single attribute containing text concatenation of the address elements separated by a comma.
         */
        public readonly string $singleAddressLine,
        /**
         * Street / Road name for the address record.
         */
        public readonly string $streetName,
        /**
         * A locality defines an area or geographical identifier within a town, village or hamlet. Locality represents the lower level geographical area. The locality field should be used in conjunction with the town name and street description fields to uniquely identify geographic area where there may be more than one within an administrative area.
         */
        public readonly string $locality,
        /**
         * Geographical town name assigned by the Local Authority. Note this can differ from the post town assigned by Royal Mail.
         */
        public readonly string $townName,
        /**
         * A two-character code uniquely identifying an individual delivery point within a postcode, assigned by Royal Mail. May be empty.
         */
        public readonly string $deliveryPointSuffix,
        /**
         * The town or city in which the Royal Mail sorting office servicing this address record is located.
         */
        public readonly string $postTown,
        /**
         * The Office for National Statistics Governmental Statistical Service (GSS) code representing the contributing Local Authority.
         */
        public readonly string $gssCode,
        /**
         * Representative Point Code describes the accuracy of the coordinate that has been allocated to the UPRN as indicated by the Local Authority and enhanced using large scale OS data.
         */
        public readonly int $rpc,
        /**
         * The latest date on which any of the attributes on this record were last changed.
         */
        public readonly string $lastUpdateDate,
        /**
         * Third level of geographic area name to record island names where appropriate. May be empty.
         */
        public readonly string $island,
        /**
         * The type of change last applied to the record. `I` insert, `U` update, `D` delete.
         *
         * @var 'I'|'U'|'D'
         */
        public readonly string $changeCode,
        /**
         * The building name is a description applied to a single address or a group of addresses. May be empty.
         */
        public readonly string $buildingName,
        /**
         * The building number is a number or range of numbers given to a single address or a group of addresses. May be empty.
         */
        public readonly string $buildingNumber,
        /**
         * The sub-building name and/or number for the address record. May be empty.
         */
        public readonly string $subBuilding,
        /**
         * A postcode assigned by Royal Mail for the address record.
         */
        public readonly string $postcode,
        /**
         * Text concatenation of 'PO BOX' and the Post Office Box (PO Box) number or 'BFPO' and the British Forces Post Office number. May be empty.
         */
        public readonly string $poBox,
        /**
         * The organisation name is the business name given, when appropriate, to an address record. May be empty.
         */
        public readonly string $organisation,
        /**
         * Full country names (ISO 3166)
         */
        public readonly string $country,
        /**
         * Since postal, administrative or traditional counties may not apply to some addresses, the county field is designed to return whatever county data is available. Normally, the postal county is returned. If this is not present, the county field will fall back to the administrative county. If the administrative county is also not present, the county field will fall back to the traditional county. May be empty in cases where no administrative, postal or traditional county present.
         */
        public readonly string $county,
        /**
         * The current district/unitary authority to which the postcode has been assigned.
         */
        public readonly string $district,
        /**
         * The current administrative/electoral area to which the postcode has been assigned. May be empty for a small number of addresses.
         */
        public readonly string $ward,
        /**
         * Traditional counties are provided by the Association of British Counties. It is historical data, and can date from the 1800s. May be empty.
         */
        public readonly string $traditionalCounty,
        /**
         * The current administrative county to which the postcode has been assigned.
         */
        public readonly string $administrativeCounty,
        /**
         * Postal counties were used for the distribution of mail before the Postcode system was introduced in the 1970s. The Former Postal County was the Administrative County at the time. This data rarely changes. May be empty.
         */
        public readonly string $postalCounty,
    ) {}

    /**
     * @param  AbAddressArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'] ?? throw self::missing('id'),
            countryIso: $attributes['country_iso'] ?? throw self::missing('country_iso'),
            dataset: $attributes['dataset'] ?? throw self::missing('dataset'),
            language: $attributes['language'] ?? throw self::missing('language'),
            line1: $attributes['line_1'] ?? throw self::missing('line_1'),
            line2: $attributes['line_2'] ?? throw self::missing('line_2'),
            line3: $attributes['line_3'] ?? throw self::missing('line_3'),
            premise: $attributes['premise'] ?? throw self::missing('premise'),
            uprn: $attributes['uprn'] ?? throw self::missing('uprn'),
            udprn: $attributes['udprn'] ?? throw self::missing('udprn'),
            parentUprn: $attributes['parent_uprn'] ?? throw self::missing('parent_uprn'),
            usrn: $attributes['usrn'] ?? throw self::missing('usrn'),
            toid: $attributes['toid'] ?? throw self::missing('toid'),
            classificationCode: $attributes['classification_code'] ?? throw self::missing('classification_code'),
            eastings: $attributes['eastings'] ?? throw self::missing('eastings'),
            northings: $attributes['northings'] ?? throw self::missing('northings'),
            latitude: $attributes['latitude'] ?? throw self::missing('latitude'),
            longitude: $attributes['longitude'] ?? throw self::missing('longitude'),
            singleAddressLine: $attributes['single_address_line'] ?? throw self::missing('single_address_line'),
            streetName: $attributes['street_name'] ?? throw self::missing('street_name'),
            locality: $attributes['locality'] ?? throw self::missing('locality'),
            townName: $attributes['town_name'] ?? throw self::missing('town_name'),
            deliveryPointSuffix: $attributes['delivery_point_suffix'] ?? throw self::missing('delivery_point_suffix'),
            postTown: $attributes['post_town'] ?? throw self::missing('post_town'),
            gssCode: $attributes['gss_code'] ?? throw self::missing('gss_code'),
            rpc: $attributes['rpc'] ?? throw self::missing('rpc'),
            lastUpdateDate: $attributes['last_update_date'] ?? throw self::missing('last_update_date'),
            island: $attributes['island'] ?? throw self::missing('island'),
            changeCode: $attributes['change_code'] ?? throw self::missing('change_code'),
            buildingName: $attributes['building_name'] ?? throw self::missing('building_name'),
            buildingNumber: $attributes['building_number'] ?? throw self::missing('building_number'),
            subBuilding: $attributes['sub_building'] ?? throw self::missing('sub_building'),
            postcode: $attributes['postcode'] ?? throw self::missing('postcode'),
            poBox: $attributes['po_box'] ?? throw self::missing('po_box'),
            organisation: $attributes['organisation'] ?? throw self::missing('organisation'),
            country: $attributes['country'] ?? throw self::missing('country'),
            county: $attributes['county'] ?? throw self::missing('county'),
            district: $attributes['district'] ?? throw self::missing('district'),
            ward: $attributes['ward'] ?? throw self::missing('ward'),
            traditionalCounty: $attributes['traditional_county'] ?? throw self::missing('traditional_county'),
            administrativeCounty: $attributes['administrative_county'] ?? throw self::missing('administrative_county'),
            postalCounty: $attributes['postal_county'] ?? throw self::missing('postal_county'),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'country_iso' => $this->countryIso,
            'dataset' => $this->dataset,
            'language' => $this->language,
            'line_1' => $this->line1,
            'line_2' => $this->line2,
            'line_3' => $this->line3,
            'premise' => $this->premise,
            'uprn' => $this->uprn,
            'udprn' => $this->udprn,
            'parent_uprn' => $this->parentUprn,
            'usrn' => $this->usrn,
            'toid' => $this->toid,
            'classification_code' => $this->classificationCode,
            'eastings' => $this->eastings,
            'northings' => $this->northings,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'single_address_line' => $this->singleAddressLine,
            'street_name' => $this->streetName,
            'locality' => $this->locality,
            'town_name' => $this->townName,
            'delivery_point_suffix' => $this->deliveryPointSuffix,
            'post_town' => $this->postTown,
            'gss_code' => $this->gssCode,
            'rpc' => $this->rpc,
            'last_update_date' => $this->lastUpdateDate,
            'island' => $this->island,
            'change_code' => $this->changeCode,
            'building_name' => $this->buildingName,
            'building_number' => $this->buildingNumber,
            'sub_building' => $this->subBuilding,
            'postcode' => $this->postcode,
            'po_box' => $this->poBox,
            'organisation' => $this->organisation,
            'country' => $this->country,
            'county' => $this->county,
            'district' => $this->district,
            'ward' => $this->ward,
            'traditional_county' => $this->traditionalCounty,
            'administrative_county' => $this->administrativeCounty,
            'postal_county' => $this->postalCounty,
        ];
    }
}
