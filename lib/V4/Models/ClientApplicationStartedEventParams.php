<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions: <span style="color:red"><strong>WARNING:</strong></span> - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event. - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br> <code>modifiedBy</code><br> <code>apiKey</code><br> <code>eventUUID</code><br> <code>ip</code><br> <code>time</code><br> <code>businessProfileId</code>
*/
class ClientApplicationStartedEventParams implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $applicationName Name of the application which sends the event
    */
    private ?string $applicationName = null;
    
    /**
     * @var string|null $version Version of the application which sends the event
    */
    private ?string $version = null;
    
    /**
     * Instantiates a new ClientApplicationStartedEventParams and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ClientApplicationStartedEventParams
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ClientApplicationStartedEventParams {
        return new ClientApplicationStartedEventParams();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the applicationName property value. Name of the application which sends the event
     * @return string|null
    */
    public function getApplicationName(): ?string {
        return $this->applicationName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'applicationName' => fn(ParseNode $n) => $o->setApplicationName($n->getStringValue()),
            'version' => fn(ParseNode $n) => $o->setVersion($n->getStringValue()),
        ];
    }

    /**
     * Gets the version property value. Version of the application which sends the event
     * @return string|null
    */
    public function getVersion(): ?string {
        return $this->version;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('applicationName', $this->getApplicationName());
        $writer->writeStringValue('version', $this->getVersion());
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
     * Sets the applicationName property value. Name of the application which sends the event
     * @param string|null $value Value to set for the applicationName property.
    */
    public function setApplicationName(?string $value): void {
        $this->applicationName = $value;
    }

    /**
     * Sets the version property value. Version of the application which sends the event
     * @param string|null $value Value to set for the version property.
    */
    public function setVersion(?string $value): void {
        $this->version = $value;
    }

}
