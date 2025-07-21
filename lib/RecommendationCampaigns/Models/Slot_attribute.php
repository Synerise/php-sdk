<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * The attribute for rows grouping in the section and attribute recommendation campaign.
*/
class Slot_attribute implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $levelRangeModifier Restricts the range of products in recommendations to a particular attribute level.
    */
    private ?int $levelRangeModifier = null;
    
    /**
     * @var string|null $name Name of attribute for rows grouping.
    */
    private ?string $name = null;
    
    /**
     * Instantiates a new Slot_attribute and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Slot_attribute
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Slot_attribute {
        return new Slot_attribute();
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
            'levelRangeModifier' => fn(ParseNode $n) => $o->setLevelRangeModifier($n->getIntegerValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
        ];
    }

    /**
     * Gets the levelRangeModifier property value. Restricts the range of products in recommendations to a particular attribute level.
     * @return int|null
    */
    public function getLevelRangeModifier(): ?int {
        return $this->levelRangeModifier;
    }

    /**
     * Gets the name property value. Name of attribute for rows grouping.
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('levelRangeModifier', $this->getLevelRangeModifier());
        $writer->writeStringValue('name', $this->getName());
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
     * Sets the levelRangeModifier property value. Restricts the range of products in recommendations to a particular attribute level.
     * @param int|null $value Value to set for the levelRangeModifier property.
    */
    public function setLevelRangeModifier(?int $value): void {
        $this->levelRangeModifier = $value;
    }

    /**
     * Sets the name property value. Name of attribute for rows grouping.
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

}
