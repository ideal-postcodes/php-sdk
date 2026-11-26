<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * Address (list endpoints)
 *
 * A single address, as returned by the postcode and address list endpoints. Every other endpoint returns `Address`, the same set of fields with `native` on every record.
 *
 * The standard Ideal Postcodes address. Its fields follow the layout UK address databases typically use, and much of it reflects Royal Mail's Postcode Address File, the UK's primary address database.
 *
 * The API converts non-UK addresses into the same UK layout so they insert into a standard address database.
 *
 * Pay attention to the address lines (`line_1`, `line_2` and `line_3`), post town, postcode, county and country. Together they are all you need to identify an address uniquely, in the UK or as an international address.
 *
 * For international addresses, cities map to `post_town` and states map to `county`.
 *
 * Addresses from AddressBase (`ab`, `abp`) and non-UK datasets also carry a `native` object: the raw record from its source dataset, with local detail the standard fields cannot hold. It is never returned for the Royal Mail PAF family (`paf`, `mr`, `nyb`, `pafa`, `pafw`) on these two endpoints. E.g.
 *
 * - ECAD records say whether an address sits in a Gaeltacht (Irish-speaking) district and whether the building is residential or commercial
 * - USPS records carry the carrier route and congressional district
 * - Kadaster records carry the floor area, year of completion and use (residential, office, retail)
 *
 * @phpstan-import-type AbAddressArray from AbAddress
 * @phpstan-import-type AbpAddressArray from AbpAddress
 * @phpstan-import-type BanAddressArray from BanAddress
 * @phpstan-import-type BevAddressArray from BevAddress
 * @phpstan-import-type CannarAddressArray from CannarAddress
 * @phpstan-import-type EcadAddressArray from EcadAddress
 * @phpstan-import-type EcafAddressArray from EcafAddress
 * @phpstan-import-type FodbosaAddressArray from FodbosaAddress
 * @phpstan-import-type GnafAddressArray from GnafAddress
 * @phpstan-import-type HereAddressArray from HereAddress
 * @phpstan-import-type KadasterAddressArray from KadasterAddress
 * @phpstan-import-type KartverketAddressArray from KartverketAddress
 * @phpstan-import-type MoisAddressArray from MoisAddress
 * @phpstan-import-type SdfiAddressArray from SdfiAddress
 * @phpstan-import-type SwtAddressArray from SwtAddress
 * @phpstan-import-type UpujpAddressArray from UpujpAddress
 * @phpstan-import-type UspsAddressArray from UspsAddress
 * @phpstan-type AddressListItemArray array{id: string, dataset: 'paf'|'pafw'|'pafa'|'mr'|'nyb'|'usps'|'ecaf'|'ecad'|'ab'|'abp'|'herewe'|'heret'|'heresa'|'hereo'|'herena'|'heremeas'|'heremea'|'herem'|'herei'|'herehk'|'hereee'|'hereap'|'gnaf'|'kadaster'|'kartverket'|'sdfi'|'cannar'|'fodbosa'|'mois'|'upujp'|'bev'|'ban'|'swt', country_iso: 'GBR'|'IMN'|'JEY'|'GGY'|'USA'|'PRI'|'GUM'|'IRL'|'VAT'|'FRA'|'GRL'|'NLD'|'LUX'|'AUT'|'GIB'|'LIE'|'FIN'|'ISL'|'CHE'|'PRT'|'BEL'|'MCO'|'ITA'|'FRO'|'NOR'|'DNK'|'SMR'|'MLT'|'AND'|'SWE'|'DEU'|'ESP'|'SJM'|'BRN'|'IDN'|'KHM'|'MMR'|'MYS'|'PHL'|'SGP'|'THA'|'TLS'|'VNM'|'ALB'|'ARM'|'AZE'|'BGR'|'BIH'|'BLR'|'CYP'|'CZE'|'EST'|'GEO'|'GRC'|'HRV'|'HUN'|'KAZ'|'KGZ'|'LTU'|'LVA'|'MDA'|'MKD'|'MNE'|'POL'|'ROU'|'RUS'|'SRB'|'SVK'|'SVN'|'TUR'|'UKR'|'UZB'|'XKX'|'HKG'|'BGD'|'IND'|'LKA'|'MAC'|'AGO'|'ARE'|'BFA'|'BHR'|'BWA'|'CMR'|'EGY'|'GHA'|'ISR'|'JOR'|'KEN'|'KWT'|'LBN'|'LSO'|'MAR'|'MOZ'|'MUS'|'MYT'|'NAM'|'NGA'|'OMN'|'QAT'|'REU'|'SAU'|'SEN'|'SWZ'|'TUN'|'ZAF'|'ZMB'|'ZWE'|'BHS'|'BLZ'|'BMU'|'CAN'|'CRI'|'CYM'|'DOM'|'GTM'|'HND'|'HTI'|'JAM'|'MEX'|'NIC'|'PAN'|'SLV'|'VGB'|'AUS'|'CCK'|'CXR'|'FJI'|'NCL'|'NFK'|'NZL'|'PYF'|'TON'|'VUT'|'ABW'|'ARG'|'BLM'|'BOL'|'BRA'|'BRB'|'CHL'|'COL'|'CUW'|'DMA'|'ECU'|'GLP'|'GUF'|'GUY'|'MAF'|'MTQ'|'PER'|'PRY'|'SUR'|'TTO'|'URY'|'VEN'|'TWN'|'CHN'|'JPN'|'KOR'|'LAO'|'MNG'|'PNG'|'PRK'|'SLB'|'TJK'|'TKM'|'BTN'|'IOT'|'MDV'|'NPL'|'PAK'|'AFG'|'BDI'|'BEN'|'CAF'|'CIV'|'COD'|'COG'|'COM'|'CPV'|'DJI'|'DZA'|'ERI'|'ESH'|'ETH'|'GAB'|'GIN'|'GMB'|'GNB'|'GNQ'|'IRN'|'IRQ'|'LBR'|'LBY'|'MDG'|'MLI'|'MRT'|'MWI'|'NER'|'RWA'|'SHN'|'SLE'|'SOM'|'SSD'|'STP'|'SYC'|'TCD'|'TGO'|'TZA'|'UGA'|'SDN'|'SYR'|'YEM'|'CUB'|'SPM'|'TCA'|'COK'|'KIR'|'NIU'|'NRU'|'PCN'|'TKL'|'TUV'|'WLF'|'WSM'|'AIA'|'ATG'|'BES'|'FLK'|'GRD'|'KNA'|'LCA'|'MSR'|'SGS'|'SXM'|'VCT'|'ASM'|'FSM'|'MHL'|'MNP'|'PLW'|'VIR', country_iso_2: 'GB'|'IM'|'JE'|'GG'|'US'|'PR'|'GU'|'IE'|'VA'|'FR'|'GL'|'NL'|'LU'|'AT'|'GI'|'LI'|'FI'|'IS'|'CH'|'PT'|'BE'|'MC'|'IT'|'FO'|'NO'|'DK'|'SM'|'MT'|'AD'|'SE'|'DE'|'ES'|'SJ'|'BS'|'BZ'|'BM'|'CA'|'CR'|'KY'|'DO'|'GT'|'HN'|'HT'|'JM'|'MX'|'NI'|'PA'|'SV'|'VG'|'AU'|'CC'|'CX'|'FJ'|'NC'|'NF'|'NZ'|'PF'|'TO'|'VU'|'AW'|'AR'|'BL'|'BO'|'BR'|'BB'|'CL'|'CO'|'CW'|'DM'|'EC'|'GP'|'GD'|'GF'|'GY'|'MF'|'MQ'|'PE'|'PY'|'SR'|'TT'|'UY'|'VE'|'TW'|'BN'|'ID'|'KH'|'MM'|'MY'|'PH'|'SG'|'TH'|'TL'|'VN'|'AL'|'AM'|'AZ'|'BG'|'BA'|'BY'|'CY'|'CZ'|'EE'|'GE'|'GR'|'HR'|'HU'|'KZ'|'KG'|'XK'|'LT'|'LV'|'MD'|'MK'|'ME'|'PL'|'RO'|'RU'|'RS'|'SK'|'SI'|'TR'|'UA'|'UZ'|'HK'|'BD'|'IN'|'LK'|'MO'|'AO'|'AE'|'BF'|'BH'|'BW'|'CM'|'EG'|'GH'|'IL'|'JO'|'KE'|'KW'|'LB'|'LS'|'MA'|'MZ'|'MU'|'YT'|'NA'|'NG'|'OM'|'QA'|'RE'|'SA'|'SN'|'SZ'|'TN'|'ZA'|'ZM'|'ZW'|'CN'|'JP'|'KR'|'LA'|'MN'|'PG'|'KP'|'SB'|'TJ'|'TM'|'BT'|'IO'|'MV'|'NP'|'PK'|'AF'|'BI'|'BJ'|'CF'|'CI'|'CD'|'CG'|'KM'|'CV'|'DJ'|'DZ'|'ER'|'EH'|'ET'|'GA'|'GN'|'GM'|'GW'|'GQ'|'IR'|'IQ'|'LR'|'LY'|'MG'|'ML'|'MR'|'MW'|'NE'|'RW'|'SH'|'SL'|'SO'|'SS'|'ST'|'SC'|'TD'|'TG'|'TZ'|'UG'|'SD'|'SY'|'YE'|'CU'|'PM'|'TC'|'CK'|'KI'|'NU'|'NR'|'PN'|'TK'|'TV'|'WF'|'WS'|'AI'|'AG'|'BQ'|'FK'|'KN'|'LC'|'MS'|'GS'|'SX'|'VC'|'AS'|'FM'|'MH'|'MP'|'PW'|'VI', country: 'United Kingdom'|'England'|'Scotland'|'Wales'|'Northern Ireland'|'Isle of Man'|'Jersey'|'Guernsey'|'Channel Islands'|'Guam'|'United States'|'Puerto Rico'|'Ireland'|'Vatican City'|'France'|'Greenland'|'Netherlands'|'Luxembourg'|'Austria'|'Gibraltar'|'Liechtenstein'|'Finland'|'Iceland'|'Switzerland'|'Portugal'|'Belgium'|'Monaco'|'Italy'|'Faroe Islands'|'Norway'|'Denmark'|'San Marino'|'Malta'|'Andorra'|'Sweden'|'Germany'|'Spain'|'Svalbard and Jan Mayen'|'Bahamas'|'Belize'|'Bermuda'|'Canada'|'Costa Rica'|'Cayman Islands'|'Dominican Republic'|'Guatemala'|'Honduras'|'Haiti'|'Jamaica'|'Mexico'|'Nicaragua'|'Panama'|'El Salvador'|'British Virgin Islands'|'Australia'|'Cocos (Keeling) Islands'|'Christmas Island'|'Fiji'|'New Caledonia'|'Norfolk Island'|'New Zealand'|'French Polynesia'|'Tonga'|'Vanuatu'|'Aruba'|'Argentina'|'Saint Barthélemy'|'Bolivia'|'Brazil'|'Barbados'|'Chile'|'Colombia'|'Curaçao'|'Dominica'|'Ecuador'|'Guadeloupe'|'Grenada'|'French Guiana'|'Guyana'|'Saint Martin (French part)'|'Martinique'|'Peru'|'Paraguay'|'Suriname'|'Trinidad and Tobago'|'Uruguay'|'Venezuela'|'Taiwan'|'Brunei Darussalam'|'Indonesia'|'Cambodia'|'Myanmar'|'Malaysia'|'Philippines'|'Singapore'|'Thailand'|'Timor-Leste'|'Vietnam'|'Albania'|'Armenia'|'Azerbaijan'|'Bulgaria'|'Bosnia and Herzegovina'|'Belarus'|'Cyprus'|'Czech Republic'|'Estonia'|'Georgia'|'Greece'|'Croatia'|'Hungary'|'Kazakhstan'|'Kyrgyzstan'|'Kosovo'|'Lithuania'|'Latvia'|'Moldova'|'North Macedonia'|'Montenegro'|'Poland'|'Romania'|'Russia'|'Serbia'|'Slovakia'|'Slovenia'|'Turkey'|'Ukraine'|'Uzbekistan'|'Hong Kong'|'Bangladesh'|'India'|'Sri Lanka'|'Macau'|'Angola'|'United Arab Emirates'|'Burkina Faso'|'Bahrain'|'Botswana'|'Cameroon'|'Egypt'|'Ghana'|'Israel'|'Jordan'|'Kenya'|'Kuwait'|'Lebanon'|'Lesotho'|'Morocco'|'Mozambique'|'Mauritius'|'Mayotte'|'Namibia'|'Nigeria'|'Oman'|'Qatar'|'Réunion'|'Saudi Arabia'|'Senegal'|'Eswatini'|'Tunisia'|'South Africa'|'Zambia'|'Zimbabwe'|'China'|'Japan'|'South Korea'|'Laos'|'Mongolia'|'Papua New Guinea'|'North Korea'|'Solomon Islands'|'Tajikistan'|'Turkmenistan'|'Bhutan'|'British Indian Ocean Territory'|'Maldives'|'Nepal'|'Pakistan'|'Afghanistan'|'Burundi'|'Benin'|'Central African Republic'|'Côte d\'Ivoire'|'Democratic Republic of the Congo'|'Republic of the Congo'|'Comoros'|'Cape Verde'|'Djibouti'|'Algeria'|'Eritrea'|'Western Sahara'|'Ethiopia'|'Gabon'|'Guinea'|'Gambia'|'Guinea-Bissau'|'Equatorial Guinea'|'Iran'|'Iraq'|'Liberia'|'Libya'|'Madagascar'|'Mali'|'Mauritania'|'Malawi'|'Niger'|'Rwanda'|'Saint Helena'|'Sierra Leone'|'Somalia'|'South Sudan'|'São Tomé and Príncipe'|'Seychelles'|'Chad'|'Togo'|'Tanzania'|'Uganda'|'Sudan'|'Syria'|'Yemen'|'Cuba'|'Saint Pierre and Miquelon'|'Turks and Caicos Islands'|'Cook Islands'|'Kiribati'|'Niue'|'Nauru'|'Pitcairn Islands'|'Tokelau'|'Tuvalu'|'Wallis and Futuna'|'Samoa'|'Anguilla'|'Antigua and Barbuda'|'Bonaire, Sint Eustatius and Saba'|'Falkland Islands (Malvinas)'|'Saint Kitts and Nevis'|'Saint Lucia'|'Montserrat'|'South Georgia and the South Sandwich Islands'|'Sint Maarten (Dutch part)'|'Saint Vincent and the Grenadines'|'American Samoa'|'Federated States of Micronesia'|'Marshall Islands'|'Northern Mariana Islands'|'Palau'|'United States Virgin Islands', language: 'en'|'ar'|'as'|'az'|'be'|'bg'|'bn'|'bs'|'ca'|'cs'|'cy'|'da'|'de'|'el'|'es'|'et'|'eu'|'fi'|'fo'|'fr'|'ga'|'gl'|'gn'|'he'|'hi'|'hr'|'hu'|'hy'|'id'|'is'|'it'|'ja'|'ka'|'kk'|'km'|'kn'|'ko'|'lt'|'lv'|'mk'|'mn'|'ms'|'mt'|'my'|'nl'|'no'|'pl'|'pt'|'rm'|'ro'|'ru'|'sk'|'sl'|'sq'|'sr'|'sv'|'ta'|'th'|'tr'|'uk'|'uz'|'vi'|'wa'|'zh', line_1: string, line_2: string, line_3: string, post_town: string, postcode: string, county: string, county_code: string, uprn: string, udprn: int|'', umprn: string|float|int, postcode_outward: string, postcode_inward: string, dependant_locality: string, double_dependant_locality: string, thoroughfare: string, dependant_thoroughfare: string, building_number: string, building_name: string, sub_building_name: string, po_box: string, department_name: string, organisation_name: string, postcode_type: 'S'|'L'|'', su_organisation_indicator: string, delivery_point_suffix: string, premise: string, administrative_county: string, postal_county: string, traditional_county: string, district: string, ward: string, longitude: string|float|int, latitude: string|float|int, eastings: string|float|int, northings: string|float|int, native?: AbAddressArray|AbpAddressArray|UspsAddressArray|EcadAddressArray|EcafAddressArray|HereAddressArray|GnafAddressArray|KadasterAddressArray|KartverketAddressArray|SdfiAddressArray|CannarAddressArray|FodbosaAddressArray|MoisAddressArray|UpujpAddressArray|BevAddressArray|BanAddressArray|SwtAddressArray|array<string, mixed>|null}
 *
 * @implements ResponseContract<AddressListItemArray>
 */
final class AddressListItem implements ResponseContract
{
    /** @use ArrayAccessible<AddressListItemArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Globally unique internally generated identifier for an address
         */
        public readonly string $id,
        /**
         * Indicates the provenance of an address.
         *
         * @var 'paf'|'pafw'|'pafa'|'mr'|'nyb'|'usps'|'ecaf'|'ecad'|'ab'|'abp'|'herewe'|'heret'|'heresa'|'hereo'|'herena'|'heremeas'|'heremea'|'herem'|'herei'|'herehk'|'hereee'|'hereap'|'gnaf'|'kadaster'|'kartverket'|'sdfi'|'cannar'|'fodbosa'|'mois'|'upujp'|'bev'|'ban'|'swt'
         */
        public readonly string $dataset,
        /**
         * 3 letter country code (ISO 3166-1)
         *
         * @var 'GBR'|'IMN'|'JEY'|'GGY'|'USA'|'PRI'|'GUM'|'IRL'|'VAT'|'FRA'|'GRL'|'NLD'|'LUX'|'AUT'|'GIB'|'LIE'|'FIN'|'ISL'|'CHE'|'PRT'|'BEL'|'MCO'|'ITA'|'FRO'|'NOR'|'DNK'|'SMR'|'MLT'|'AND'|'SWE'|'DEU'|'ESP'|'SJM'|'BRN'|'IDN'|'KHM'|'MMR'|'MYS'|'PHL'|'SGP'|'THA'|'TLS'|'VNM'|'ALB'|'ARM'|'AZE'|'BGR'|'BIH'|'BLR'|'CYP'|'CZE'|'EST'|'GEO'|'GRC'|'HRV'|'HUN'|'KAZ'|'KGZ'|'LTU'|'LVA'|'MDA'|'MKD'|'MNE'|'POL'|'ROU'|'RUS'|'SRB'|'SVK'|'SVN'|'TUR'|'UKR'|'UZB'|'XKX'|'HKG'|'BGD'|'IND'|'LKA'|'MAC'|'AGO'|'ARE'|'BFA'|'BHR'|'BWA'|'CMR'|'EGY'|'GHA'|'ISR'|'JOR'|'KEN'|'KWT'|'LBN'|'LSO'|'MAR'|'MOZ'|'MUS'|'MYT'|'NAM'|'NGA'|'OMN'|'QAT'|'REU'|'SAU'|'SEN'|'SWZ'|'TUN'|'ZAF'|'ZMB'|'ZWE'|'BHS'|'BLZ'|'BMU'|'CAN'|'CRI'|'CYM'|'DOM'|'GTM'|'HND'|'HTI'|'JAM'|'MEX'|'NIC'|'PAN'|'SLV'|'VGB'|'AUS'|'CCK'|'CXR'|'FJI'|'NCL'|'NFK'|'NZL'|'PYF'|'TON'|'VUT'|'ABW'|'ARG'|'BLM'|'BOL'|'BRA'|'BRB'|'CHL'|'COL'|'CUW'|'DMA'|'ECU'|'GLP'|'GUF'|'GUY'|'MAF'|'MTQ'|'PER'|'PRY'|'SUR'|'TTO'|'URY'|'VEN'|'TWN'|'CHN'|'JPN'|'KOR'|'LAO'|'MNG'|'PNG'|'PRK'|'SLB'|'TJK'|'TKM'|'BTN'|'IOT'|'MDV'|'NPL'|'PAK'|'AFG'|'BDI'|'BEN'|'CAF'|'CIV'|'COD'|'COG'|'COM'|'CPV'|'DJI'|'DZA'|'ERI'|'ESH'|'ETH'|'GAB'|'GIN'|'GMB'|'GNB'|'GNQ'|'IRN'|'IRQ'|'LBR'|'LBY'|'MDG'|'MLI'|'MRT'|'MWI'|'NER'|'RWA'|'SHN'|'SLE'|'SOM'|'SSD'|'STP'|'SYC'|'TCD'|'TGO'|'TZA'|'UGA'|'SDN'|'SYR'|'YEM'|'CUB'|'SPM'|'TCA'|'COK'|'KIR'|'NIU'|'NRU'|'PCN'|'TKL'|'TUV'|'WLF'|'WSM'|'AIA'|'ATG'|'BES'|'FLK'|'GRD'|'KNA'|'LCA'|'MSR'|'SGS'|'SXM'|'VCT'|'ASM'|'FSM'|'MHL'|'MNP'|'PLW'|'VIR'
         */
        public readonly string $countryIso,
        /**
         * 2 letter country code (ISO 3166-1)
         *
         * @var 'GB'|'IM'|'JE'|'GG'|'US'|'PR'|'GU'|'IE'|'VA'|'FR'|'GL'|'NL'|'LU'|'AT'|'GI'|'LI'|'FI'|'IS'|'CH'|'PT'|'BE'|'MC'|'IT'|'FO'|'NO'|'DK'|'SM'|'MT'|'AD'|'SE'|'DE'|'ES'|'SJ'|'BS'|'BZ'|'BM'|'CA'|'CR'|'KY'|'DO'|'GT'|'HN'|'HT'|'JM'|'MX'|'NI'|'PA'|'SV'|'VG'|'AU'|'CC'|'CX'|'FJ'|'NC'|'NF'|'NZ'|'PF'|'TO'|'VU'|'AW'|'AR'|'BL'|'BO'|'BR'|'BB'|'CL'|'CO'|'CW'|'DM'|'EC'|'GP'|'GD'|'GF'|'GY'|'MF'|'MQ'|'PE'|'PY'|'SR'|'TT'|'UY'|'VE'|'TW'|'BN'|'ID'|'KH'|'MM'|'MY'|'PH'|'SG'|'TH'|'TL'|'VN'|'AL'|'AM'|'AZ'|'BG'|'BA'|'BY'|'CY'|'CZ'|'EE'|'GE'|'GR'|'HR'|'HU'|'KZ'|'KG'|'XK'|'LT'|'LV'|'MD'|'MK'|'ME'|'PL'|'RO'|'RU'|'RS'|'SK'|'SI'|'TR'|'UA'|'UZ'|'HK'|'BD'|'IN'|'LK'|'MO'|'AO'|'AE'|'BF'|'BH'|'BW'|'CM'|'EG'|'GH'|'IL'|'JO'|'KE'|'KW'|'LB'|'LS'|'MA'|'MZ'|'MU'|'YT'|'NA'|'NG'|'OM'|'QA'|'RE'|'SA'|'SN'|'SZ'|'TN'|'ZA'|'ZM'|'ZW'|'CN'|'JP'|'KR'|'LA'|'MN'|'PG'|'KP'|'SB'|'TJ'|'TM'|'BT'|'IO'|'MV'|'NP'|'PK'|'AF'|'BI'|'BJ'|'CF'|'CI'|'CD'|'CG'|'KM'|'CV'|'DJ'|'DZ'|'ER'|'EH'|'ET'|'GA'|'GN'|'GM'|'GW'|'GQ'|'IR'|'IQ'|'LR'|'LY'|'MG'|'ML'|'MR'|'MW'|'NE'|'RW'|'SH'|'SL'|'SO'|'SS'|'ST'|'SC'|'TD'|'TG'|'TZ'|'UG'|'SD'|'SY'|'YE'|'CU'|'PM'|'TC'|'CK'|'KI'|'NU'|'NR'|'PN'|'TK'|'TV'|'WF'|'WS'|'AI'|'AG'|'BQ'|'FK'|'KN'|'LC'|'MS'|'GS'|'SX'|'VC'|'AS'|'FM'|'MH'|'MP'|'PW'|'VI'
         */
        public readonly string $countryIso2,
        /**
         * Full country names (ISO 3166)
         *
         * @var 'United Kingdom'|'England'|'Scotland'|'Wales'|'Northern Ireland'|'Isle of Man'|'Jersey'|'Guernsey'|'Channel Islands'|'Guam'|'United States'|'Puerto Rico'|'Ireland'|'Vatican City'|'France'|'Greenland'|'Netherlands'|'Luxembourg'|'Austria'|'Gibraltar'|'Liechtenstein'|'Finland'|'Iceland'|'Switzerland'|'Portugal'|'Belgium'|'Monaco'|'Italy'|'Faroe Islands'|'Norway'|'Denmark'|'San Marino'|'Malta'|'Andorra'|'Sweden'|'Germany'|'Spain'|'Svalbard and Jan Mayen'|'Bahamas'|'Belize'|'Bermuda'|'Canada'|'Costa Rica'|'Cayman Islands'|'Dominican Republic'|'Guatemala'|'Honduras'|'Haiti'|'Jamaica'|'Mexico'|'Nicaragua'|'Panama'|'El Salvador'|'British Virgin Islands'|'Australia'|'Cocos (Keeling) Islands'|'Christmas Island'|'Fiji'|'New Caledonia'|'Norfolk Island'|'New Zealand'|'French Polynesia'|'Tonga'|'Vanuatu'|'Aruba'|'Argentina'|'Saint Barthélemy'|'Bolivia'|'Brazil'|'Barbados'|'Chile'|'Colombia'|'Curaçao'|'Dominica'|'Ecuador'|'Guadeloupe'|'Grenada'|'French Guiana'|'Guyana'|'Saint Martin (French part)'|'Martinique'|'Peru'|'Paraguay'|'Suriname'|'Trinidad and Tobago'|'Uruguay'|'Venezuela'|'Taiwan'|'Brunei Darussalam'|'Indonesia'|'Cambodia'|'Myanmar'|'Malaysia'|'Philippines'|'Singapore'|'Thailand'|'Timor-Leste'|'Vietnam'|'Albania'|'Armenia'|'Azerbaijan'|'Bulgaria'|'Bosnia and Herzegovina'|'Belarus'|'Cyprus'|'Czech Republic'|'Estonia'|'Georgia'|'Greece'|'Croatia'|'Hungary'|'Kazakhstan'|'Kyrgyzstan'|'Kosovo'|'Lithuania'|'Latvia'|'Moldova'|'North Macedonia'|'Montenegro'|'Poland'|'Romania'|'Russia'|'Serbia'|'Slovakia'|'Slovenia'|'Turkey'|'Ukraine'|'Uzbekistan'|'Hong Kong'|'Bangladesh'|'India'|'Sri Lanka'|'Macau'|'Angola'|'United Arab Emirates'|'Burkina Faso'|'Bahrain'|'Botswana'|'Cameroon'|'Egypt'|'Ghana'|'Israel'|'Jordan'|'Kenya'|'Kuwait'|'Lebanon'|'Lesotho'|'Morocco'|'Mozambique'|'Mauritius'|'Mayotte'|'Namibia'|'Nigeria'|'Oman'|'Qatar'|'Réunion'|'Saudi Arabia'|'Senegal'|'Eswatini'|'Tunisia'|'South Africa'|'Zambia'|'Zimbabwe'|'China'|'Japan'|'South Korea'|'Laos'|'Mongolia'|'Papua New Guinea'|'North Korea'|'Solomon Islands'|'Tajikistan'|'Turkmenistan'|'Bhutan'|'British Indian Ocean Territory'|'Maldives'|'Nepal'|'Pakistan'|'Afghanistan'|'Burundi'|'Benin'|'Central African Republic'|'Côte d\'Ivoire'|'Democratic Republic of the Congo'|'Republic of the Congo'|'Comoros'|'Cape Verde'|'Djibouti'|'Algeria'|'Eritrea'|'Western Sahara'|'Ethiopia'|'Gabon'|'Guinea'|'Gambia'|'Guinea-Bissau'|'Equatorial Guinea'|'Iran'|'Iraq'|'Liberia'|'Libya'|'Madagascar'|'Mali'|'Mauritania'|'Malawi'|'Niger'|'Rwanda'|'Saint Helena'|'Sierra Leone'|'Somalia'|'South Sudan'|'São Tomé and Príncipe'|'Seychelles'|'Chad'|'Togo'|'Tanzania'|'Uganda'|'Sudan'|'Syria'|'Yemen'|'Cuba'|'Saint Pierre and Miquelon'|'Turks and Caicos Islands'|'Cook Islands'|'Kiribati'|'Niue'|'Nauru'|'Pitcairn Islands'|'Tokelau'|'Tuvalu'|'Wallis and Futuna'|'Samoa'|'Anguilla'|'Antigua and Barbuda'|'Bonaire, Sint Eustatius and Saba'|'Falkland Islands (Malvinas)'|'Saint Kitts and Nevis'|'Saint Lucia'|'Montserrat'|'South Georgia and the South Sandwich Islands'|'Sint Maarten (Dutch part)'|'Saint Vincent and the Grenadines'|'American Samoa'|'Federated States of Micronesia'|'Marshall Islands'|'Northern Mariana Islands'|'Palau'|'United States Virgin Islands'
         */
        public readonly string $country,
        /**
         * Language represented by 2 letter ISO Code (639-1)
         *
         * @var 'en'|'ar'|'as'|'az'|'be'|'bg'|'bn'|'bs'|'ca'|'cs'|'cy'|'da'|'de'|'el'|'es'|'et'|'eu'|'fi'|'fo'|'fr'|'ga'|'gl'|'gn'|'he'|'hi'|'hr'|'hu'|'hy'|'id'|'is'|'it'|'ja'|'ka'|'kk'|'km'|'kn'|'ko'|'lt'|'lv'|'mk'|'mn'|'ms'|'mt'|'my'|'nl'|'no'|'pl'|'pt'|'rm'|'ro'|'ru'|'sk'|'sl'|'sq'|'sr'|'sv'|'ta'|'th'|'tr'|'uk'|'uz'|'vi'|'wa'|'zh'
         */
        public readonly string $language,
        /**
         * First address line. Often contains premise and thoroughfare information. For a commercial premise the first line is the full name of the registered organisation. Never empty.
         */
        public readonly string $line1,
        /**
         * Second address line. Often contains thoroughfare and locality information. May be empty.
         */
        public readonly string $line2,
        /**
         * Third address line. Takes the address elements left after `line_1` and `line_2` are filled; where the address needs more than three lines the remaining elements are joined into `line_3`, comma separated. May be empty.
         */
        public readonly string $line3,
        /**
         * The town or city used to route mail to the address. For UK addresses this is the Royal Mail post town, which is a routing instruction rather than the nearest town geographically. Present on every address.
         */
        public readonly string $postTown,
        /**
         * Correctly formatted postcode. Capitalised and spaced. Empty (`""`) where the address has no postcode.
         */
        public readonly string $postcode,
        /**
         * Whatever county data is available for the address. Normally the postal county. If that is not present it falls back to the administrative county, then to the traditional county. May be empty where none of the three is present.
         */
        public readonly string $county,
        /**
         * Short code representing the county or province. May be empty (`""`)
         */
        public readonly string $countyCode,
        /**
         * UPRN stands for Unique Property Reference Number and is maintained by the Ordnance Survey (OS). Local governments in the UK have allocated a unique number for each land or property.
         */
        public readonly string $uprn,
        /**
         * UDPRN stands for 'Unique Delivery Point Reference Number'. Royal Mail assigns a unique UDPRN code for each premise on PAF. Simple, unique reference number for each Delivery Point. Unlikely to be reused when an address expires.
         *
         * @var int|''
         */
        public readonly int|string $udprn,
        /**
         * A small minority of individual premises (as identified by a UDPRN) may have multiple occupants behind the same letterbox. These are known as Multiple Residence occupants and can be queried via the Multiple Residence dataset. Simple, unique reference number for each Multiple Residence occupant.
         */
        public readonly string|float $umprn,
        /**
         * The first part of a postcode is known as the outward code. e.g. The outward code of BR8 7RE is BR8. Enables mail to be sorted to the correct local area for delivery. This part of the code contains the area and the district to which the mail is to be delivered, e.g. 'PO1', 'SW1A' or 'B23'.
         */
        public readonly string $postcodeOutward,
        /**
         * The second part of a postcode is known as the inward code. e.g. The inward code of BR8 7RE is 7RE.
         */
        public readonly string $postcodeInward,
        /**
         * A locality that qualifies the thoroughfare. Used where the same thoroughfare name occurs more than once in a post town and no dependant thoroughfare distinguishes them. May be empty.
         */
        public readonly string $dependantLocality,
        /**
         * Supplements dependant locality. Supplied where the dependant locality itself occurs twice in the same locality. May be empty.
         */
        public readonly string $doubleDependantLocality,
        /**
         * Also known as the street or road name. May be empty.
         */
        public readonly string $thoroughfare,
        /**
         * Supplements thoroughfare. Used where a thoroughfare name occurs twice in the same post town, to identify the address uniquely. May be empty.
         */
        public readonly string $dependantThoroughfare,
        /**
         * Number identifying the premise on a thoroughfare or dependant thoroughfare. May be empty.
         */
        public readonly string $buildingNumber,
        /**
         * Name of a residential or commercial premise. May be empty.
         */
        public readonly string $buildingName,
        /**
         * Identifies a unit where a premise is split into flats, apartments or business units. Cannot be present without either building_name or building_number. E.g. Flat 1, A, 10B. May be empty.
         */
        public readonly string $subBuildingName,
        /**
         * PO Box number for the address, occasionally a combination of numbers and letters. Allocated to Large User postcodes only. May be empty.
         */
        public readonly string $poBox,
        /**
         * Supplements organisation name to identify a department within the organisation. May be empty.
         */
        public readonly string $departmentName,
        /**
         * Name of the business or organisation at this address. May be empty.
         */
        public readonly string $organisationName,
        /**
         * Royal Mail postcode user type. UK addresses only.
         *
         * @var 'S'|'L'|''
         */
        public readonly string $postcodeType,
        /**
         * `Y` where an organisation is present at a small user postcode. Empty (`""`) otherwise. UK addresses only.
         */
        public readonly string $suOrganisationIndicator,
        /**
         * Two-character code (the first numeric, the second alphabetical) which, added to the postcode, uniquely identifies a delivery point. May be reused once a delivery point is deleted, though not until every remaining code in the range has been allocated. Always `1A` for a large user postcode, since each large user has its own postcode. Empty (`""`) where not available.
         */
        public readonly string $deliveryPointSuffix,
        /**
         * A pre-computed string which sensibly combines building_number, building_name and sub_building_name. Those three fields hold raw dataset values and can be difficult to parse if you are unaware of how they work together, so we also provide this single, simple premise string. Ideal if you want to pull premise information and thoroughfare information separately instead of using our address lines data.
         */
        public readonly string $premise,
        /**
         * The current administrative county to which the postcode has been assigned.
         */
        public readonly string $administrativeCounty,
        /**
         * Postal counties were used for the distribution of mail before the Postcode system was introduced in the 1970s. The Former Postal County was the Administrative County at the time. This data rarely changes. May be empty.
         */
        public readonly string $postalCounty,
        /**
         * Traditional counties are provided by the Association of British Counties. It is historical data, and can date from the 1800s. May be empty.
         */
        public readonly string $traditionalCounty,
        /**
         * The current district/unitary authority to which the postcode has been assigned. May be empty.
         */
        public readonly string $district,
        /**
         * The current administrative/electoral area to which the postcode has been assigned. May be empty for a small number of addresses.
         */
        public readonly string $ward,
        /**
         * The longitude of the address or postcode (WGS84).
         */
        public readonly string|float $longitude,
        /**
         * The latitude of the address or postcode (WGS84).
         */
        public readonly string|float $latitude,
        /**
         * Eastings reference using the [Ordnance Survey National Grid reference system](https://en.wikipedia.org/wiki/Ordnance_Survey_National_Grid).
         */
        public readonly string|float $eastings,
        /**
         * Northings reference using the [Ordnance Survey National Grid reference system](https://en.wikipedia.org/wiki/Ordnance_Survey_National_Grid).
         */
        public readonly string|float $northings,
        /**
         * The raw dataset record backing this address. On these two endpoints it is returned for AddressBase (`ab`, `abp`) and non-UK datasets only, never for the PAF family. Use any other endpoint for a PAF native record.
         *
         * @var AbAddress|AbpAddress|UspsAddress|EcadAddress|EcafAddress|HereAddress|GnafAddress|KadasterAddress|KartverketAddress|SdfiAddress|CannarAddress|FodbosaAddress|MoisAddress|UpujpAddress|BevAddress|BanAddress|SwtAddress|array<string, mixed>|null
         */
        public readonly AbAddress|AbpAddress|UspsAddress|EcadAddress|EcafAddress|HereAddress|GnafAddress|KadasterAddress|KartverketAddress|SdfiAddress|CannarAddress|FodbosaAddress|MoisAddress|UpujpAddress|BevAddress|BanAddress|SwtAddress|array|null $native,
    ) {}

    /**
     * @param  AddressListItemArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            id: $attributes['id'] ?? throw self::missing('id'),
            dataset: $attributes['dataset'] ?? throw self::missing('dataset'),
            countryIso: $attributes['country_iso'] ?? throw self::missing('country_iso'),
            countryIso2: $attributes['country_iso_2'] ?? throw self::missing('country_iso_2'),
            country: $attributes['country'] ?? throw self::missing('country'),
            language: $attributes['language'] ?? throw self::missing('language'),
            line1: $attributes['line_1'] ?? throw self::missing('line_1'),
            line2: $attributes['line_2'] ?? throw self::missing('line_2'),
            line3: $attributes['line_3'] ?? throw self::missing('line_3'),
            postTown: $attributes['post_town'] ?? throw self::missing('post_town'),
            postcode: $attributes['postcode'] ?? throw self::missing('postcode'),
            county: $attributes['county'] ?? throw self::missing('county'),
            countyCode: $attributes['county_code'] ?? throw self::missing('county_code'),
            uprn: $attributes['uprn'] ?? throw self::missing('uprn'),
            udprn: $attributes['udprn'] ?? throw self::missing('udprn'),
            umprn: $attributes['umprn'] ?? throw self::missing('umprn'),
            postcodeOutward: $attributes['postcode_outward'] ?? throw self::missing('postcode_outward'),
            postcodeInward: $attributes['postcode_inward'] ?? throw self::missing('postcode_inward'),
            dependantLocality: $attributes['dependant_locality'] ?? throw self::missing('dependant_locality'),
            doubleDependantLocality: $attributes['double_dependant_locality'] ?? throw self::missing('double_dependant_locality'),
            thoroughfare: $attributes['thoroughfare'] ?? throw self::missing('thoroughfare'),
            dependantThoroughfare: $attributes['dependant_thoroughfare'] ?? throw self::missing('dependant_thoroughfare'),
            buildingNumber: $attributes['building_number'] ?? throw self::missing('building_number'),
            buildingName: $attributes['building_name'] ?? throw self::missing('building_name'),
            subBuildingName: $attributes['sub_building_name'] ?? throw self::missing('sub_building_name'),
            poBox: $attributes['po_box'] ?? throw self::missing('po_box'),
            departmentName: $attributes['department_name'] ?? throw self::missing('department_name'),
            organisationName: $attributes['organisation_name'] ?? throw self::missing('organisation_name'),
            postcodeType: $attributes['postcode_type'] ?? throw self::missing('postcode_type'),
            suOrganisationIndicator: $attributes['su_organisation_indicator'] ?? throw self::missing('su_organisation_indicator'),
            deliveryPointSuffix: $attributes['delivery_point_suffix'] ?? throw self::missing('delivery_point_suffix'),
            premise: $attributes['premise'] ?? throw self::missing('premise'),
            administrativeCounty: $attributes['administrative_county'] ?? throw self::missing('administrative_county'),
            postalCounty: $attributes['postal_county'] ?? throw self::missing('postal_county'),
            traditionalCounty: $attributes['traditional_county'] ?? throw self::missing('traditional_county'),
            district: $attributes['district'] ?? throw self::missing('district'),
            ward: $attributes['ward'] ?? throw self::missing('ward'),
            longitude: $attributes['longitude'] ?? throw self::missing('longitude'),
            latitude: $attributes['latitude'] ?? throw self::missing('latitude'),
            eastings: $attributes['eastings'] ?? throw self::missing('eastings'),
            northings: $attributes['northings'] ?? throw self::missing('northings'),
            native: isset($attributes['native']) ? self::hydrateNative($attributes['native']) : null,
        );
    }

    public function toArray(): array
    {
        $array = [
            'id' => $this->id,
            'dataset' => $this->dataset,
            'country_iso' => $this->countryIso,
            'country_iso_2' => $this->countryIso2,
            'country' => $this->country,
            'language' => $this->language,
            'line_1' => $this->line1,
            'line_2' => $this->line2,
            'line_3' => $this->line3,
            'post_town' => $this->postTown,
            'postcode' => $this->postcode,
            'county' => $this->county,
            'county_code' => $this->countyCode,
            'uprn' => $this->uprn,
            'udprn' => $this->udprn,
            'umprn' => $this->umprn,
            'postcode_outward' => $this->postcodeOutward,
            'postcode_inward' => $this->postcodeInward,
            'dependant_locality' => $this->dependantLocality,
            'double_dependant_locality' => $this->doubleDependantLocality,
            'thoroughfare' => $this->thoroughfare,
            'dependant_thoroughfare' => $this->dependantThoroughfare,
            'building_number' => $this->buildingNumber,
            'building_name' => $this->buildingName,
            'sub_building_name' => $this->subBuildingName,
            'po_box' => $this->poBox,
            'department_name' => $this->departmentName,
            'organisation_name' => $this->organisationName,
            'postcode_type' => $this->postcodeType,
            'su_organisation_indicator' => $this->suOrganisationIndicator,
            'delivery_point_suffix' => $this->deliveryPointSuffix,
            'premise' => $this->premise,
            'administrative_county' => $this->administrativeCounty,
            'postal_county' => $this->postalCounty,
            'traditional_county' => $this->traditionalCounty,
            'district' => $this->district,
            'ward' => $this->ward,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'eastings' => $this->eastings,
            'northings' => $this->northings,
        ];

        if ($this->native !== null) {
            $array['native'] = ($this->native instanceof ResponseContract ? $this->native->toArray() : $this->native);
        }

        return $array;
    }

    /**
     * @param  AbAddressArray|AbpAddressArray|UspsAddressArray|EcadAddressArray|EcafAddressArray|HereAddressArray|GnafAddressArray|KadasterAddressArray|KartverketAddressArray|SdfiAddressArray|CannarAddressArray|FodbosaAddressArray|MoisAddressArray|UpujpAddressArray|BevAddressArray|BanAddressArray|SwtAddressArray|array<string, mixed>  $value
     *
     * @return AbAddress|AbpAddress|UspsAddress|EcadAddress|EcafAddress|HereAddress|GnafAddress|KadasterAddress|KartverketAddress|SdfiAddress|CannarAddress|FodbosaAddress|MoisAddress|UpujpAddress|BevAddress|BanAddress|SwtAddress|array<string, mixed>
     */
    private static function hydrateNative(array $value): AbAddress|AbpAddress|UspsAddress|EcadAddress|EcafAddress|HereAddress|GnafAddress|KadasterAddress|KartverketAddress|SdfiAddress|CannarAddress|FodbosaAddress|MoisAddress|UpujpAddress|BevAddress|BanAddress|SwtAddress|array
    {
        if (self::matches($value, ['dataset' => ['ab']], ['id', 'country_iso', 'dataset', 'language', 'line_1', 'line_2', 'line_3', 'premise', 'uprn', 'udprn', 'parent_uprn', 'usrn', 'toid', 'classification_code', 'eastings', 'northings', 'latitude', 'longitude', 'single_address_line', 'street_name', 'locality', 'town_name', 'delivery_point_suffix', 'post_town', 'gss_code', 'rpc', 'last_update_date', 'island', 'change_code', 'building_name', 'building_number', 'sub_building', 'postcode', 'po_box', 'organisation', 'country', 'county', 'district', 'ward', 'traditional_county', 'administrative_county', 'postal_county'])) {
            /** @var AbAddressArray $variant */
            $variant = $value;

            return AbAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['abp']], ['uprn', 'logical_status', 'country', 'latitude', 'longitude', 'x_coordinate', 'y_coordinate', 'local_custodian_code', 'addressbase_postal', 'postcode_locator', 'multi_occ_count', 'postcode', 'id', 'dataset', 'country_iso', 'suggestion_line'])) {
            /** @var AbpAddressArray $variant */
            $variant = $value;

            return AbpAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['usps']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'language', 'primary_number', 'secondary_number', 'plus_4_code', 'line_1', 'line_2', 'last_line', 'zip_code', 'zip_plus_4_code', 'update_key_number', 'record_type_code', 'carrier_route_id', 'street_pre_directional_abbreviation', 'street_name', 'street_suffix_abbreviation', 'street_post_directional_abbreviation', 'building_or_firm_name', 'address_secondary_abbreviation', 'base_alternate_code', 'lacs_status_indicator', 'government_building_indicator', 'state_abbreviation', 'state', 'municipality_city_state_key', 'urbanization_city_state_key', 'preferred_last_line_city_state_key', 'county', 'city', 'city_abbreviation', 'preferred_city', 'city_state_name_facility_code', 'zip_classification_code', 'city_state_mailing_name_indicator', 'carrier_route_rate_sortation', 'finance_number', 'congressional_district_number', 'county_number'])) {
            /** @var UspsAddressArray $variant */
            $variant = $value;

            return UspsAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['ecad']], ['id', 'dataset', 'country_iso', 'country_iso_2', 'country', 'language', 'line_1', 'line_2', 'line_3', 'line_4', 'line_5', 'line_6', 'line_7', 'line_8', 'line_9', 'department', 'organisation', 'sub_building_name', 'building_name', 'building_number', 'building_group', 'primary_thoroughfare', 'secondary_thoroughfare', 'primary_locality', 'secondary_locality', 'tertiary_locality', 'post_county', 'eircode', 'address_reference', 'longitude', 'latitude'])) {
            /** @var EcadAddressArray $variant */
            $variant = $value;

            return EcadAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['ecaf']], ['id', 'dataset', 'country_iso', 'country_iso_2', 'country', 'language', 'line_1', 'line_2', 'line_3', 'line_4', 'line_5', 'line_6', 'line_7', 'line_8', 'line_9', 'department', 'organisation', 'sub_building_name', 'building_name', 'building_number', 'building_group', 'primary_thoroughfare', 'secondary_thoroughfare', 'primary_locality', 'secondary_locality', 'tertiary_locality', 'post_county', 'eircode', 'address_reference', 'longitude', 'latitude'])) {
            /** @var EcafAddressArray $variant */
            $variant = $value;

            return EcafAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['herewe', 'heret', 'heresa', 'hereo', 'herena', 'heremeas', 'heremea', 'herem', 'herei', 'herehk', 'hereee', 'hereap']], ['id', 'country_iso', 'dataset', 'language', 'line_1', 'line_2', 'line_3', 'line_4', 'line_5', 'address', 'delivery_latitude', 'delivery_longitude', 'building_name', 'latitude', 'longitude', 'street_name', 'postal_code', 'order1_name', 'order2_name', 'order8_name', 'builtup_name', 'poi_name', 'building_unit_name', 'level_name', 'unit_name', 'suppl_address_info', 'building_grp_name'])) {
            /** @var HereAddressArray $variant */
            $variant = $value;

            return HereAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['gnaf']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'line_1', 'line_2', 'language', 'address', 'latitude', 'longitude', 'address_detail_pid', 'date_created', 'date_last_modified', 'date_retired', 'building_name', 'lot_number_prefix', 'lot_number', 'lot_number_suffix', 'flat_type_code', 'flat_number_prefix', 'flat_number', 'flat_number_suffix', 'level_type_code', 'level_number_prefix', 'level_number', 'level_number_suffix', 'number_first_prefix', 'number_first', 'number_first_suffix', 'number_last_prefix', 'number_last', 'number_last_suffix', 'street_locality_pid', 'alias_principal', 'postcode', 'private_street', 'legal_parcel_id', 'confidence', 'level_geocoded_code', 'primary_secondary', 'alias_type_code', 'geocode_type_code', 'default_latitude', 'default_longitude', 'address_change_type_code', 'mb_2016_match_code', 'mb_2021_match_code', 'address_type', 'address_site_name', 'geocode_site_name', 'site_geocode_type_code', 'reliability_code', 'site_boundary_extent', 'site_planimetric_accuracy', 'elevation', 'site_longitude', 'site_latitude', 'geocode_type_priority_order', 'site_geocode_priority_order', 'locality_name', 'primary_postcode', 'locality_class_code', 'locality_gnaf_reliability_code', 'locality_alias_name', 'locality_alias_postcode', 'locality_alias_type_code', 'locality_planimetric_accuracy', 'locality_latitude', 'locality_longitude', 'mb_2016_code', 'mb_2021_code', 'ps_join_type_code', 'state_name', 'state_abbreviation', 'street_class_code', 'street_name', 'street_type_code', 'street_suffix_code', 'gnaf_street_confidence', 'street_locality_gnaf_reliability_code', 'street_locality_alias_street_name', 'street_locality_alias_street_type_code', 'street_locality_alias_street_suffix_code', 'street_locality_alias_type_code', 'street_locality_boundary_extent', 'street_locality_planimetric_accuracy', 'street_locality_latitude', 'street_locality_longitude', 'street_type_name', 'street_locality_alias_street_type_name'])) {
            /** @var GnafAddressArray $variant */
            $variant = $value;

            return GnafAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['kadaster']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'line_1', 'language', 'address', 'identificatie', 'latitude', 'longitude', 'gebruiksdoel', 'oppervlakte', 'status', 'geconstateerd', 'documentdatum', 'documentnummer', 'voorkomenidentificatie', 'begin_geldigheid', 'eind_geldigheid', 'tijdstip_registratie', 'eind_registratie', 'tijdstip_registratie_lv', 'tijdstip_eind_registratie_lv', 'nummeraanduidingen_identificatie', 'nummeraanduidingen_huisnummer', 'nummeraanduidingen_huisnummertoevoeging', 'nummeraanduidingen_huisletter', 'nummeraanduidingen_postcode', 'nummeraanduidingen_type_adresseerbaar_object', 'nummeraanduidingen_status', 'nummeraanduidingen_geconstateerd', 'nummeraanduidingen_documentdatum', 'nummeraanduidingen_documentnummer', 'nummeraanduidingen_voorkomenidentificatie', 'nummeraanduidingen_begin_geldigheid', 'nummeraanduidingen_eind_geldigheid', 'nummeraanduidingen_tijdstip_registratie', 'nummeraanduidingen_eind_registratie', 'nummeraanduidingen_tijdstip_registratie_lv', 'nummeraanduidingen_tijdstip_eind_registratie_lv', 'pand_identificatie', 'pand_oorspronkelijk_bouwjaar', 'pand_status', 'pand_geconstateerd', 'pand_documentdatum', 'pand_documentnummer', 'pand_voorkomenidentificatie', 'pand_begin_geldigheid', 'pand_eind_geldigheid', 'pand_tijdstip_registratie', 'pand_eind_registratie', 'pand_tijdstip_registratie_lv', 'pand_tijdstip_eind_registratie_lv', 'openbare_ruimte_identificatie', 'openbare_ruimte_naam', 'openbare_ruimte_type', 'openbare_ruimte_status', 'openbare_ruimte_geconstateerd', 'openbare_ruimte_documentdatum', 'openbare_ruimte_documentnummer', 'openbare_ruimte_voorkomenidentificatie', 'openbare_ruimte_begin_geldigheid', 'openbare_ruimte_eind_geldigheid', 'openbare_ruimte_tijdstip_registratie', 'openbare_ruimte_eind_registratie', 'openbare_ruimte_tijdstip_registratie_lv', 'openbare_ruimte_tijdstip_eind_registratie_lv', 'openbare_ruimte_verkorte_naam', 'woonplaats_identificatie', 'woonplaats_naam', 'woonplaats_status', 'woonplaats_geconstateerd', 'woonplaats_documentdatum', 'woonplaats_documentnummer', 'woonplaats_voorkomenidentificatie', 'woonplaats_begin_geldigheid', 'woonplaats_eind_geldigheid', 'woonplaats_tijdstip_registratie', 'woonplaats_eind_registratie', 'woonplaats_tijdstip_registratie_lv', 'woonplaats_tijdstip_eind_registratie_lv', 'provincie'])) {
            /** @var KadasterAddressArray $variant */
            $variant = $value;

            return KadasterAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['kartverket']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'line_1', 'line_2', 'language', 'address', 'latitude', 'longitude', 'lokal_id', 'kommunenummer', 'kommunenavn', 'adressetype', 'adressetilleggsnavn', 'adressetilleggsnavn_kilde', 'adressekode', 'adressenavn', 'nummer', 'bokstav', 'gardsnummer', 'bruksnummer', 'festenummer', 'seksjonsnummer', 'undernummer', 'adresse_tekst', 'adresse_tekst_uten_adressetilleggsnavn', 'bruksenhet_id', 'bruksenhetsnummer_tekst', 'offisiell_adresse_tekst', 'offisiell_adresse_tekst_uten_adressetilleggsnavn', 'epsg_kode', 'nord', 'oest', 'postnummer', 'poststed', 'grunnkretsnummer', 'grunnkretsnavn', 'soknenummer', 'soknenavn', 'organisasjonsnummer', 'tettstednummer', 'tettstednavn', 'valgkretsnummer', 'valgkretsnavn', 'oppdateringsdato', 'datauttaksdato', 'adresse_id', 'uuid_adresse', 'uuid_bruksenhet', 'atkomst_id', 'uuid_atkomst', 'atkomst_nord', 'atkomst_oest', 'sommeratkomst_id', 'uuid_sommeratkomst', 'sommeratkomst_nord', 'sommeratkomst_oest', 'vinteratkomst_id', 'uuid_vinteratkomst', 'vinteratkomst_nord', 'vinteratkomst_oest', 'fylke', 'landsdel'])) {
            /** @var KartverketAddressArray $variant */
            $variant = $value;

            return KartverketAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['sdfi']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'address', 'line_1', 'line_2', 'language', 'latitude', 'longitude', 'adresse_id', 'kvhx', 'kvh', 'adgangsadresse', 'status', 'darstatus', 'oprettet', 'ændret', 'ikrafttrædelse', 'nedlagt', 'vejkode', 'vejnavn', 'adresseringsvejnavn', 'husnr', 'etage', 'dør', 'supplerendebynavn_dagi_id', 'supplerendebynavn', 'postnr', 'postnrnavn', 'stormodtagerpostnr', 'stormodtagerpostnrnavn', 'betegnelse', 'adressepunktændringsdato', 'etrs89koordinat_øst', 'etrs89koordinat_nord', 'wgs84koordinat_bredde', 'wgs84koordinat_længde', 'højde', 'nøjagtighed', 'kilde', 'tekniskstandard', 'tekstretning', 'ddkn_m100', 'ddkn_km1', 'ddkn_km10', 'kommunekode', 'kommunenavn', 'landsdelsnuts3', 'landsdelsnavn', 'regionskode', 'regionsnavn', 'afstemningsområdenummer', 'afstemningsområdenavn', 'menighedsrådsafstemningsområdenummer', 'menighedsrådsafstemningsområdenavn', 'opstillingskredskode', 'opstillingskredsnavn', 'storkredsnummer', 'storkredsnavn', 'valglandsdelsbogstav', 'valglandsdelsnavn', 'sognekode', 'sognenavn', 'politikredskode', 'politikredsnavn', 'retskredskode', 'retskredsnavn', 'jordstykke_ejerlavkode', 'jordstykke_ejerlavnavn', 'jordstykke_matrikelnr', 'jordstykke_esrejendomsnr', 'ejerlavkode', 'ejerlavnavn', 'matrikelnr', 'esrejendomsnr', 'zone', 'brofast', 'adgangsadresseid', 'adgangspunktid', 'navngivenvej_id', 'adgangsadresse_status', 'adgangsadresse_darstatus', 'adgangsadresse_oprettet', 'adgangsadresse_ændret', 'adgangsadresse_ikrafttrædelse', 'adgangsadresse_nedlagt', 'vejpunkt_id', 'vejpunkt_ændret', 'vejpunkt_kilde', 'vejpunkt_nøjagtighed', 'vejpunkt_tekniskstandard', 'vejpunkt_x', 'vejpunkt_y'])) {
            /** @var SdfiAddressArray $variant */
            $variant = $value;

            return SdfiAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['cannar']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'language', 'address', 'line_1', 'line_2', 'latitude', 'longitude', 'loc_guid', 'addr_guid', 'apt_no_label', 'civic_no', 'civic_no_suffix', 'official_street_name', 'official_street_type', 'official_street_dir', 'prov_code', 'csd_eng_name', 'csd_fre_name', 'csd_type_eng_code', 'csd_type_fre_code', 'mail_street_name', 'mail_street_type', 'mail_street_dir', 'mail_mun_name', 'mail_prov_abvn', 'mail_postal_code', 'bg_dls_lsd', 'bg_dls_qtr', 'bg_dls_sctn', 'bg_dls_twnshp', 'bg_dls_rng', 'bg_dls_mrd', 'bg_x', 'bg_y', 'bu_n_civic_add', 'bu_use', 'csd_code', 'fed_code', 'fed_eng_name', 'fed_fre_name', 'er_code', 'er_eng_name', 'er_fre_name', 'reppoint_latitude', 'reppoint_longitude'])) {
            /** @var CannarAddressArray $variant */
            $variant = $value;

            return CannarAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['fodbosa']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'language', 'address', 'line_1', 'latitude', 'longitude', 'epsg_31370_x', 'epsg_31370_y', 'epsg_4326_lat', 'epsg_4326_lon', 'address_id', 'box_number', 'house_number', 'municipality_id', 'municipality_name_de', 'municipality_name_fr', 'municipality_name_nl', 'postcode', 'postname_fr', 'postname_nl', 'street_id', 'streetname_de', 'streetname_fr', 'streetname_nl', 'region_code', 'status'])) {
            /** @var FodbosaAddressArray $variant */
            $variant = $value;

            return FodbosaAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['mois']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'language', 'address', 'line_1', 'line_2', 'city', 'province', '법정읍면동명', '법정동코드', '법정리명', '비고1', '비고2', '변동전도로명주소', '변경이력정보', '변경이력사유', '변경전_도로명주소', '변경사유', '변경사유코드', '층일련번호', '층명칭', '대표지번여부', '대표여부', '다량배달처명', '동일련번호', '동명칭', '도로명', '도로명_로마자', '도로명번호', '도로명코드', '도로명코드_고시일자', '도로명코드_말소일자', '읍면동구분', '읍면동일련번호', '읍면동코드', '읍면동명', '읍면동명_로마자', '건축물대장_건물명', '건물본번', '건물부번', '건물관리번호', '기초구역번호', '공동주택여부', '고시일자', '관리번호', '행정동코드', '행정동명', '호일련번호', '호명칭', '호접미사일련번호', '호접미사명칭', '이동사유코드', '일련번호', '지번일련번호', '지번본번_번지', '지번부번_호', '지하구분', '지하여부', '산여부', '상위도로명', '상위도로명번호', '상세건물명', '상세주소_부여여부', '상세주소여부', '사용여부', '시도명', '시도명_로마자', '시군구_건물명', '시군구코드', '시군구명', '시군구명_로마자', '시군구용_건물명', '우편일련번호', '우편번호', '우편번호_일련번호', '영문_법정리명', '영문읍면동명', '영문_법정읍면동명', '영문도로명', '영문시도명', '영문시군구명'])) {
            /** @var MoisAddressArray $variant */
            $variant = $value;

            return MoisAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['upujp']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'language', 'script', 'address', 'line_1', 'building_name', 'neighbourhood', 'district', 'city', 'prefecture', 'postcode', 'latitude', 'longitude', 'org_id', 'org_type_ind', 'org_sub_type_ind', 'org_loc_id', 'org_dis_id', 'org_nei_id', 'org_org_id', 'org_name', 'org_name_trans', 'org_loc_sfx', 'org_loc_sfx_trans', 'org_adr', 'org_adr_trans', 'org_po_ind', 'org_po_start', 'org_po_end', 'org_dsc', 'org_dsc_trans', 'org_pcode', 'org_pcode_fin', 'org_script', 'org_language', 'str_id', 'str_key', 'str_loc_id', 'str_dis_id', 'str_nei_id', 'str_org_id', 'str_pfx', 'str_pfx_trans', 'str_qlf_pre', 'str_qlf_pre_trans', 'str_qlf_suc', 'str_qlf_suc_trans', 'str_name', 'str_name_trans', 'str_loc_sfx', 'str_loc_sfx_trans', 'str_type', 'str_type_trans', 'str_type_abv', 'str_type_abv_trans', 'str_adr_num_key', 'str_from_num', 'str_from_unit', 'str_from_alph', 'str_to_num', 'str_to_unit', 'str_to_alph', 'str_evenodd', 'str_dsc', 'str_dsc_trans', 'str_blg_id', 'str_blg_name', 'str_blg_name_trans', 'str_blg_type', 'str_blg_type_trans', 'str_blg_dsc', 'str_blg_dsc_trans', 'str_ref_str_id', 'str_pcode', 'str_script', 'str_language', 'sub_dis_id', 'sub_dis_key', 'sub_loc_id', 'sub_loc_sfx', 'sub_loc_sfx_trans', 'sub_dis_name', 'sub_dis_name_trans', 'sub_dis_sfx', 'sub_dis_sfx_trans', 'sub_dis_dsc', 'sub_dis_dsc_trans', 'sub_dis_pcode', 'sub_dis_pcode_fin', 'sub_nei_id', 'sub_nei_key', 'sub_nei_name', 'sub_nei_name_trans', 'sub_nei_sfx', 'sub_nei_sfx_trans', 'sub_nei_zone_from', 'sub_nei_zone_to', 'sub_nei_dsc', 'sub_nei_dsc_trans', 'sub_nei_pcode', 'sub_script', 'sub_language', 'loc_id', 'loc_key', 'loc_adm1_id', 'loc_adm1_key', 'loc_adm1_name', 'loc_adm1_name_trans', 'loc_adm1_sfx', 'loc_adm1_sfx_trans', 'loc_adm1_abv', 'loc_adm1_abv_trans', 'loc_adm2_id', 'loc_adm2_key', 'loc_adm2_name', 'loc_adm2_name_trans', 'loc_adm2_sfx', 'loc_adm2_sfx_trans', 'loc_adm2_abv', 'loc_adm2_abv_trans', 'loc_adm3_id', 'loc_adm3_key', 'loc_adm3_name', 'loc_adm3_name_trans', 'loc_adm3_sfx', 'loc_adm3_sfx_trans', 'loc_adm3_abv', 'loc_adm3_abv_trans', 'loc_name', 'loc_name_trans', 'loc_sfx', 'loc_sfx_trans', 'loc_pcode', 'loc_pcode_fin', 'loc_dsc', 'loc_dsc_trans', 'loc_script', 'loc_language'])) {
            /** @var UpujpAddressArray $variant */
            $variant = $value;

            return UpujpAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['bev']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'language', 'address', 'line_1', 'line_2', 'latitude', 'longitude', 'adrcd', 'kgnr', 'gkz', 'okz', 'plz', 'skz', 'zaehlsprengel', 'hausnrtext', 'hausnrzahl1', 'hausnrbuchstabe1', 'hausnrverbindung1', 'hausnrzahl2', 'hausnrbuchstabe2', 'hausnrbereich', 'hnr_adr_zusammen', 'gnradresse', 'hofname', 'rw', 'hw', 'epsg', 'quelladresse', 'bestimmungsart', 'subcd', 'objektnummer', 'objfunktkennziffer', 'hauptadresse', 'hausnrverbindung2', 'hausnrzahl3', 'hausnrbuchstabe3', 'hausnrverbindung3', 'hausnrzahl4', 'hausnrbuchstabe4', 'hausnrgebaeudebez', 'hnr_geb_zusammen', 'eigenschaft', 'gemeindename', 'ortsname', 'strassenname', 'strassennamenzusatz', 'szusadrbest', 'zustellort', 'zustellort_id', 'zaehlsprengelname'])) {
            /** @var BevAddressArray $variant */
            $variant = $value;

            return BevAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['ban']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'language', 'address', 'line_1', 'line_2', 'latitude', 'longitude', 'id_fantoir', 'numero', 'rep', 'nom_voie', 'code_postal', 'code_insee', 'nom_commune', 'code_insee_ancienne_commune', 'nom_ancienne_commune', 'x', 'y', 'lon', 'lat', 'type_position', 'alias', 'nom_ld', 'libelle_acheminement', 'nom_afnor', 'source_position', 'source_nom_voie', 'certification_commune', 'cad_parcelles'])) {
            /** @var BanAddressArray $variant */
            $variant = $value;

            return BanAddress::from($variant);
        }

        if (self::matches($value, ['dataset' => ['swt']], ['id', 'dataset', 'country', 'country_iso', 'country_iso_2', 'language', 'canton', 'address', 'line_1', 'line_2', 'latitude', 'longitude', 'adr_egaid', 'str_esid', 'bdg_egid', 'adr_edid', 'stn_label', 'adr_number', 'bdg_category', 'bdg_name', 'zip_label', 'com_fosnr', 'com_name', 'com_canton', 'adr_status', 'adr_official', 'adr_modified', 'adr_easting', 'adr_northing', 'str_type', 'str_status', 'str_official', 'str_modified', 'str_easting', 'str_northing', 'ortschaftsname', 'plz4', 'zusatzziffer', 'zip_id', 'gemeindename', 'bfs_nr', 'kantonskürzel', 'sprache', 'validity'])) {
            /** @var SwtAddressArray $variant */
            $variant = $value;

            return SwtAddress::from($variant);
        }

        return $value;
    }
}
