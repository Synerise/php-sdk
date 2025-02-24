<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class QueryRuleFilters_rangeFilters implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $attribute Attribute to be filtered
    */
    private ?string $attribute = null;
    
    /**
     * @var QueryRuleFilters_rangeFilters_operator|null $operator Operator to be used during filtering.- `gt`: greater than- `gte`: greater or equal- `lt`: less than- `lte`: less than or equal- `eq`/`neq`: equal/not equal
    */
    private ?QueryRuleFilters_rangeFilters_operator $operator = null;
    
    /**
     * @var float|null $value Value to use during filtering
    */
    private ?float $value = null;
    
    /**
     * Instantiates a new QueryRuleFilters_rangeFilters and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return QueryRuleFilters_rangeFilters
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): QueryRuleFilters_rangeFilters {
        return new QueryRuleFilters_rangeFilters();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the attribute property value. Attribute to be filtered
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
            'operator' => fn(ParseNode $n) => $o->setOperator($n->getEnumValue(QueryRuleFilters_rangeFilters_operator::class)),
            'value' => fn(ParseNode $n) => $o->setValue($n->getFloatValue()),
        ];
    }

    /**
     * Gets the operator property value. Operator to be used during filtering.- `gt`: greater than- `gte`: greater or equal- `lt`: less than- `lte`: less than or equal- `eq`/`neq`: equal/not equal
     * @return QueryRuleFilters_rangeFilters_operator|null
    */
    public function getOperator(): ?QueryRuleFilters_rangeFilters_operator {
        return $this->operator;
    }

    /**
     * Gets the value property value. Value to use during filtering
     * @return float|null
    */
    public function getValue(): ?float {
        return $this->value;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('attribute', $this->getAttribute());
        $writer->writeEnumValue('operator', $this->getOperator());
        $writer->writeFloatValue('value', $this->getValue());
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
     * Sets the attribute property value. Attribute to be filtered
     * @param string|null $value Value to set for the attribute property.
    */
    public function setAttribute(?string $value): void {
        $this->attribute = $value;
    }

    /**
     * Sets the operator property value. Operator to be used during filtering.- `gt`: greater than- `gte`: greater or equal- `lt`: less than- `lte`: less than or equal- `eq`/`neq`: equal/not equal
     * @param QueryRuleFilters_rangeFilters_operator|null $value Value to set for the operator property.
    */
    public function setOperator(?QueryRuleFilters_rangeFilters_operator $value): void {
        $this->operator = $value;
    }

    /**
     * Sets the value property value. Value to use during filtering
     * @param float|null $value Value to set for the value property.
    */
    public function setValue(?float $value): void {
        $this->value = $value;
    }

}
