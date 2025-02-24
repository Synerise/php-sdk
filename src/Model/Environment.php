<?php

namespace Synerise\Sdk\Model;


use Microsoft\Kiota\Abstractions\Enum;

class Environment extends Enum implements EnvironmentInterface
{
    use EnvironmentTrait;

    public const Azure = self::AZURE_VALUE;

    public const GCP = self::GCP_VALUE;

    public static function from($value): self
    {
        return new self($value);
    }

    public function label(): string
    {
        return self::LABEL[$this->value()];
    }
}
