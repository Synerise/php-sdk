<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Composed type wrapper for classes ItemSearchClickEventDataCompat, ProductSearchClickEventDataCompat, RecommendationClickEventDataCompat, RecommendationViewEventDataCompat
*/
class AiCompatBatchEventRequest_items implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var ItemSearchClickEventDataCompat|null $itemSearchClickEventDataCompat Composed type representation for type ItemSearchClickEventDataCompat
    */
    private ?ItemSearchClickEventDataCompat $itemSearchClickEventDataCompat = null;
    
    /**
     * @var ProductSearchClickEventDataCompat|null $productSearchClickEventDataCompat Composed type representation for type ProductSearchClickEventDataCompat
    */
    private ?ProductSearchClickEventDataCompat $productSearchClickEventDataCompat = null;
    
    /**
     * @var RecommendationClickEventDataCompat|null $recommendationClickEventDataCompat Composed type representation for type RecommendationClickEventDataCompat
    */
    private ?RecommendationClickEventDataCompat $recommendationClickEventDataCompat = null;
    
    /**
     * @var RecommendationViewEventDataCompat|null $recommendationViewEventDataCompat Composed type representation for type RecommendationViewEventDataCompat
    */
    private ?RecommendationViewEventDataCompat $recommendationViewEventDataCompat = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AiCompatBatchEventRequest_items
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AiCompatBatchEventRequest_items {
        $result = new AiCompatBatchEventRequest_items();
        return $result;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getItemSearchClickEventDataCompat() !== null) {
            return $this->getItemSearchClickEventDataCompat()->getFieldDeserializers();
        } else if ($this->getProductSearchClickEventDataCompat() !== null) {
            return $this->getProductSearchClickEventDataCompat()->getFieldDeserializers();
        } else if ($this->getRecommendationClickEventDataCompat() !== null) {
            return $this->getRecommendationClickEventDataCompat()->getFieldDeserializers();
        } else if ($this->getRecommendationViewEventDataCompat() !== null) {
            return $this->getRecommendationViewEventDataCompat()->getFieldDeserializers();
        }
        return [];
    }

    /**
     * Gets the ItemSearchClickEventDataCompat property value. Composed type representation for type ItemSearchClickEventDataCompat
     * @return ItemSearchClickEventDataCompat|null
    */
    public function getItemSearchClickEventDataCompat(): ?ItemSearchClickEventDataCompat {
        return $this->itemSearchClickEventDataCompat;
    }

    /**
     * Gets the ProductSearchClickEventDataCompat property value. Composed type representation for type ProductSearchClickEventDataCompat
     * @return ProductSearchClickEventDataCompat|null
    */
    public function getProductSearchClickEventDataCompat(): ?ProductSearchClickEventDataCompat {
        return $this->productSearchClickEventDataCompat;
    }

    /**
     * Gets the RecommendationClickEventDataCompat property value. Composed type representation for type RecommendationClickEventDataCompat
     * @return RecommendationClickEventDataCompat|null
    */
    public function getRecommendationClickEventDataCompat(): ?RecommendationClickEventDataCompat {
        return $this->recommendationClickEventDataCompat;
    }

    /**
     * Gets the RecommendationViewEventDataCompat property value. Composed type representation for type RecommendationViewEventDataCompat
     * @return RecommendationViewEventDataCompat|null
    */
    public function getRecommendationViewEventDataCompat(): ?RecommendationViewEventDataCompat {
        return $this->recommendationViewEventDataCompat;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        if ($this->getItemSearchClickEventDataCompat() !== null) {
            $writer->writeObjectValue(null, $this->getItemSearchClickEventDataCompat());
        } else if ($this->getProductSearchClickEventDataCompat() !== null) {
            $writer->writeObjectValue(null, $this->getProductSearchClickEventDataCompat());
        } else if ($this->getRecommendationClickEventDataCompat() !== null) {
            $writer->writeObjectValue(null, $this->getRecommendationClickEventDataCompat());
        } else if ($this->getRecommendationViewEventDataCompat() !== null) {
            $writer->writeObjectValue(null, $this->getRecommendationViewEventDataCompat());
        }
    }

    /**
     * Sets the ItemSearchClickEventDataCompat property value. Composed type representation for type ItemSearchClickEventDataCompat
     * @param ItemSearchClickEventDataCompat|null $value Value to set for the ItemSearchClickEventDataCompat property.
    */
    public function setItemSearchClickEventDataCompat(?ItemSearchClickEventDataCompat $value): void {
        $this->itemSearchClickEventDataCompat = $value;
    }

    /**
     * Sets the ProductSearchClickEventDataCompat property value. Composed type representation for type ProductSearchClickEventDataCompat
     * @param ProductSearchClickEventDataCompat|null $value Value to set for the ProductSearchClickEventDataCompat property.
    */
    public function setProductSearchClickEventDataCompat(?ProductSearchClickEventDataCompat $value): void {
        $this->productSearchClickEventDataCompat = $value;
    }

    /**
     * Sets the RecommendationClickEventDataCompat property value. Composed type representation for type RecommendationClickEventDataCompat
     * @param RecommendationClickEventDataCompat|null $value Value to set for the RecommendationClickEventDataCompat property.
    */
    public function setRecommendationClickEventDataCompat(?RecommendationClickEventDataCompat $value): void {
        $this->recommendationClickEventDataCompat = $value;
    }

    /**
     * Sets the RecommendationViewEventDataCompat property value. Composed type representation for type RecommendationViewEventDataCompat
     * @param RecommendationViewEventDataCompat|null $value Value to set for the RecommendationViewEventDataCompat property.
    */
    public function setRecommendationViewEventDataCompat(?RecommendationViewEventDataCompat $value): void {
        $this->recommendationViewEventDataCompat = $value;
    }

}
