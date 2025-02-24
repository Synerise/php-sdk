<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

/**
 * Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions:  <span style="color:red"><strong>WARNING:</strong></span>  - If you want to send the `email` param, it must be exactly the same as the email of the profile who generated the event.  - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br>  <code>modifiedBy</code><br>  <code>apiKey</code><br>  <code>eventUUID</code><br>  <code>ip</code><br>  <code>time</code><br>  <code>businessProfileId</code>
*/
class ClientCartEventRequest_params implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $categories If an item belongs to more than one category, include the categories in an array
    */
    private ?array $categories = null;
    
    /**
     * @var string|null $category Item category
    */
    private ?string $category = null;
    
    /**
     * @var DiscountedUnitPrice|null $discountedUnitPrice Price after discounts
    */
    private ?DiscountedUnitPrice $discountedUnitPrice = null;
    
    /**
     * @var FinalUnitPrice|null $finalUnitPrice Final price per unit. This value must be multiplied by `quantity` and added to `revenue`.
    */
    private ?FinalUnitPrice $finalUnitPrice = null;
    
    /**
     * @var string|null $itemUrlAddress URL address of the item page
    */
    private ?string $itemUrlAddress = null;
    
    /**
     * @var string|null $name Item name
    */
    private ?string $name = null;
    
    /**
     * @var bool|null $offline Set to `true` if the event occurred outside a website, for example in a cash register
    */
    private ?bool $offline = null;
    
    /**
     * @var string|null $producer Manufacturer of the item
    */
    private ?string $producer = null;
    
    /**
     * @var float|null $quantity The amount of goods
    */
    private ?float $quantity = null;
    
    /**
     * @var RegularUnitPrice|null $regularUnitPrice The regular price of the items
    */
    private ?RegularUnitPrice $regularUnitPrice = null;
    
    /**
     * @var string|null $sku SKU of the item
    */
    private ?string $sku = null;
    
    /**
     * @var EventSource|null $source Source of the event. 
    */
    private ?EventSource $source = null;
    
    /**
     * Instantiates a new ClientCartEventRequest_params and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ClientCartEventRequest_params
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ClientCartEventRequest_params {
        return new ClientCartEventRequest_params();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the categories property value. If an item belongs to more than one category, include the categories in an array
     * @return array<string>|null
    */
    public function getCategories(): ?array {
        return $this->categories;
    }

    /**
     * Gets the category property value. Item category
     * @return string|null
    */
    public function getCategory(): ?string {
        return $this->category;
    }

    /**
     * Gets the discountedUnitPrice property value. Price after discounts
     * @return DiscountedUnitPrice|null
    */
    public function getDiscountedUnitPrice(): ?DiscountedUnitPrice {
        return $this->discountedUnitPrice;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'categories' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setCategories($val);
            },
            'category' => fn(ParseNode $n) => $o->setCategory($n->getStringValue()),
            'discountedUnitPrice' => fn(ParseNode $n) => $o->setDiscountedUnitPrice($n->getObjectValue([DiscountedUnitPrice::class, 'createFromDiscriminatorValue'])),
            'finalUnitPrice' => fn(ParseNode $n) => $o->setFinalUnitPrice($n->getObjectValue([FinalUnitPrice::class, 'createFromDiscriminatorValue'])),
            'ItemUrlAddress' => fn(ParseNode $n) => $o->setItemUrlAddress($n->getStringValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'offline' => fn(ParseNode $n) => $o->setOffline($n->getBooleanValue()),
            'producer' => fn(ParseNode $n) => $o->setProducer($n->getStringValue()),
            'quantity' => fn(ParseNode $n) => $o->setQuantity($n->getFloatValue()),
            'regularUnitPrice' => fn(ParseNode $n) => $o->setRegularUnitPrice($n->getObjectValue([RegularUnitPrice::class, 'createFromDiscriminatorValue'])),
            'sku' => fn(ParseNode $n) => $o->setSku($n->getStringValue()),
            'source' => fn(ParseNode $n) => $o->setSource($n->getEnumValue(EventSource::class)),
        ];
    }

    /**
     * Gets the finalUnitPrice property value. Final price per unit. This value must be multiplied by `quantity` and added to `revenue`.
     * @return FinalUnitPrice|null
    */
    public function getFinalUnitPrice(): ?FinalUnitPrice {
        return $this->finalUnitPrice;
    }

    /**
     * Gets the ItemUrlAddress property value. URL address of the item page
     * @return string|null
    */
    public function getItemUrlAddress(): ?string {
        return $this->itemUrlAddress;
    }

    /**
     * Gets the name property value. Item name
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the offline property value. Set to `true` if the event occurred outside a website, for example in a cash register
     * @return bool|null
    */
    public function getOffline(): ?bool {
        return $this->offline;
    }

    /**
     * Gets the producer property value. Manufacturer of the item
     * @return string|null
    */
    public function getProducer(): ?string {
        return $this->producer;
    }

    /**
     * Gets the quantity property value. The amount of goods
     * @return float|null
    */
    public function getQuantity(): ?float {
        return $this->quantity;
    }

    /**
     * Gets the regularUnitPrice property value. The regular price of the items
     * @return RegularUnitPrice|null
    */
    public function getRegularUnitPrice(): ?RegularUnitPrice {
        return $this->regularUnitPrice;
    }

    /**
     * Gets the sku property value. SKU of the item
     * @return string|null
    */
    public function getSku(): ?string {
        return $this->sku;
    }

    /**
     * Gets the source property value. Source of the event. 
     * @return EventSource|null
    */
    public function getSource(): ?EventSource {
        return $this->source;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('categories', $this->getCategories());
        $writer->writeStringValue('category', $this->getCategory());
        $writer->writeObjectValue('discountedUnitPrice', $this->getDiscountedUnitPrice());
        $writer->writeObjectValue('finalUnitPrice', $this->getFinalUnitPrice());
        $writer->writeStringValue('ItemUrlAddress', $this->getItemUrlAddress());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeBooleanValue('offline', $this->getOffline());
        $writer->writeStringValue('producer', $this->getProducer());
        $writer->writeFloatValue('quantity', $this->getQuantity());
        $writer->writeObjectValue('regularUnitPrice', $this->getRegularUnitPrice());
        $writer->writeStringValue('sku', $this->getSku());
        $writer->writeEnumValue('source', $this->getSource());
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
     * Sets the categories property value. If an item belongs to more than one category, include the categories in an array
     * @param array<string>|null $value Value to set for the categories property.
    */
    public function setCategories(?array $value): void {
        $this->categories = $value;
    }

    /**
     * Sets the category property value. Item category
     * @param string|null $value Value to set for the category property.
    */
    public function setCategory(?string $value): void {
        $this->category = $value;
    }

    /**
     * Sets the discountedUnitPrice property value. Price after discounts
     * @param DiscountedUnitPrice|null $value Value to set for the discountedUnitPrice property.
    */
    public function setDiscountedUnitPrice(?DiscountedUnitPrice $value): void {
        $this->discountedUnitPrice = $value;
    }

    /**
     * Sets the finalUnitPrice property value. Final price per unit. This value must be multiplied by `quantity` and added to `revenue`.
     * @param FinalUnitPrice|null $value Value to set for the finalUnitPrice property.
    */
    public function setFinalUnitPrice(?FinalUnitPrice $value): void {
        $this->finalUnitPrice = $value;
    }

    /**
     * Sets the ItemUrlAddress property value. URL address of the item page
     * @param string|null $value Value to set for the ItemUrlAddress property.
    */
    public function setItemUrlAddress(?string $value): void {
        $this->itemUrlAddress = $value;
    }

    /**
     * Sets the name property value. Item name
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the offline property value. Set to `true` if the event occurred outside a website, for example in a cash register
     * @param bool|null $value Value to set for the offline property.
    */
    public function setOffline(?bool $value): void {
        $this->offline = $value;
    }

    /**
     * Sets the producer property value. Manufacturer of the item
     * @param string|null $value Value to set for the producer property.
    */
    public function setProducer(?string $value): void {
        $this->producer = $value;
    }

    /**
     * Sets the quantity property value. The amount of goods
     * @param float|null $value Value to set for the quantity property.
    */
    public function setQuantity(?float $value): void {
        $this->quantity = $value;
    }

    /**
     * Sets the regularUnitPrice property value. The regular price of the items
     * @param RegularUnitPrice|null $value Value to set for the regularUnitPrice property.
    */
    public function setRegularUnitPrice(?RegularUnitPrice $value): void {
        $this->regularUnitPrice = $value;
    }

    /**
     * Sets the sku property value. SKU of the item
     * @param string|null $value Value to set for the sku property.
    */
    public function setSku(?string $value): void {
        $this->sku = $value;
    }

    /**
     * Sets the source property value. Source of the event. 
     * @param EventSource|null $value Value to set for the source property.
    */
    public function setSource(?EventSource $value): void {
        $this->source = $value;
    }

}
