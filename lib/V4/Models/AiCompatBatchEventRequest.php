<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class AiCompatBatchEventRequest implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var AiCompatBatchEventRequest_eventType|null $eventType A request can only include events of the same type.
    */
    private ?AiCompatBatchEventRequest_eventType $eventType = null;
    
    /**
     * @var array<AiCompatBatchEventRequest_items>|null $items An array of events
    */
    private ?array $items = null;
    
    /**
     * Instantiates a new AiCompatBatchEventRequest and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AiCompatBatchEventRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AiCompatBatchEventRequest {
        return new AiCompatBatchEventRequest();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the eventType property value. A request can only include events of the same type.
     * @return AiCompatBatchEventRequest_eventType|null
    */
    public function getEventType(): ?AiCompatBatchEventRequest_eventType {
        return $this->eventType;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'eventType' => fn(ParseNode $n) => $o->setEventType($n->getEnumValue(AiCompatBatchEventRequest_eventType::class)),
            'items' => fn(ParseNode $n) => $o->setItems($n->getCollectionOfObjectValues([AiCompatBatchEventRequest_items::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the items property value. An array of events
     * @return array<AiCompatBatchEventRequest_items>|null
    */
    public function getItems(): ?array {
        return $this->items;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('eventType', $this->getEventType());
        $writer->writeCollectionOfObjectValues('items', $this->getItems());
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
     * Sets the eventType property value. A request can only include events of the same type.
     * @param AiCompatBatchEventRequest_eventType|null $value Value to set for the eventType property.
    */
    public function setEventType(?AiCompatBatchEventRequest_eventType $value): void {
        $this->eventType = $value;
    }

    /**
     * Sets the items property value. An array of events
     * @param array<AiCompatBatchEventRequest_items>|null $value Value to set for the items property.
    */
    public function setItems(?array $value): void {
        $this->items = $value;
    }

}
