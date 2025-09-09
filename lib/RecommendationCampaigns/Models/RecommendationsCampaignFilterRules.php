<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Filters that apply to this campaign. If the filters contain an attribute used in the default filters of the recommendation model ([**Settings > AI Configuration**](https://help.synerise.com/docs/settings/configuration/ai-engine-configuration/engine-configuration-for-recommendations/#selecting-recommendation-types-and-default-filters)), that default filter is ignored.
*/
class RecommendationsCampaignFilterRules implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $elasticExcludePurchasedItems This is a setting for Elastic filters.<br>When true, the recommendation results will include only items that the profile hasn't purchased before.
    */
    private ?bool $elasticExcludePurchasedItems = null;
    
    /**
     * @var float|null $elasticExcludePurchasedItemsSinceDays This is a setting for Elastic filters.<br>Limits the application of the `elasticExcludePurchasedItemsSinceDays` filter to a specified number of days.
    */
    private ?float $elasticExcludePurchasedItemsSinceDays = null;
    
    /**
     * @var bool|null $excludePurchasedItems When true, the recommendation results will include only items that the profile hasn't purchased before.
    */
    private ?bool $excludePurchasedItems = null;
    
    /**
     * @var float|null $excludePurchasedItemsSinceDays Limits the application of the `excludePurchasedItems` filter to a specified number of days.
    */
    private ?float $excludePurchasedItemsSinceDays = null;
    
    /**
     * Instantiates a new RecommendationsCampaignFilterRules and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationsCampaignFilterRules
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationsCampaignFilterRules {
        return new RecommendationsCampaignFilterRules();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the elasticExcludePurchasedItems property value. This is a setting for Elastic filters.<br>When true, the recommendation results will include only items that the profile hasn't purchased before.
     * @return bool|null
    */
    public function getElasticExcludePurchasedItems(): ?bool {
        return $this->elasticExcludePurchasedItems;
    }

    /**
     * Gets the elasticExcludePurchasedItemsSinceDays property value. This is a setting for Elastic filters.<br>Limits the application of the `elasticExcludePurchasedItemsSinceDays` filter to a specified number of days.
     * @return float|null
    */
    public function getElasticExcludePurchasedItemsSinceDays(): ?float {
        return $this->elasticExcludePurchasedItemsSinceDays;
    }

    /**
     * Gets the excludePurchasedItems property value. When true, the recommendation results will include only items that the profile hasn't purchased before.
     * @return bool|null
    */
    public function getExcludePurchasedItems(): ?bool {
        return $this->excludePurchasedItems;
    }

    /**
     * Gets the excludePurchasedItemsSinceDays property value. Limits the application of the `excludePurchasedItems` filter to a specified number of days.
     * @return float|null
    */
    public function getExcludePurchasedItemsSinceDays(): ?float {
        return $this->excludePurchasedItemsSinceDays;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'elasticExcludePurchasedItems' => fn(ParseNode $n) => $o->setElasticExcludePurchasedItems($n->getBooleanValue()),
            'elasticExcludePurchasedItemsSinceDays' => fn(ParseNode $n) => $o->setElasticExcludePurchasedItemsSinceDays($n->getFloatValue()),
            'excludePurchasedItems' => fn(ParseNode $n) => $o->setExcludePurchasedItems($n->getBooleanValue()),
            'excludePurchasedItemsSinceDays' => fn(ParseNode $n) => $o->setExcludePurchasedItemsSinceDays($n->getFloatValue()),
        ];
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('elasticExcludePurchasedItems', $this->getElasticExcludePurchasedItems());
        $writer->writeFloatValue('elasticExcludePurchasedItemsSinceDays', $this->getElasticExcludePurchasedItemsSinceDays());
        $writer->writeBooleanValue('excludePurchasedItems', $this->getExcludePurchasedItems());
        $writer->writeFloatValue('excludePurchasedItemsSinceDays', $this->getExcludePurchasedItemsSinceDays());
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
     * Sets the elasticExcludePurchasedItems property value. This is a setting for Elastic filters.<br>When true, the recommendation results will include only items that the profile hasn't purchased before.
     * @param bool|null $value Value to set for the elasticExcludePurchasedItems property.
    */
    public function setElasticExcludePurchasedItems(?bool $value): void {
        $this->elasticExcludePurchasedItems = $value;
    }

    /**
     * Sets the elasticExcludePurchasedItemsSinceDays property value. This is a setting for Elastic filters.<br>Limits the application of the `elasticExcludePurchasedItemsSinceDays` filter to a specified number of days.
     * @param float|null $value Value to set for the elasticExcludePurchasedItemsSinceDays property.
    */
    public function setElasticExcludePurchasedItemsSinceDays(?float $value): void {
        $this->elasticExcludePurchasedItemsSinceDays = $value;
    }

    /**
     * Sets the excludePurchasedItems property value. When true, the recommendation results will include only items that the profile hasn't purchased before.
     * @param bool|null $value Value to set for the excludePurchasedItems property.
    */
    public function setExcludePurchasedItems(?bool $value): void {
        $this->excludePurchasedItems = $value;
    }

    /**
     * Sets the excludePurchasedItemsSinceDays property value. Limits the application of the `excludePurchasedItems` filter to a specified number of days.
     * @param float|null $value Value to set for the excludePurchasedItemsSinceDays property.
    */
    public function setExcludePurchasedItemsSinceDays(?float $value): void {
        $this->excludePurchasedItemsSinceDays = $value;
    }

}
