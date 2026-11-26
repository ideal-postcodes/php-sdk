<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * Switzerland and Liechtenstein Address
 *
 * An address in the Swisstopo dataset, which covers Switzerland and Liechtenstein.
 *
 * Fields are grouped by the upstream Swisstopo product they come from: the building address directory (`gebaeudeadressverzeichnis`), the street directory (`strassenverzeichnis`) and the official directory of towns and cities (`amtovz`).
 *
 * Records marked as multilingual upstream are split into one address per street name, so `language` identifies the language of the street name.
 *
 * @phpstan-type SwtAddressArray array{id: string, dataset: 'swt', country: 'Switzerland'|'Liechtenstein', country_iso: 'CHE'|'LIE', country_iso_2: 'CH'|'LI', language: 'de'|'fr'|'it'|'rm', canton: string, address: string, line_1: string, line_2: string, latitude: string|float|int, longitude: string|float|int, adr_egaid: int, str_esid: int, bdg_egid: int, adr_edid: int, stn_label: string, adr_number: string, bdg_category: string, bdg_name: string, zip_label: string, com_fosnr: int, com_name: string, com_canton: string, adr_status: string, adr_official: bool, adr_modified: string, adr_easting: string, adr_northing: string, str_type: string, str_status: string, str_official: bool, str_modified: string, str_easting: string, str_northing: string, ortschaftsname: string, plz4: string, zusatzziffer: string|null, zip_id: int|null, gemeindename: string|null, bfs_nr: int|null, kantonskürzel: string, sprache: string|null, validity: string|null}
 *
 * @implements ResponseContract<SwtAddressArray>
 */
final class SwtAddress implements ResponseContract
{
    /** @use ArrayAccessible<SwtAddressArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Globally unique internally generated identifier for an address
         */
        public readonly string $id,
        /**
         * @var 'swt'
         */
        public readonly string $dataset,
        /**
         * Full country names (ISO 3166)
         *
         * @var 'Switzerland'|'Liechtenstein'
         */
        public readonly string $country,
        /**
         * 3 letter country code (ISO 3166-1)
         *
         * @var 'CHE'|'LIE'
         */
        public readonly string $countryIso,
        /**
         * 2 letter country code (ISO 3166-1)
         *
         * @var 'CH'|'LI'
         */
        public readonly string $countryIso2,
        /**
         * Language represented by 2 letter ISO Code (639-1)
         *
         * @var 'de'|'fr'|'it'|'rm'
         */
        public readonly string $language,
        /**
         * Canton name, in the language of the address (e.g. `"Basel-Stadt"`, `"Grigioni"`, `"Grischun"`). For Liechtenstein addresses this is the district.
         */
        public readonly string $canton,
        /**
         * House number. Same value as `adr_number`.
         */
        public readonly string $address,
        /**
         * First address line. The building name where present, otherwise the street name and house number.
         */
        public readonly string $line1,
        /**
         * Second address line. The street name and house number where `line_1` holds a building name.
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
         * Federal building address identifier (Eidgenössischer Gebäudeadressidentifikator).
         */
        public readonly int $adrEgaid,
        /**
         * Federal street identifier (Eidgenössischer Strassenidentifikator). Joins the address to the street directory.
         */
        public readonly int $strEsid,
        /**
         * Federal building identifier (Eidgenössischer Gebäudeidentifikator).
         */
        public readonly int $bdgEgid,
        /**
         * Entrance identifier within the building.
         */
        public readonly int $adrEdid,
        /**
         * Street name label. For French and Italian addresses the leading street type is lowercased (e.g. `"rue de la Gare"`).
         */
        public readonly string $stnLabel,
        /**
         * House/address number (e.g. `"12"`, `"12A"`).
         */
        public readonly string $adrNumber,
        /**
         * Building category from the Federal Building and Dwelling Register (GWR), e.g. `"residential"`, `"non_residential"`.
         */
        public readonly string $bdgCategory,
        /**
         * Building name.
         */
        public readonly string $bdgName,
        /**
         * Postal code and locality label (e.g. `"8001 Zürich"`).
         */
        public readonly string $zipLabel,
        /**
         * Federal municipality number assigned by the Federal Statistical Office (FSO/BFS).
         */
        public readonly int $comFosnr,
        /**
         * Municipality name.
         */
        public readonly string $comName,
        /**
         * Canton abbreviation (e.g. `"ZH"`, `"BE"`).
         */
        public readonly string $comCanton,
        /**
         * Address status from the GWR, e.g. `"real"`, `"projected"`.
         */
        public readonly string $adrStatus,
        /**
         * Whether the address is an official address.
         */
        public readonly bool $adrOfficial,
        /**
         * Date the address record was last modified, formatted `DD.MM.YYYY`.
         */
        public readonly string $adrModified,
        /**
         * Easting coordinate of the address in the Swiss coordinate system CH1903+/LV95 (EPSG:2056), in metres.
         */
        public readonly string $adrEasting,
        /**
         * Northing coordinate of the address in the Swiss coordinate system CH1903+/LV95 (EPSG:2056), in metres.
         */
        public readonly string $adrNorthing,
        /**
         * Street type, e.g. `"Street"`, `"Area"`.
         */
        public readonly string $strType,
        /**
         * Street status, e.g. `"real"`, `"projected"`.
         */
        public readonly string $strStatus,
        /**
         * Whether the street name is official.
         */
        public readonly bool $strOfficial,
        /**
         * Date the street record was last modified, formatted `DD.MM.YYYY`.
         */
        public readonly string $strModified,
        /**
         * Easting coordinate of the street centroid in the Swiss coordinate system CH1903+/LV95 (EPSG:2056), in metres.
         */
        public readonly string $strEasting,
        /**
         * Northing coordinate of the street centroid in the Swiss coordinate system CH1903+/LV95 (EPSG:2056), in metres.
         */
        public readonly string $strNorthing,
        /**
         * Locality name from the Official Directory of Towns and Cities (Amtliches Ortschaftenverzeichnis).
         */
        public readonly string $ortschaftsname,
        /**
         * 4-digit Swiss postal code, zero padded.
         */
        public readonly string $plz4,
        /**
         * 2-digit supplementary code distinguishing localities that share a 4-digit postal code.
         */
        public readonly ?string $zusatzziffer,
        /**
         * Unique identifier for the postal code record.
         */
        public readonly ?int $zipId,
        /**
         * Municipality name (Gemeindename) from the locality directory.
         */
        public readonly ?string $gemeindename,
        /**
         * Federal municipality number assigned by the Federal Statistical Office (BFS-Nr).
         */
        public readonly ?int $bfsNr,
        /**
         * Canton abbreviation from the locality directory (e.g. `"ZH"`, `"GE"`).
         */
        public readonly string $kantonskürzel,
        /**
         * Language of the address, mirroring `language`.
         */
        public readonly ?string $sprache,
        /**
         * Date the postal code record became valid, formatted `YYYY-MM-DD`.
         */
        public readonly ?string $validity,
    ) {}

    /**
     * @param  SwtAddressArray  $attributes
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
            canton: $attributes['canton'] ?? throw self::missing('canton'),
            address: $attributes['address'] ?? throw self::missing('address'),
            line1: $attributes['line_1'] ?? throw self::missing('line_1'),
            line2: $attributes['line_2'] ?? throw self::missing('line_2'),
            latitude: $attributes['latitude'] ?? throw self::missing('latitude'),
            longitude: $attributes['longitude'] ?? throw self::missing('longitude'),
            adrEgaid: $attributes['adr_egaid'] ?? throw self::missing('adr_egaid'),
            strEsid: $attributes['str_esid'] ?? throw self::missing('str_esid'),
            bdgEgid: $attributes['bdg_egid'] ?? throw self::missing('bdg_egid'),
            adrEdid: $attributes['adr_edid'] ?? throw self::missing('adr_edid'),
            stnLabel: $attributes['stn_label'] ?? throw self::missing('stn_label'),
            adrNumber: $attributes['adr_number'] ?? throw self::missing('adr_number'),
            bdgCategory: $attributes['bdg_category'] ?? throw self::missing('bdg_category'),
            bdgName: $attributes['bdg_name'] ?? throw self::missing('bdg_name'),
            zipLabel: $attributes['zip_label'] ?? throw self::missing('zip_label'),
            comFosnr: $attributes['com_fosnr'] ?? throw self::missing('com_fosnr'),
            comName: $attributes['com_name'] ?? throw self::missing('com_name'),
            comCanton: $attributes['com_canton'] ?? throw self::missing('com_canton'),
            adrStatus: $attributes['adr_status'] ?? throw self::missing('adr_status'),
            adrOfficial: $attributes['adr_official'] ?? throw self::missing('adr_official'),
            adrModified: $attributes['adr_modified'] ?? throw self::missing('adr_modified'),
            adrEasting: $attributes['adr_easting'] ?? throw self::missing('adr_easting'),
            adrNorthing: $attributes['adr_northing'] ?? throw self::missing('adr_northing'),
            strType: $attributes['str_type'] ?? throw self::missing('str_type'),
            strStatus: $attributes['str_status'] ?? throw self::missing('str_status'),
            strOfficial: $attributes['str_official'] ?? throw self::missing('str_official'),
            strModified: $attributes['str_modified'] ?? throw self::missing('str_modified'),
            strEasting: $attributes['str_easting'] ?? throw self::missing('str_easting'),
            strNorthing: $attributes['str_northing'] ?? throw self::missing('str_northing'),
            ortschaftsname: $attributes['ortschaftsname'] ?? throw self::missing('ortschaftsname'),
            plz4: $attributes['plz4'] ?? throw self::missing('plz4'),
            zusatzziffer: $attributes['zusatzziffer'] ?? null,
            zipId: $attributes['zip_id'] ?? null,
            gemeindename: $attributes['gemeindename'] ?? null,
            bfsNr: $attributes['bfs_nr'] ?? null,
            kantonskürzel: $attributes['kantonskürzel'] ?? throw self::missing('kantonskürzel'),
            sprache: $attributes['sprache'] ?? null,
            validity: $attributes['validity'] ?? null,
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
            'canton' => $this->canton,
            'address' => $this->address,
            'line_1' => $this->line1,
            'line_2' => $this->line2,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'adr_egaid' => $this->adrEgaid,
            'str_esid' => $this->strEsid,
            'bdg_egid' => $this->bdgEgid,
            'adr_edid' => $this->adrEdid,
            'stn_label' => $this->stnLabel,
            'adr_number' => $this->adrNumber,
            'bdg_category' => $this->bdgCategory,
            'bdg_name' => $this->bdgName,
            'zip_label' => $this->zipLabel,
            'com_fosnr' => $this->comFosnr,
            'com_name' => $this->comName,
            'com_canton' => $this->comCanton,
            'adr_status' => $this->adrStatus,
            'adr_official' => $this->adrOfficial,
            'adr_modified' => $this->adrModified,
            'adr_easting' => $this->adrEasting,
            'adr_northing' => $this->adrNorthing,
            'str_type' => $this->strType,
            'str_status' => $this->strStatus,
            'str_official' => $this->strOfficial,
            'str_modified' => $this->strModified,
            'str_easting' => $this->strEasting,
            'str_northing' => $this->strNorthing,
            'ortschaftsname' => $this->ortschaftsname,
            'plz4' => $this->plz4,
            'zusatzziffer' => $this->zusatzziffer,
            'zip_id' => $this->zipId,
            'gemeindename' => $this->gemeindename,
            'bfs_nr' => $this->bfsNr,
            'kantonskürzel' => $this->kantonskürzel,
            'sprache' => $this->sprache,
            'validity' => $this->validity,
        ];
    }
}
