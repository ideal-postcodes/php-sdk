<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Types;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;

/**
 * No Address Match
 *
 * @phpstan-type GbrCleanseNoMatchArray array{query: string, match: array<string, mixed>|null, count: 0, fit: 0, confidence: 0, organisation_match: 'NO_MATCH', premise_match: 'NO_MATCH', postcode_match: 'NO_MATCH', thoroughfare_match: 'NO_MATCH', locality_match: 'NO_MATCH', post_town_match: 'NO_MATCH'}
 *
 * @implements ResponseContract<GbrCleanseNoMatchArray>
 */
final class GbrCleanseNoMatch implements ResponseContract
{
    /** @use ArrayAccessible<GbrCleanseNoMatchArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * Originally submitted query
         */
        public readonly string $query,
        /**
         * Nearest matching address
         *
         * @var array<string, mixed>|null
         */
        public readonly ?array $match,
        /**
         * @var 0
         */
        public readonly int $count,
        /**
         * @var 0
         */
        public readonly int $fit,
        /**
         * @var 0
         */
        public readonly int $confidence,
        /**
         * @var 'NO_MATCH'
         */
        public readonly string $organisationMatch,
        /**
         * @var 'NO_MATCH'
         */
        public readonly string $premiseMatch,
        /**
         * @var 'NO_MATCH'
         */
        public readonly string $postcodeMatch,
        /**
         * @var 'NO_MATCH'
         */
        public readonly string $thoroughfareMatch,
        /**
         * @var 'NO_MATCH'
         */
        public readonly string $localityMatch,
        /**
         * @var 'NO_MATCH'
         */
        public readonly string $postTownMatch,
    ) {}

    /**
     * @param  GbrCleanseNoMatchArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            query: $attributes['query'] ?? throw self::missing('query'),
            match: $attributes['match'] ?? null,
            count: $attributes['count'] ?? throw self::missing('count'),
            fit: $attributes['fit'] ?? throw self::missing('fit'),
            confidence: $attributes['confidence'] ?? throw self::missing('confidence'),
            organisationMatch: $attributes['organisation_match'] ?? throw self::missing('organisation_match'),
            premiseMatch: $attributes['premise_match'] ?? throw self::missing('premise_match'),
            postcodeMatch: $attributes['postcode_match'] ?? throw self::missing('postcode_match'),
            thoroughfareMatch: $attributes['thoroughfare_match'] ?? throw self::missing('thoroughfare_match'),
            localityMatch: $attributes['locality_match'] ?? throw self::missing('locality_match'),
            postTownMatch: $attributes['post_town_match'] ?? throw self::missing('post_town_match'),
        );
    }

    public function toArray(): array
    {
        return [
            'query' => $this->query,
            'match' => $this->match,
            'count' => $this->count,
            'fit' => $this->fit,
            'confidence' => $this->confidence,
            'organisation_match' => $this->organisationMatch,
            'premise_match' => $this->premiseMatch,
            'postcode_match' => $this->postcodeMatch,
            'thoroughfare_match' => $this->thoroughfareMatch,
            'locality_match' => $this->localityMatch,
            'post_town_match' => $this->postTownMatch,
        ];
    }
}
