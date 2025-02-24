<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

/**
 * Attributes for which facets are returned in the search response. By default, all facetable attributes are also filterable and sortable.
*/
class FacetableAttributesSchema implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $range Array of range attributes
    */
    private ?array $range = null;
    
    /**
     * @var array<string>|null $text Array of text attributes
    */
    private ?array $text = null;
    
    /**
     * Instantiates a new FacetableAttributesSchema and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return FacetableAttributesSchema
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): FacetableAttributesSchema {
        return new FacetableAttributesSchema();
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
            'range' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setRange($val);
            },
            'text' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setText($val);
            },
        ];
    }

    /**
     * Gets the range property value. Array of range attributes
     * @return array<string>|null
    */
    public function getRange(): ?array {
        return $this->range;
    }

    /**
     * Gets the text property value. Array of text attributes
     * @return array<string>|null
    */
    public function getText(): ?array {
        return $this->text;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('range', $this->getRange());
        $writer->writeCollectionOfPrimitiveValues('text', $this->getText());
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
     * Sets the range property value. Array of range attributes
     * @param array<string>|null $value Value to set for the range property.
    */
    public function setRange(?array $value): void {
        $this->range = $value;
    }

    /**
     * Sets the text property value. Array of text attributes
     * @param array<string>|null $value Value to set for the text property.
    */
    public function setText(?array $value): void {
        $this->text = $value;
    }

}
