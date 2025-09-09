<?php

namespace Synerise\Api\Recommendations\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Source of the Item ID or item IDs for the recommendation context.This overrides the `itemsSource` settings of the campaign definition.This parameter can be passed in all recommendations. In recommendations which don't use the context item as part of the recommendation model, the context item can only be used to create filters.The item ID source (aggregate or expression) should return a string or an array of strings. If it returns numerical values, the recommendations engine attempts to convert them into strings while processing the request.Alternatively, you can pass the `itemId` parameter to define context items directly. Only one of these options is allowed at the same time.
*/
class BasePostRecommendationsRequest_itemsSource implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $id ID of the items' source (aggregate or expression)
    */
    private ?string $id = null;
    
    /**
     * @var RecommendationRequestItemsSourceType|null $type Type of the items' source.
    */
    private ?RecommendationRequestItemsSourceType $type = null;
    
    /**
     * Instantiates a new BasePostRecommendationsRequest_itemsSource and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BasePostRecommendationsRequest_itemsSource
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BasePostRecommendationsRequest_itemsSource {
        return new BasePostRecommendationsRequest_itemsSource();
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
            'id' => fn(ParseNode $n) => $o->setId($n->getStringValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(RecommendationRequestItemsSourceType::class)),
        ];
    }

    /**
     * Gets the id property value. ID of the items' source (aggregate or expression)
     * @return string|null
    */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Gets the type property value. Type of the items' source.
     * @return RecommendationRequestItemsSourceType|null
    */
    public function getType(): ?RecommendationRequestItemsSourceType {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('id', $this->getId());
        $writer->writeEnumValue('type', $this->getType());
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
     * Sets the id property value. ID of the items' source (aggregate or expression)
     * @param string|null $value Value to set for the id property.
    */
    public function setId(?string $value): void {
        $this->id = $value;
    }

    /**
     * Sets the type property value. Type of the items' source.
     * @param RecommendationRequestItemsSourceType|null $value Value to set for the type property.
    */
    public function setType(?RecommendationRequestItemsSourceType $value): void {
        $this->type = $value;
    }

}
