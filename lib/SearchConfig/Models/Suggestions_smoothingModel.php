<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Enum;

class Suggestions_smoothingModel extends Enum {
    public const POPULARITY = "Popularity";
    public const ACCURACY = "Accuracy";
}
