<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Enum;

class AiCompatBatchEventRequest_eventType extends Enum {
    public const ITEM_SEARCH_CLICK = "item.search.click";
    public const PRODUCT_SEARCH_CLICK = "product.search.click";
    public const RECOMMENDATION_CLICK = "recommendation.click";
    public const RECOMMENDATION_VIEW = "recommendation.view";
}
