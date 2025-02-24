<?php

namespace Synerise\Sdk\Model;

interface AuthenticationMethodInterface extends Enum
{
    public const BEARER_VALUE = 'bearer';

    public const BASIC_VALUE = 'basic';

    public const LABEL = [
        self::BEARER_VALUE => 'Bearer',
        self::BASIC_VALUE => 'Basic'
    ];
}
