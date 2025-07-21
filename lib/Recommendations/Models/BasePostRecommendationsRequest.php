<?php

namespace Synerise\Api\Recommendations\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class BasePostRecommendationsRequest implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $additionalElasticFilters <hr><strong>IMPORTANT</strong>:- The `elasticFiltersJoiner` attribute is REQUIRED when `additionalElasticFilters` is included. If `elasticFiltersJoiner` is missing, the additional filters do not work.  - Do NOT send multiple instances of this parameter.<hr>Additional elastic filters. These are merged with the campaign's own elastic filters according to the logic in `elasticFiltersJoiner`.This parameter must include all the additional filters as a single string, for example `additionalElasticFilters=effectivePrice>300 AND effectivePrice<400` (the spaces are required).
    */
    private ?string $additionalElasticFilters = null;
    
    /**
     * @var string|null $additionalFilters <hr><strong>IMPORTANT</strong>:- The `filtersJoiner` attribute is REQUIRED when `additionalFilters` is included. If `filtersJoiner` is missing, the additional filters do not work.  - Do NOT send multiple instances of this parameter.<hr>Additional filters. These are merged with the campaign's own filters according to the logic in `filtersJoiner`.This parameter must include all the additional filters as a single string, for example `additionalFilters=effectivePrice>300 AND effectivePrice<400` (the spaces are required).
    */
    private ?string $additionalFilters = null;
    
    /**
     * @var array<string>|null $displayAttributes An array of item attributes which value will be returned in a recommendation response. The array will be merged together with the configuration of the recommendation.
    */
    private ?array $displayAttributes = null;
    
    /**
     * @var BasePostRecommendationsRequest_elasticFiltersJoiner|null $elasticFiltersJoiner Defines the logic of merging `additionalElasticFilters` with the campaign's existing elastic filters.- `REPLACE` replaces the campaign's filters with your filters.- `AND` matches if both your filters and the campaign filters are met.- `OR` matches if at least one of the filters is met.
    */
    private ?BasePostRecommendationsRequest_elasticFiltersJoiner $elasticFiltersJoiner = null;
    
    /**
     * @var BasePostRecommendationsRequest_filtersJoiner|null $filtersJoiner Defines the logic of merging `additionalFilters` with the campaign's existing filters.- `REPLACE` replaces the campaign's filters with your filters.- `AND` matches if both your filters and the campaign filters are met.- `OR` matches if at least one of the filters is met.
    */
    private ?BasePostRecommendationsRequest_filtersJoiner $filtersJoiner = null;
    
    /**
     * @var bool|null $includeContextItems When true, the recommendation response will include context items metadata.
    */
    private ?bool $includeContextItems = null;
    
    /**
     * @var array<string>|null $items An array of item identifiers (`itemId` in the item feed) for the context. This could be, for example, the current basket, or the item that is currently being viewed.  This overrides the `itemsSource` settings of the campaign definition.This parameter can be passed in all recommendations. In recommendations which don't use the context item as part of the recommendation model, the context item can only be used to create filters.Alternatively, you can use the `itemsSource` object to get item IDs from an aggregate or expression. `items` and `itemsSource` can't be used at the same time.
    */
    private ?array $items = null;
    
    /**
     * @var array<string>|null $itemsExcluded Items (identified by `itemId` in the item feed) that will be excluded from the generated recommendations. For example, items already added to the basket.
    */
    private ?array $itemsExcluded = null;
    
    /**
     * @var BasePostRecommendationsRequest_itemsSource|null $itemsSource Source of the Item ID or item IDs for the recommendation context.This overrides the `itemsSource` settings of the campaign definition.This parameter can be passed in all recommendations. In recommendations which don't use the context item as part of the recommendation model, the context item can only be used to create filters.The item ID source (aggregate or expression) should return a string or an array of strings. If it returns numerical values, the recommendations engine attempts to convert them into strings while processing the request.Alternatively, you can pass the `itemId` parameter to define context items directly. Only one of these options is allowed at the same time.
    */
    private ?BasePostRecommendationsRequest_itemsSource $itemsSource = null;
    
    /**
     * @var ParamsMaterializer|null $params Extra parameters that will be added to the `recommendation.generated` event. The total size must not exceed 500 bytes.
    */
    private ?ParamsMaterializer $params = null;
    
    /**
     * Instantiates a new BasePostRecommendationsRequest and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BasePostRecommendationsRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BasePostRecommendationsRequest {
        return new BasePostRecommendationsRequest();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the additionalElasticFilters property value. <hr><strong>IMPORTANT</strong>:- The `elasticFiltersJoiner` attribute is REQUIRED when `additionalElasticFilters` is included. If `elasticFiltersJoiner` is missing, the additional filters do not work.  - Do NOT send multiple instances of this parameter.<hr>Additional elastic filters. These are merged with the campaign's own elastic filters according to the logic in `elasticFiltersJoiner`.This parameter must include all the additional filters as a single string, for example `additionalElasticFilters=effectivePrice>300 AND effectivePrice<400` (the spaces are required).
     * @return string|null
    */
    public function getAdditionalElasticFilters(): ?string {
        return $this->additionalElasticFilters;
    }

    /**
     * Gets the additionalFilters property value. <hr><strong>IMPORTANT</strong>:- The `filtersJoiner` attribute is REQUIRED when `additionalFilters` is included. If `filtersJoiner` is missing, the additional filters do not work.  - Do NOT send multiple instances of this parameter.<hr>Additional filters. These are merged with the campaign's own filters according to the logic in `filtersJoiner`.This parameter must include all the additional filters as a single string, for example `additionalFilters=effectivePrice>300 AND effectivePrice<400` (the spaces are required).
     * @return string|null
    */
    public function getAdditionalFilters(): ?string {
        return $this->additionalFilters;
    }

    /**
     * Gets the displayAttributes property value. An array of item attributes which value will be returned in a recommendation response. The array will be merged together with the configuration of the recommendation.
     * @return array<string>|null
    */
    public function getDisplayAttributes(): ?array {
        return $this->displayAttributes;
    }

    /**
     * Gets the elasticFiltersJoiner property value. Defines the logic of merging `additionalElasticFilters` with the campaign's existing elastic filters.- `REPLACE` replaces the campaign's filters with your filters.- `AND` matches if both your filters and the campaign filters are met.- `OR` matches if at least one of the filters is met.
     * @return BasePostRecommendationsRequest_elasticFiltersJoiner|null
    */
    public function getElasticFiltersJoiner(): ?BasePostRecommendationsRequest_elasticFiltersJoiner {
        return $this->elasticFiltersJoiner;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'additionalElasticFilters' => fn(ParseNode $n) => $o->setAdditionalElasticFilters($n->getStringValue()),
            'additionalFilters' => fn(ParseNode $n) => $o->setAdditionalFilters($n->getStringValue()),
            'displayAttributes' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setDisplayAttributes($val);
            },
            'elasticFiltersJoiner' => fn(ParseNode $n) => $o->setElasticFiltersJoiner($n->getEnumValue(BasePostRecommendationsRequest_elasticFiltersJoiner::class)),
            'filtersJoiner' => fn(ParseNode $n) => $o->setFiltersJoiner($n->getEnumValue(BasePostRecommendationsRequest_filtersJoiner::class)),
            'includeContextItems' => fn(ParseNode $n) => $o->setIncludeContextItems($n->getBooleanValue()),
            'items' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setItems($val);
            },
            'itemsExcluded' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setItemsExcluded($val);
            },
            'itemsSource' => fn(ParseNode $n) => $o->setItemsSource($n->getObjectValue([BasePostRecommendationsRequest_itemsSource::class, 'createFromDiscriminatorValue'])),
            'params' => fn(ParseNode $n) => $o->setParams($n->getObjectValue([ParamsMaterializer::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the filtersJoiner property value. Defines the logic of merging `additionalFilters` with the campaign's existing filters.- `REPLACE` replaces the campaign's filters with your filters.- `AND` matches if both your filters and the campaign filters are met.- `OR` matches if at least one of the filters is met.
     * @return BasePostRecommendationsRequest_filtersJoiner|null
    */
    public function getFiltersJoiner(): ?BasePostRecommendationsRequest_filtersJoiner {
        return $this->filtersJoiner;
    }

    /**
     * Gets the includeContextItems property value. When true, the recommendation response will include context items metadata.
     * @return bool|null
    */
    public function getIncludeContextItems(): ?bool {
        return $this->includeContextItems;
    }

    /**
     * Gets the items property value. An array of item identifiers (`itemId` in the item feed) for the context. This could be, for example, the current basket, or the item that is currently being viewed.  This overrides the `itemsSource` settings of the campaign definition.This parameter can be passed in all recommendations. In recommendations which don't use the context item as part of the recommendation model, the context item can only be used to create filters.Alternatively, you can use the `itemsSource` object to get item IDs from an aggregate or expression. `items` and `itemsSource` can't be used at the same time.
     * @return array<string>|null
    */
    public function getItems(): ?array {
        return $this->items;
    }

    /**
     * Gets the itemsExcluded property value. Items (identified by `itemId` in the item feed) that will be excluded from the generated recommendations. For example, items already added to the basket.
     * @return array<string>|null
    */
    public function getItemsExcluded(): ?array {
        return $this->itemsExcluded;
    }

    /**
     * Gets the itemsSource property value. Source of the Item ID or item IDs for the recommendation context.This overrides the `itemsSource` settings of the campaign definition.This parameter can be passed in all recommendations. In recommendations which don't use the context item as part of the recommendation model, the context item can only be used to create filters.The item ID source (aggregate or expression) should return a string or an array of strings. If it returns numerical values, the recommendations engine attempts to convert them into strings while processing the request.Alternatively, you can pass the `itemId` parameter to define context items directly. Only one of these options is allowed at the same time.
     * @return BasePostRecommendationsRequest_itemsSource|null
    */
    public function getItemsSource(): ?BasePostRecommendationsRequest_itemsSource {
        return $this->itemsSource;
    }

    /**
     * Gets the params property value. Extra parameters that will be added to the `recommendation.generated` event. The total size must not exceed 500 bytes.
     * @return ParamsMaterializer|null
    */
    public function getParams(): ?ParamsMaterializer {
        return $this->params;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('additionalElasticFilters', $this->getAdditionalElasticFilters());
        $writer->writeStringValue('additionalFilters', $this->getAdditionalFilters());
        $writer->writeCollectionOfPrimitiveValues('displayAttributes', $this->getDisplayAttributes());
        $writer->writeEnumValue('elasticFiltersJoiner', $this->getElasticFiltersJoiner());
        $writer->writeEnumValue('filtersJoiner', $this->getFiltersJoiner());
        $writer->writeBooleanValue('includeContextItems', $this->getIncludeContextItems());
        $writer->writeCollectionOfPrimitiveValues('items', $this->getItems());
        $writer->writeCollectionOfPrimitiveValues('itemsExcluded', $this->getItemsExcluded());
        $writer->writeObjectValue('itemsSource', $this->getItemsSource());
        $writer->writeObjectValue('params', $this->getParams());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the additionalElasticFilters property value. <hr><strong>IMPORTANT</strong>:- The `elasticFiltersJoiner` attribute is REQUIRED when `additionalElasticFilters` is included. If `elasticFiltersJoiner` is missing, the additional filters do not work.  - Do NOT send multiple instances of this parameter.<hr>Additional elastic filters. These are merged with the campaign's own elastic filters according to the logic in `elasticFiltersJoiner`.This parameter must include all the additional filters as a single string, for example `additionalElasticFilters=effectivePrice>300 AND effectivePrice<400` (the spaces are required).
     * @param string|null $value Value to set for the additionalElasticFilters property.
    */
    public function setAdditionalElasticFilters(?string $value): void {
        $this->additionalElasticFilters = $value;
    }

    /**
     * Sets the additionalFilters property value. <hr><strong>IMPORTANT</strong>:- The `filtersJoiner` attribute is REQUIRED when `additionalFilters` is included. If `filtersJoiner` is missing, the additional filters do not work.  - Do NOT send multiple instances of this parameter.<hr>Additional filters. These are merged with the campaign's own filters according to the logic in `filtersJoiner`.This parameter must include all the additional filters as a single string, for example `additionalFilters=effectivePrice>300 AND effectivePrice<400` (the spaces are required).
     * @param string|null $value Value to set for the additionalFilters property.
    */
    public function setAdditionalFilters(?string $value): void {
        $this->additionalFilters = $value;
    }

    /**
     * Sets the displayAttributes property value. An array of item attributes which value will be returned in a recommendation response. The array will be merged together with the configuration of the recommendation.
     * @param array<string>|null $value Value to set for the displayAttributes property.
    */
    public function setDisplayAttributes(?array $value): void {
        $this->displayAttributes = $value;
    }

    /**
     * Sets the elasticFiltersJoiner property value. Defines the logic of merging `additionalElasticFilters` with the campaign's existing elastic filters.- `REPLACE` replaces the campaign's filters with your filters.- `AND` matches if both your filters and the campaign filters are met.- `OR` matches if at least one of the filters is met.
     * @param BasePostRecommendationsRequest_elasticFiltersJoiner|null $value Value to set for the elasticFiltersJoiner property.
    */
    public function setElasticFiltersJoiner(?BasePostRecommendationsRequest_elasticFiltersJoiner $value): void {
        $this->elasticFiltersJoiner = $value;
    }

    /**
     * Sets the filtersJoiner property value. Defines the logic of merging `additionalFilters` with the campaign's existing filters.- `REPLACE` replaces the campaign's filters with your filters.- `AND` matches if both your filters and the campaign filters are met.- `OR` matches if at least one of the filters is met.
     * @param BasePostRecommendationsRequest_filtersJoiner|null $value Value to set for the filtersJoiner property.
    */
    public function setFiltersJoiner(?BasePostRecommendationsRequest_filtersJoiner $value): void {
        $this->filtersJoiner = $value;
    }

    /**
     * Sets the includeContextItems property value. When true, the recommendation response will include context items metadata.
     * @param bool|null $value Value to set for the includeContextItems property.
    */
    public function setIncludeContextItems(?bool $value): void {
        $this->includeContextItems = $value;
    }

    /**
     * Sets the items property value. An array of item identifiers (`itemId` in the item feed) for the context. This could be, for example, the current basket, or the item that is currently being viewed.  This overrides the `itemsSource` settings of the campaign definition.This parameter can be passed in all recommendations. In recommendations which don't use the context item as part of the recommendation model, the context item can only be used to create filters.Alternatively, you can use the `itemsSource` object to get item IDs from an aggregate or expression. `items` and `itemsSource` can't be used at the same time.
     * @param array<string>|null $value Value to set for the items property.
    */
    public function setItems(?array $value): void {
        $this->items = $value;
    }

    /**
     * Sets the itemsExcluded property value. Items (identified by `itemId` in the item feed) that will be excluded from the generated recommendations. For example, items already added to the basket.
     * @param array<string>|null $value Value to set for the itemsExcluded property.
    */
    public function setItemsExcluded(?array $value): void {
        $this->itemsExcluded = $value;
    }

    /**
     * Sets the itemsSource property value. Source of the Item ID or item IDs for the recommendation context.This overrides the `itemsSource` settings of the campaign definition.This parameter can be passed in all recommendations. In recommendations which don't use the context item as part of the recommendation model, the context item can only be used to create filters.The item ID source (aggregate or expression) should return a string or an array of strings. If it returns numerical values, the recommendations engine attempts to convert them into strings while processing the request.Alternatively, you can pass the `itemId` parameter to define context items directly. Only one of these options is allowed at the same time.
     * @param BasePostRecommendationsRequest_itemsSource|null $value Value to set for the itemsSource property.
    */
    public function setItemsSource(?BasePostRecommendationsRequest_itemsSource $value): void {
        $this->itemsSource = $value;
    }

    /**
     * Sets the params property value. Extra parameters that will be added to the `recommendation.generated` event. The total size must not exceed 500 bytes.
     * @param ParamsMaterializer|null $value Value to set for the params property.
    */
    public function setParams(?ParamsMaterializer $value): void {
        $this->params = $value;
    }

}
