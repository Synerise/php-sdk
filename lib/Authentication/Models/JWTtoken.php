<?php

namespace Synerise\Api\Authentication\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class JWTtoken implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $token [JWT](https://jwt.io/) token
    */
    private ?string $token = null;
    
    /**
     * Instantiates a new JWTtoken and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return JWTtoken
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): JWTtoken {
        return new JWTtoken();
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
            'token' => fn(ParseNode $n) => $o->setToken($n->getStringValue()),
        ];
    }

    /**
     * Gets the token property value. [JWT](https://jwt.io/) token
     * @return string|null
    */
    public function getToken(): ?string {
        return $this->token;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('token', $this->getToken());
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
     * Sets the token property value. [JWT](https://jwt.io/) token
     * @param string|null $value Value to set for the token property.
    */
    public function setToken(?string $value): void {
        $this->token = $value;
    }

    /**
     * Cast object to token string
     * @return string
     */
    public function __toString(): string
    {
        return $this->getToken();
    }

}
