<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class MetricsRecommendationsCampaignParameters extends WithMetricsRecommendationsCampaignParameters implements Parsable 
{
    /**
     * @var float|null $personalizedBoostingStrength How much influence the personalized scoring has. Greater values allow you to promote items that have high personalized score. A strength with a value of 0 does not change the scoring.
    */
    private ?float $personalizedBoostingStrength = null;
    
    /**
     * Instantiates a new MetricsRecommendationsCampaignParameters and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MetricsRecommendationsCampaignParameters
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MetricsRecommendationsCampaignParameters {
        return new MetricsRecommendationsCampaignParameters();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'personalizedBoostingStrength' => fn(ParseNode $n) => $o->setPersonalizedBoostingStrength($n->getFloatValue()),
        ]);
    }

    /**
     * Gets the personalizedBoostingStrength property value. How much influence the personalized scoring has. Greater values allow you to promote items that have high personalized score. A strength with a value of 0 does not change the scoring.
     * @return float|null
    */
    public function getPersonalizedBoostingStrength(): ?float {
        return $this->personalizedBoostingStrength;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeFloatValue('personalizedBoostingStrength', $this->getPersonalizedBoostingStrength());
    }

    /**
     * Sets the personalizedBoostingStrength property value. How much influence the personalized scoring has. Greater values allow you to promote items that have high personalized score. A strength with a value of 0 does not change the scoring.
     * @param float|null $value Value to set for the personalizedBoostingStrength property.
    */
    public function setPersonalizedBoostingStrength(?float $value): void {
        $this->personalizedBoostingStrength = $value;
    }

}
