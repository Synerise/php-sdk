<?php

namespace Synerise\Api\Catalogs\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AddItem implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $itemKey The value of the unique key of the item.**IMPORTANT:** This value is not visible in the Synerise Portal. If you want it to be visible in the Catalogs UI, you must add it again as a parameter in the `value` object. If you do this and then download the catalog as CSV, the key will be included twice: in the `item_key` column (used by the backend to store unique keys) and in another column, as a regular parameter.
    */
    private ?string $itemKey = null;
    
    /**
     * @var AddItem_value|null $value Properties of the item. Can be an empty object.
    */
    private ?AddItem_value $value = null;
    
    /**
     * Instantiates a new AddItem and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AddItem
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AddItem {
        return new AddItem();
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
            'itemKey' => fn(ParseNode $n) => $o->setItemKey($n->getStringValue()),
            'value' => fn(ParseNode $n) => $o->setValue($n->getObjectValue([AddItem_value::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the itemKey property value. The value of the unique key of the item.**IMPORTANT:** This value is not visible in the Synerise Portal. If you want it to be visible in the Catalogs UI, you must add it again as a parameter in the `value` object. If you do this and then download the catalog as CSV, the key will be included twice: in the `item_key` column (used by the backend to store unique keys) and in another column, as a regular parameter.
     * @return string|null
    */
    public function getItemKey(): ?string {
        return $this->itemKey;
    }

    /**
     * Gets the value property value. Properties of the item. Can be an empty object.
     * @return AddItem_value|null
    */
    public function getValue(): ?AddItem_value {
        return $this->value;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('itemKey', $this->getItemKey());
        $writer->writeObjectValue('value', $this->getValue());
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
     * Sets the itemKey property value. The value of the unique key of the item.**IMPORTANT:** This value is not visible in the Synerise Portal. If you want it to be visible in the Catalogs UI, you must add it again as a parameter in the `value` object. If you do this and then download the catalog as CSV, the key will be included twice: in the `item_key` column (used by the backend to store unique keys) and in another column, as a regular parameter.
     * @param string|null $value Value to set for the itemKey property.
    */
    public function setItemKey(?string $value): void {
        $this->itemKey = $value;
    }

    /**
     * Sets the value property value. Properties of the item. Can be an empty object.
     * @param AddItem_value|null $value Value to set for the value property.
    */
    public function setValue(?AddItem_value $value): void {
        $this->value = $value;
    }

}
