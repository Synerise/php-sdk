<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SuggestionResponse implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<SuggestionResponse_data>|null $data A page of search query suggestions
    */
    private ?array $data = null;
    
    /**
     * @var SuggestionResponse_extras|null $extras Additional information
    */
    private ?SuggestionResponse_extras $extras = null;
    
    /**
     * @var PaginationMeta|null $meta Optional metadata, such as pagination. This is returned if the `includeMeta` parameter was set to true in the request.
    */
    private ?PaginationMeta $meta = null;
    
    /**
     * Instantiates a new SuggestionResponse and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SuggestionResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SuggestionResponse {
        return new SuggestionResponse();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the data property value. A page of search query suggestions
     * @return array<SuggestionResponse_data>|null
    */
    public function getData(): ?array {
        return $this->data;
    }

    /**
     * Gets the extras property value. Additional information
     * @return SuggestionResponse_extras|null
    */
    public function getExtras(): ?SuggestionResponse_extras {
        return $this->extras;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'data' => fn(ParseNode $n) => $o->setData($n->getCollectionOfObjectValues([SuggestionResponse_data::class, 'createFromDiscriminatorValue'])),
            'extras' => fn(ParseNode $n) => $o->setExtras($n->getObjectValue([SuggestionResponse_extras::class, 'createFromDiscriminatorValue'])),
            'meta' => fn(ParseNode $n) => $o->setMeta($n->getObjectValue([PaginationMeta::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the meta property value. Optional metadata, such as pagination. This is returned if the `includeMeta` parameter was set to true in the request.
     * @return PaginationMeta|null
    */
    public function getMeta(): ?PaginationMeta {
        return $this->meta;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('data', $this->getData());
        $writer->writeObjectValue('extras', $this->getExtras());
        $writer->writeObjectValue('meta', $this->getMeta());
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
     * Sets the data property value. A page of search query suggestions
     * @param array<SuggestionResponse_data>|null $value Value to set for the data property.
    */
    public function setData(?array $value): void {
        $this->data = $value;
    }

    /**
     * Sets the extras property value. Additional information
     * @param SuggestionResponse_extras|null $value Value to set for the extras property.
    */
    public function setExtras(?SuggestionResponse_extras $value): void {
        $this->extras = $value;
    }

    /**
     * Sets the meta property value. Optional metadata, such as pagination. This is returned if the `includeMeta` parameter was set to true in the request.
     * @param PaginationMeta|null $value Value to set for the meta property.
    */
    public function setMeta(?PaginationMeta $value): void {
        $this->meta = $value;
    }

}
