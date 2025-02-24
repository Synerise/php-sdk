<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class Visual implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<int>|null $_promotedByRules List of applied rules that had an effect in promoting this item. This field exists if and only if the item was promoted.
    */
    private ?array $_promotedByRules = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * Instantiates a new Visual and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Visual
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Visual {
        return new Visual();
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
            '_promotedByRules' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'int');
                }
                /** @var array<int>|null $val */
                $this->setPromotedByRules($val);
            },
        ];
    }

    /**
     * Gets the _promotedByRules property value. List of applied rules that had an effect in promoting this item. This field exists if and only if the item was promoted.
     * @return array<int>|null
    */
    public function getPromotedByRules(): ?array {
        return $this->_promotedByRules;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('_promotedByRules', $this->getPromotedByRules());
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
     * Sets the _promotedByRules property value. List of applied rules that had an effect in promoting this item. This field exists if and only if the item was promoted.
     * @param array<int>|null $value Value to set for the _promotedByRules property.
    */
    public function setPromotedByRules(?array $value): void {
        $this->_promotedByRules = $value;
    }

}
