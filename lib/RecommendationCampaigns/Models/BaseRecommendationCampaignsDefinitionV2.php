<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class BaseRecommendationCampaignsDefinitionV2 implements AdditionalDataHolder, Parsable 
{
    /**
     * @var ABTestInfo|null $abTest Information whether campaign is part of an a/b test
    */
    private ?ABTestInfo $abTest = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $additionalResponseAttributes An array of addtional response attributes.
    */
    private ?array $additionalResponseAttributes = null;
    
    /**
     * @var array<BoostingStrategy>|null $boostingStrategies Recommendation boosting strategies
    */
    private ?array $boostingStrategies = null;
    
    /**
     * @var string|null $campaignId Campaign ID
    */
    private ?string $campaignId = null;
    
    /**
     * @var string|null $createdAt Date when the campaign was created
    */
    private ?string $createdAt = null;
    
    /**
     * @var string|null $description Campaign description
    */
    private ?string $description = null;
    
    /**
     * @var string|null $endDate End date for the campaign
    */
    private ?string $endDate = null;
    
    /**
     * @var RecommendationsCampaignFilterRules|null $filterRules Filters that apply to this campaign. If the filters contain an attribute used in the default filters of the recommendation model ([**Settings > AI Configuration**](https://help.synerise.com/docs/settings/configuration/ai-engine-configuration/engine-configuration-for-recommendations/#selecting-recommendation-types-and-default-filters)), that default filter is ignored.
    */
    private ?RecommendationsCampaignFilterRules $filterRules = null;
    
    /**
     * @var string|null $itemsCatalogId Only items from this catalog will be recommended.
    */
    private ?string $itemsCatalogId = null;
    
    /**
     * @var ItemsSource|null $itemsSource The source of item ID or IDs for the recommendation context. This parameter can be passed in all recommendations. In recommendations which don't use item context as part of the recommendation model, the context item can be used only to create filters.The item ID source (aggregate or expression) should return a string or an array of strings. If it returns numerical values, the recommendations engine attempts to convert them into strings while processing the request.Alternatively, you can pass the `itemId` or `itemsSource` parameter when making a request to generate a recommendation from this campaign. The parameter overrides the settings defined here.
    */
    private ?ItemsSource $itemsSource = null;
    
    /**
     * @var bool|null $keepSlotsOrder - When `true`, the `data` array in the response is sorted according to slots. Within each slot, the items are sorted by their score (default) or metric (if selected). For example, if you have 3 slots of 2 items each, the first 2 items in `data` are from the first slot, the second 2 are from the second slot, and the last 2 are from the third slot.- When `false`, the `data` array in the response is sorted only according to score (default) or metric (if selected). Slots have no effect.The additional `extras.slots` object always shows slots and items as if this setting was `true`.If you want to set `personalizeSlotsOrder` to `true`, `keepSlotsOrder` must also be `true`.
    */
    private ?bool $keepSlotsOrder = null;
    
    /**
     * @var bool|null $personalizeSlotsOrder Sort the slots by average personalized slot score. This parameter applies only to personalized and attribute recommendation campaigns.If you want to set `personalizeSlotsOrder` to `true`, `keepSlotsOrder` must also be `true`.
    */
    private ?bool $personalizeSlotsOrder = null;
    
    /**
     * @var array<Slot>|null $slots Recommendation slots. Must contain at least one slot with a non-empty `name`.
    */
    private ?array $slots = null;
    
    /**
     * @var string|null $startDate Start date for the campaign
    */
    private ?string $startDate = null;
    
    /**
     * @var State|null $state Campaign status
    */
    private ?State $state = null;
    
    /**
     * @var string|null $title Campaign title
    */
    private ?string $title = null;
    
    /**
     * @var string|null $updatedAt Date when the campaign was last updated
    */
    private ?string $updatedAt = null;
    
    /**
     * Instantiates a new BaseRecommendationCampaignsDefinitionV2 and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BaseRecommendationCampaignsDefinitionV2
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BaseRecommendationCampaignsDefinitionV2 {
        return new BaseRecommendationCampaignsDefinitionV2();
    }

    /**
     * Gets the abTest property value. Information whether campaign is part of an a/b test
     * @return ABTestInfo|null
    */
    public function getAbTest(): ?ABTestInfo {
        return $this->abTest;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the additionalResponseAttributes property value. An array of addtional response attributes.
     * @return array<string>|null
    */
    public function getAdditionalResponseAttributes(): ?array {
        return $this->additionalResponseAttributes;
    }

    /**
     * Gets the boostingStrategies property value. Recommendation boosting strategies
     * @return array<BoostingStrategy>|null
    */
    public function getBoostingStrategies(): ?array {
        return $this->boostingStrategies;
    }

    /**
     * Gets the campaignId property value. Campaign ID
     * @return string|null
    */
    public function getCampaignId(): ?string {
        return $this->campaignId;
    }

    /**
     * Gets the createdAt property value. Date when the campaign was created
     * @return string|null
    */
    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }

    /**
     * Gets the description property value. Campaign description
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the endDate property value. End date for the campaign
     * @return string|null
    */
    public function getEndDate(): ?string {
        return $this->endDate;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'abTest' => fn(ParseNode $n) => $o->setAbTest($n->getObjectValue([ABTestInfo::class, 'createFromDiscriminatorValue'])),
            'additionalResponseAttributes' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setAdditionalResponseAttributes($val);
            },
            'boostingStrategies' => fn(ParseNode $n) => $o->setBoostingStrategies($n->getCollectionOfObjectValues([BoostingStrategy::class, 'createFromDiscriminatorValue'])),
            'campaignId' => fn(ParseNode $n) => $o->setCampaignId($n->getStringValue()),
            'createdAt' => fn(ParseNode $n) => $o->setCreatedAt($n->getStringValue()),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'endDate' => fn(ParseNode $n) => $o->setEndDate($n->getStringValue()),
            'filterRules' => fn(ParseNode $n) => $o->setFilterRules($n->getObjectValue([RecommendationsCampaignFilterRules::class, 'createFromDiscriminatorValue'])),
            'itemsCatalogId' => fn(ParseNode $n) => $o->setItemsCatalogId($n->getStringValue()),
            'itemsSource' => fn(ParseNode $n) => $o->setItemsSource($n->getObjectValue([ItemsSource::class, 'createFromDiscriminatorValue'])),
            'keepSlotsOrder' => fn(ParseNode $n) => $o->setKeepSlotsOrder($n->getBooleanValue()),
            'personalizeSlotsOrder' => fn(ParseNode $n) => $o->setPersonalizeSlotsOrder($n->getBooleanValue()),
            'slots' => fn(ParseNode $n) => $o->setSlots($n->getCollectionOfObjectValues([Slot::class, 'createFromDiscriminatorValue'])),
            'startDate' => fn(ParseNode $n) => $o->setStartDate($n->getStringValue()),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(State::class)),
            'title' => fn(ParseNode $n) => $o->setTitle($n->getStringValue()),
            'updatedAt' => fn(ParseNode $n) => $o->setUpdatedAt($n->getStringValue()),
        ];
    }

    /**
     * Gets the filterRules property value. Filters that apply to this campaign. If the filters contain an attribute used in the default filters of the recommendation model ([**Settings > AI Configuration**](https://help.synerise.com/docs/settings/configuration/ai-engine-configuration/engine-configuration-for-recommendations/#selecting-recommendation-types-and-default-filters)), that default filter is ignored.
     * @return RecommendationsCampaignFilterRules|null
    */
    public function getFilterRules(): ?RecommendationsCampaignFilterRules {
        return $this->filterRules;
    }

    /**
     * Gets the itemsCatalogId property value. Only items from this catalog will be recommended.
     * @return string|null
    */
    public function getItemsCatalogId(): ?string {
        return $this->itemsCatalogId;
    }

    /**
     * Gets the itemsSource property value. The source of item ID or IDs for the recommendation context. This parameter can be passed in all recommendations. In recommendations which don't use item context as part of the recommendation model, the context item can be used only to create filters.The item ID source (aggregate or expression) should return a string or an array of strings. If it returns numerical values, the recommendations engine attempts to convert them into strings while processing the request.Alternatively, you can pass the `itemId` or `itemsSource` parameter when making a request to generate a recommendation from this campaign. The parameter overrides the settings defined here.
     * @return ItemsSource|null
    */
    public function getItemsSource(): ?ItemsSource {
        return $this->itemsSource;
    }

    /**
     * Gets the keepSlotsOrder property value. - When `true`, the `data` array in the response is sorted according to slots. Within each slot, the items are sorted by their score (default) or metric (if selected). For example, if you have 3 slots of 2 items each, the first 2 items in `data` are from the first slot, the second 2 are from the second slot, and the last 2 are from the third slot.- When `false`, the `data` array in the response is sorted only according to score (default) or metric (if selected). Slots have no effect.The additional `extras.slots` object always shows slots and items as if this setting was `true`.If you want to set `personalizeSlotsOrder` to `true`, `keepSlotsOrder` must also be `true`.
     * @return bool|null
    */
    public function getKeepSlotsOrder(): ?bool {
        return $this->keepSlotsOrder;
    }

    /**
     * Gets the personalizeSlotsOrder property value. Sort the slots by average personalized slot score. This parameter applies only to personalized and attribute recommendation campaigns.If you want to set `personalizeSlotsOrder` to `true`, `keepSlotsOrder` must also be `true`.
     * @return bool|null
    */
    public function getPersonalizeSlotsOrder(): ?bool {
        return $this->personalizeSlotsOrder;
    }

    /**
     * Gets the slots property value. Recommendation slots. Must contain at least one slot with a non-empty `name`.
     * @return array<Slot>|null
    */
    public function getSlots(): ?array {
        return $this->slots;
    }

    /**
     * Gets the startDate property value. Start date for the campaign
     * @return string|null
    */
    public function getStartDate(): ?string {
        return $this->startDate;
    }

    /**
     * Gets the state property value. Campaign status
     * @return State|null
    */
    public function getState(): ?State {
        return $this->state;
    }

    /**
     * Gets the title property value. Campaign title
     * @return string|null
    */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Gets the updatedAt property value. Date when the campaign was last updated
     * @return string|null
    */
    public function getUpdatedAt(): ?string {
        return $this->updatedAt;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('abTest', $this->getAbTest());
        $writer->writeCollectionOfPrimitiveValues('additionalResponseAttributes', $this->getAdditionalResponseAttributes());
        $writer->writeCollectionOfObjectValues('boostingStrategies', $this->getBoostingStrategies());
        $writer->writeStringValue('campaignId', $this->getCampaignId());
        $writer->writeStringValue('createdAt', $this->getCreatedAt());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeStringValue('endDate', $this->getEndDate());
        $writer->writeObjectValue('filterRules', $this->getFilterRules());
        $writer->writeStringValue('itemsCatalogId', $this->getItemsCatalogId());
        $writer->writeObjectValue('itemsSource', $this->getItemsSource());
        $writer->writeBooleanValue('keepSlotsOrder', $this->getKeepSlotsOrder());
        $writer->writeBooleanValue('personalizeSlotsOrder', $this->getPersonalizeSlotsOrder());
        $writer->writeCollectionOfObjectValues('slots', $this->getSlots());
        $writer->writeStringValue('startDate', $this->getStartDate());
        $writer->writeEnumValue('state', $this->getState());
        $writer->writeStringValue('title', $this->getTitle());
        $writer->writeStringValue('updatedAt', $this->getUpdatedAt());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the abTest property value. Information whether campaign is part of an a/b test
     * @param ABTestInfo|null $value Value to set for the abTest property.
    */
    public function setAbTest(?ABTestInfo $value): void {
        $this->abTest = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the additionalResponseAttributes property value. An array of addtional response attributes.
     * @param array<string>|null $value Value to set for the additionalResponseAttributes property.
    */
    public function setAdditionalResponseAttributes(?array $value): void {
        $this->additionalResponseAttributes = $value;
    }

    /**
     * Sets the boostingStrategies property value. Recommendation boosting strategies
     * @param array<BoostingStrategy>|null $value Value to set for the boostingStrategies property.
    */
    public function setBoostingStrategies(?array $value): void {
        $this->boostingStrategies = $value;
    }

    /**
     * Sets the campaignId property value. Campaign ID
     * @param string|null $value Value to set for the campaignId property.
    */
    public function setCampaignId(?string $value): void {
        $this->campaignId = $value;
    }

    /**
     * Sets the createdAt property value. Date when the campaign was created
     * @param string|null $value Value to set for the createdAt property.
    */
    public function setCreatedAt(?string $value): void {
        $this->createdAt = $value;
    }

    /**
     * Sets the description property value. Campaign description
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the endDate property value. End date for the campaign
     * @param string|null $value Value to set for the endDate property.
    */
    public function setEndDate(?string $value): void {
        $this->endDate = $value;
    }

    /**
     * Sets the filterRules property value. Filters that apply to this campaign. If the filters contain an attribute used in the default filters of the recommendation model ([**Settings > AI Configuration**](https://help.synerise.com/docs/settings/configuration/ai-engine-configuration/engine-configuration-for-recommendations/#selecting-recommendation-types-and-default-filters)), that default filter is ignored.
     * @param RecommendationsCampaignFilterRules|null $value Value to set for the filterRules property.
    */
    public function setFilterRules(?RecommendationsCampaignFilterRules $value): void {
        $this->filterRules = $value;
    }

    /**
     * Sets the itemsCatalogId property value. Only items from this catalog will be recommended.
     * @param string|null $value Value to set for the itemsCatalogId property.
    */
    public function setItemsCatalogId(?string $value): void {
        $this->itemsCatalogId = $value;
    }

    /**
     * Sets the itemsSource property value. The source of item ID or IDs for the recommendation context. This parameter can be passed in all recommendations. In recommendations which don't use item context as part of the recommendation model, the context item can be used only to create filters.The item ID source (aggregate or expression) should return a string or an array of strings. If it returns numerical values, the recommendations engine attempts to convert them into strings while processing the request.Alternatively, you can pass the `itemId` or `itemsSource` parameter when making a request to generate a recommendation from this campaign. The parameter overrides the settings defined here.
     * @param ItemsSource|null $value Value to set for the itemsSource property.
    */
    public function setItemsSource(?ItemsSource $value): void {
        $this->itemsSource = $value;
    }

    /**
     * Sets the keepSlotsOrder property value. - When `true`, the `data` array in the response is sorted according to slots. Within each slot, the items are sorted by their score (default) or metric (if selected). For example, if you have 3 slots of 2 items each, the first 2 items in `data` are from the first slot, the second 2 are from the second slot, and the last 2 are from the third slot.- When `false`, the `data` array in the response is sorted only according to score (default) or metric (if selected). Slots have no effect.The additional `extras.slots` object always shows slots and items as if this setting was `true`.If you want to set `personalizeSlotsOrder` to `true`, `keepSlotsOrder` must also be `true`.
     * @param bool|null $value Value to set for the keepSlotsOrder property.
    */
    public function setKeepSlotsOrder(?bool $value): void {
        $this->keepSlotsOrder = $value;
    }

    /**
     * Sets the personalizeSlotsOrder property value. Sort the slots by average personalized slot score. This parameter applies only to personalized and attribute recommendation campaigns.If you want to set `personalizeSlotsOrder` to `true`, `keepSlotsOrder` must also be `true`.
     * @param bool|null $value Value to set for the personalizeSlotsOrder property.
    */
    public function setPersonalizeSlotsOrder(?bool $value): void {
        $this->personalizeSlotsOrder = $value;
    }

    /**
     * Sets the slots property value. Recommendation slots. Must contain at least one slot with a non-empty `name`.
     * @param array<Slot>|null $value Value to set for the slots property.
    */
    public function setSlots(?array $value): void {
        $this->slots = $value;
    }

    /**
     * Sets the startDate property value. Start date for the campaign
     * @param string|null $value Value to set for the startDate property.
    */
    public function setStartDate(?string $value): void {
        $this->startDate = $value;
    }

    /**
     * Sets the state property value. Campaign status
     * @param State|null $value Value to set for the state property.
    */
    public function setState(?State $value): void {
        $this->state = $value;
    }

    /**
     * Sets the title property value. Campaign title
     * @param string|null $value Value to set for the title property.
    */
    public function setTitle(?string $value): void {
        $this->title = $value;
    }

    /**
     * Sets the updatedAt property value. Date when the campaign was last updated
     * @param string|null $value Value to set for the updatedAt property.
    */
    public function setUpdatedAt(?string $value): void {
        $this->updatedAt = $value;
    }

}
