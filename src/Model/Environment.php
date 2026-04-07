<?php

declare(strict_types=1);

namespace Synerise\Sdk\Model;

use InvalidArgumentException;

class Environment implements EnvironmentInterface
{
    use EnvironmentTrait;

    public const VALUE = [
        self::AZURE_VALUE,
        self::AZURE_US_VALUE,
        self::GCP_VALUE,
    ];

    /**
     * The value of the enum
     *
     * @var string
     */
    private string $value;

    public function __construct(string $value)
    {
        $components = explode(',', $value);

        foreach ($components as $component) {
            if (!self::has($component)) {
                throw new InvalidArgumentException("Invalid enum value $value");
            }
        }
        $this->value = $value;
    }

    public static function from(string $value): self
    {
        return new self($value);
    }

    public static function has(string $value): bool
    {
        return in_array(strtolower($value), self::VALUE, true);
    }

    public function label(): string
    {
        return self::LABEL[$this->value()];
    }

    public function value(): string
    {
        return $this->value;
    }
}
