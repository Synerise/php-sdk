<?php

namespace Synerise\Api\Authentication\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Error implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $code A numeric identifier of the error type
    */
    private ?int $code = null;
    
    /**
     * @var string|null $field Field in the request body that caused the error
    */
    private ?string $field = null;
    
    /**
     * @var string|null $message A detailed description of the problem
    */
    private ?string $message = null;
    
    /**
     * @var string|null $rejectedValue The value that caused the error
    */
    private ?string $rejectedValue = null;
    
    /**
     * Instantiates a new Error and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Error
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Error {
        return new Error();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the code property value. A numeric identifier of the error type
     * @return int|null
    */
    public function getCode(): ?int {
        return $this->code;
    }

    /**
     * Gets the field property value. Field in the request body that caused the error
     * @return string|null
    */
    public function getField(): ?string {
        return $this->field;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'code' => fn(ParseNode $n) => $o->setCode($n->getIntegerValue()),
            'field' => fn(ParseNode $n) => $o->setField($n->getStringValue()),
            'message' => fn(ParseNode $n) => $o->setMessage($n->getStringValue()),
            'rejectedValue' => fn(ParseNode $n) => $o->setRejectedValue($n->getStringValue()),
        ];
    }

    /**
     * Gets the message property value. A detailed description of the problem
     * @return string|null
    */
    public function getMessage(): ?string {
        return $this->message;
    }

    /**
     * Gets the rejectedValue property value. The value that caused the error
     * @return string|null
    */
    public function getRejectedValue(): ?string {
        return $this->rejectedValue;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('code', $this->getCode());
        $writer->writeStringValue('field', $this->getField());
        $writer->writeStringValue('message', $this->getMessage());
        $writer->writeStringValue('rejectedValue', $this->getRejectedValue());
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
     * Sets the code property value. A numeric identifier of the error type
     * @param int|null $value Value to set for the code property.
    */
    public function setCode(?int $value): void {
        $this->code = $value;
    }

    /**
     * Sets the field property value. Field in the request body that caused the error
     * @param string|null $value Value to set for the field property.
    */
    public function setField(?string $value): void {
        $this->field = $value;
    }

    /**
     * Sets the message property value. A detailed description of the problem
     * @param string|null $value Value to set for the message property.
    */
    public function setMessage(?string $value): void {
        $this->message = $value;
    }

    /**
     * Sets the rejectedValue property value. The value that caused the error
     * @param string|null $value Value to set for the rejectedValue property.
    */
    public function setRejectedValue(?string $value): void {
        $this->rejectedValue = $value;
    }

}
