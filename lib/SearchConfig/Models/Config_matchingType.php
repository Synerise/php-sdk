<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Enum;

class Config_matchingType extends Enum {
    public const PHRASE = "Phrase";
    public const FULL_WORD = "FullWord";
    public const PARTIAL_WORD = "PartialWord";
    public const REGULAR_EXPRESSION = "RegularExpression";
}
