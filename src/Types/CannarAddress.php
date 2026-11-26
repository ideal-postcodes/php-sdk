<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * Canada NAR Address
 *
 * A Canadian civic address from the National Address Register (NAR), published by Statistics Canada under the Statistics Canada Open Licence. Each address carries its civic number, street, municipality, province and postal code, a point coordinate, and its census subdivision, federal electoral district and economic region, in English and French. Statistics Canada publishes around 17.2 million addresses and refreshes them annually. 99.5% carry a full postal code and 95.7% carry a latitude and longitude.
 *
 * Conventions:
 *
 * - One record per address. `id` is `cannar_` followed by `addr_guid`, a pipe and the language code (`cannar_<addr_guid>|en`). The suffix selects the English or French form of the record, so preserve it verbatim when resolving an address.
 * - `language` is `en` or `fr`. The API derives it rather than reading it from the file: a French street type gives `fr`, and the types both languages share (`AV`, `PROM`, `ROUTE`, `RTE`) give `fr` in Quebec and New Brunswick and `en` elsewhere. An address appears under one language only. There is no paired English and French copy of the same record. The `csd_*`, `fed_*` and `er_*` name pairs are returned in both languages whatever the record's `language`.
 * - `line_1` is the number and street. A hyphen joins the apartment or suite number to the civic number (`306-1 Finch Bay`). A letter civic number suffix joins without a space (`5A`), a numeric one with a space (`1 1/2`). The street comes from the `mail_street_*` fields where `mail_street_name` is present and from the `official_street_*` fields otherwise. In English the street type follows the name (`Iron Horse Dr`), except `Route`, which precedes it. In French the type is lower cased and precedes the name (`rue d'Andermatt`).
 * - `line_2` carries the PO Box or Rural Route line from `bu_n_civic_add` (`PO Box 377`, `RR 4`). There is no third line. `address` is the number component of `line_1` on its own, apartment included (`5A`, `306-1`).
 * - The API title cases `mail_street_name`, `mail_street_type`, `mail_mun_name` and `official_street_type`. Every other text field is as Statistics Canada ships it, so `mail_prov_abvn`, `mail_postal_code`, `mail_street_dir` and `official_street_dir` stay upper case and the `csd_*`, `fed_*` and `er_*` names keep their supplied case.
 * - No field is null. A value absent upstream is an empty string `""`, including `latitude` and `longitude` where the location has no coordinate.
 * - `latitude` and `longitude` repeat `reppoint_latitude` and `reppoint_longitude`: the WGS84 representative point of the location record, shared by every address at the same `loc_guid`. `bg_x` and `bg_y` are the building's coordinates in EPSG:3347, returned as strings.
 *
 * @phpstan-type CannarAddressArray array{id: string, dataset: 'cannar', country: 'Canada', country_iso: 'CAN', country_iso_2: 'CA', language: 'en'|'fr', address: string, line_1: string, line_2: string, latitude: string|float|int, longitude: string|float|int, loc_guid: string, addr_guid: string, apt_no_label: string, civic_no: string, civic_no_suffix: string, official_street_name: string, official_street_type: string, official_street_dir: string, prov_code: string, csd_eng_name: string, csd_fre_name: string, csd_type_eng_code: string, csd_type_fre_code: string, mail_street_name: string, mail_street_type: string, mail_street_dir: string, mail_mun_name: string, mail_prov_abvn: string, mail_postal_code: string, bg_dls_lsd: string, bg_dls_qtr: string, bg_dls_sctn: string, bg_dls_twnshp: string, bg_dls_rng: string, bg_dls_mrd: string, bg_x: string, bg_y: string, bu_n_civic_add: string, bu_use: string, csd_code: string, fed_code: string, fed_eng_name: string, fed_fre_name: string, er_code: string, er_eng_name: string, er_fre_name: string, reppoint_latitude: string|float|int, reppoint_longitude: string|float|int}
 *
 * @implements ResponseContract<CannarAddressArray>
 */
final class CannarAddress implements ResponseContract
{
    /** @use ArrayAccessible<CannarAddressArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Globally unique internally generated identifier for an address
         */
        public readonly string $id,
        /**
         * @var 'cannar'
         */
        public readonly string $dataset,
        /**
         * Full country names (ISO 3166)
         *
         * @var 'Canada'
         */
        public readonly string $country,
        /**
         * 3 letter country code (ISO 3166-1)
         *
         * @var 'CAN'
         */
        public readonly string $countryIso,
        /**
         * 2 letter country code (ISO 3166-1)
         *
         * @var 'CA'
         */
        public readonly string $countryIso2,
        /**
         * Language represented by 2 letter ISO Code (639-1)
         *
         * @var 'en'|'fr'
         */
        public readonly string $language,
        /**
         * House number, prefixed with the apartment or suite number and a hyphen where one is present. E.g. `1425` or `10-123 1/2`.
         */
        public readonly string $address,
        /**
         * First address line. House number and street.
         */
        public readonly string $line1,
        /**
         * Second address line. Carries the PO Box or Rural Route delivery information where present.
         */
        public readonly string $line2,
        /**
         * The latitude of the address or postcode (WGS84).
         */
        public readonly string|float $latitude,
        /**
         * The longitude of the address or postcode (WGS84).
         */
        public readonly string|float $longitude,
        /**
         * Globally unique identifier for location.
         */
        public readonly string $locGuid,
        /**
         * Globally unique identifier for address.
         */
        public readonly string $addrGuid,
        /**
         * Apartment or suite number.
         */
        public readonly string $aptNoLabel,
        /**
         * The building number assigned to the address.
         */
        public readonly string $civicNo,
        /**
         * A suffix attached to the civic number. E.g. `A` or `1/2`.
         */
        public readonly string $civicNoSuffix,
        /**
         * Official street name.
         */
        public readonly string $officialStreetName,
        /**
         * Official street designator. E.g. `St`, `Ave`.
         */
        public readonly string $officialStreetType,
        /**
         * Official street direction. E.g. `N`, `SE`.
         */
        public readonly string $officialStreetDir,
        /**
         * Province code. E.g. `59` for British Columbia.
         */
        public readonly string $provCode,
        /**
         * Census subdivision English name.
         */
        public readonly string $csdEngName,
        /**
         * Census subdivision French name.
         */
        public readonly string $csdFreName,
        /**
         * English code indicating the type of Census Subdivision.
         */
        public readonly string $csdTypeEngCode,
        /**
         * French code indicating the type of Census Subdivision.
         */
        public readonly string $csdTypeFreCode,
        /**
         * Name of the street used in the mailing address.
         */
        public readonly string $mailStreetName,
        /**
         * Designator of the street used in the mailing address.
         */
        public readonly string $mailStreetType,
        /**
         * Direction of the street used in the mailing address.
         */
        public readonly string $mailStreetDir,
        /**
         * Municipality name used in the mailing address.
         */
        public readonly string $mailMunName,
        /**
         * Province abbreviation used in the mailing address.
         */
        public readonly string $mailProvAbvn,
        /**
         * Postal code used in the mailing address. Returned as supplied by the provider, without a space between the forward sortation area and local delivery unit.
         */
        public readonly string $mailPostalCode,
        /**
         * Legal Subdivision number within the Dominion Land Survey system for the address location.
         */
        public readonly string $bgDlsLsd,
        /**
         * Quarter section within a section of the Dominion Land Survey system for the address location.
         */
        public readonly string $bgDlsQtr,
        /**
         * Section number within a township of the Dominion Land Survey system for the address location.
         */
        public readonly string $bgDlsSctn,
        /**
         * Township number within the Dominion Land Survey system for the address location.
         */
        public readonly string $bgDlsTwnshp,
        /**
         * Range number within a meridian of the Dominion Land Survey system for the address location.
         */
        public readonly string $bgDlsRng,
        /**
         * Meridian number within the Dominion Land Survey system for the address location.
         */
        public readonly string $bgDlsMrd,
        /**
         * X coordinate of the building in the EPSG:3347 projected grid, in metres, returned as a string.
         */
        public readonly string $bgX,
        /**
         * Y coordinate of the building in the EPSG:3347 projected grid, in metres, returned as a string.
         */
        public readonly string $bgY,
        /**
         * Additional delivery information for the mailing address, such as a PO Box or Rural Route. Upper cased, with the first `BOX` token recased to `Box` (`PO Box 377`).
         */
        public readonly string $buNCivicAdd,
        /**
         * Building usage code.
         */
        public readonly string $buUse,
        /**
         * Unique identifier code for a Census Subdivision (CSD).
         */
        public readonly string $csdCode,
        /**
         * Unique identifier code for a federal electoral district.
         */
        public readonly string $fedCode,
        /**
         * Name of the federal electoral district in English.
         */
        public readonly string $fedEngName,
        /**
         * Name of the federal electoral district in French.
         */
        public readonly string $fedFreName,
        /**
         * Unique identifier code for an economic region.
         */
        public readonly string $erCode,
        /**
         * Name of the economic region in English.
         */
        public readonly string $erEngName,
        /**
         * Name of the economic region in French.
         */
        public readonly string $erFreName,
        /**
         * The latitude of the address or postcode (WGS84).
         */
        public readonly string|float $reppointLatitude,
        /**
         * The longitude of the address or postcode (WGS84).
         */
        public readonly string|float $reppointLongitude,
    ) {}

    /**
     * @param  CannarAddressArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'] ?? throw self::missing('id'),
            dataset: $attributes['dataset'] ?? throw self::missing('dataset'),
            country: $attributes['country'] ?? throw self::missing('country'),
            countryIso: $attributes['country_iso'] ?? throw self::missing('country_iso'),
            countryIso2: $attributes['country_iso_2'] ?? throw self::missing('country_iso_2'),
            language: $attributes['language'] ?? throw self::missing('language'),
            address: $attributes['address'] ?? throw self::missing('address'),
            line1: $attributes['line_1'] ?? throw self::missing('line_1'),
            line2: $attributes['line_2'] ?? throw self::missing('line_2'),
            latitude: $attributes['latitude'] ?? throw self::missing('latitude'),
            longitude: $attributes['longitude'] ?? throw self::missing('longitude'),
            locGuid: $attributes['loc_guid'] ?? throw self::missing('loc_guid'),
            addrGuid: $attributes['addr_guid'] ?? throw self::missing('addr_guid'),
            aptNoLabel: $attributes['apt_no_label'] ?? throw self::missing('apt_no_label'),
            civicNo: $attributes['civic_no'] ?? throw self::missing('civic_no'),
            civicNoSuffix: $attributes['civic_no_suffix'] ?? throw self::missing('civic_no_suffix'),
            officialStreetName: $attributes['official_street_name'] ?? throw self::missing('official_street_name'),
            officialStreetType: $attributes['official_street_type'] ?? throw self::missing('official_street_type'),
            officialStreetDir: $attributes['official_street_dir'] ?? throw self::missing('official_street_dir'),
            provCode: $attributes['prov_code'] ?? throw self::missing('prov_code'),
            csdEngName: $attributes['csd_eng_name'] ?? throw self::missing('csd_eng_name'),
            csdFreName: $attributes['csd_fre_name'] ?? throw self::missing('csd_fre_name'),
            csdTypeEngCode: $attributes['csd_type_eng_code'] ?? throw self::missing('csd_type_eng_code'),
            csdTypeFreCode: $attributes['csd_type_fre_code'] ?? throw self::missing('csd_type_fre_code'),
            mailStreetName: $attributes['mail_street_name'] ?? throw self::missing('mail_street_name'),
            mailStreetType: $attributes['mail_street_type'] ?? throw self::missing('mail_street_type'),
            mailStreetDir: $attributes['mail_street_dir'] ?? throw self::missing('mail_street_dir'),
            mailMunName: $attributes['mail_mun_name'] ?? throw self::missing('mail_mun_name'),
            mailProvAbvn: $attributes['mail_prov_abvn'] ?? throw self::missing('mail_prov_abvn'),
            mailPostalCode: $attributes['mail_postal_code'] ?? throw self::missing('mail_postal_code'),
            bgDlsLsd: $attributes['bg_dls_lsd'] ?? throw self::missing('bg_dls_lsd'),
            bgDlsQtr: $attributes['bg_dls_qtr'] ?? throw self::missing('bg_dls_qtr'),
            bgDlsSctn: $attributes['bg_dls_sctn'] ?? throw self::missing('bg_dls_sctn'),
            bgDlsTwnshp: $attributes['bg_dls_twnshp'] ?? throw self::missing('bg_dls_twnshp'),
            bgDlsRng: $attributes['bg_dls_rng'] ?? throw self::missing('bg_dls_rng'),
            bgDlsMrd: $attributes['bg_dls_mrd'] ?? throw self::missing('bg_dls_mrd'),
            bgX: $attributes['bg_x'] ?? throw self::missing('bg_x'),
            bgY: $attributes['bg_y'] ?? throw self::missing('bg_y'),
            buNCivicAdd: $attributes['bu_n_civic_add'] ?? throw self::missing('bu_n_civic_add'),
            buUse: $attributes['bu_use'] ?? throw self::missing('bu_use'),
            csdCode: $attributes['csd_code'] ?? throw self::missing('csd_code'),
            fedCode: $attributes['fed_code'] ?? throw self::missing('fed_code'),
            fedEngName: $attributes['fed_eng_name'] ?? throw self::missing('fed_eng_name'),
            fedFreName: $attributes['fed_fre_name'] ?? throw self::missing('fed_fre_name'),
            erCode: $attributes['er_code'] ?? throw self::missing('er_code'),
            erEngName: $attributes['er_eng_name'] ?? throw self::missing('er_eng_name'),
            erFreName: $attributes['er_fre_name'] ?? throw self::missing('er_fre_name'),
            reppointLatitude: $attributes['reppoint_latitude'] ?? throw self::missing('reppoint_latitude'),
            reppointLongitude: $attributes['reppoint_longitude'] ?? throw self::missing('reppoint_longitude'),
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'dataset' => $this->dataset,
            'country' => $this->country,
            'country_iso' => $this->countryIso,
            'country_iso_2' => $this->countryIso2,
            'language' => $this->language,
            'address' => $this->address,
            'line_1' => $this->line1,
            'line_2' => $this->line2,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'loc_guid' => $this->locGuid,
            'addr_guid' => $this->addrGuid,
            'apt_no_label' => $this->aptNoLabel,
            'civic_no' => $this->civicNo,
            'civic_no_suffix' => $this->civicNoSuffix,
            'official_street_name' => $this->officialStreetName,
            'official_street_type' => $this->officialStreetType,
            'official_street_dir' => $this->officialStreetDir,
            'prov_code' => $this->provCode,
            'csd_eng_name' => $this->csdEngName,
            'csd_fre_name' => $this->csdFreName,
            'csd_type_eng_code' => $this->csdTypeEngCode,
            'csd_type_fre_code' => $this->csdTypeFreCode,
            'mail_street_name' => $this->mailStreetName,
            'mail_street_type' => $this->mailStreetType,
            'mail_street_dir' => $this->mailStreetDir,
            'mail_mun_name' => $this->mailMunName,
            'mail_prov_abvn' => $this->mailProvAbvn,
            'mail_postal_code' => $this->mailPostalCode,
            'bg_dls_lsd' => $this->bgDlsLsd,
            'bg_dls_qtr' => $this->bgDlsQtr,
            'bg_dls_sctn' => $this->bgDlsSctn,
            'bg_dls_twnshp' => $this->bgDlsTwnshp,
            'bg_dls_rng' => $this->bgDlsRng,
            'bg_dls_mrd' => $this->bgDlsMrd,
            'bg_x' => $this->bgX,
            'bg_y' => $this->bgY,
            'bu_n_civic_add' => $this->buNCivicAdd,
            'bu_use' => $this->buUse,
            'csd_code' => $this->csdCode,
            'fed_code' => $this->fedCode,
            'fed_eng_name' => $this->fedEngName,
            'fed_fre_name' => $this->fedFreName,
            'er_code' => $this->erCode,
            'er_eng_name' => $this->erEngName,
            'er_fre_name' => $this->erFreName,
            'reppoint_latitude' => $this->reppointLatitude,
            'reppoint_longitude' => $this->reppointLongitude,
        ];
    }
}
