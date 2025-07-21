<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Number of campaigns in particular state after applying filters
*/
class RecommendationCampaignsResponseV2_extras_states implements AdditionalDataHolder, Parsable 
{
    /**
     * @var float|null $active The active property
    */
    private ?float $active = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var float|null $draft The draft property
    */
    private ?float $draft = null;
    
    /**
     * @var float|null $paused The paused property
    */
    private ?float $paused = null;
    
    /**
     * Instantiates a new RecommendationCampaignsResponseV2_extras_states and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationCampaignsResponseV2_extras_states
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationCampaignsResponseV2_extras_states {
        return new RecommendationCampaignsResponseV2_extras_states();
    }

    /**
     * Gets the active property value. The active property
     * @return float|null
    */
    public function getActive(): ?float {
        return $this->active;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the draft property value. The draft property
     * @return float|null
    */
    public function getDraft(): ?float {
        return $this->draft;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'active' => fn(ParseNode $n) => $o->setActive($n->getFloatValue()),
            'draft' => fn(ParseNode $n) => $o->setDraft($n->getFloatValue()),
            'paused' => fn(ParseNode $n) => $o->setPaused($n->getFloatValue()),
        ];
    }

    /**
     * Gets the paused property value. The paused property
     * @return float|null
    */
    public function getPaused(): ?float {
        return $this->paused;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeFloatValue('active', $this->getActive());
        $writer->writeFloatValue('draft', $this->getDraft());
        $writer->writeFloatValue('paused', $this->getPaused());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the active property value. The active property
     * @param float|null $value Value to set for the active property.
    */
    public function setActive(?float $value): void {
        $this->active = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the draft property value. The draft property
     * @param float|null $value Value to set for the draft property.
    */
    public function setDraft(?float $value): void {
        $this->draft = $value;
    }

    /**
     * Sets the paused property value. The paused property
     * @param float|null $value Value to set for the paused property.
    */
    public function setPaused(?float $value): void {
        $this->paused = $value;
    }

}
