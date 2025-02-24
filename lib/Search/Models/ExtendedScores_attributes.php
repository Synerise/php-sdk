<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ExtendedScores_attributes implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var TokenWithScore|null $high High importance attributes score.
    */
    private ?TokenWithScore $high = null;
    
    /**
     * @var TokenWithScore|null $low Low importance attributes score.
    */
    private ?TokenWithScore $low = null;
    
    /**
     * @var TokenWithScore|null $medium Medium importance attributes score.
    */
    private ?TokenWithScore $medium = null;
    
    /**
     * Instantiates a new ExtendedScores_attributes and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExtendedScores_attributes
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExtendedScores_attributes {
        return new ExtendedScores_attributes();
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
            'high' => fn(ParseNode $n) => $o->setHigh($n->getObjectValue([TokenWithScore::class, 'createFromDiscriminatorValue'])),
            'low' => fn(ParseNode $n) => $o->setLow($n->getObjectValue([TokenWithScore::class, 'createFromDiscriminatorValue'])),
            'medium' => fn(ParseNode $n) => $o->setMedium($n->getObjectValue([TokenWithScore::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the high property value. High importance attributes score.
     * @return TokenWithScore|null
    */
    public function getHigh(): ?TokenWithScore {
        return $this->high;
    }

    /**
     * Gets the low property value. Low importance attributes score.
     * @return TokenWithScore|null
    */
    public function getLow(): ?TokenWithScore {
        return $this->low;
    }

    /**
     * Gets the medium property value. Medium importance attributes score.
     * @return TokenWithScore|null
    */
    public function getMedium(): ?TokenWithScore {
        return $this->medium;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('high', $this->getHigh());
        $writer->writeObjectValue('low', $this->getLow());
        $writer->writeObjectValue('medium', $this->getMedium());
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
     * Sets the high property value. High importance attributes score.
     * @param TokenWithScore|null $value Value to set for the high property.
    */
    public function setHigh(?TokenWithScore $value): void {
        $this->high = $value;
    }

    /**
     * Sets the low property value. Low importance attributes score.
     * @param TokenWithScore|null $value Value to set for the low property.
    */
    public function setLow(?TokenWithScore $value): void {
        $this->low = $value;
    }

    /**
     * Sets the medium property value. Medium importance attributes score.
     * @param TokenWithScore|null $value Value to set for the medium property.
    */
    public function setMedium(?TokenWithScore $value): void {
        $this->medium = $value;
    }

}
