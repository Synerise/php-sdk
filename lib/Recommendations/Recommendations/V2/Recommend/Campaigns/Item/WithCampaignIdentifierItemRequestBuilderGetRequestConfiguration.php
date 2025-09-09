<?php

namespace Synerise\Api\Recommendations\Recommendations\V2\Recommend\Campaigns\Item;

use Microsoft\Kiota\Abstractions\BaseRequestConfiguration;
use Microsoft\Kiota\Abstractions\RequestOption;

/**
 * Configuration for the request such as headers, query parameters, and middleware options.
*/
class WithCampaignIdentifierItemRequestBuilderGetRequestConfiguration extends BaseRequestConfiguration 
{
    /**
     * @var WithCampaignIdentifierItemRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public ?WithCampaignIdentifierItemRequestBuilderGetQueryParameters $queryParameters = null;
    
    /**
     * Instantiates a new WithCampaignIdentifierItemRequestBuilderGetRequestConfiguration and sets the default values.
     * @param array<string, array<string>|string>|null $headers Request headers
     * @param array<RequestOption>|null $options Request options
     * @param WithCampaignIdentifierItemRequestBuilderGetQueryParameters|null $queryParameters Request query parameters
    */
    public function __construct(?array $headers = null, ?array $options = null, ?WithCampaignIdentifierItemRequestBuilderGetQueryParameters $queryParameters = null) {
        parent::__construct($headers ?? [], $options ?? []);
        $this->queryParameters = $queryParameters;
    }

    /**
     * Instantiates a new WithCampaignIdentifierItemRequestBuilderGetQueryParameters.
     * @param string|null $additionalElasticFilters <hr><strong>IMPORTANT</strong>:- The `elasticFiltersJoiner` attribute is REQUIRED when `additionalElasticFilters` is included. If `elasticFiltersJoiner` is missing, the additional filters do not work.  - Do NOT send multiple instances of this parameter.<hr>Additional elastic filters. These are merged with the campaign's own elastic filters according to the logic in `elasticFiltersJoiner`.This parameter must include all the additional filters as a single string, for example `additionalElasticFilters=effectivePrice>300 AND effectivePrice<400` (the spaces are required).
     * @param string|null $additionalFilters <hr><strong>IMPORTANT</strong>:- The `filtersJoiner` attribute is REQUIRED when `additionalFilters` is included. If `filtersJoiner` is missing, the additional filters do not work.  - Do NOT send multiple instances of this parameter.<hr>Additional filters. These are merged with the campaign's own filters according to the logic in `filtersJoiner`.This parameter must include all the additional filters as a single string, for example `additionalFilters=effectivePrice>300 AND effectivePrice<400` (the spaces are required).
     * @param string|null $clientUUID Profile UUID. This parameter is required for these recommendation types:  - Personalized  - Last seen  - Recent interactions  - Section  - AttributeThis parameter can be passed in all recommendations. In recommendations which don't require the customer context, it can still be used to create filters.
     * @param string|null $displayAttribute Item attribute whose value will be returned in the recommendation response. The parameter value will be merged with the configuration of the recommendation. This parameter can be passed multiple times.
     * @param GetElasticFiltersJoinerQueryParameterType|null $elasticFiltersJoiner Defines the logic of merging `additionalElasticFilters` with the campaign's existing elastic filters.- `REPLACE` replaces the campaign's filters with your filters.- `AND` matches if both your filters and the campaign filters are met.- `OR` matches if at least one of the filters is met.
     * @param GetFiltersJoinerQueryParameterType|null $filtersJoiner Defines the logic of merging `additionalFilters` with the campaign's existing filters.- `REPLACE` replaces the campaign's filters with your filters.- `AND` matches if both your filters and the campaign filters are met.- `OR` matches if at least one of the filters is met.
     * @param bool|null $includeContextItems When true, the recommendation response will include context items metadata.
     * @param string|null $itemId Item ID or item IDs for the recommendation context. This parameter is:- required for similar/complementary items campaigns.- optional for personalized campaigns.This parameter can be passed in all recommendations. In recommendations which don't use the context item as part of the recommendation model, the context item can only be used to create filters.You can repeat this parameter in order to pass a number of context-creating items, for example, in a cart recommendation campaign.This overrides the `itemsSource` settings of the campaign definition.Alternatively, you can pass the `itemsSourceType` and `itemsSourceId` parameters to use context items from source (aggregate or expression). These parameters can't be used at the same request with `itemId`.
     * @param string|null $itemIdExcluded IDs of items that will be excluded from the generated recommendations. For example, items already added to the basket.
     * @param string|null $itemsSourceId Source of item IDs for the recommendation context. In recommendations whose models doesn't use the item context, the attributes of those items can only be used in filters.Must be used with `itemsSourceType`.If the items' source type is 'aggregate', this is the aggregate's ID. If the items' source type is 'expression', this is the expression's ID.The item ID source (aggregate or expression) should return a string or an array of strings. If it returns numerical values, the recommendations engine attempts to convert them into strings while processing the request.Alternatively, you can pass the `itemId` parameter to define context items directly. Only one of these options is allowed at the same time.
     * @param GetItemsSourceTypeQueryParameterType|null $itemsSourceType Item ID or item IDs source type for the recommendation context.Must be used with `itemSourceId`. This overrides the `itemsSource` settings of the campaign definition.In recommendations whose models doesn't use the item context, the attributes of those items can only be used in filters.  If the items' source type is 'aggregate', the aggregate result will be used as context items. If the items' source type is 'expression', the expression result will be used as context items.The item ID source (aggregate or expression) should return a string or an array of strings. If it returns numerical values, the recommendations engine attempts to convert them into strings while processing the request.Alternatively, you can pass the `itemId` parameter to define context items directly. Only one of these options is allowed at the same time.
     * @param array<string>|null $params List of extra params that will be added to the `recommendation.generated` event. They must be in the `name:value` format. The total size must not exceed 500 bytes when written as a JSON object.
     * @return WithCampaignIdentifierItemRequestBuilderGetQueryParameters
    */
    public static function createQueryParameters(?string $additionalElasticFilters = null, ?string $additionalFilters = null, ?string $clientUUID = null, ?string $displayAttribute = null, ?GetElasticFiltersJoinerQueryParameterType $elasticFiltersJoiner = null, ?GetFiltersJoinerQueryParameterType $filtersJoiner = null, ?bool $includeContextItems = null, ?string $itemId = null, ?string $itemIdExcluded = null, ?string $itemsSourceId = null, ?GetItemsSourceTypeQueryParameterType $itemsSourceType = null, ?array $params = null): WithCampaignIdentifierItemRequestBuilderGetQueryParameters {
        return new WithCampaignIdentifierItemRequestBuilderGetQueryParameters($additionalElasticFilters, $additionalFilters, $clientUUID, $displayAttribute, $elasticFiltersJoiner, $filtersJoiner, $includeContextItems, $itemId, $itemIdExcluded, $itemsSourceId, $itemsSourceType, $params);
    }

}
