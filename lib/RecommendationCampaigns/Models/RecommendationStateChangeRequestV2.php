<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class RecommendationStateChangeRequestV2 implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $ids An array of campaign IDs.
    */
    private ?array $ids = null;
    
    /**
     * @var State|null $state Campaign status
    */
    private ?State $state = null;
    
    /**
     * Instantiates a new RecommendationStateChangeRequestV2 and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationStateChangeRequestV2
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationStateChangeRequestV2 {
        return new RecommendationStateChangeRequestV2();
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
            'ids' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setIds($val);
            },
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(State::class)),
        ];
    }

    /**
     * Gets the ids property value. An array of campaign IDs.
     * @return array<string>|null
    */
    public function getIds(): ?array {
        return $this->ids;
    }

    /**
     * Gets the state property value. Campaign status
     * @return State|null
    */
    public function getState(): ?State {
        return $this->state;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('ids', $this->getIds());
        $writer->writeEnumValue('state', $this->getState());
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
     * Sets the ids property value. An array of campaign IDs.
     * @param array<string>|null $value Value to set for the ids property.
    */
    public function setIds(?array $value): void {
        $this->ids = $value;
    }

    /**
     * Sets the state property value. Campaign status
     * @param State|null $value Value to set for the state property.
    */
    public function setState(?State $value): void {
        $this->state = $value;
    }

}
