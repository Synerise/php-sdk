<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * The source of item ID or IDs for the recommendation context. This parameter can be passed in all recommendations. In recommendations which don't use item context as part of the recommendation model, the context item can be used only to create filters.The item ID source (aggregate or expression) should return a string or an array of strings. If it returns numerical values, the recommendations engine attempts to convert them into strings while processing the request.Alternatively, you can pass the `itemId` or `itemsSource` parameter when making a request to generate a recommendation from this campaign. The parameter overrides the settings defined here.
*/
class ItemsSource implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $id ID of the items' source for the recommendation context. If the source's type is 'aggregate', this is the aggregate's ID. If the source's type is 'expression', this is the expression's ID.
    */
    private ?string $id = null;
    
    /**
     * @var ItemsSource_type|null $type Type of the source of item ID or IDs for the recommendation context. If the items' source type is 'aggregate', the aggregate result will be used as context items. If the items' source type is 'expression', the expression result will be used as context items.
    */
    private ?ItemsSource_type $type = null;
    
    /**
     * Instantiates a new ItemsSource and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ItemsSource
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ItemsSource {
        return new ItemsSource();
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
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(ItemsSource_type::class)),
        ];
    }

    /**
     * Gets the id property value. ID of the items' source for the recommendation context. If the source's type is 'aggregate', this is the aggregate's ID. If the source's type is 'expression', this is the expression's ID.
     * @return string|null
    */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Gets the type property value. Type of the source of item ID or IDs for the recommendation context. If the items' source type is 'aggregate', the aggregate result will be used as context items. If the items' source type is 'expression', the expression result will be used as context items.
     * @return ItemsSource_type|null
    */
    public function getType(): ?ItemsSource_type {
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
     * Sets the id property value. ID of the items' source for the recommendation context. If the source's type is 'aggregate', this is the aggregate's ID. If the source's type is 'expression', this is the expression's ID.
     * @param string|null $value Value to set for the id property.
    */
    public function setId(?string $value): void {
        $this->id = $value;
    }

    /**
     * Sets the type property value. Type of the source of item ID or IDs for the recommendation context. If the items' source type is 'aggregate', the aggregate result will be used as context items. If the items' source type is 'expression', the expression result will be used as context items.
     * @param ItemsSource_type|null $value Value to set for the type property.
    */
    public function setType(?ItemsSource_type $value): void {
        $this->type = $value;
    }

}
