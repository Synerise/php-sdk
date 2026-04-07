<?php

declare(strict_types=1);

namespace Synerise\Sdk\Model;

trait EnumTrait
{
    public function value(): string
    {
        return $this->value;
    }

    public function label(): string
    {
        return self::LABEL[$this->value()];
    }
}
