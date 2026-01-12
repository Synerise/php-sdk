<?php

namespace Synerise\Sdk\Model;

class AuthenticationMethod implements AuthenticationMethodInterface
{
    public const VALUE = [
        self::BEARER_VALUE,
        self::BASIC_VALUE
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
                throw new \InvalidArgumentException("Invalid enum value $value");
            }
        }
        $this->value = $value;
    }

    public static function from($value): self
    {
        return new self($value);
    }

    public static function has($value): bool
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException('The value is expected to be a string type.');
        }
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

