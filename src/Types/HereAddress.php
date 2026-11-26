<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * HERE Address
 *
 * An address from HERE Technologies' map data, covering 230 countries and territories across twelve regional datasets named in `dataset`. Each address carries its address lines, house number (`address`), street name, HERE's administrative hierarchy (`order1_name`, `order2_name`, `order8_name`, `builtup_name`), a postal code where the country has one, display and delivery coordinates and, where HERE holds them, the building, unit, level and unit name. Depth varies by country, from building level down to region level only. HERE refreshes the data quarterly.
 *
 * Conventions:
 *
 * - A record is one of four kinds, named after the dataset in `id`: `ap` an address point, `ar` an address range, `poi` a point of interest, `loc` a locality. Postal Addressing records are `pap` and `par`.
 * - `id` is the dataset, the kind, HERE's key and the language code. A range id carries a further segment holding the interpolated house number (`herewe_ar|74024700!27769096|8|de`).
 * - Text fields are empty strings, never null. Coordinates are empty strings when absent.
 * - Only `line_1` and `line_2` are ever populated. `line_1` is the building name line where the record has one, otherwise the street line. Ranges, points of interest and localities produce at most one line.
 * - Casing is as HERE ships it. Only the Postal Addressing fields are title cased.
 * - `language` is the ISO 639-1 code for the record. A street named in more than one language yields one record per language, identical but for the language segment of `id`.
 *
 * @phpstan-type HereAddressArray array{id: string, country_iso: string, dataset: 'herewe'|'heret'|'heresa'|'hereo'|'herena'|'heremeas'|'heremea'|'herem'|'herei'|'herehk'|'hereee'|'hereap', language: string, line_1: string, line_2: string, line_3: string, line_4: string, line_5: string, address: string, delivery_latitude: string|float|int, delivery_longitude: string|float|int, building_name: string, latitude: string|float|int, longitude: string|float|int, street_name: string, postal_code: string, order1_name: string, order2_name: string, order8_name: string, builtup_name: string, poi_name: string, building_unit_name: string, level_name: string, unit_name: string, suppl_address_info: string, building_grp_name: string}
 *
 * @implements ResponseContract<HereAddressArray>
 */
final class HereAddress implements ResponseContract
{
    /** @use ArrayAccessible<HereAddressArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Globally unique internally generated identifier for an address
         */
        public readonly string $id,
        /**
         * Three character country code based on ISO Standard 3166.
         */
        public readonly string $countryIso,
        /**
         * HERE regional dataset the address was sourced from.
         *
         * @var 'herewe'|'heret'|'heresa'|'hereo'|'herena'|'heremeas'|'heremea'|'herem'|'herei'|'herehk'|'hereee'|'hereap'
         */
        public readonly string $dataset,
        /**
         * ISO 639-1 language code of the record, mapped down from HERE's three-letter code. Taken from the address point, the road for a range, the point of interest or the administrative place for a locality.
         */
        public readonly string $language,
        /**
         * First address line.
         */
        public readonly string $line1,
        /**
         * Second address line.
         */
        public readonly string $line2,
        /**
         * Third address line. Always the empty string `""` for HERE records, which produce at most two lines.
         */
        public readonly string $line3,
        /**
         * Fourth address line. Always the empty string `""` for HERE records, which produce at most two lines.
         */
        public readonly string $line4,
        /**
         * Fifth address line. Always the empty string `""` for HERE records, which produce at most two lines.
         */
        public readonly string $line5,
        /**
         * Address / House Number uniquely identifying the address along the specified road link.
         */
        public readonly string $address,
        public readonly string|float $deliveryLatitude,
        public readonly string|float $deliveryLongitude,
        /**
         * Name of the Building to which the Point Address is associated.
         */
        public readonly string $buildingName,
        public readonly string|float $latitude,
        public readonly string|float $longitude,
        /**
         * The full spelling of the street name, including Prefix, Base Name, Suffix, Street Type, and Direction on Sign.
         */
        public readonly string $streetName,
        /**
         * Full postal code; could be numeric or alphanumeric postal code.
         */
        public readonly string $postalCode,
        /**
         * Identifies the highest administrative level in which a country can be subdivided.
         */
        public readonly string $order1Name,
        /**
         * Identifies an intermediate administrative level of a country and is a sub-division of an Order-1 area. Only countries with a five (or more) level administrative hierarchy have Order-2 administrative levels defined. This feature can be used for destination selection and map display.
         */
        public readonly string $order2Name,
        /**
         * Identifies the lowest level of the country's administrative hierarchy that is present country-wide. (No gaps exist in the coverage.)
         */
        public readonly string $order8Name,
        /**
         * Identifies the lowest administrative level for a country. This level does not cover the entire country, (as opposed to the Order-8 Area level which does cover the entire country). This feature should be used in conjunction with Zone and Order-8 Area for destination selection. The Built-up Area polygon, as published in RDF_CARTO, can also be used for map display.
         */
        public readonly string $builtupName,
        /**
         * Name of the point of interest. Populated for point of interest records only.
         */
        public readonly string $poiName,
        /**
         * Name of the Building associated with a Micro Point Address.
         */
        public readonly string $buildingUnitName,
        /**
         * Name of floor or level within a building associated with a Micro Point Address.
         */
        public readonly string $levelName,
        /**
         * Name of the unit (suite, etc) associated with a Micro Point Address.
         */
        public readonly string $unitName,
        /**
         * Additional address or building information.
         */
        public readonly string $supplAddressInfo,
        /**
         * Name of the group of buildings with which the address is associated.
         */
        public readonly string $buildingGrpName,
    ) {}

    /**
     * @param  HereAddressArray  $attributes
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
            line4: $attributes['line_4'] ?? throw self::missing('line_4'),
            line5: $attributes['line_5'] ?? throw self::missing('line_5'),
            address: $attributes['address'] ?? throw self::missing('address'),
            deliveryLatitude: $attributes['delivery_latitude'] ?? throw self::missing('delivery_latitude'),
            deliveryLongitude: $attributes['delivery_longitude'] ?? throw self::missing('delivery_longitude'),
            buildingName: $attributes['building_name'] ?? throw self::missing('building_name'),
            latitude: $attributes['latitude'] ?? throw self::missing('latitude'),
            longitude: $attributes['longitude'] ?? throw self::missing('longitude'),
            streetName: $attributes['street_name'] ?? throw self::missing('street_name'),
            postalCode: $attributes['postal_code'] ?? throw self::missing('postal_code'),
            order1Name: $attributes['order1_name'] ?? throw self::missing('order1_name'),
            order2Name: $attributes['order2_name'] ?? throw self::missing('order2_name'),
            order8Name: $attributes['order8_name'] ?? throw self::missing('order8_name'),
            builtupName: $attributes['builtup_name'] ?? throw self::missing('builtup_name'),
            poiName: $attributes['poi_name'] ?? throw self::missing('poi_name'),
            buildingUnitName: $attributes['building_unit_name'] ?? throw self::missing('building_unit_name'),
            levelName: $attributes['level_name'] ?? throw self::missing('level_name'),
            unitName: $attributes['unit_name'] ?? throw self::missing('unit_name'),
            supplAddressInfo: $attributes['suppl_address_info'] ?? throw self::missing('suppl_address_info'),
            buildingGrpName: $attributes['building_grp_name'] ?? throw self::missing('building_grp_name'),
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
            'line_4' => $this->line4,
            'line_5' => $this->line5,
            'address' => $this->address,
            'delivery_latitude' => $this->deliveryLatitude,
            'delivery_longitude' => $this->deliveryLongitude,
            'building_name' => $this->buildingName,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'street_name' => $this->streetName,
            'postal_code' => $this->postalCode,
            'order1_name' => $this->order1Name,
            'order2_name' => $this->order2Name,
            'order8_name' => $this->order8Name,
            'builtup_name' => $this->builtupName,
            'poi_name' => $this->poiName,
            'building_unit_name' => $this->buildingUnitName,
            'level_name' => $this->levelName,
            'unit_name' => $this->unitName,
            'suppl_address_info' => $this->supplAddressInfo,
            'building_grp_name' => $this->buildingGrpName,
        ];
    }
}
