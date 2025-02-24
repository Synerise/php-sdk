<?php

namespace Synerise\Sdk\Model;

use Microsoft\Kiota\Abstractions\Enum;

class AuthenticationMethod extends Enum implements AuthenticationMethodInterface
{
    public const Bearer = self::BEARER_VALUE;

    public const Basic = self::BASIC_VALUE;

    public static function from($value): self
    {
        return new self($value);
    }

    public function label(): string
    {
        return self::LABEL[$this->value()];
    }
}

