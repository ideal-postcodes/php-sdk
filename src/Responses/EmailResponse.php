<?php

declare(strict_types=1);

/**
 * Generated from the OpenAPI spec. Do not edit.
 */

namespace IdealPostcodes\Responses;

use IdealPostcodes\Concerns\ArrayAccessible;
use IdealPostcodes\Contracts\ResponseContract;
use IdealPostcodes\Types\Email;
use IdealPostcodes\Types\UnknownEmail;

/**
 * Email Verification Response
 *
 * @phpstan-import-type EmailArray from Email
 * @phpstan-import-type UnknownEmailArray from UnknownEmail
 * @phpstan-type EmailResponseArray array{code: 2000, message: 'Success', result: EmailArray|UnknownEmailArray}
 *
 * @implements ResponseContract<EmailResponseArray>
 */
final class EmailResponse implements ResponseContract
{
    /** @use ArrayAccessible<EmailResponseArray> */
    use ArrayAccessible;

    private function __construct(
        /**
         * @var 2000
         */
        public readonly int $code,
        /**
         * @var 'Success'
         */
        public readonly string $message,
        public readonly Email|UnknownEmail $result,
    ) {}

    /**
     * @param  EmailResponseArray  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            code: $attributes['code'] ?? throw self::missing('code'),
            message: $attributes['message'] ?? throw self::missing('message'),
            result: self::hydrateResult(($attributes['result'] ?? throw self::missing('result'))),
        );
    }

    public function toArray(): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'result' => $this->result->toArray(),
        ];
    }

    /**
     * @param  EmailArray|UnknownEmailArray  $value
     */
    private static function hydrateResult(array $value): Email|UnknownEmail
    {
        if (self::matches($value, ['result' => ['unknown']], [])) {
            /** @var UnknownEmailArray $variant */
            $variant = $value;

            return UnknownEmail::from($variant);
        }

        /** @var EmailArray $variant */
        $variant = $value;

        return Email::from($variant);
    }
}
