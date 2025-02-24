<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Enum;

class Analyzers_autocomplete extends Enum {
    public const NGRAM = "Ngram";
    public const EDGE_NGRAM = "EdgeNgram";
}
