<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Filters that apply to this campaign
*/
class RecommendationsCampaignSlotFilterRules implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $elasticFilters Filtering string for Elastic filter
    */
    private ?string $elasticFilters = null;
    
    /**
     * @var string|null $filters Filtering string
    */
    private ?string $filters = null;
    
    /**
     * Instantiates a new RecommendationsCampaignSlotFilterRules and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationsCampaignSlotFilterRules
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationsCampaignSlotFilterRules {
        return new RecommendationsCampaignSlotFilterRules();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the elasticFilters property value. Filtering string for Elastic filter
     * @return string|null
    */
    public function getElasticFilters(): ?string {
        return $this->elasticFilters;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'elasticFilters' => fn(ParseNode $n) => $o->setElasticFilters($n->getStringValue()),
            'filters' => fn(ParseNode $n) => $o->setFilters($n->getStringValue()),
        ];
    }

    /**
     * Gets the filters property value. Filtering string
     * @return string|null
    */
    public function getFilters(): ?string {
        return $this->filters;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('elasticFilters', $this->getElasticFilters());
        $writer->writeStringValue('filters', $this->getFilters());
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
     * Sets the elasticFilters property value. Filtering string for Elastic filter
     * @param string|null $value Value to set for the elasticFilters property.
    */
    public function setElasticFilters(?string $value): void {
        $this->elasticFilters = $value;
    }

    /**
     * Sets the filters property value. Filtering string
     * @param string|null $value Value to set for the filters property.
    */
    public function setFilters(?string $value): void {
        $this->filters = $value;
    }

}
