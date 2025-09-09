<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns;

use Microsoft\Kiota\Abstractions\Enum;

class GetSortByQueryParameterType extends Enum {
    public const CREATED_AT = "createdAt";
    public const UPDATED_AT = "updatedAt";
    public const START_DATE = "startDate";
    public const END_DATE = "endDate";
    public const STATE = "state";
    public const TYPE = "type";
}
