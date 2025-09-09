<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class RecentInteractionsRecommendationCampaignsDefinitionV2 extends BaseRecommendationCampaignsDefinitionV2 implements Parsable 
{
    /**
     * @var RecentInteractionsRecommendationsCampaignParameters|null $parameters The parameters property
    */
    private ?RecentInteractionsRecommendationsCampaignParameters $parameters = null;
    
    /**
     * @var CampaignTypeRecentInteractions|null $type Campaign type
    */
    private ?CampaignTypeRecentInteractions $type = null;
    
    /**
     * Instantiates a new RecentInteractionsRecommendationCampaignsDefinitionV2 and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecentInteractionsRecommendationCampaignsDefinitionV2
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecentInteractionsRecommendationCampaignsDefinitionV2 {
        return new RecentInteractionsRecommendationCampaignsDefinitionV2();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'parameters' => fn(ParseNode $n) => $o->setParameters($n->getObjectValue([RecentInteractionsRecommendationsCampaignParameters::class, 'createFromDiscriminatorValue'])),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(CampaignTypeRecentInteractions::class)),
        ]);
    }

    /**
     * Gets the parameters property value. The parameters property
     * @return RecentInteractionsRecommendationsCampaignParameters|null
    */
    public function getParameters(): ?RecentInteractionsRecommendationsCampaignParameters {
        return $this->parameters;
    }

    /**
     * Gets the type property value. Campaign type
     * @return CampaignTypeRecentInteractions|null
    */
    public function getType(): ?CampaignTypeRecentInteractions {
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
     * @param RecentInteractionsRecommendationsCampaignParameters|null $value Value to set for the parameters property.
    */
    public function setParameters(?RecentInteractionsRecommendationsCampaignParameters $value): void {
        $this->parameters = $value;
    }

    /**
     * Sets the type property value. Campaign type
     * @param CampaignTypeRecentInteractions|null $value Value to set for the type property.
    */
    public function setType(?CampaignTypeRecentInteractions $value): void {
        $this->type = $value;
    }

}
