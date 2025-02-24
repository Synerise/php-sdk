<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SortedByAttribute implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $attribute Name of the attribute used to sort the items.
    */
    private ?string $attribute = null;
    
    /**
     * @var SortedByAttribute_ordering|null $ordering Applied ordering.
    */
    private ?SortedByAttribute_ordering $ordering = null;
    
    /**
     * @var int|null $ruleId Id of a query rule that set the sort, if applicable.
    */
    private ?int $ruleId = null;
    
    /**
     * Instantiates a new SortedByAttribute and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SortedByAttribute
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SortedByAttribute {
        return new SortedByAttribute();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the attribute property value. Name of the attribute used to sort the items.
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
            'ordering' => fn(ParseNode $n) => $o->setOrdering($n->getEnumValue(SortedByAttribute_ordering::class)),
            'ruleId' => fn(ParseNode $n) => $o->setRuleId($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the ordering property value. Applied ordering.
     * @return SortedByAttribute_ordering|null
    */
    public function getOrdering(): ?SortedByAttribute_ordering {
        return $this->ordering;
    }

    /**
     * Gets the ruleId property value. Id of a query rule that set the sort, if applicable.
     * @return int|null
    */
    public function getRuleId(): ?int {
        return $this->ruleId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('attribute', $this->getAttribute());
        $writer->writeEnumValue('ordering', $this->getOrdering());
        $writer->writeIntegerValue('ruleId', $this->getRuleId());
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
     * Sets the attribute property value. Name of the attribute used to sort the items.
     * @param string|null $value Value to set for the attribute property.
    */
    public function setAttribute(?string $value): void {
        $this->attribute = $value;
    }

    /**
     * Sets the ordering property value. Applied ordering.
     * @param SortedByAttribute_ordering|null $value Value to set for the ordering property.
    */
    public function setOrdering(?SortedByAttribute_ordering $value): void {
        $this->ordering = $value;
    }

    /**
     * Sets the ruleId property value. Id of a query rule that set the sort, if applicable.
     * @param int|null $value Value to set for the ruleId property.
    */
    public function setRuleId(?int $value): void {
        $this->ruleId = $value;
    }

}
