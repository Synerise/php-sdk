<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class MetricsRecommendationCampaignsCreateRequestV2 extends BaseRecommendationCampaignsCreateRequestV2 implements Parsable 
{
    /**
     * @var MetricsRecommendationsCampaignParameters|null $parameters The parameters property
    */
    private ?MetricsRecommendationsCampaignParameters $parameters = null;
    
    /**
     * @var CampaignTypeMetrics|null $type Campaign type
    */
    private ?CampaignTypeMetrics $type = null;
    
    /**
     * Instantiates a new MetricsRecommendationCampaignsCreateRequestV2 and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MetricsRecommendationCampaignsCreateRequestV2
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MetricsRecommendationCampaignsCreateRequestV2 {
        return new MetricsRecommendationCampaignsCreateRequestV2();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'parameters' => fn(ParseNode $n) => $o->setParameters($n->getObjectValue([MetricsRecommendationsCampaignParameters::class, 'createFromDiscriminatorValue'])),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(CampaignTypeMetrics::class)),
        ]);
    }

    /**
     * Gets the parameters property value. The parameters property
     * @return MetricsRecommendationsCampaignParameters|null
    */
    public function getParameters(): ?MetricsRecommendationsCampaignParameters {
        return $this->parameters;
    }

    /**
     * Gets the type property value. Campaign type
     * @return CampaignTypeMetrics|null
    */
    public function getType(): ?CampaignTypeMetrics {
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
     * @param MetricsRecommendationsCampaignParameters|null $value Value to set for the parameters property.
    */
    public function setParameters(?MetricsRecommendationsCampaignParameters $value): void {
        $this->parameters = $value;
    }

    /**
     * Sets the type property value. Campaign type
     * @param CampaignTypeMetrics|null $value Value to set for the type property.
    */
    public function setType(?CampaignTypeMetrics $value): void {
        $this->type = $value;
    }

}
