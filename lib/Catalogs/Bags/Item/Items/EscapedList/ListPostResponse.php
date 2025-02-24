<?php

namespace Synerise\Api\Catalogs\Bags\Item\Items\EscapedList;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\Catalogs\Models\Item;
use Synerise\Api\Catalogs\Models\ResponseMeta;

class ListPostResponse implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<Item>|null $data The data property
    */
    private ?array $data = null;
    
    /**
     * @var ResponseMeta|null $metaData This object holds the metadata of the response.
    */
    private ?ResponseMeta $metaData = null;
    
    /**
     * Instantiates a new ListPostResponse and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ListPostResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ListPostResponse {
        return new ListPostResponse();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the data property value. The data property
     * @return array<Item>|null
    */
    public function getData(): ?array {
        return $this->data;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'data' => fn(ParseNode $n) => $o->setData($n->getCollectionOfObjectValues([Item::class, 'createFromDiscriminatorValue'])),
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
        $writer->writeCollectionOfObjectValues('data', $this->getData());
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
     * Sets the data property value. The data property
     * @param array<Item>|null $value Value to set for the data property.
    */
    public function setData(?array $value): void {
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
