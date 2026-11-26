<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * AddressBase Premium Address
 *
 * A property record from Ordnance Survey's AddressBase Premium, Ordnance Survey's most detailed address dataset for Great Britain. Each record is a Basic Land and Property Unit (BLPU) keyed by its UPRN. Alongside the Royal Mail delivery point it carries the local authority address (`pao_*`, `sao_*`, `usrn`), classification (`classification_code`), lifecycle (`logical_status`, `blpu_state`), coordinates, Welsh alternatives (`welsh_*`), the street record (`street_*`) and cross references to OS MasterMap (`toid`), the Valuation Office Agency (`council_tax_ref`, `ndr_ref`) and ONS (`ons_ward_code`, `ons_parish_code`). Ordnance Survey publishes around 40 million records and refreshes them every six weeks.
 *
 * How it differs from the neighbouring datasets:
 *
 * - **AddressBase Core** (`ab`) is a weekly, flat cut of the current approved records: one row per UPRN with coordinates, a two-character classification and the key identifiers. It carries no history, no provisional records, no Welsh alternatives, no local authority address breakdown and no street, VOA or ONS cross references.
 * - **Royal Mail PAF** (`paf`) lists delivery points, keyed by UDPRN. The vast majority of PAF addresses are matched to a UPRN, but there will always be a small number (~1%) with no corresponding record on AddressBase Premium. PAF holds around 30 million GB delivery points against AddressBase Premium's 40 million UPRNs; the difference is non-postal objects (substations, car parks, sites under construction), provisional and historic records. Every GB PAF delivery point appears here as the `dpa_*` record.
 * - **OS NGD Address** carries the same content restructured into feature types with daily currency. AddressBase Premium is not being retired. The Ordnance Survey end of life notice for autumn 2027 covers AddressBase and AddressBase Plus only.
 *
 * @phpstan-type AbpAddressArray array{uprn: string, parent_uprn?: string|null, logical_status: int, blpu_state?: string|null, blpu_state_date?: string|null, country: string, latitude: float|int, longitude: float|int, x_coordinate: float|int, y_coordinate: float|int, rpc?: int|null, local_custodian_code: int, addressbase_postal: string, postcode_locator: string, multi_occ_count: int, blpu_start_date?: string|null, blpu_end_date?: string|null, blpu_last_update_date?: string|null, blpu_entry_date?: string|null, udprn?: string|null, organisation_name?: string|null, legal_name?: string|null, department_name?: string|null, sub_building_name?: string|null, building_name?: string|null, building_number?: int|null, dependent_thoroughfare?: string|null, thoroughfare?: string|null, double_dependent_locality?: string|null, dependent_locality?: string|null, post_town?: string|null, postcode: string, postcode_type?: string|null, delivery_point_suffix?: string|null, po_box_number?: string|null, welsh_dependent_thoroughfare?: string|null, welsh_thoroughfare?: string|null, welsh_double_dependent_locality?: string|null, welsh_dependent_locality?: string|null, welsh_post_town?: string|null, dpa_process_date?: string|null, dpa_start_date?: string|null, dpa_end_date?: string|null, dpa_last_update_date?: string|null, dpa_entry_date?: string|null, classification_code?: string|null, class_scheme?: string|null, scheme_version?: float|int|null, classification_start_date?: string|null, classification_end_date?: string|null, classification_last_update_date?: string|null, classification_entry_date?: string|null, organisation_start_date?: string|null, organisation_end_date?: string|null, organisation_last_update_date?: string|null, organisation_entry_date?: string|null, lpi_key?: string|null, lpi_language?: string|null, lpi_logical_status?: int|null, lpi_start_date?: string|null, lpi_end_date?: string|null, lpi_last_update_date?: string|null, lpi_entry_date?: string|null, sao_start_number?: int|null, sao_start_suffix?: string|null, sao_end_number?: int|null, sao_end_suffix?: string|null, sao_text?: string|null, pao_start_number?: int|null, pao_start_suffix?: string|null, pao_end_number?: int|null, pao_end_suffix?: string|null, pao_text?: string|null, usrn?: string|null, usrn_match_indicator?: string|null, area_name?: string|null, level?: string|null, official_flag?: string|null, street_record_type?: int|null, swa_org_ref_naming?: int|null, street_state?: string|null, street_state_date?: string|null, street_surface?: string|null, street_classification?: string|null, street_start_date?: string|null, street_last_update_date?: string|null, street_record_entry_date?: string|null, street_start_x?: float|int|null, street_start_y?: float|int|null, street_start_lat?: float|int|null, street_start_long?: float|int|null, street_end_x?: float|int|null, street_end_y?: float|int|null, street_end_lat?: float|int|null, street_end_long?: float|int|null, street_tolerance?: int|null, street_description?: string|null, street_locality?: string|null, street_town?: string|null, adminstrative_area?: string|null, sd_language?: string|null, sd_start_date?: string|null, sd_end_date?: string|null, sd_last_update_date?: string|null, sd_entry_date?: string|null, toid?: string|null, toid_address?: string|null, toid_highways?: string|null, council_tax_ref?: string|null, ndr_ref?: string|null, ons_ward_code?: string|null, ons_parish_code?: string|null, id: string, dataset: 'abp', country_iso: 'GBR', suggestion_line: string}
 *
 * @implements ResponseContract<AbpAddressArray>
 */
final class AbpAddress implements ResponseContract
{
    /** @use ArrayAccessible<AbpAddressArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Unique Property Reference Number - a persistent identifier for a Basic Land and Property Unit (BLPU). Up to 12 digits. Primary key for the BLPU spine. Carried as a string to preserve precision (12-digit values can exceed Number.MAX_SAFE_INTEGER).
         */
        public readonly string $uprn,
        /**
         * UPRN of the parent record where a parent-child relationship exists (flats sharing a building entrance, sub-units of a parent property).
         */
        public readonly ?string $parentUprn,
        /**
         * Logical lifecycle status of the BLPU. `1` Approved, `6` Provisional, `8` Historical. BLPU records do not take value `3` (alternative).
         */
        public readonly int $logicalStatus,
        /**
         * Physical state of the BLPU. `1` Under construction, `2` In use, `3` Unoccupied / vacant / derelict, `4` No longer existing, `6` Planning permission granted.
         */
        public readonly ?string $blpuState,
        /**
         * Date the BLPU achieved its current state.
         */
        public readonly ?string $blpuStateDate,
        /**
         * Country containing the BLPU, determined by intersection with OS Boundary-Line. `E` England, `W` Wales, `S` Scotland, `N` Northern Ireland, `L` Channel Islands, `M` Isle of Man, `J` not assigned to a country.
         */
        public readonly string $country,
        /**
         * Latitude coordinate in the ETRS89 coordinate reference system.
         */
        public readonly float $latitude,
        /**
         * Longitude coordinate in the ETRS89 coordinate reference system.
         */
        public readonly float $longitude,
        /**
         * X location in metres on the OSGB36 British National Grid (precision 8, scale 2).
         */
        public readonly float $xCoordinate,
        /**
         * Y location in metres on the OSGB36 British National Grid (precision 9, scale 2).
         */
        public readonly float $yCoordinate,
        /**
         * Representative Point Code - reliability of the BLPU's coordinate, as assessed by the local authority custodian. `1` Central internal, `2` General internal, `3` Transitional, `4` Street location, `5` Postcode unit, `9` Low accuracy.
         */
        public readonly ?int $rpc,
        /**
         * 4-digit identifier of the Local Authority responsible for maintaining the record.
         */
        public readonly int $localCustodianCode,
        /**
         * Whether the address can receive mail per AddressBase rules. `D` linked to PAF, `N` not a postal address, `C` postal with a PAF-linked parent, `L` postal based on Local Authority information.
         */
        public readonly string $addressbasePostal,
        /**
         * Royal Mail PAF postcode, locally assigned by the custodian, or spatially derived where no PAF match exists. Up to 8 characters.
         */
        public readonly string $postcodeLocator,
        /**
         * Count of child UPRNs for this record where parent-child relationships exist.
         */
        public readonly int $multiOccCount,
        /**
         * Date the address record was inserted into the database.
         */
        public readonly ?string $blpuStartDate,
        /**
         * Date the address record was closed in the database.
         */
        public readonly ?string $blpuEndDate,
        /**
         * Date of the most recent attribute change on the BLPU record.
         */
        public readonly ?string $blpuLastUpdateDate,
        /**
         * Date the record was inserted into the Local Authority database.
         */
        public readonly ?string $blpuEntryDate,
        /**
         * Royal Mail's Unique Delivery Point Reference Number - primary key for the Delivery Point Address (DPA) record. Up to 8 digits. NULL for non-postal UPRNs.
         */
        public readonly ?string $udprn,
        /**
         * Royal Mail-recognised organisation name from DPA, falling back to the AddressBase Organisation record's `organisation` when DPA is absent. Title-cased.
         */
        public readonly ?string $organisationName,
        /**
         * Registered legal name from the AddressBase Organisation record.
         */
        public readonly ?string $legalName,
        /**
         * Subdivision of an organisation that receives mail at a distinct delivery point. Requires `organisation_name` to be present. Title-cased.
         */
        public readonly ?string $departmentName,
        /**
         * Property subdivision identifier (e.g. flat number). Requires `building_name` or `building_number`. Title-cased. Falls back to the LPI's `sao_text` when there is no delivery point.
         */
        public readonly ?string $subBuildingName,
        /**
         * Descriptive name applied to a single building or small group of buildings. Title-cased. Falls back to the LPI's SAO number/range plus `pao_text` when there is no delivery point.
         */
        public readonly ?string $buildingName,
        /**
         * Numeric identifier for a single building or small group of buildings. Complex number formats (e.g. "12A") go in `building_name` or `sub_building_name`. Falls back to the LPI's `pao_start_number` when there is no delivery point and that number is a bare integer - a suffixed or ranged PAO number is folded onto `thoroughfare` instead.
         */
        public readonly ?int $buildingNumber,
        /**
         * Named thoroughfare within another named thoroughfare. Requires `thoroughfare` to be present. Title-cased.
         */
        public readonly ?string $dependentThoroughfare,
        /**
         * Road, track or named access route with Royal Mail delivery points. Title-cased. Falls back to the LPI street's `street_description` (with a suffixed or ranged PAO number prefixed) when there is no delivery point.
         */
        public readonly ?string $thoroughfare,
        /**
         * Estate or area name used to distinguish similar thoroughfares within a dependent locality. Requires `dependent_locality`. Title-cased.
         */
        public readonly ?string $doubleDependentLocality,
        /**
         * Subdivision of a post town to differentiate same-name thoroughfares. Title-cased. Falls back to the LPI street's `street_locality` when there is no delivery point.
         */
        public readonly ?string $dependentLocality,
        /**
         * Town or city of the Royal Mail sorting office serving this record. Capitalised. Falls back to the LPI street's `street_town` when there is no delivery point; NULL when neither is present.
         */
        public readonly ?string $postTown,
        /**
         * Royal Mail postcode from DPA, falling back to BLPU's `postcode_locator` when no Royal Mail delivery point exists. Uppercased, with single space between outward and inward portions.
         */
        public readonly string $postcode,
        /**
         * Royal Mail postal-user category. `S` Small user (e.g. a residential property), `L` Large user (e.g. a large commercial company).
         */
        public readonly ?string $postcodeType,
        /**
         * Two-character code uniquely identifying an individual delivery point within a postcode (Royal Mail DPS).
         */
        public readonly ?string $deliveryPointSuffix,
        /**
         * Post Office Box number.
         */
        public readonly ?string $poBoxNumber,
        /**
         * Welsh translation of `dependent_thoroughfare`. Requires `welsh_thoroughfare`.
         */
        public readonly ?string $welshDependentThoroughfare,
        /**
         * Welsh translation of `thoroughfare`.
         */
        public readonly ?string $welshThoroughfare,
        /**
         * Welsh translation of `double_dependent_locality`. Requires `welsh_dependent_locality`.
         */
        public readonly ?string $welshDoubleDependentLocality,
        /**
         * Welsh translation of `dependent_locality`.
         */
        public readonly ?string $welshDependentLocality,
        /**
         * Welsh translation of `post_town`.
         */
        public readonly ?string $welshPostTown,
        /**
         * Date the PAF record was processed into the database.
         */
        public readonly ?string $dpaProcessDate,
        /**
         * Date the address record was matched to the Delivery Point Address.
         */
        public readonly ?string $dpaStartDate,
        /**
         * Date the PAF record no longer existed in the database.
         */
        public readonly ?string $dpaEndDate,
        /**
         * Date any attribute on the DPA record was last changed.
         */
        public readonly ?string $dpaLastUpdateDate,
        /**
         * Date the PAF record was first loaded by GeoPlace.
         */
        public readonly ?string $dpaEntryDate,
        /**
         * Current AddressBase classification code, passed through verbatim at whatever level the custodian recorded. Usually tertiary (e.g. `RD03` semi-detached, `RD04` terraced, `RD06` self-contained flat, `CR01` retail), but can be quaternary (`LP03PA`), secondary (`RD`) or primary (`C`). Match on prefix rather than equality. Top-level categories: `R` Residential, `C` Commercial, `L` Land, `M` Military, `O` Other, `P` Parent shell, `U` Unclassified, `X` Dual use, `Z` Object of interest. NULL when no current classification row exists for the UPRN.
         */
        public readonly ?string $classificationCode,
        /**
         * Name of the classification scheme applied to this record.
         */
        public readonly ?string $classScheme,
        /**
         * Version number of the classification scheme in use (e.g. `1.0`).
         */
        public readonly ?float $schemeVersion,
        /**
         * Date the classification record was first loaded into the database.
         */
        public readonly ?string $classificationStartDate,
        /**
         * Date the classification record ceased to exist.
         */
        public readonly ?string $classificationEndDate,
        /**
         * Date of the most recent attribute change on the classification record.
         */
        public readonly ?string $classificationLastUpdateDate,
        /**
         * Date the associated address record was inserted into the Local Authority database.
         */
        public readonly ?string $classificationEntryDate,
        /**
         * Date the organisation record was initially loaded into the database.
         */
        public readonly ?string $organisationStartDate,
        /**
         * Date the organisation record ceased to exist.
         */
        public readonly ?string $organisationEndDate,
        /**
         * Date of the most recent attribute change on the organisation record.
         */
        public readonly ?string $organisationLastUpdateDate,
        /**
         * Date the UPRN was entered into the Local Authority database.
         */
        public readonly ?string $organisationEntryDate,
        /**
         * Unique identifier and primary key for the LPI record.
         */
        public readonly ?string $lpiKey,
        /**
         * Language used for this LPI record. `ENG` English, `CYM` Welsh, `GAE` Gaelic (Scottish), `BIL` Bilingual.
         */
        public readonly ?string $lpiLanguage,
        /**
         * Logical status of the LPI record. `1` Approved, `3` Alternative, `6` Provisional, `8` Historical.
         */
        public readonly ?int $lpiLogicalStatus,
        /**
         * Date the LPI was first loaded into the database.
         */
        public readonly ?string $lpiStartDate,
        /**
         * Date the LPI record ceased to exist.
         */
        public readonly ?string $lpiEndDate,
        /**
         * Date of the most recent attribute change on the LPI record.
         */
        public readonly ?string $lpiLastUpdateDate,
        /**
         * Date the LPI record was inserted into the Local Authority database.
         */
        public readonly ?string $lpiEntryDate,
        /**
         * Number of the Secondary Addressable Object, or range start. Requires `pao_start_number` or `pao_text` to be present.
         */
        public readonly ?int $saoStartNumber,
        /**
         * Suffix appended to `sao_start_number`. Requires `sao_start_number`.
         */
        public readonly ?string $saoStartSuffix,
        /**
         * End number of the SAO range. Requires `sao_start_number`.
         */
        public readonly ?int $saoEndNumber,
        /**
         * Suffix appended to `sao_end_number`. Requires `sao_end_number`.
         */
        public readonly ?string $saoEndSuffix,
        /**
         * Building name or description for the Secondary Addressable Object (e.g. "FLAT 1", "UNIT B"). Requires `pao_start_number` or `pao_text`.
         */
        public readonly ?string $saoText,
        /**
         * Number of the Primary Addressable Object, or range start. Mandatory if `pao_text` is absent.
         */
        public readonly ?int $paoStartNumber,
        /**
         * Suffix appended to `pao_start_number`. Requires `pao_start_number`.
         */
        public readonly ?string $paoStartSuffix,
        /**
         * End number of the PAO range. Requires `pao_start_number`.
         */
        public readonly ?int $paoEndNumber,
        /**
         * Suffix appended to `pao_end_number`. Requires `pao_end_number`.
         */
        public readonly ?string $paoEndSuffix,
        /**
         * Building name or description for the Primary Addressable Object. Mandatory if `pao_start_number` is absent.
         */
        public readonly ?string $paoText,
        /**
         * Unique Street Reference Number linking this LPI to its Street record. Up to 8 digits.
         */
        public readonly ?string $usrn,
        /**
         * Confidence of the LPI to Street linkage. `1` Matched manually to the nearest accessible Street, `2` Matched spatially to the nearest USRN.
         */
        public readonly ?string $usrnMatchIndicator,
        /**
         * Third-level geographic area name such as island or property group.
         */
        public readonly ?string $areaName,
        /**
         * Vertical position of the property (e.g. "GROUND FLOOR").
         */
        public readonly ?string $level,
        /**
         * Whether the LPI corresponds to an entry in the official Street Name and Numbering register. `Y` Official address, `N` Unofficial address.
         */
        public readonly ?string $officialFlag,
        /**
         * Description of the street record type. `1` Official designated Street Name, `2` Street Description, `3` Numbered Street, `4` Unofficial Street Description, `9` Description used for LLPG Access.
         */
        public readonly ?int $streetRecordType,
        /**
         * Code identifying the Street Naming and Numbering Authority or Local Highway Authority (DfT-allocated).
         */
        public readonly ?int $swaOrgRefNaming,
        /**
         * Current state of the street. `1` Under construction, `2` Open, `4` Permanently closed.
         */
        public readonly ?string $streetState,
        /**
         * Date when the street achieved its current state.
         */
        public readonly ?string $streetStateDate,
        /**
         * Surface finish of the street. `1` Metalled, `2` Unmetalled, `3` Mixed.
         */
        public readonly ?string $streetSurface,
        /**
         * Primary classification of the street record. `4` Pedestrian way or footpath, `6` Cycletrack or cycleway, `8` All vehicles, `9` Restricted byway, `10` Bridleway.
         */
        public readonly ?string $streetClassification,
        /**
         * Date this street record or version was inserted into the database.
         */
        public readonly ?string $streetStartDate,
        /**
         * Date when any attribute of the street record was last changed.
         */
        public readonly ?string $streetLastUpdateDate,
        /**
         * Date the street record was entered into the Local Authority database.
         */
        public readonly ?string $streetRecordEntryDate,
        /**
         * X coordinate (BNG) for the street start point.
         */
        public readonly ?float $streetStartX,
        /**
         * Y coordinate (BNG) for the street start point.
         */
        public readonly ?float $streetStartY,
        /**
         * Latitude (ETRS89) for the street start point.
         */
        public readonly ?float $streetStartLat,
        /**
         * Longitude (ETRS89) for the street start point.
         */
        public readonly ?float $streetStartLong,
        /**
         * X coordinate (BNG) for the street end point.
         */
        public readonly ?float $streetEndX,
        /**
         * Y coordinate (BNG) for the street end point.
         */
        public readonly ?float $streetEndY,
        /**
         * Latitude (ETRS89) for the street end point.
         */
        public readonly ?float $streetEndLat,
        /**
         * Longitude (ETRS89) for the street end point.
         */
        public readonly ?float $streetEndLong,
        /**
         * Accuracy of street-coordinate data capture, in metres.
         */
        public readonly ?int $streetTolerance,
        /**
         * Street name, description or street number.
         */
        public readonly ?string $streetDescription,
        /**
         * Geographical area within a town.
         */
        public readonly ?string $streetLocality,
        /**
         * Name of the town. Required for Street Record Types `1` and `2`; optional for types `3`, `4` and `9`.
         */
        public readonly ?string $streetTown,
        /**
         * Local Highway Authority name (administrative area / county / unitary authority). Field name spelling preserved verbatim from OS (`ADMINSTRATIVE_AREA`).
         */
        public readonly ?string $adminstrativeArea,
        /**
         * Language of the street descriptor. `ENG` English, `CYM` Welsh, `GAE` Gaelic (Scottish), `BIL` Bilingual.
         */
        public readonly ?string $sdLanguage,
        /**
         * Date the street descriptor record was first created in the database.
         */
        public readonly ?string $sdStartDate,
        /**
         * Date the street descriptor record ceased to exist.
         */
        public readonly ?string $sdEndDate,
        /**
         * Date of the most recent attribute change on the street descriptor record.
         */
        public readonly ?string $sdLastUpdateDate,
        /**
         * Date the street descriptor record was entered into the Local Authority database.
         */
        public readonly ?string $sdEntryDate,
        /**
         * OS MasterMap Topography Layer TOID (cross-reference source `7666MT`) linked to the UPRN.
         */
        public readonly ?string $toid,
        /**
         * OS MasterMap Address Layer 2 TOID (cross-reference source `7666MA`) linked to the UPRN.
         */
        public readonly ?string $toidAddress,
        /**
         * OS MasterMap Highways TOID (cross-reference source `7666MI`) linked to the UPRN.
         */
        public readonly ?string $toidHighways,
        /**
         * Centrally created Valuation Office Agency council tax reference (cross-reference source `7666VC`) linked to the UPRN.
         */
        public readonly ?string $councilTaxRef,
        /**
         * Centrally created Valuation Office Agency non-domestic rates reference (cross-reference source `7666VN`) linked to the UPRN.
         */
        public readonly ?string $ndrRef,
        /**
         * Office for National Statistics ward code (cross-reference source `7666OW`) linked to the UPRN.
         */
        public readonly ?string $onsWardCode,
        /**
         * Office for National Statistics parish code (cross-reference source `7666OP`) linked to the UPRN.
         */
        public readonly ?string $onsParishCode,
        /**
         * Stable identifier for the record, `abp_` prefixed to the UPRN. Accepted by the resolve endpoints.
         */
        public readonly string $id,
        /**
         * Dataset this record belongs to.
         *
         * @var 'abp'
         */
        public readonly string $dataset,
        /**
         * ISO 3166-1 alpha-3 code for the country covered by the dataset. Always `GBR` - use `country` for the England / Wales / Scotland split.
         *
         * @var 'GBR'
         */
        public readonly string $countryIso,
        /**
         * Single-line address used for autocomplete suggestions: the address line components, then the post town, then the outward half of the postcode, comma separated. Repeated components are collapsed.
         */
        public readonly string $suggestionLine,
    ) {}

    /**
     * @param  AbpAddressArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            uprn: $attributes['uprn'] ?? throw self::missing('uprn'),
            parentUprn: $attributes['parent_uprn'] ?? null,
            logicalStatus: $attributes['logical_status'] ?? throw self::missing('logical_status'),
            blpuState: $attributes['blpu_state'] ?? null,
            blpuStateDate: $attributes['blpu_state_date'] ?? null,
            country: $attributes['country'] ?? throw self::missing('country'),
            latitude: $attributes['latitude'] ?? throw self::missing('latitude'),
            longitude: $attributes['longitude'] ?? throw self::missing('longitude'),
            xCoordinate: $attributes['x_coordinate'] ?? throw self::missing('x_coordinate'),
            yCoordinate: $attributes['y_coordinate'] ?? throw self::missing('y_coordinate'),
            rpc: $attributes['rpc'] ?? null,
            localCustodianCode: $attributes['local_custodian_code'] ?? throw self::missing('local_custodian_code'),
            addressbasePostal: $attributes['addressbase_postal'] ?? throw self::missing('addressbase_postal'),
            postcodeLocator: $attributes['postcode_locator'] ?? throw self::missing('postcode_locator'),
            multiOccCount: $attributes['multi_occ_count'] ?? throw self::missing('multi_occ_count'),
            blpuStartDate: $attributes['blpu_start_date'] ?? null,
            blpuEndDate: $attributes['blpu_end_date'] ?? null,
            blpuLastUpdateDate: $attributes['blpu_last_update_date'] ?? null,
            blpuEntryDate: $attributes['blpu_entry_date'] ?? null,
            udprn: $attributes['udprn'] ?? null,
            organisationName: $attributes['organisation_name'] ?? null,
            legalName: $attributes['legal_name'] ?? null,
            departmentName: $attributes['department_name'] ?? null,
            subBuildingName: $attributes['sub_building_name'] ?? null,
            buildingName: $attributes['building_name'] ?? null,
            buildingNumber: $attributes['building_number'] ?? null,
            dependentThoroughfare: $attributes['dependent_thoroughfare'] ?? null,
            thoroughfare: $attributes['thoroughfare'] ?? null,
            doubleDependentLocality: $attributes['double_dependent_locality'] ?? null,
            dependentLocality: $attributes['dependent_locality'] ?? null,
            postTown: $attributes['post_town'] ?? null,
            postcode: $attributes['postcode'] ?? throw self::missing('postcode'),
            postcodeType: $attributes['postcode_type'] ?? null,
            deliveryPointSuffix: $attributes['delivery_point_suffix'] ?? null,
            poBoxNumber: $attributes['po_box_number'] ?? null,
            welshDependentThoroughfare: $attributes['welsh_dependent_thoroughfare'] ?? null,
            welshThoroughfare: $attributes['welsh_thoroughfare'] ?? null,
            welshDoubleDependentLocality: $attributes['welsh_double_dependent_locality'] ?? null,
            welshDependentLocality: $attributes['welsh_dependent_locality'] ?? null,
            welshPostTown: $attributes['welsh_post_town'] ?? null,
            dpaProcessDate: $attributes['dpa_process_date'] ?? null,
            dpaStartDate: $attributes['dpa_start_date'] ?? null,
            dpaEndDate: $attributes['dpa_end_date'] ?? null,
            dpaLastUpdateDate: $attributes['dpa_last_update_date'] ?? null,
            dpaEntryDate: $attributes['dpa_entry_date'] ?? null,
            classificationCode: $attributes['classification_code'] ?? null,
            classScheme: $attributes['class_scheme'] ?? null,
            schemeVersion: $attributes['scheme_version'] ?? null,
            classificationStartDate: $attributes['classification_start_date'] ?? null,
            classificationEndDate: $attributes['classification_end_date'] ?? null,
            classificationLastUpdateDate: $attributes['classification_last_update_date'] ?? null,
            classificationEntryDate: $attributes['classification_entry_date'] ?? null,
            organisationStartDate: $attributes['organisation_start_date'] ?? null,
            organisationEndDate: $attributes['organisation_end_date'] ?? null,
            organisationLastUpdateDate: $attributes['organisation_last_update_date'] ?? null,
            organisationEntryDate: $attributes['organisation_entry_date'] ?? null,
            lpiKey: $attributes['lpi_key'] ?? null,
            lpiLanguage: $attributes['lpi_language'] ?? null,
            lpiLogicalStatus: $attributes['lpi_logical_status'] ?? null,
            lpiStartDate: $attributes['lpi_start_date'] ?? null,
            lpiEndDate: $attributes['lpi_end_date'] ?? null,
            lpiLastUpdateDate: $attributes['lpi_last_update_date'] ?? null,
            lpiEntryDate: $attributes['lpi_entry_date'] ?? null,
            saoStartNumber: $attributes['sao_start_number'] ?? null,
            saoStartSuffix: $attributes['sao_start_suffix'] ?? null,
            saoEndNumber: $attributes['sao_end_number'] ?? null,
            saoEndSuffix: $attributes['sao_end_suffix'] ?? null,
            saoText: $attributes['sao_text'] ?? null,
            paoStartNumber: $attributes['pao_start_number'] ?? null,
            paoStartSuffix: $attributes['pao_start_suffix'] ?? null,
            paoEndNumber: $attributes['pao_end_number'] ?? null,
            paoEndSuffix: $attributes['pao_end_suffix'] ?? null,
            paoText: $attributes['pao_text'] ?? null,
            usrn: $attributes['usrn'] ?? null,
            usrnMatchIndicator: $attributes['usrn_match_indicator'] ?? null,
            areaName: $attributes['area_name'] ?? null,
            level: $attributes['level'] ?? null,
            officialFlag: $attributes['official_flag'] ?? null,
            streetRecordType: $attributes['street_record_type'] ?? null,
            swaOrgRefNaming: $attributes['swa_org_ref_naming'] ?? null,
            streetState: $attributes['street_state'] ?? null,
            streetStateDate: $attributes['street_state_date'] ?? null,
            streetSurface: $attributes['street_surface'] ?? null,
            streetClassification: $attributes['street_classification'] ?? null,
            streetStartDate: $attributes['street_start_date'] ?? null,
            streetLastUpdateDate: $attributes['street_last_update_date'] ?? null,
            streetRecordEntryDate: $attributes['street_record_entry_date'] ?? null,
            streetStartX: $attributes['street_start_x'] ?? null,
            streetStartY: $attributes['street_start_y'] ?? null,
            streetStartLat: $attributes['street_start_lat'] ?? null,
            streetStartLong: $attributes['street_start_long'] ?? null,
            streetEndX: $attributes['street_end_x'] ?? null,
            streetEndY: $attributes['street_end_y'] ?? null,
            streetEndLat: $attributes['street_end_lat'] ?? null,
            streetEndLong: $attributes['street_end_long'] ?? null,
            streetTolerance: $attributes['street_tolerance'] ?? null,
            streetDescription: $attributes['street_description'] ?? null,
            streetLocality: $attributes['street_locality'] ?? null,
            streetTown: $attributes['street_town'] ?? null,
            adminstrativeArea: $attributes['adminstrative_area'] ?? null,
            sdLanguage: $attributes['sd_language'] ?? null,
            sdStartDate: $attributes['sd_start_date'] ?? null,
            sdEndDate: $attributes['sd_end_date'] ?? null,
            sdLastUpdateDate: $attributes['sd_last_update_date'] ?? null,
            sdEntryDate: $attributes['sd_entry_date'] ?? null,
            toid: $attributes['toid'] ?? null,
            toidAddress: $attributes['toid_address'] ?? null,
            toidHighways: $attributes['toid_highways'] ?? null,
            councilTaxRef: $attributes['council_tax_ref'] ?? null,
            ndrRef: $attributes['ndr_ref'] ?? null,
            onsWardCode: $attributes['ons_ward_code'] ?? null,
            onsParishCode: $attributes['ons_parish_code'] ?? null,
            id: $attributes['id'] ?? throw self::missing('id'),
            dataset: $attributes['dataset'] ?? throw self::missing('dataset'),
            countryIso: $attributes['country_iso'] ?? throw self::missing('country_iso'),
            suggestionLine: $attributes['suggestion_line'] ?? throw self::missing('suggestion_line'),
        );
    }

    public function toArray(): array
    {
        $array = [
            'uprn' => $this->uprn,
            'logical_status' => $this->logicalStatus,
            'country' => $this->country,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'x_coordinate' => $this->xCoordinate,
            'y_coordinate' => $this->yCoordinate,
            'local_custodian_code' => $this->localCustodianCode,
            'addressbase_postal' => $this->addressbasePostal,
            'postcode_locator' => $this->postcodeLocator,
            'multi_occ_count' => $this->multiOccCount,
            'postcode' => $this->postcode,
            'id' => $this->id,
            'dataset' => $this->dataset,
            'country_iso' => $this->countryIso,
            'suggestion_line' => $this->suggestionLine,
        ];

        if ($this->parentUprn !== null) {
            $array['parent_uprn'] = $this->parentUprn;
        }

        if ($this->blpuState !== null) {
            $array['blpu_state'] = $this->blpuState;
        }

        if ($this->blpuStateDate !== null) {
            $array['blpu_state_date'] = $this->blpuStateDate;
        }

        if ($this->rpc !== null) {
            $array['rpc'] = $this->rpc;
        }

        if ($this->blpuStartDate !== null) {
            $array['blpu_start_date'] = $this->blpuStartDate;
        }

        if ($this->blpuEndDate !== null) {
            $array['blpu_end_date'] = $this->blpuEndDate;
        }

        if ($this->blpuLastUpdateDate !== null) {
            $array['blpu_last_update_date'] = $this->blpuLastUpdateDate;
        }

        if ($this->blpuEntryDate !== null) {
            $array['blpu_entry_date'] = $this->blpuEntryDate;
        }

        if ($this->udprn !== null) {
            $array['udprn'] = $this->udprn;
        }

        if ($this->organisationName !== null) {
            $array['organisation_name'] = $this->organisationName;
        }

        if ($this->legalName !== null) {
            $array['legal_name'] = $this->legalName;
        }

        if ($this->departmentName !== null) {
            $array['department_name'] = $this->departmentName;
        }

        if ($this->subBuildingName !== null) {
            $array['sub_building_name'] = $this->subBuildingName;
        }

        if ($this->buildingName !== null) {
            $array['building_name'] = $this->buildingName;
        }

        if ($this->buildingNumber !== null) {
            $array['building_number'] = $this->buildingNumber;
        }

        if ($this->dependentThoroughfare !== null) {
            $array['dependent_thoroughfare'] = $this->dependentThoroughfare;
        }

        if ($this->thoroughfare !== null) {
            $array['thoroughfare'] = $this->thoroughfare;
        }

        if ($this->doubleDependentLocality !== null) {
            $array['double_dependent_locality'] = $this->doubleDependentLocality;
        }

        if ($this->dependentLocality !== null) {
            $array['dependent_locality'] = $this->dependentLocality;
        }

        if ($this->postTown !== null) {
            $array['post_town'] = $this->postTown;
        }

        if ($this->postcodeType !== null) {
            $array['postcode_type'] = $this->postcodeType;
        }

        if ($this->deliveryPointSuffix !== null) {
            $array['delivery_point_suffix'] = $this->deliveryPointSuffix;
        }

        if ($this->poBoxNumber !== null) {
            $array['po_box_number'] = $this->poBoxNumber;
        }

        if ($this->welshDependentThoroughfare !== null) {
            $array['welsh_dependent_thoroughfare'] = $this->welshDependentThoroughfare;
        }

        if ($this->welshThoroughfare !== null) {
            $array['welsh_thoroughfare'] = $this->welshThoroughfare;
        }

        if ($this->welshDoubleDependentLocality !== null) {
            $array['welsh_double_dependent_locality'] = $this->welshDoubleDependentLocality;
        }

        if ($this->welshDependentLocality !== null) {
            $array['welsh_dependent_locality'] = $this->welshDependentLocality;
        }

        if ($this->welshPostTown !== null) {
            $array['welsh_post_town'] = $this->welshPostTown;
        }

        if ($this->dpaProcessDate !== null) {
            $array['dpa_process_date'] = $this->dpaProcessDate;
        }

        if ($this->dpaStartDate !== null) {
            $array['dpa_start_date'] = $this->dpaStartDate;
        }

        if ($this->dpaEndDate !== null) {
            $array['dpa_end_date'] = $this->dpaEndDate;
        }

        if ($this->dpaLastUpdateDate !== null) {
            $array['dpa_last_update_date'] = $this->dpaLastUpdateDate;
        }

        if ($this->dpaEntryDate !== null) {
            $array['dpa_entry_date'] = $this->dpaEntryDate;
        }

        if ($this->classificationCode !== null) {
            $array['classification_code'] = $this->classificationCode;
        }

        if ($this->classScheme !== null) {
            $array['class_scheme'] = $this->classScheme;
        }

        if ($this->schemeVersion !== null) {
            $array['scheme_version'] = $this->schemeVersion;
        }

        if ($this->classificationStartDate !== null) {
            $array['classification_start_date'] = $this->classificationStartDate;
        }

        if ($this->classificationEndDate !== null) {
            $array['classification_end_date'] = $this->classificationEndDate;
        }

        if ($this->classificationLastUpdateDate !== null) {
            $array['classification_last_update_date'] = $this->classificationLastUpdateDate;
        }

        if ($this->classificationEntryDate !== null) {
            $array['classification_entry_date'] = $this->classificationEntryDate;
        }

        if ($this->organisationStartDate !== null) {
            $array['organisation_start_date'] = $this->organisationStartDate;
        }

        if ($this->organisationEndDate !== null) {
            $array['organisation_end_date'] = $this->organisationEndDate;
        }

        if ($this->organisationLastUpdateDate !== null) {
            $array['organisation_last_update_date'] = $this->organisationLastUpdateDate;
        }

        if ($this->organisationEntryDate !== null) {
            $array['organisation_entry_date'] = $this->organisationEntryDate;
        }

        if ($this->lpiKey !== null) {
            $array['lpi_key'] = $this->lpiKey;
        }

        if ($this->lpiLanguage !== null) {
            $array['lpi_language'] = $this->lpiLanguage;
        }

        if ($this->lpiLogicalStatus !== null) {
            $array['lpi_logical_status'] = $this->lpiLogicalStatus;
        }

        if ($this->lpiStartDate !== null) {
            $array['lpi_start_date'] = $this->lpiStartDate;
        }

        if ($this->lpiEndDate !== null) {
            $array['lpi_end_date'] = $this->lpiEndDate;
        }

        if ($this->lpiLastUpdateDate !== null) {
            $array['lpi_last_update_date'] = $this->lpiLastUpdateDate;
        }

        if ($this->lpiEntryDate !== null) {
            $array['lpi_entry_date'] = $this->lpiEntryDate;
        }

        if ($this->saoStartNumber !== null) {
            $array['sao_start_number'] = $this->saoStartNumber;
        }

        if ($this->saoStartSuffix !== null) {
            $array['sao_start_suffix'] = $this->saoStartSuffix;
        }

        if ($this->saoEndNumber !== null) {
            $array['sao_end_number'] = $this->saoEndNumber;
        }

        if ($this->saoEndSuffix !== null) {
            $array['sao_end_suffix'] = $this->saoEndSuffix;
        }

        if ($this->saoText !== null) {
            $array['sao_text'] = $this->saoText;
        }

        if ($this->paoStartNumber !== null) {
            $array['pao_start_number'] = $this->paoStartNumber;
        }

        if ($this->paoStartSuffix !== null) {
            $array['pao_start_suffix'] = $this->paoStartSuffix;
        }

        if ($this->paoEndNumber !== null) {
            $array['pao_end_number'] = $this->paoEndNumber;
        }

        if ($this->paoEndSuffix !== null) {
            $array['pao_end_suffix'] = $this->paoEndSuffix;
        }

        if ($this->paoText !== null) {
            $array['pao_text'] = $this->paoText;
        }

        if ($this->usrn !== null) {
            $array['usrn'] = $this->usrn;
        }

        if ($this->usrnMatchIndicator !== null) {
            $array['usrn_match_indicator'] = $this->usrnMatchIndicator;
        }

        if ($this->areaName !== null) {
            $array['area_name'] = $this->areaName;
        }

        if ($this->level !== null) {
            $array['level'] = $this->level;
        }

        if ($this->officialFlag !== null) {
            $array['official_flag'] = $this->officialFlag;
        }

        if ($this->streetRecordType !== null) {
            $array['street_record_type'] = $this->streetRecordType;
        }

        if ($this->swaOrgRefNaming !== null) {
            $array['swa_org_ref_naming'] = $this->swaOrgRefNaming;
        }

        if ($this->streetState !== null) {
            $array['street_state'] = $this->streetState;
        }

        if ($this->streetStateDate !== null) {
            $array['street_state_date'] = $this->streetStateDate;
        }

        if ($this->streetSurface !== null) {
            $array['street_surface'] = $this->streetSurface;
        }

        if ($this->streetClassification !== null) {
            $array['street_classification'] = $this->streetClassification;
        }

        if ($this->streetStartDate !== null) {
            $array['street_start_date'] = $this->streetStartDate;
        }

        if ($this->streetLastUpdateDate !== null) {
            $array['street_last_update_date'] = $this->streetLastUpdateDate;
        }

        if ($this->streetRecordEntryDate !== null) {
            $array['street_record_entry_date'] = $this->streetRecordEntryDate;
        }

        if ($this->streetStartX !== null) {
            $array['street_start_x'] = $this->streetStartX;
        }

        if ($this->streetStartY !== null) {
            $array['street_start_y'] = $this->streetStartY;
        }

        if ($this->streetStartLat !== null) {
            $array['street_start_lat'] = $this->streetStartLat;
        }

        if ($this->streetStartLong !== null) {
            $array['street_start_long'] = $this->streetStartLong;
        }

        if ($this->streetEndX !== null) {
            $array['street_end_x'] = $this->streetEndX;
        }

        if ($this->streetEndY !== null) {
            $array['street_end_y'] = $this->streetEndY;
        }

        if ($this->streetEndLat !== null) {
            $array['street_end_lat'] = $this->streetEndLat;
        }

        if ($this->streetEndLong !== null) {
            $array['street_end_long'] = $this->streetEndLong;
        }

        if ($this->streetTolerance !== null) {
            $array['street_tolerance'] = $this->streetTolerance;
        }

        if ($this->streetDescription !== null) {
            $array['street_description'] = $this->streetDescription;
        }

        if ($this->streetLocality !== null) {
            $array['street_locality'] = $this->streetLocality;
        }

        if ($this->streetTown !== null) {
            $array['street_town'] = $this->streetTown;
        }

        if ($this->adminstrativeArea !== null) {
            $array['adminstrative_area'] = $this->adminstrativeArea;
        }

        if ($this->sdLanguage !== null) {
            $array['sd_language'] = $this->sdLanguage;
        }

        if ($this->sdStartDate !== null) {
            $array['sd_start_date'] = $this->sdStartDate;
        }

        if ($this->sdEndDate !== null) {
            $array['sd_end_date'] = $this->sdEndDate;
        }

        if ($this->sdLastUpdateDate !== null) {
            $array['sd_last_update_date'] = $this->sdLastUpdateDate;
        }

        if ($this->sdEntryDate !== null) {
            $array['sd_entry_date'] = $this->sdEntryDate;
        }

        if ($this->toid !== null) {
            $array['toid'] = $this->toid;
        }

        if ($this->toidAddress !== null) {
            $array['toid_address'] = $this->toidAddress;
        }

        if ($this->toidHighways !== null) {
            $array['toid_highways'] = $this->toidHighways;
        }

        if ($this->councilTaxRef !== null) {
            $array['council_tax_ref'] = $this->councilTaxRef;
        }

        if ($this->ndrRef !== null) {
            $array['ndr_ref'] = $this->ndrRef;
        }

        if ($this->onsWardCode !== null) {
            $array['ons_ward_code'] = $this->onsWardCode;
        }

        if ($this->onsParishCode !== null) {
            $array['ons_parish_code'] = $this->onsParishCode;
        }

        return $array;
    }
}
