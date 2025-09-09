<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Simplified;

/**
 * Fetch simplified recommendation campaign data.
*/
class SimplifiedRequestBuilderGetQueryParameters 
{
    /**
     * @var array<GetStateQueryParameterType> $state Filter by states.
    */
    public array $state;
    
    /**
     * @var array<string>|null $type Filter by campaign type.
    */
    public ?array $type = null;
    
    /**
     * Instantiates a new SimplifiedRequestBuilderGetQueryParameters and sets the default values.
     * @param array<GetStateQueryParameterType>|null $state Filter by states.
     * @param array<string>|null $type Filter by campaign type.
    */
    public function __construct(?array $state = null, ?array $type = null) {
        $this->state = $state?? [];
        $this->type = $type;
    }

}
