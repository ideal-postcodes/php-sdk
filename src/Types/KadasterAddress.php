<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * Netherlands Kadaster Address
 *
 * A Netherlands address as recorded in the Kadaster BAG (Basisregistratie Adressen en Gebouwen), the Dutch national register of addresses and buildings.
 *
 * Fields are grouped by the BAG object they originate from: the verblijfsobject (unprefixed) and the related `nummeraanduidingen_`, `pand_`, `openbare_ruimte_` and `woonplaats_` objects.
 *
 * @phpstan-type KadasterAddressArray array{id: string, dataset: 'kadaster', country: 'Netherlands', country_iso: 'NLD', country_iso_2: 'NL', line_1: string, language: 'nl', address: string, identificatie: string, latitude: string|float|int, longitude: string|float|int, gebruiksdoel: string, oppervlakte: int, status: string, geconstateerd: bool, documentdatum: string, documentnummer: string, voorkomenidentificatie: ''|int, begin_geldigheid: string, eind_geldigheid: string, tijdstip_registratie: string, eind_registratie: string, tijdstip_registratie_lv: string, tijdstip_eind_registratie_lv: string, nummeraanduidingen_identificatie: string, nummeraanduidingen_huisnummer: string, nummeraanduidingen_huisnummertoevoeging: string, nummeraanduidingen_huisletter: string, nummeraanduidingen_postcode: string, nummeraanduidingen_type_adresseerbaar_object: string, nummeraanduidingen_status: string, nummeraanduidingen_geconstateerd: bool, nummeraanduidingen_documentdatum: string, nummeraanduidingen_documentnummer: string, nummeraanduidingen_voorkomenidentificatie: ''|int, nummeraanduidingen_begin_geldigheid: string, nummeraanduidingen_eind_geldigheid: string, nummeraanduidingen_tijdstip_registratie: string, nummeraanduidingen_eind_registratie: string, nummeraanduidingen_tijdstip_registratie_lv: string, nummeraanduidingen_tijdstip_eind_registratie_lv: string, pand_identificatie: string, pand_oorspronkelijk_bouwjaar: ''|int, pand_status: string, pand_geconstateerd: bool, pand_documentdatum: string, pand_documentnummer: string, pand_voorkomenidentificatie: ''|int, pand_begin_geldigheid: string, pand_eind_geldigheid: string, pand_tijdstip_registratie: string, pand_eind_registratie: string, pand_tijdstip_registratie_lv: string, pand_tijdstip_eind_registratie_lv: string, openbare_ruimte_identificatie: string, openbare_ruimte_naam: string, openbare_ruimte_type: string, openbare_ruimte_status: string, openbare_ruimte_geconstateerd: bool, openbare_ruimte_documentdatum: string, openbare_ruimte_documentnummer: string, openbare_ruimte_voorkomenidentificatie: ''|int, openbare_ruimte_begin_geldigheid: string, openbare_ruimte_eind_geldigheid: string, openbare_ruimte_tijdstip_registratie: string, openbare_ruimte_eind_registratie: string, openbare_ruimte_tijdstip_registratie_lv: string, openbare_ruimte_tijdstip_eind_registratie_lv: string, openbare_ruimte_verkorte_naam: string, woonplaats_identificatie: string, woonplaats_naam: string, woonplaats_status: string, woonplaats_geconstateerd: bool, woonplaats_documentdatum: string, woonplaats_documentnummer: string, woonplaats_voorkomenidentificatie: ''|int, woonplaats_begin_geldigheid: string, woonplaats_eind_geldigheid: string, woonplaats_tijdstip_registratie: string, woonplaats_eind_registratie: string, woonplaats_tijdstip_registratie_lv: string, woonplaats_tijdstip_eind_registratie_lv: string, provincie: 'Drenthe'|'Flevoland'|'Friesland'|'Gelderland'|'Groningen'|'Limburg'|'Noord-Brabant'|'Noord-Holland'|'Overijssel'|'Utrecht'|'Zeeland'|'Zuid-Holland'|''}
 *
 * @implements ResponseContract<KadasterAddressArray>
 */
final class KadasterAddress implements ResponseContract
{
    /** @use ArrayAccessible<KadasterAddressArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Globally unique internally generated identifier for an address
         */
        public readonly string $id,
        /**
         * Dataset the address originates from.
         *
         * @var 'kadaster'
         */
        public readonly string $dataset,
        /**
         * Full country names (ISO 3166)
         *
         * @var 'Netherlands'
         */
        public readonly string $country,
        /**
         * 3 letter country code (ISO 3166-1)
         *
         * @var 'NLD'
         */
        public readonly string $countryIso,
        /**
         * 2 letter country code (ISO 3166-1)
         *
         * @var 'NL'
         */
        public readonly string $countryIso2,
        /**
         * First address line: street name followed by house number.
         */
        public readonly string $line1,
        /**
         * Language represented by 2 letter ISO Code (639-1)
         *
         * @var 'nl'
         */
        public readonly string $language,
        /**
         * House number, uniquely identifying the address along the specified street. Combines huisnummer, huisletter and huisnummertoevoeging.
         */
        public readonly string $address,
        /**
         * The unique identifier of a BAG verblijfsobject.
         */
        public readonly string $identificatie,
        /**
         * The latitude of the address or postcode (WGS84).
         */
        public readonly string|float $latitude,
        /**
         * The longitude of the address or postcode (WGS84).
         */
        public readonly string|float $longitude,
        /**
         * The purpose of use of the verblijfsobject. E.g. `woonfunctie` (residential), `kantoorfunctie` (office), `winkelfunctie` (retail).
         */
        public readonly string $gebruiksdoel,
        /**
         * The floor area of the verblijfsobject in square metres.
         */
        public readonly int $oppervlakte,
        /**
         * Verblijfsobject status. E.g. `Verblijfsobject in gebruik` (in use).
         */
        public readonly string $status,
        /**
         * Indicates that a verblijfsobject has been included in the registry as a result of an observation, without there being a regular source document for this inclusion at the time of registration.
         */
        public readonly bool $geconstateerd,
        /**
         * Date on which the verblijfsobject source document was created.
         */
        public readonly string $documentdatum,
        /**
         * The unique identifier of the verblijfsobject source document.
         */
        public readonly string $documentnummer,
        /**
         * @var ''|int
         */
        public readonly string|int $voorkomenidentificatie,
        /**
         * The time at which a version of a verblijfsobject is valid in reality in accordance with the effective date in the source document. ISO 8601 timestamp.
         */
        public readonly string $beginGeldigheid,
        /**
         * The time at which a version of a verblijfsobject is no longer valid in reality. ISO 8601 timestamp.
         */
        public readonly string $eindGeldigheid,
        /**
         * The time at which a version of a verblijfsobject is registered by the bronhouder. ISO 8601 timestamp.
         */
        public readonly string $tijdstipRegistratie,
        /**
         * The time at which a version of a verblijfsobject is no longer valid according to the bronhouder. ISO 8601 timestamp.
         */
        public readonly string $eindRegistratie,
        /**
         * The time at which a version of a verblijfsobject is registered in the Landelijke Voorziening BAG. ISO 8601 timestamp.
         */
        public readonly string $tijdstipRegistratieLv,
        /**
         * The time at which a version of a verblijfsobject is no longer valid in the Landelijke Voorziening BAG. ISO 8601 timestamp.
         */
        public readonly string $tijdstipEindRegistratieLv,
        /**
         * The unique identifier of a BAG nummeraanduidingen object.
         */
        public readonly string $nummeraanduidingenIdentificatie,
        /**
         * The house number assigned to a nummeraanduiding object by or on behalf of the municipal council.
         */
        public readonly string $nummeraanduidingenHuisnummer,
        /**
         * A further addition to a house number, or to a combination of house number and house letter, granted by or on behalf of the municipal council with regard to a nummeraanduiding object.
         */
        public readonly string $nummeraanduidingenHuisnummertoevoeging,
        /**
         * An addition to a house number in the form of an alphanumeric character assigned by or on behalf of the municipal council with regard to a nummeraanduiding object.
         */
        public readonly string $nummeraanduidingenHuisletter,
        /**
         * A code determined by PostNL associated with a specific combination of a street name and a house number. Normalised to `1234 AB`.
         */
        public readonly string $nummeraanduidingenPostcode,
        /**
         * The nature of the nummeraanduiding object. Currently always `Verblijfsobject`.
         */
        public readonly string $nummeraanduidingenTypeAdresseerbaarObject,
        /**
         * The status of the nummeraanduiding object. E.g. `Naamgeving uitgegeven` (name issued), `Naamgeving ingetrokken` (name withdrawn).
         */
        public readonly string $nummeraanduidingenStatus,
        /**
         * Indicates that a nummeraanduidingen object has been included in the registry as a result of an observation, without there being a regular source document for this inclusion at the time of registration.
         */
        public readonly bool $nummeraanduidingenGeconstateerd,
        /**
         * Date on which the nummeraanduidingen object source document was created. ISO 8601 timestamp.
         */
        public readonly string $nummeraanduidingenDocumentdatum,
        /**
         * The unique identifier of the nummeraanduidingen object source document.
         */
        public readonly string $nummeraanduidingenDocumentnummer,
        /**
         * @var ''|int
         */
        public readonly string|int $nummeraanduidingenVoorkomenidentificatie,
        /**
         * The time at which a version of a nummeraanduidingen object is valid in reality in accordance with the effective date in the source document. ISO 8601 timestamp.
         */
        public readonly string $nummeraanduidingenBeginGeldigheid,
        /**
         * The time at which a version of a nummeraanduidingen object is no longer valid in reality. ISO 8601 timestamp.
         */
        public readonly string $nummeraanduidingenEindGeldigheid,
        /**
         * The time at which a version of a nummeraanduidingen object is registered by the bronhouder. ISO 8601 timestamp.
         */
        public readonly string $nummeraanduidingenTijdstipRegistratie,
        /**
         * The time at which a version of a nummeraanduidingen object is no longer valid according to the bronhouder. ISO 8601 timestamp.
         */
        public readonly string $nummeraanduidingenEindRegistratie,
        /**
         * The time at which a version of a nummeraanduidingen object is registered in the Landelijke Voorziening BAG. ISO 8601 timestamp.
         */
        public readonly string $nummeraanduidingenTijdstipRegistratieLv,
        /**
         * The time at which a version of a nummeraanduidingen object is no longer valid in the Landelijke Voorziening BAG. ISO 8601 timestamp.
         */
        public readonly string $nummeraanduidingenTijdstipEindRegistratieLv,
        /**
         * The unique identifier of a BAG pand object.
         */
        public readonly string $pandIdentificatie,
        /**
         * @var ''|int
         */
        public readonly string|int $pandOorspronkelijkBouwjaar,
        /**
         * The status of the pand object. E.g. `Pand in gebruik` (building in use).
         */
        public readonly string $pandStatus,
        /**
         * Indicates that a pand object has been included in the registry as a result of an observation, without there being a regular source document for this inclusion at the time of registration.
         */
        public readonly bool $pandGeconstateerd,
        /**
         * Date on which the pand object source document was created. ISO 8601 timestamp.
         */
        public readonly string $pandDocumentdatum,
        /**
         * The unique identifier of the pand object source document.
         */
        public readonly string $pandDocumentnummer,
        /**
         * @var ''|int
         */
        public readonly string|int $pandVoorkomenidentificatie,
        /**
         * The time at which a version of a pand object is valid in reality in accordance with the effective date in the source document. ISO 8601 timestamp.
         */
        public readonly string $pandBeginGeldigheid,
        /**
         * The time at which a version of a pand object is no longer valid in reality. ISO 8601 timestamp.
         */
        public readonly string $pandEindGeldigheid,
        /**
         * The time at which a version of a pand object is registered by the bronhouder. ISO 8601 timestamp.
         */
        public readonly string $pandTijdstipRegistratie,
        /**
         * The time at which a version of a pand object is no longer valid according to the bronhouder. ISO 8601 timestamp.
         */
        public readonly string $pandEindRegistratie,
        /**
         * The time at which a version of a pand object is registered in the Landelijke Voorziening BAG. ISO 8601 timestamp.
         */
        public readonly string $pandTijdstipRegistratieLv,
        /**
         * The time at which a version of a pand object is no longer valid in the Landelijke Voorziening BAG. ISO 8601 timestamp.
         */
        public readonly string $pandTijdstipEindRegistratieLv,
        /**
         * The unique identifier of a BAG openbare ruimte object.
         */
        public readonly string $openbareRuimteIdentificatie,
        /**
         * The name assigned to an openbare ruimte object by or on behalf of the municipal council. Usually the street name.
         */
        public readonly string $openbareRuimteNaam,
        /**
         * The nature of the openbare ruimte object. E.g. `Weg` (road), `Water`, `Spoorbaan` (railway).
         */
        public readonly string $openbareRuimteType,
        /**
         * The status of the openbare ruimte object. E.g. `Naamgeving uitgegeven` (name issued).
         */
        public readonly string $openbareRuimteStatus,
        /**
         * Indicates that an openbare ruimte object has been included in the registry as a result of an observation, without there being a regular source document for this inclusion at the time of registration.
         */
        public readonly bool $openbareRuimteGeconstateerd,
        /**
         * Date on which the openbare ruimte object source document was created. ISO 8601 timestamp.
         */
        public readonly string $openbareRuimteDocumentdatum,
        /**
         * The unique identifier of the openbare ruimte object source document.
         */
        public readonly string $openbareRuimteDocumentnummer,
        /**
         * @var ''|int
         */
        public readonly string|int $openbareRuimteVoorkomenidentificatie,
        /**
         * The time at which a version of an openbare ruimte object is valid in reality in accordance with the effective date in the source document. ISO 8601 timestamp.
         */
        public readonly string $openbareRuimteBeginGeldigheid,
        /**
         * The time at which a version of an openbare ruimte object is no longer valid in reality. ISO 8601 timestamp.
         */
        public readonly string $openbareRuimteEindGeldigheid,
        /**
         * The time at which a version of an openbare ruimte object is registered by the bronhouder. ISO 8601 timestamp.
         */
        public readonly string $openbareRuimteTijdstipRegistratie,
        /**
         * The time at which a version of an openbare ruimte object is no longer valid according to the bronhouder. ISO 8601 timestamp.
         */
        public readonly string $openbareRuimteEindRegistratie,
        /**
         * The time at which a version of an openbare ruimte object is registered in the Landelijke Voorziening BAG. ISO 8601 timestamp.
         */
        public readonly string $openbareRuimteTijdstipRegistratieLv,
        /**
         * The time at which a version of an openbare ruimte object is no longer valid in the Landelijke Voorziening BAG. ISO 8601 timestamp.
         */
        public readonly string $openbareRuimteTijdstipEindRegistratieLv,
        /**
         * An abbreviated name assigned to an openbare ruimte object if its name is longer than 24 characters.
         */
        public readonly string $openbareRuimteVerkorteNaam,
        /**
         * The unique identifier of a BAG woonplaats object.
         */
        public readonly string $woonplaatsIdentificatie,
        /**
         * The name assigned to a woonplaats object by or on behalf of the municipal council. The town or city name.
         */
        public readonly string $woonplaatsNaam,
        /**
         * The status of the woonplaats object. E.g. `Woonplaats aangewezen` (place of residence designated).
         */
        public readonly string $woonplaatsStatus,
        /**
         * Indicates that a woonplaats object has been included in the registry as a result of an observation, without there being a regular source document for this inclusion at the time of registration.
         */
        public readonly bool $woonplaatsGeconstateerd,
        /**
         * Date on which the woonplaats object source document was created. ISO 8601 timestamp.
         */
        public readonly string $woonplaatsDocumentdatum,
        /**
         * The unique identifier of the woonplaats object source document.
         */
        public readonly string $woonplaatsDocumentnummer,
        /**
         * @var ''|int
         */
        public readonly string|int $woonplaatsVoorkomenidentificatie,
        /**
         * The time at which a version of a woonplaats object is valid in reality in accordance with the effective date in the source document. ISO 8601 timestamp.
         */
        public readonly string $woonplaatsBeginGeldigheid,
        /**
         * The time at which a version of a woonplaats object is no longer valid in reality. ISO 8601 timestamp.
         */
        public readonly string $woonplaatsEindGeldigheid,
        /**
         * The time at which a version of a woonplaats object is registered by the bronhouder. ISO 8601 timestamp.
         */
        public readonly string $woonplaatsTijdstipRegistratie,
        /**
         * The time at which a version of a woonplaats object is no longer valid according to the bronhouder. ISO 8601 timestamp.
         */
        public readonly string $woonplaatsEindRegistratie,
        /**
         * The time at which a version of a woonplaats object is registered in the Landelijke Voorziening BAG. ISO 8601 timestamp.
         */
        public readonly string $woonplaatsTijdstipRegistratieLv,
        /**
         * The time at which a version of a woonplaats object is no longer valid in the Landelijke Voorziening BAG. ISO 8601 timestamp.
         */
        public readonly string $woonplaatsTijdstipEindRegistratieLv,
        /**
         * Province the address falls in, derived from the postcode.
         *
         * @var 'Drenthe'|'Flevoland'|'Friesland'|'Gelderland'|'Groningen'|'Limburg'|'Noord-Brabant'|'Noord-Holland'|'Overijssel'|'Utrecht'|'Zeeland'|'Zuid-Holland'|''
         */
        public readonly string $provincie,
    ) {}

    /**
     * @param  KadasterAddressArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'] ?? throw self::missing('id'),
            dataset: $attributes['dataset'] ?? throw self::missing('dataset'),
            country: $attributes['country'] ?? throw self::missing('country'),
            countryIso: $attributes['country_iso'] ?? throw self::missing('country_iso'),
            countryIso2: $attributes['country_iso_2'] ?? throw self::missing('country_iso_2'),
            line1: $attributes['line_1'] ?? throw self::missing('line_1'),
            language: $attributes['language'] ?? throw self::missing('language'),
            address: $attributes['address'] ?? throw self::missing('address'),
            identificatie: $attributes['identificatie'] ?? throw self::missing('identificatie'),
            latitude: $attributes['latitude'] ?? throw self::missing('latitude'),
            longitude: $attributes['longitude'] ?? throw self::missing('longitude'),
            gebruiksdoel: $attributes['gebruiksdoel'] ?? throw self::missing('gebruiksdoel'),
            oppervlakte: $attributes['oppervlakte'] ?? throw self::missing('oppervlakte'),
            status: $attributes['status'] ?? throw self::missing('status'),
            geconstateerd: $attributes['geconstateerd'] ?? throw self::missing('geconstateerd'),
            documentdatum: $attributes['documentdatum'] ?? throw self::missing('documentdatum'),
            documentnummer: $attributes['documentnummer'] ?? throw self::missing('documentnummer'),
            voorkomenidentificatie: $attributes['voorkomenidentificatie'] ?? throw self::missing('voorkomenidentificatie'),
            beginGeldigheid: $attributes['begin_geldigheid'] ?? throw self::missing('begin_geldigheid'),
            eindGeldigheid: $attributes['eind_geldigheid'] ?? throw self::missing('eind_geldigheid'),
            tijdstipRegistratie: $attributes['tijdstip_registratie'] ?? throw self::missing('tijdstip_registratie'),
            eindRegistratie: $attributes['eind_registratie'] ?? throw self::missing('eind_registratie'),
            tijdstipRegistratieLv: $attributes['tijdstip_registratie_lv'] ?? throw self::missing('tijdstip_registratie_lv'),
            tijdstipEindRegistratieLv: $attributes['tijdstip_eind_registratie_lv'] ?? throw self::missing('tijdstip_eind_registratie_lv'),
            nummeraanduidingenIdentificatie: $attributes['nummeraanduidingen_identificatie'] ?? throw self::missing('nummeraanduidingen_identificatie'),
            nummeraanduidingenHuisnummer: $attributes['nummeraanduidingen_huisnummer'] ?? throw self::missing('nummeraanduidingen_huisnummer'),
            nummeraanduidingenHuisnummertoevoeging: $attributes['nummeraanduidingen_huisnummertoevoeging'] ?? throw self::missing('nummeraanduidingen_huisnummertoevoeging'),
            nummeraanduidingenHuisletter: $attributes['nummeraanduidingen_huisletter'] ?? throw self::missing('nummeraanduidingen_huisletter'),
            nummeraanduidingenPostcode: $attributes['nummeraanduidingen_postcode'] ?? throw self::missing('nummeraanduidingen_postcode'),
            nummeraanduidingenTypeAdresseerbaarObject: $attributes['nummeraanduidingen_type_adresseerbaar_object'] ?? throw self::missing('nummeraanduidingen_type_adresseerbaar_object'),
            nummeraanduidingenStatus: $attributes['nummeraanduidingen_status'] ?? throw self::missing('nummeraanduidingen_status'),
            nummeraanduidingenGeconstateerd: $attributes['nummeraanduidingen_geconstateerd'] ?? throw self::missing('nummeraanduidingen_geconstateerd'),
            nummeraanduidingenDocumentdatum: $attributes['nummeraanduidingen_documentdatum'] ?? throw self::missing('nummeraanduidingen_documentdatum'),
            nummeraanduidingenDocumentnummer: $attributes['nummeraanduidingen_documentnummer'] ?? throw self::missing('nummeraanduidingen_documentnummer'),
            nummeraanduidingenVoorkomenidentificatie: $attributes['nummeraanduidingen_voorkomenidentificatie'] ?? throw self::missing('nummeraanduidingen_voorkomenidentificatie'),
            nummeraanduidingenBeginGeldigheid: $attributes['nummeraanduidingen_begin_geldigheid'] ?? throw self::missing('nummeraanduidingen_begin_geldigheid'),
            nummeraanduidingenEindGeldigheid: $attributes['nummeraanduidingen_eind_geldigheid'] ?? throw self::missing('nummeraanduidingen_eind_geldigheid'),
            nummeraanduidingenTijdstipRegistratie: $attributes['nummeraanduidingen_tijdstip_registratie'] ?? throw self::missing('nummeraanduidingen_tijdstip_registratie'),
            nummeraanduidingenEindRegistratie: $attributes['nummeraanduidingen_eind_registratie'] ?? throw self::missing('nummeraanduidingen_eind_registratie'),
            nummeraanduidingenTijdstipRegistratieLv: $attributes['nummeraanduidingen_tijdstip_registratie_lv'] ?? throw self::missing('nummeraanduidingen_tijdstip_registratie_lv'),
            nummeraanduidingenTijdstipEindRegistratieLv: $attributes['nummeraanduidingen_tijdstip_eind_registratie_lv'] ?? throw self::missing('nummeraanduidingen_tijdstip_eind_registratie_lv'),
            pandIdentificatie: $attributes['pand_identificatie'] ?? throw self::missing('pand_identificatie'),
            pandOorspronkelijkBouwjaar: $attributes['pand_oorspronkelijk_bouwjaar'] ?? throw self::missing('pand_oorspronkelijk_bouwjaar'),
            pandStatus: $attributes['pand_status'] ?? throw self::missing('pand_status'),
            pandGeconstateerd: $attributes['pand_geconstateerd'] ?? throw self::missing('pand_geconstateerd'),
            pandDocumentdatum: $attributes['pand_documentdatum'] ?? throw self::missing('pand_documentdatum'),
            pandDocumentnummer: $attributes['pand_documentnummer'] ?? throw self::missing('pand_documentnummer'),
            pandVoorkomenidentificatie: $attributes['pand_voorkomenidentificatie'] ?? throw self::missing('pand_voorkomenidentificatie'),
            pandBeginGeldigheid: $attributes['pand_begin_geldigheid'] ?? throw self::missing('pand_begin_geldigheid'),
            pandEindGeldigheid: $attributes['pand_eind_geldigheid'] ?? throw self::missing('pand_eind_geldigheid'),
            pandTijdstipRegistratie: $attributes['pand_tijdstip_registratie'] ?? throw self::missing('pand_tijdstip_registratie'),
            pandEindRegistratie: $attributes['pand_eind_registratie'] ?? throw self::missing('pand_eind_registratie'),
            pandTijdstipRegistratieLv: $attributes['pand_tijdstip_registratie_lv'] ?? throw self::missing('pand_tijdstip_registratie_lv'),
            pandTijdstipEindRegistratieLv: $attributes['pand_tijdstip_eind_registratie_lv'] ?? throw self::missing('pand_tijdstip_eind_registratie_lv'),
            openbareRuimteIdentificatie: $attributes['openbare_ruimte_identificatie'] ?? throw self::missing('openbare_ruimte_identificatie'),
            openbareRuimteNaam: $attributes['openbare_ruimte_naam'] ?? throw self::missing('openbare_ruimte_naam'),
            openbareRuimteType: $attributes['openbare_ruimte_type'] ?? throw self::missing('openbare_ruimte_type'),
            openbareRuimteStatus: $attributes['openbare_ruimte_status'] ?? throw self::missing('openbare_ruimte_status'),
            openbareRuimteGeconstateerd: $attributes['openbare_ruimte_geconstateerd'] ?? throw self::missing('openbare_ruimte_geconstateerd'),
            openbareRuimteDocumentdatum: $attributes['openbare_ruimte_documentdatum'] ?? throw self::missing('openbare_ruimte_documentdatum'),
            openbareRuimteDocumentnummer: $attributes['openbare_ruimte_documentnummer'] ?? throw self::missing('openbare_ruimte_documentnummer'),
            openbareRuimteVoorkomenidentificatie: $attributes['openbare_ruimte_voorkomenidentificatie'] ?? throw self::missing('openbare_ruimte_voorkomenidentificatie'),
            openbareRuimteBeginGeldigheid: $attributes['openbare_ruimte_begin_geldigheid'] ?? throw self::missing('openbare_ruimte_begin_geldigheid'),
            openbareRuimteEindGeldigheid: $attributes['openbare_ruimte_eind_geldigheid'] ?? throw self::missing('openbare_ruimte_eind_geldigheid'),
            openbareRuimteTijdstipRegistratie: $attributes['openbare_ruimte_tijdstip_registratie'] ?? throw self::missing('openbare_ruimte_tijdstip_registratie'),
            openbareRuimteEindRegistratie: $attributes['openbare_ruimte_eind_registratie'] ?? throw self::missing('openbare_ruimte_eind_registratie'),
            openbareRuimteTijdstipRegistratieLv: $attributes['openbare_ruimte_tijdstip_registratie_lv'] ?? throw self::missing('openbare_ruimte_tijdstip_registratie_lv'),
            openbareRuimteTijdstipEindRegistratieLv: $attributes['openbare_ruimte_tijdstip_eind_registratie_lv'] ?? throw self::missing('openbare_ruimte_tijdstip_eind_registratie_lv'),
            openbareRuimteVerkorteNaam: $attributes['openbare_ruimte_verkorte_naam'] ?? throw self::missing('openbare_ruimte_verkorte_naam'),
            woonplaatsIdentificatie: $attributes['woonplaats_identificatie'] ?? throw self::missing('woonplaats_identificatie'),
            woonplaatsNaam: $attributes['woonplaats_naam'] ?? throw self::missing('woonplaats_naam'),
            woonplaatsStatus: $attributes['woonplaats_status'] ?? throw self::missing('woonplaats_status'),
            woonplaatsGeconstateerd: $attributes['woonplaats_geconstateerd'] ?? throw self::missing('woonplaats_geconstateerd'),
            woonplaatsDocumentdatum: $attributes['woonplaats_documentdatum'] ?? throw self::missing('woonplaats_documentdatum'),
            woonplaatsDocumentnummer: $attributes['woonplaats_documentnummer'] ?? throw self::missing('woonplaats_documentnummer'),
            woonplaatsVoorkomenidentificatie: $attributes['woonplaats_voorkomenidentificatie'] ?? throw self::missing('woonplaats_voorkomenidentificatie'),
            woonplaatsBeginGeldigheid: $attributes['woonplaats_begin_geldigheid'] ?? throw self::missing('woonplaats_begin_geldigheid'),
            woonplaatsEindGeldigheid: $attributes['woonplaats_eind_geldigheid'] ?? throw self::missing('woonplaats_eind_geldigheid'),
            woonplaatsTijdstipRegistratie: $attributes['woonplaats_tijdstip_registratie'] ?? throw self::missing('woonplaats_tijdstip_registratie'),
            woonplaatsEindRegistratie: $attributes['woonplaats_eind_registratie'] ?? throw self::missing('woonplaats_eind_registratie'),
            woonplaatsTijdstipRegistratieLv: $attributes['woonplaats_tijdstip_registratie_lv'] ?? throw self::missing('woonplaats_tijdstip_registratie_lv'),
            woonplaatsTijdstipEindRegistratieLv: $attributes['woonplaats_tijdstip_eind_registratie_lv'] ?? throw self::missing('woonplaats_tijdstip_eind_registratie_lv'),
            provincie: $attributes['provincie'] ?? throw self::missing('provincie'),
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
            'line_1' => $this->line1,
            'language' => $this->language,
            'address' => $this->address,
            'identificatie' => $this->identificatie,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'gebruiksdoel' => $this->gebruiksdoel,
            'oppervlakte' => $this->oppervlakte,
            'status' => $this->status,
            'geconstateerd' => $this->geconstateerd,
            'documentdatum' => $this->documentdatum,
            'documentnummer' => $this->documentnummer,
            'voorkomenidentificatie' => $this->voorkomenidentificatie,
            'begin_geldigheid' => $this->beginGeldigheid,
            'eind_geldigheid' => $this->eindGeldigheid,
            'tijdstip_registratie' => $this->tijdstipRegistratie,
            'eind_registratie' => $this->eindRegistratie,
            'tijdstip_registratie_lv' => $this->tijdstipRegistratieLv,
            'tijdstip_eind_registratie_lv' => $this->tijdstipEindRegistratieLv,
            'nummeraanduidingen_identificatie' => $this->nummeraanduidingenIdentificatie,
            'nummeraanduidingen_huisnummer' => $this->nummeraanduidingenHuisnummer,
            'nummeraanduidingen_huisnummertoevoeging' => $this->nummeraanduidingenHuisnummertoevoeging,
            'nummeraanduidingen_huisletter' => $this->nummeraanduidingenHuisletter,
            'nummeraanduidingen_postcode' => $this->nummeraanduidingenPostcode,
            'nummeraanduidingen_type_adresseerbaar_object' => $this->nummeraanduidingenTypeAdresseerbaarObject,
            'nummeraanduidingen_status' => $this->nummeraanduidingenStatus,
            'nummeraanduidingen_geconstateerd' => $this->nummeraanduidingenGeconstateerd,
            'nummeraanduidingen_documentdatum' => $this->nummeraanduidingenDocumentdatum,
            'nummeraanduidingen_documentnummer' => $this->nummeraanduidingenDocumentnummer,
            'nummeraanduidingen_voorkomenidentificatie' => $this->nummeraanduidingenVoorkomenidentificatie,
            'nummeraanduidingen_begin_geldigheid' => $this->nummeraanduidingenBeginGeldigheid,
            'nummeraanduidingen_eind_geldigheid' => $this->nummeraanduidingenEindGeldigheid,
            'nummeraanduidingen_tijdstip_registratie' => $this->nummeraanduidingenTijdstipRegistratie,
            'nummeraanduidingen_eind_registratie' => $this->nummeraanduidingenEindRegistratie,
            'nummeraanduidingen_tijdstip_registratie_lv' => $this->nummeraanduidingenTijdstipRegistratieLv,
            'nummeraanduidingen_tijdstip_eind_registratie_lv' => $this->nummeraanduidingenTijdstipEindRegistratieLv,
            'pand_identificatie' => $this->pandIdentificatie,
            'pand_oorspronkelijk_bouwjaar' => $this->pandOorspronkelijkBouwjaar,
            'pand_status' => $this->pandStatus,
            'pand_geconstateerd' => $this->pandGeconstateerd,
            'pand_documentdatum' => $this->pandDocumentdatum,
            'pand_documentnummer' => $this->pandDocumentnummer,
            'pand_voorkomenidentificatie' => $this->pandVoorkomenidentificatie,
            'pand_begin_geldigheid' => $this->pandBeginGeldigheid,
            'pand_eind_geldigheid' => $this->pandEindGeldigheid,
            'pand_tijdstip_registratie' => $this->pandTijdstipRegistratie,
            'pand_eind_registratie' => $this->pandEindRegistratie,
            'pand_tijdstip_registratie_lv' => $this->pandTijdstipRegistratieLv,
            'pand_tijdstip_eind_registratie_lv' => $this->pandTijdstipEindRegistratieLv,
            'openbare_ruimte_identificatie' => $this->openbareRuimteIdentificatie,
            'openbare_ruimte_naam' => $this->openbareRuimteNaam,
            'openbare_ruimte_type' => $this->openbareRuimteType,
            'openbare_ruimte_status' => $this->openbareRuimteStatus,
            'openbare_ruimte_geconstateerd' => $this->openbareRuimteGeconstateerd,
            'openbare_ruimte_documentdatum' => $this->openbareRuimteDocumentdatum,
            'openbare_ruimte_documentnummer' => $this->openbareRuimteDocumentnummer,
            'openbare_ruimte_voorkomenidentificatie' => $this->openbareRuimteVoorkomenidentificatie,
            'openbare_ruimte_begin_geldigheid' => $this->openbareRuimteBeginGeldigheid,
            'openbare_ruimte_eind_geldigheid' => $this->openbareRuimteEindGeldigheid,
            'openbare_ruimte_tijdstip_registratie' => $this->openbareRuimteTijdstipRegistratie,
            'openbare_ruimte_eind_registratie' => $this->openbareRuimteEindRegistratie,
            'openbare_ruimte_tijdstip_registratie_lv' => $this->openbareRuimteTijdstipRegistratieLv,
            'openbare_ruimte_tijdstip_eind_registratie_lv' => $this->openbareRuimteTijdstipEindRegistratieLv,
            'openbare_ruimte_verkorte_naam' => $this->openbareRuimteVerkorteNaam,
            'woonplaats_identificatie' => $this->woonplaatsIdentificatie,
            'woonplaats_naam' => $this->woonplaatsNaam,
            'woonplaats_status' => $this->woonplaatsStatus,
            'woonplaats_geconstateerd' => $this->woonplaatsGeconstateerd,
            'woonplaats_documentdatum' => $this->woonplaatsDocumentdatum,
            'woonplaats_documentnummer' => $this->woonplaatsDocumentnummer,
            'woonplaats_voorkomenidentificatie' => $this->woonplaatsVoorkomenidentificatie,
            'woonplaats_begin_geldigheid' => $this->woonplaatsBeginGeldigheid,
            'woonplaats_eind_geldigheid' => $this->woonplaatsEindGeldigheid,
            'woonplaats_tijdstip_registratie' => $this->woonplaatsTijdstipRegistratie,
            'woonplaats_eind_registratie' => $this->woonplaatsEindRegistratie,
            'woonplaats_tijdstip_registratie_lv' => $this->woonplaatsTijdstipRegistratieLv,
            'woonplaats_tijdstip_eind_registratie_lv' => $this->woonplaatsTijdstipEindRegistratieLv,
            'provincie' => $this->provincie,
        ];
    }
}
