<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class QueryRuleFilters_textFilters implements AdditionalDataHolder, Parsable 
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
     * @var QueryRuleFilters_textFilters_mode|null $mode Information whether to include or exclude filtered results.- `include`: includes filtered results- `exclude`: excludes filtered results
    */
    private ?QueryRuleFilters_textFilters_mode $mode = null;
    
    /**
     * @var array<string>|null $values Values to be used during filtering.
    */
    private ?array $values = null;
    
    /**
     * Instantiates a new QueryRuleFilters_textFilters and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return QueryRuleFilters_textFilters
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): QueryRuleFilters_textFilters {
        return new QueryRuleFilters_textFilters();
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
            'mode' => fn(ParseNode $n) => $o->setMode($n->getEnumValue(QueryRuleFilters_textFilters_mode::class)),
            'values' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setValues($val);
            },
        ];
    }

    /**
     * Gets the mode property value. Information whether to include or exclude filtered results.- `include`: includes filtered results- `exclude`: excludes filtered results
     * @return QueryRuleFilters_textFilters_mode|null
    */
    public function getMode(): ?QueryRuleFilters_textFilters_mode {
        return $this->mode;
    }

    /**
     * Gets the values property value. Values to be used during filtering.
     * @return array<string>|null
    */
    public function getValues(): ?array {
        return $this->values;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('attribute', $this->getAttribute());
        $writer->writeEnumValue('mode', $this->getMode());
        $writer->writeCollectionOfPrimitiveValues('values', $this->getValues());
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
     * Sets the mode property value. Information whether to include or exclude filtered results.- `include`: includes filtered results- `exclude`: excludes filtered results
     * @param QueryRuleFilters_textFilters_mode|null $value Value to set for the mode property.
    */
    public function setMode(?QueryRuleFilters_textFilters_mode $value): void {
        $this->mode = $value;
    }

    /**
     * Sets the values property value. Values to be used during filtering.
     * @param array<string>|null $value Value to set for the values property.
    */
    public function setValues(?array $value): void {
        $this->values = $value;
    }

}
