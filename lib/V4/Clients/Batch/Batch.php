<?php

namespace Synerise\Api\V4\Clients\Batch;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\V4\Models\CreateClientRequestBody;

class Batch extends CreateClientRequestBody implements Parsable 
{
    /**
     * @var int|null $clientId This ID can be used only for updating an existing profile.If a profile does not exist and `clientId` is the only provided identifier, the operation returns HTTP 202 and **a profile is not created**. If another identifier is provided, a profile is created with that identifier and a `clientId` generated by the system.
    */
    private ?int $clientId = null;
    
    /**
     * Instantiates a new Batch and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Batch
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Batch {
        return new Batch();
    }

    /**
     * Gets the clientId property value. This ID can be used only for updating an existing profile.If a profile does not exist and `clientId` is the only provided identifier, the operation returns HTTP 202 and **a profile is not created**. If another identifier is provided, a profile is created with that identifier and a `clientId` generated by the system.
     * @return int|null
    */
    public function getClientId(): ?int {
        return $this->clientId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'clientId' => fn(ParseNode $n) => $o->setClientId($n->getIntegerValue()),
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('clientId', $this->getClientId());
    }

    /**
     * Sets the clientId property value. This ID can be used only for updating an existing profile.If a profile does not exist and `clientId` is the only provided identifier, the operation returns HTTP 202 and **a profile is not created**. If another identifier is provided, a profile is created with that identifier and a `clientId` generated by the system.
     * @param int|null $value Value to set for the clientId property.
    */
    public function setClientId(?int $value): void {
        $this->clientId = $value;
    }

}
