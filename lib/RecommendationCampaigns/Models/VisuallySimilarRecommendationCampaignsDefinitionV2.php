<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class VisuallySimilarRecommendationCampaignsDefinitionV2 extends BaseRecommendationCampaignsDefinitionV2 implements Parsable 
{
    /**
     * @var WithMetricsRecommendationsCampaignParameters|null $parameters The parameters property
    */
    private ?WithMetricsRecommendationsCampaignParameters $parameters = null;
    
    /**
     * @var CampaignTypeVisuallySimilar|null $type Campaign type
    */
    private ?CampaignTypeVisuallySimilar $type = null;
    
    /**
     * Instantiates a new VisuallySimilarRecommendationCampaignsDefinitionV2 and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return VisuallySimilarRecommendationCampaignsDefinitionV2
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): VisuallySimilarRecommendationCampaignsDefinitionV2 {
        return new VisuallySimilarRecommendationCampaignsDefinitionV2();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'parameters' => fn(ParseNode $n) => $o->setParameters($n->getObjectValue([WithMetricsRecommendationsCampaignParameters::class, 'createFromDiscriminatorValue'])),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(CampaignTypeVisuallySimilar::class)),
        ]);
    }

    /**
     * Gets the parameters property value. The parameters property
     * @return WithMetricsRecommendationsCampaignParameters|null
    */
    public function getParameters(): ?WithMetricsRecommendationsCampaignParameters {
        return $this->parameters;
    }

    /**
     * Gets the type property value. Campaign type
     * @return CampaignTypeVisuallySimilar|null
    */
    public function getType(): ?CampaignTypeVisuallySimilar {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('parameters', $this->getParameters());
        $writer->writeEnumValue('type', $this->getType());
    }

    /**
     * Sets the parameters property value. The parameters property
     * @param WithMetricsRecommendationsCampaignParameters|null $value Value to set for the parameters property.
    */
    public function setParameters(?WithMetricsRecommendationsCampaignParameters $value): void {
        $this->parameters = $value;
    }

    /**
     * Sets the type property value. Campaign type
     * @param CampaignTypeVisuallySimilar|null $value Value to set for the type property.
    */
    public function setType(?CampaignTypeVisuallySimilar $value): void {
        $this->type = $value;
    }

}
