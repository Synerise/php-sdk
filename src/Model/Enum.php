<?php

namespace Synerise\Sdk\Model;

interface Enum
{
    public function value(): string;

    public function label(): string;
}
