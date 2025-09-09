<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class RecommendationCampaignsResponseV2_extras implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var RecommendationCampaignsResponseV2_extras_states|null $states Number of campaigns in particular state after applying filters
    */
    private ?RecommendationCampaignsResponseV2_extras_states $states = null;
    
    /**
     * Instantiates a new RecommendationCampaignsResponseV2_extras and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationCampaignsResponseV2_extras
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationCampaignsResponseV2_extras {
        return new RecommendationCampaignsResponseV2_extras();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'states' => fn(ParseNode $n) => $o->setStates($n->getObjectValue([RecommendationCampaignsResponseV2_extras_states::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the states property value. Number of campaigns in particular state after applying filters
     * @return RecommendationCampaignsResponseV2_extras_states|null
    */
    public function getStates(): ?RecommendationCampaignsResponseV2_extras_states {
        return $this->states;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('states', $this->getStates());
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
     * Sets the states property value. Number of campaigns in particular state after applying filters
     * @param RecommendationCampaignsResponseV2_extras_states|null $value Value to set for the states property.
    */
    public function setStates(?RecommendationCampaignsResponseV2_extras_states $value): void {
        $this->states = $value;
    }

}
