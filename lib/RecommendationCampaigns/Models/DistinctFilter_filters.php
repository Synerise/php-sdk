<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DistinctFilter_filters implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $field Attribute name
    */
    private ?string $field = null;
    
    /**
     * @var float|null $levelRangeModifier Parameter used (for the `category` field) to specify how many categories to cut off from the end
    */
    private ?float $levelRangeModifier = null;
    
    /**
     * @var float|null $maxNumItems Max number of items with the same value of the attribute
    */
    private ?float $maxNumItems = null;
    
    /**
     * Instantiates a new DistinctFilter_filters and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DistinctFilter_filters
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DistinctFilter_filters {
        return new DistinctFilter_filters();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the field property value. Attribute name
     * @return string|null
    */
    public function getField(): ?string {
        return $this->field;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'field' => fn(ParseNode $n) => $o->setField($n->getStringValue()),
            'levelRangeModifier' => fn(ParseNode $n) => $o->setLevelRangeModifier($n->getFloatValue()),
            'maxNumItems' => fn(ParseNode $n) => $o->setMaxNumItems($n->getFloatValue()),
        ];
    }

    /**
     * Gets the levelRangeModifier property value. Parameter used (for the `category` field) to specify how many categories to cut off from the end
     * @return float|null
    */
    public function getLevelRangeModifier(): ?float {
        return $this->levelRangeModifier;
    }

    /**
     * Gets the maxNumItems property value. Max number of items with the same value of the attribute
     * @return float|null
    */
    public function getMaxNumItems(): ?float {
        return $this->maxNumItems;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('field', $this->getField());
        $writer->writeFloatValue('levelRangeModifier', $this->getLevelRangeModifier());
        $writer->writeFloatValue('maxNumItems', $this->getMaxNumItems());
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
     * Sets the field property value. Attribute name
     * @param string|null $value Value to set for the field property.
    */
    public function setField(?string $value): void {
        $this->field = $value;
    }

    /**
     * Sets the levelRangeModifier property value. Parameter used (for the `category` field) to specify how many categories to cut off from the end
     * @param float|null $value Value to set for the levelRangeModifier property.
    */
    public function setLevelRangeModifier(?float $value): void {
        $this->levelRangeModifier = $value;
    }

    /**
     * Sets the maxNumItems property value. Max number of items with the same value of the attribute
     * @param float|null $value Value to set for the maxNumItems property.
    */
    public function setMaxNumItems(?float $value): void {
        $this->maxNumItems = $value;
    }

}
