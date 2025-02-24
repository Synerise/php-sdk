<?php

namespace Synerise\Api\Catalogs\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Details of the item
*/
class Item implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var Item_bag|null $bag Metadata of the catalog that includes the entry
    */
    private ?Item_bag $bag = null;
    
    /**
     * @var string|null $creationDate Creation date of the entry
    */
    private ?string $creationDate = null;
    
    /**
     * @var string|null $id ID of the entry. This is the `itemId` used in [this endpoint](#operation/getItem).
    */
    private ?string $id = null;
    
    /**
     * @var string|null $itemKey They unique value of the item key (for example, an SKU) that was used to upload this entry. This is the `key` query parameter used in [this endpoint](#operation/getItemByKey).
    */
    private ?string $itemKey = null;
    
    /**
     * @var string|null $lastModified Last modified date of the entry
    */
    private ?string $lastModified = null;
    
    /**
     * @var string|null $value Contents of the entry
    */
    private ?string $value = null;
    
    /**
     * Instantiates a new Item and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Item
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Item {
        return new Item();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the bag property value. Metadata of the catalog that includes the entry
     * @return Item_bag|null
    */
    public function getBag(): ?Item_bag {
        return $this->bag;
    }

    /**
     * Gets the creationDate property value. Creation date of the entry
     * @return string|null
    */
    public function getCreationDate(): ?string {
        return $this->creationDate;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'bag' => fn(ParseNode $n) => $o->setBag($n->getObjectValue([Item_bag::class, 'createFromDiscriminatorValue'])),
            'creationDate' => fn(ParseNode $n) => $o->setCreationDate($n->getStringValue()),
            'id' => fn(ParseNode $n) => $o->setId($n->getStringValue()),
            'itemKey' => fn(ParseNode $n) => $o->setItemKey($n->getStringValue()),
            'lastModified' => fn(ParseNode $n) => $o->setLastModified($n->getStringValue()),
            'value' => fn(ParseNode $n) => $o->setValue($n->getStringValue()),
        ];
    }

    /**
     * Gets the id property value. ID of the entry. This is the `itemId` used in [this endpoint](#operation/getItem).
     * @return string|null
    */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Gets the itemKey property value. They unique value of the item key (for example, an SKU) that was used to upload this entry. This is the `key` query parameter used in [this endpoint](#operation/getItemByKey).
     * @return string|null
    */
    public function getItemKey(): ?string {
        return $this->itemKey;
    }

    /**
     * Gets the lastModified property value. Last modified date of the entry
     * @return string|null
    */
    public function getLastModified(): ?string {
        return $this->lastModified;
    }

    /**
     * Gets the value property value. Contents of the entry
     * @return string|null
    */
    public function getValue(): ?string {
        return $this->value;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('bag', $this->getBag());
        $writer->writeStringValue('creationDate', $this->getCreationDate());
        $writer->writeStringValue('id', $this->getId());
        $writer->writeStringValue('itemKey', $this->getItemKey());
        $writer->writeStringValue('lastModified', $this->getLastModified());
        $writer->writeStringValue('value', $this->getValue());
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
     * Sets the bag property value. Metadata of the catalog that includes the entry
     * @param Item_bag|null $value Value to set for the bag property.
    */
    public function setBag(?Item_bag $value): void {
        $this->bag = $value;
    }

    /**
     * Sets the creationDate property value. Creation date of the entry
     * @param string|null $value Value to set for the creationDate property.
    */
    public function setCreationDate(?string $value): void {
        $this->creationDate = $value;
    }

    /**
     * Sets the id property value. ID of the entry. This is the `itemId` used in [this endpoint](#operation/getItem).
     * @param string|null $value Value to set for the id property.
    */
    public function setId(?string $value): void {
        $this->id = $value;
    }

    /**
     * Sets the itemKey property value. They unique value of the item key (for example, an SKU) that was used to upload this entry. This is the `key` query parameter used in [this endpoint](#operation/getItemByKey).
     * @param string|null $value Value to set for the itemKey property.
    */
    public function setItemKey(?string $value): void {
        $this->itemKey = $value;
    }

    /**
     * Sets the lastModified property value. Last modified date of the entry
     * @param string|null $value Value to set for the lastModified property.
    */
    public function setLastModified(?string $value): void {
        $this->lastModified = $value;
    }

    /**
     * Sets the value property value. Contents of the entry
     * @param string|null $value Value to set for the value property.
    */
    public function setValue(?string $value): void {
        $this->value = $value;
    }

}
