<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class Product implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $categories A list of the item's categories
    */
    private ?array $categories = null;
    
    /**
     * @var float|null $discountPercent Discount as a percentage
    */
    private ?float $discountPercent = null;
    
    /**
     * @var Product_discountPrice|null $discountPrice Discount as an amount. For example, if the regular price is 500, and the final price is 450, the discount amount is 50.
    */
    private ?Product_discountPrice $discountPrice = null;
    
    /**
     * @var Product_finalUnitPrice|null $finalUnitPrice Total final price of the item per unit, including tax and discounts
    */
    private ?Product_finalUnitPrice $finalUnitPrice = null;
    
    /**
     * @var string|null $image URL of the item's image
    */
    private ?string $image = null;
    
    /**
     * @var string|null $name Name of the item
    */
    private ?string $name = null;
    
    /**
     * @var Product_netUnitPrice|null $netUnitPrice Price before taxation (before or after discounts, depending on your implementation and discount type)
    */
    private ?Product_netUnitPrice $netUnitPrice = null;
    
    /**
     * @var float|null $quantity The number or amount of purchased items
    */
    private ?float $quantity = null;
    
    /**
     * @var Product_regularPrice|null $regularPrice Regular price of the item after taxation, before discounts
    */
    private ?Product_regularPrice $regularPrice = null;
    
    /**
     * @var string|null $sku SKU of the item
    */
    private ?string $sku = null;
    
    /**
     * @var float|null $tax Tax as a percentage
    */
    private ?float $tax = null;
    
    /**
     * @var string|null $url URL of the item's page
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new Product and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Product
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Product {
        return new Product();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the categories property value. A list of the item's categories
     * @return array<string>|null
    */
    public function getCategories(): ?array {
        return $this->categories;
    }

    /**
     * Gets the discountPercent property value. Discount as a percentage
     * @return float|null
    */
    public function getDiscountPercent(): ?float {
        return $this->discountPercent;
    }

    /**
     * Gets the discountPrice property value. Discount as an amount. For example, if the regular price is 500, and the final price is 450, the discount amount is 50.
     * @return Product_discountPrice|null
    */
    public function getDiscountPrice(): ?Product_discountPrice {
        return $this->discountPrice;
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
            'discountPercent' => fn(ParseNode $n) => $o->setDiscountPercent($n->getFloatValue()),
            'discountPrice' => fn(ParseNode $n) => $o->setDiscountPrice($n->getObjectValue([Product_discountPrice::class, 'createFromDiscriminatorValue'])),
            'finalUnitPrice' => fn(ParseNode $n) => $o->setFinalUnitPrice($n->getObjectValue([Product_finalUnitPrice::class, 'createFromDiscriminatorValue'])),
            'image' => fn(ParseNode $n) => $o->setImage($n->getStringValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'netUnitPrice' => fn(ParseNode $n) => $o->setNetUnitPrice($n->getObjectValue([Product_netUnitPrice::class, 'createFromDiscriminatorValue'])),
            'quantity' => fn(ParseNode $n) => $o->setQuantity($n->getFloatValue()),
            'regularPrice' => fn(ParseNode $n) => $o->setRegularPrice($n->getObjectValue([Product_regularPrice::class, 'createFromDiscriminatorValue'])),
            'sku' => fn(ParseNode $n) => $o->setSku($n->getStringValue()),
            'tax' => fn(ParseNode $n) => $o->setTax($n->getFloatValue()),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
        ];
    }

    /**
     * Gets the finalUnitPrice property value. Total final price of the item per unit, including tax and discounts
     * @return Product_finalUnitPrice|null
    */
    public function getFinalUnitPrice(): ?Product_finalUnitPrice {
        return $this->finalUnitPrice;
    }

    /**
     * Gets the image property value. URL of the item's image
     * @return string|null
    */
    public function getImage(): ?string {
        return $this->image;
    }

    /**
     * Gets the name property value. Name of the item
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the netUnitPrice property value. Price before taxation (before or after discounts, depending on your implementation and discount type)
     * @return Product_netUnitPrice|null
    */
    public function getNetUnitPrice(): ?Product_netUnitPrice {
        return $this->netUnitPrice;
    }

    /**
     * Gets the quantity property value. The number or amount of purchased items
     * @return float|null
    */
    public function getQuantity(): ?float {
        return $this->quantity;
    }

    /**
     * Gets the regularPrice property value. Regular price of the item after taxation, before discounts
     * @return Product_regularPrice|null
    */
    public function getRegularPrice(): ?Product_regularPrice {
        return $this->regularPrice;
    }

    /**
     * Gets the sku property value. SKU of the item
     * @return string|null
    */
    public function getSku(): ?string {
        return $this->sku;
    }

    /**
     * Gets the tax property value. Tax as a percentage
     * @return float|null
    */
    public function getTax(): ?float {
        return $this->tax;
    }

    /**
     * Gets the url property value. URL of the item's page
     * @return string|null
    */
    public function getUrl(): ?string {
        return $this->url;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('categories', $this->getCategories());
        $writer->writeFloatValue('discountPercent', $this->getDiscountPercent());
        $writer->writeObjectValue('discountPrice', $this->getDiscountPrice());
        $writer->writeObjectValue('finalUnitPrice', $this->getFinalUnitPrice());
        $writer->writeStringValue('image', $this->getImage());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeObjectValue('netUnitPrice', $this->getNetUnitPrice());
        $writer->writeFloatValue('quantity', $this->getQuantity());
        $writer->writeObjectValue('regularPrice', $this->getRegularPrice());
        $writer->writeStringValue('sku', $this->getSku());
        $writer->writeFloatValue('tax', $this->getTax());
        $writer->writeStringValue('url', $this->getUrl());
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
     * Sets the categories property value. A list of the item's categories
     * @param array<string>|null $value Value to set for the categories property.
    */
    public function setCategories(?array $value): void {
        $this->categories = $value;
    }

    /**
     * Sets the discountPercent property value. Discount as a percentage
     * @param float|null $value Value to set for the discountPercent property.
    */
    public function setDiscountPercent(?float $value): void {
        $this->discountPercent = $value;
    }

    /**
     * Sets the discountPrice property value. Discount as an amount. For example, if the regular price is 500, and the final price is 450, the discount amount is 50.
     * @param Product_discountPrice|null $value Value to set for the discountPrice property.
    */
    public function setDiscountPrice(?Product_discountPrice $value): void {
        $this->discountPrice = $value;
    }

    /**
     * Sets the finalUnitPrice property value. Total final price of the item per unit, including tax and discounts
     * @param Product_finalUnitPrice|null $value Value to set for the finalUnitPrice property.
    */
    public function setFinalUnitPrice(?Product_finalUnitPrice $value): void {
        $this->finalUnitPrice = $value;
    }

    /**
     * Sets the image property value. URL of the item's image
     * @param string|null $value Value to set for the image property.
    */
    public function setImage(?string $value): void {
        $this->image = $value;
    }

    /**
     * Sets the name property value. Name of the item
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the netUnitPrice property value. Price before taxation (before or after discounts, depending on your implementation and discount type)
     * @param Product_netUnitPrice|null $value Value to set for the netUnitPrice property.
    */
    public function setNetUnitPrice(?Product_netUnitPrice $value): void {
        $this->netUnitPrice = $value;
    }

    /**
     * Sets the quantity property value. The number or amount of purchased items
     * @param float|null $value Value to set for the quantity property.
    */
    public function setQuantity(?float $value): void {
        $this->quantity = $value;
    }

    /**
     * Sets the regularPrice property value. Regular price of the item after taxation, before discounts
     * @param Product_regularPrice|null $value Value to set for the regularPrice property.
    */
    public function setRegularPrice(?Product_regularPrice $value): void {
        $this->regularPrice = $value;
    }

    /**
     * Sets the sku property value. SKU of the item
     * @param string|null $value Value to set for the sku property.
    */
    public function setSku(?string $value): void {
        $this->sku = $value;
    }

    /**
     * Sets the tax property value. Tax as a percentage
     * @param float|null $value Value to set for the tax property.
    */
    public function setTax(?float $value): void {
        $this->tax = $value;
    }

    /**
     * Sets the url property value. URL of the item's page
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
