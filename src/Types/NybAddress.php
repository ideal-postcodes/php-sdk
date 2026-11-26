<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * Not Yet Built Address
 *
 * Raw Royal Mail Not Yet Built record backing an `nyb` address.
 *
 * Delivery points Royal Mail has allocated for addresses under construction, ahead of them appearing in PAF. Same shape as a PAF record.
 *
 * @phpstan-type NybAddressArray array{dataset: 'nyb', postcode: string, post_town: string, dependant_locality: string, double_dependant_locality: string, thoroughfare: string, dependant_thoroughfare: string, building_number: string, building_name: string, sub_building_name: string, department_name: string, organisation_name: string, udprn: int, postcode_type: 'S'|'L'|'', su_organisation_indicator: string, delivery_point_suffix: string, po_box: string}
 *
 * @implements ResponseContract<NybAddressArray>
 */
final class NybAddress implements ResponseContract
{
    /** @use ArrayAccessible<NybAddressArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * @var 'nyb'
         */
        public readonly string $dataset,
        /**
         * Postcode, space separated
         */
        public readonly string $postcode,
        /**
         * Royal Mail post town, title cased
         */
        public readonly string $postTown,
        /**
         * Dependant locality. Empty string when not present
         */
        public readonly string $dependantLocality,
        /**
         * Double dependant locality. Empty string when not present
         */
        public readonly string $doubleDependantLocality,
        /**
         * Street name
         */
        public readonly string $thoroughfare,
        /**
         * Dependant street name. Empty string when not present
         */
        public readonly string $dependantThoroughfare,
        /**
         * Building number. Empty string when not present, or when PAF merges it into the building name
         */
        public readonly string $buildingNumber,
        /**
         * Building name. Empty string when not present
         */
        public readonly string $buildingName,
        /**
         * Sub building name. Empty string when not present
         */
        public readonly string $subBuildingName,
        /**
         * Department name within an organisation. Empty string when not present
         */
        public readonly string $departmentName,
        /**
         * Organisation name. Empty string when not present
         */
        public readonly string $organisationName,
        /**
         * Unique Delivery Point Reference Number
         */
        public readonly int $udprn,
        /**
         * Postcode type.
         *
         * @var 'S'|'L'|''
         */
        public readonly string $postcodeType,
        /**
         * Small user organisation indicator. `Y` where the small user postcode is held by an organisation
         */
        public readonly string $suOrganisationIndicator,
        /**
         * Royal Mail delivery point suffix
         */
        public readonly string $deliveryPointSuffix,
        /**
         * PO Box number. Empty string when not present
         */
        public readonly string $poBox,
    ) {}

    /**
     * @param  NybAddressArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            dataset: $attributes['dataset'] ?? throw self::missing('dataset'),
            postcode: $attributes['postcode'] ?? throw self::missing('postcode'),
            postTown: $attributes['post_town'] ?? throw self::missing('post_town'),
            dependantLocality: $attributes['dependant_locality'] ?? throw self::missing('dependant_locality'),
            doubleDependantLocality: $attributes['double_dependant_locality'] ?? throw self::missing('double_dependant_locality'),
            thoroughfare: $attributes['thoroughfare'] ?? throw self::missing('thoroughfare'),
            dependantThoroughfare: $attributes['dependant_thoroughfare'] ?? throw self::missing('dependant_thoroughfare'),
            buildingNumber: $attributes['building_number'] ?? throw self::missing('building_number'),
            buildingName: $attributes['building_name'] ?? throw self::missing('building_name'),
            subBuildingName: $attributes['sub_building_name'] ?? throw self::missing('sub_building_name'),
            departmentName: $attributes['department_name'] ?? throw self::missing('department_name'),
            organisationName: $attributes['organisation_name'] ?? throw self::missing('organisation_name'),
            udprn: $attributes['udprn'] ?? throw self::missing('udprn'),
            postcodeType: $attributes['postcode_type'] ?? throw self::missing('postcode_type'),
            suOrganisationIndicator: $attributes['su_organisation_indicator'] ?? throw self::missing('su_organisation_indicator'),
            deliveryPointSuffix: $attributes['delivery_point_suffix'] ?? throw self::missing('delivery_point_suffix'),
            poBox: $attributes['po_box'] ?? throw self::missing('po_box'),
        );
    }

    public function toArray(): array
    {
        return [
            'dataset' => $this->dataset,
            'postcode' => $this->postcode,
            'post_town' => $this->postTown,
            'dependant_locality' => $this->dependantLocality,
            'double_dependant_locality' => $this->doubleDependantLocality,
            'thoroughfare' => $this->thoroughfare,
            'dependant_thoroughfare' => $this->dependantThoroughfare,
            'building_number' => $this->buildingNumber,
            'building_name' => $this->buildingName,
            'sub_building_name' => $this->subBuildingName,
            'department_name' => $this->departmentName,
            'organisation_name' => $this->organisationName,
            'udprn' => $this->udprn,
            'postcode_type' => $this->postcodeType,
            'su_organisation_indicator' => $this->suOrganisationIndicator,
            'delivery_point_suffix' => $this->deliveryPointSuffix,
            'po_box' => $this->poBox,
        ];
    }
}
