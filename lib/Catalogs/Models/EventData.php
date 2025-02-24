<?php

namespace Synerise\Api\Catalogs\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EventData implements AdditionalDataHolder, Parsable 
{
    /**
     * @var string|null $action The `action` field of the event
    */
    private ?string $action = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $paramKey The parameter in the event that corresponds to the catalog column with the unique identifiers
    */
    private ?string $paramKey = null;
    
    /**
     * Instantiates a new EventData and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EventData
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EventData {
        return new EventData();
    }

    /**
     * Gets the action property value. The `action` field of the event
     * @return string|null
    */
    public function getAction(): ?string {
        return $this->action;
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
            'action' => fn(ParseNode $n) => $o->setAction($n->getStringValue()),
            'paramKey' => fn(ParseNode $n) => $o->setParamKey($n->getStringValue()),
        ];
    }

    /**
     * Gets the paramKey property value. The parameter in the event that corresponds to the catalog column with the unique identifiers
     * @return string|null
    */
    public function getParamKey(): ?string {
        return $this->paramKey;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('action', $this->getAction());
        $writer->writeStringValue('paramKey', $this->getParamKey());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the action property value. The `action` field of the event
     * @param string|null $value Value to set for the action property.
    */
    public function setAction(?string $value): void {
        $this->action = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the paramKey property value. The parameter in the event that corresponds to the catalog column with the unique identifiers
     * @param string|null $value Value to set for the paramKey property.
    */
    public function setParamKey(?string $value): void {
        $this->paramKey = $value;
    }

}
