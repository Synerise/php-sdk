<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PersonalizedRecommendationCampaignsDefinitionV2 extends BaseRecommendationCampaignsDefinitionV2 implements Parsable 
{
    /**
     * @var BaseRecommendationsCampaignParameters|null $parameters Parameters that apply to this campaign
    */
    private ?BaseRecommendationsCampaignParameters $parameters = null;
    
    /**
     * @var CampaignTypePersonalized|null $type Campaign type
    */
    private ?CampaignTypePersonalized $type = null;
    
    /**
     * Instantiates a new PersonalizedRecommendationCampaignsDefinitionV2 and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PersonalizedRecommendationCampaignsDefinitionV2
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PersonalizedRecommendationCampaignsDefinitionV2 {
        return new PersonalizedRecommendationCampaignsDefinitionV2();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'parameters' => fn(ParseNode $n) => $o->setParameters($n->getObjectValue([BaseRecommendationsCampaignParameters::class, 'createFromDiscriminatorValue'])),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(CampaignTypePersonalized::class)),
        ]);
    }

    /**
     * Gets the parameters property value. Parameters that apply to this campaign
     * @return BaseRecommendationsCampaignParameters|null
    */
    public function getParameters(): ?BaseRecommendationsCampaignParameters {
        return $this->parameters;
    }

    /**
     * Gets the type property value. Campaign type
     * @return CampaignTypePersonalized|null
    */
    public function getType(): ?CampaignTypePersonalized {
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
     * Sets the parameters property value. Parameters that apply to this campaign
     * @param BaseRecommendationsCampaignParameters|null $value Value to set for the parameters property.
    */
    public function setParameters(?BaseRecommendationsCampaignParameters $value): void {
        $this->parameters = $value;
    }

    /**
     * Sets the type property value. Campaign type
     * @param CampaignTypePersonalized|null $value Value to set for the type property.
    */
    public function setType(?CampaignTypePersonalized $value): void {
        $this->type = $value;
    }

}
