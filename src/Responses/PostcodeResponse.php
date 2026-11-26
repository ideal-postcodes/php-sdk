<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Responses;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;
use IdealPostcodes\Types\AddressListItem;

/**
 * Postcode Response
 *
 * @phpstan-import-type AddressListItemArray from AddressListItem
 * @phpstan-type PostcodeResponseArray array{result: list<AddressListItemArray>, code: 2000, message: 'Success', page: int, limit: int, total: int}
 *
 * @implements ResponseContract<PostcodeResponseArray>
 */
final class PostcodeResponse implements ResponseContract
{
    /** @use ArrayAccessible<PostcodeResponseArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * All addresses listed at the postcode.
         *
         * @var list<AddressListItem>
         */
        public readonly array $result,
        /**
         * @var 2000
         */
        public readonly int $code,
        /**
         * @var 'Success'
         */
        public readonly string $message,
        public readonly int $page,
        public readonly int $limit,
        public readonly int $total,
    ) {}

    /**
     * @param  PostcodeResponseArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            result: array_map(static fn ($item) => AddressListItem::from($item), ($attributes['result'] ?? throw self::missing('result'))),
            code: $attributes['code'] ?? throw self::missing('code'),
            message: $attributes['message'] ?? throw self::missing('message'),
            page: $attributes['page'] ?? throw self::missing('page'),
            limit: $attributes['limit'] ?? throw self::missing('limit'),
            total: $attributes['total'] ?? throw self::missing('total'),
        );
    }

    public function toArray(): array
    {
        return [
            'result' => array_map(static fn ($item) => $item->toArray(), $this->result),
            'code' => $this->code,
            'message' => $this->message,
            'page' => $this->page,
            'limit' => $this->limit,
            'total' => $this->total,
        ];
    }
}
