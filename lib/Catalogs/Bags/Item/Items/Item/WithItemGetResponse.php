<?php

namespace Synerise\Api\Catalogs\Bags\Item\Items\Item;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\Catalogs\Models\Item;
use Synerise\Api\Catalogs\Models\ResponseMeta;

class WithItemGetResponse implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var Item|null $data Details of the item
    */
    private ?Item $data = null;
    
    /**
     * @var ResponseMeta|null $metaData This object holds the metadata of the response.
    */
    private ?ResponseMeta $metaData = null;
    
    /**
     * Instantiates a new WithItemGetResponse and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WithItemGetResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WithItemGetResponse {
        return new WithItemGetResponse();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the data property value. Details of the item
     * @return Item|null
    */
    public function getData(): ?Item {
        return $this->data;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'data' => fn(ParseNode $n) => $o->setData($n->getObjectValue([Item::class, 'createFromDiscriminatorValue'])),
            'metaData' => fn(ParseNode $n) => $o->setMetaData($n->getObjectValue([ResponseMeta::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the metaData property value. This object holds the metadata of the response.
     * @return ResponseMeta|null
    */
    public function getMetaData(): ?ResponseMeta {
        return $this->metaData;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('data', $this->getData());
        $writer->writeObjectValue('metaData', $this->getMetaData());
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
     * Sets the data property value. Details of the item
     * @param Item|null $value Value to set for the data property.
    */
    public function setData(?Item $value): void {
        $this->data = $value;
    }

    /**
     * Sets the metaData property value. This object holds the metadata of the response.
     * @param ResponseMeta|null $value Value to set for the metaData property.
    */
    public function setMetaData(?ResponseMeta $value): void {
        $this->metaData = $value;
    }

}
