<?php

namespace Synerise\Sdk\Api\RequestBody\Models;

use Synerise\Api\V4\Models\DiscountPrice;
use Synerise\Api\V4\Models\FinalUnitPrice;
use Synerise\Api\V4\Models\NetUnitPrice;
use Synerise\Api\V4\Models\Product;
use Synerise\Api\V4\Models\RegularPrice;
use Synerise\Sdk\Api\Validation\Models\ProductValidator;

class ProductBuilder
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public static function initialize(): self
    {
        return new ProductBuilder();
    }

    public function build(bool $validate = true): Product
    {
        if ($validate) {
            ProductValidator::validate($this->product);
        }

        return $this->product;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $additionalData): self
    {
        $this->product->setAdditionalData($additionalData);
        return $this;
    }

    /**
     * Sets the categories property value. A list of the item's categories
     * @param array<string>|null $value Value to set for the categories property.
    */
    public function setCategories(?array $categories): self
    {
        $this->product->setCategories($categories);
        return $this;
    }

    /**
     * Sets the discountPercent property value. Discount as a percentage
     * @param float|null $value Value to set for the discountPercent property.
    */
    public function setDiscountPercent(?float $discountPercent): self
    {
        $this->product->setDiscountPercent($discountPercent);
        return $this;
    }

    /**
     * Sets the discountPrice property value. Discount as an amount. For example, if the regular price is 500, and the final price is 450, the discount amount is 50.
     * @param DiscountPrice|null $value Value to set for the discountPrice property.
    */
    public function setDiscountPrice(?DiscountPrice $discountPrice): self
    {
        $this->product->setDiscountPrice($discountPrice);
        return $this;
    }

    /**
     * Sets the finalUnitPrice property value. Final price per unit. This value must be multiplied by `quantity` and added to `revenue`.
     * @param FinalUnitPrice|null $value Value to set for the finalUnitPrice property.
    */
    public function setFinalUnitPrice(?FinalUnitPrice $finalUnitPrice): self
    {
        $this->product->setFinalUnitPrice($finalUnitPrice);
        return $this;
    }

    /**
     * Sets the image property value. URL of the item's image
     * @param string|null $value Value to set for the image property.
    */
    public function setImage(?string $image): self
    {
        $this->product->setImage($image);
        return $this;
    }

    /**
     * Sets the name property value. Name of the item
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $name): self
    {
        $this->product->setName($name);
        return $this;
    }

    /**
     * Sets the netUnitPrice property value. Price before taxation (before or after discounts, depending on your implementation and discount type)
     * @param NetUnitPrice|null $value Value to set for the netUnitPrice property.
    */
    public function setNetUnitPrice(?NetUnitPrice $netUnitPrice): self
    {
        $this->product->setNetUnitPrice($netUnitPrice);
        return $this;
    }

    /**
     * Sets the quantity property value. The number or amount of purchased items
     * @param float|null $value Value to set for the quantity property.
    */
    public function setQuantity(?float $quantity): self
    {
        $this->product->setQuantity($quantity);
        return $this;
    }

    /**
     * Sets the regularPrice property value. Regular price of the item after taxation, before discounts
     * @param RegularPrice|null $value Value to set for the regularPrice property.
    */
    public function setRegularPrice(?RegularPrice $regularPrice): self
    {
        $this->product->setRegularPrice($regularPrice);
        return $this;
    }

    /**
     * Sets the sku property value. SKU of the item
     * @param string|null $value Value to set for the sku property.
    */
    public function setSku(?string $sku): self
    {
        $this->product->setSku($sku);
        return $this;
    }

    /**
     * Sets the tax property value. Tax as a percentage
     * @param float|null $value Value to set for the tax property.
    */
    public function setTax(?float $tax): self
    {
        $this->product->setTax($tax);
        return $this;
    }

    /**
     * Sets the url property value. URL of the item's page
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $url): self
    {
        $this->product->setUrl($url);
        return $this;
    }
}
