<?php

namespace Synerise\Api\Uauth\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class BusinessProfileAuthenticationRequest implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $apiKey Workspace API key<span style="color:red"><strong>WARNING:</strong></span> Workspace API keys can be used to access all customer data and manage the workspace. They should only be used for server-to-server communication in integrations. **DO NOT use workspace API keys in your mobile applications or websites**.
    */
    private ?string $apiKey = null;
    
    /**
     * Instantiates a new BusinessProfileAuthenticationRequest and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BusinessProfileAuthenticationRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BusinessProfileAuthenticationRequest {
        return new BusinessProfileAuthenticationRequest();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the apiKey property value. Workspace API key<span style="color:red"><strong>WARNING:</strong></span> Workspace API keys can be used to access all customer data and manage the workspace. They should only be used for server-to-server communication in integrations. **DO NOT use workspace API keys in your mobile applications or websites**.
     * @return string|null
    */
    public function getApiKey(): ?string {
        return $this->apiKey;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'apiKey' => fn(ParseNode $n) => $o->setApiKey($n->getStringValue()),
        ];
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('apiKey', $this->getApiKey());
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
     * Sets the apiKey property value. Workspace API key<span style="color:red"><strong>WARNING:</strong></span> Workspace API keys can be used to access all customer data and manage the workspace. They should only be used for server-to-server communication in integrations. **DO NOT use workspace API keys in your mobile applications or websites**.
     * @param string|null $value Value to set for the apiKey property.
    */
    public function setApiKey(?string $value): void {
        $this->apiKey = $value;
    }

}
