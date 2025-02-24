<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Distinct filters regulate how many items with the same value of a particular attribute can be returned.
*/
class DistinctFilterSearch implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $attribute Name of the attribute to be used for distinct filter
    */
    private ?string $attribute = null;
    
    /**
     * @var int|null $levelRangeModifier Level of the category, if the category attribute was used for distinct filter
    */
    private ?int $levelRangeModifier = null;
    
    /**
     * @var int|null $maxNumItems Maximum number of items to be returned per each distinct attribute value
    */
    private ?int $maxNumItems = null;
    
    /**
     * Instantiates a new DistinctFilterSearch and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DistinctFilterSearch
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DistinctFilterSearch {
        return new DistinctFilterSearch();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the attribute property value. Name of the attribute to be used for distinct filter
     * @return string|null
    */
    public function getAttribute(): ?string {
        return $this->attribute;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'attribute' => fn(ParseNode $n) => $o->setAttribute($n->getStringValue()),
            'levelRangeModifier' => fn(ParseNode $n) => $o->setLevelRangeModifier($n->getIntegerValue()),
            'maxNumItems' => fn(ParseNode $n) => $o->setMaxNumItems($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the levelRangeModifier property value. Level of the category, if the category attribute was used for distinct filter
     * @return int|null
    */
    public function getLevelRangeModifier(): ?int {
        return $this->levelRangeModifier;
    }

    /**
     * Gets the maxNumItems property value. Maximum number of items to be returned per each distinct attribute value
     * @return int|null
    */
    public function getMaxNumItems(): ?int {
        return $this->maxNumItems;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('attribute', $this->getAttribute());
        $writer->writeIntegerValue('levelRangeModifier', $this->getLevelRangeModifier());
        $writer->writeIntegerValue('maxNumItems', $this->getMaxNumItems());
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
     * Sets the attribute property value. Name of the attribute to be used for distinct filter
     * @param string|null $value Value to set for the attribute property.
    */
    public function setAttribute(?string $value): void {
        $this->attribute = $value;
    }

    /**
     * Sets the levelRangeModifier property value. Level of the category, if the category attribute was used for distinct filter
     * @param int|null $value Value to set for the levelRangeModifier property.
    */
    public function setLevelRangeModifier(?int $value): void {
        $this->levelRangeModifier = $value;
    }

    /**
     * Sets the maxNumItems property value. Maximum number of items to be returned per each distinct attribute value
     * @param int|null $value Value to set for the maxNumItems property.
    */
    public function setMaxNumItems(?int $value): void {
        $this->maxNumItems = $value;
    }

}
