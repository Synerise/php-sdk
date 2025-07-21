<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AttributeRecommendationCampaignsDefinitionV2 extends BaseRecommendationCampaignsDefinitionV2 implements Parsable 
{
    /**
     * @var AttributeRecommendationsCampaignParameters|null $parameters The parameters property
    */
    private ?AttributeRecommendationsCampaignParameters $parameters = null;
    
    /**
     * @var CampaignTypeAttribute|null $type Campaign type
    */
    private ?CampaignTypeAttribute $type = null;
    
    /**
     * Instantiates a new AttributeRecommendationCampaignsDefinitionV2 and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AttributeRecommendationCampaignsDefinitionV2
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AttributeRecommendationCampaignsDefinitionV2 {
        return new AttributeRecommendationCampaignsDefinitionV2();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'parameters' => fn(ParseNode $n) => $o->setParameters($n->getObjectValue([AttributeRecommendationsCampaignParameters::class, 'createFromDiscriminatorValue'])),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(CampaignTypeAttribute::class)),
        ]);
    }

    /**
     * Gets the parameters property value. The parameters property
     * @return AttributeRecommendationsCampaignParameters|null
    */
    public function getParameters(): ?AttributeRecommendationsCampaignParameters {
        return $this->parameters;
    }

    /**
     * Gets the type property value. Campaign type
     * @return CampaignTypeAttribute|null
    */
    public function getType(): ?CampaignTypeAttribute {
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
     * @param AttributeRecommendationsCampaignParameters|null $value Value to set for the parameters property.
    */
    public function setParameters(?AttributeRecommendationsCampaignParameters $value): void {
        $this->parameters = $value;
    }

    /**
     * Sets the type property value. Campaign type
     * @param CampaignTypeAttribute|null $value Value to set for the type property.
    */
    public function setType(?CampaignTypeAttribute $value): void {
        $this->type = $value;
    }

}
