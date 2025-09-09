<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SetComplementRecommendationCampaignsCreateRequestV2 extends BaseRecommendationCampaignsCreateRequestV2 implements Parsable 
{
    /**
     * @var SetComplementRecommendationsCampaignParameters|null $parameters The parameters property
    */
    private ?SetComplementRecommendationsCampaignParameters $parameters = null;
    
    /**
     * @var CampaignTypeComplementary|null $type Campaign type
    */
    private ?CampaignTypeComplementary $type = null;
    
    /**
     * Instantiates a new SetComplementRecommendationCampaignsCreateRequestV2 and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SetComplementRecommendationCampaignsCreateRequestV2
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SetComplementRecommendationCampaignsCreateRequestV2 {
        return new SetComplementRecommendationCampaignsCreateRequestV2();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'parameters' => fn(ParseNode $n) => $o->setParameters($n->getObjectValue([SetComplementRecommendationsCampaignParameters::class, 'createFromDiscriminatorValue'])),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(CampaignTypeComplementary::class)),
        ]);
    }

    /**
     * Gets the parameters property value. The parameters property
     * @return SetComplementRecommendationsCampaignParameters|null
    */
    public function getParameters(): ?SetComplementRecommendationsCampaignParameters {
        return $this->parameters;
    }

    /**
     * Gets the type property value. Campaign type
     * @return CampaignTypeComplementary|null
    */
    public function getType(): ?CampaignTypeComplementary {
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
     * @param SetComplementRecommendationsCampaignParameters|null $value Value to set for the parameters property.
    */
    public function setParameters(?SetComplementRecommendationsCampaignParameters $value): void {
        $this->parameters = $value;
    }

    /**
     * Sets the type property value. Campaign type
     * @param CampaignTypeComplementary|null $value Value to set for the type property.
    */
    public function setType(?CampaignTypeComplementary $value): void {
        $this->type = $value;
    }

}
