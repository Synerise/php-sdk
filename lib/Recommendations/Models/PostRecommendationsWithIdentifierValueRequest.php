<?php

namespace Synerise\Api\Recommendations\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PostRecommendationsWithIdentifierValueRequest extends BasePostRecommendationsRequest implements Parsable 
{
    /**
     * @var string|null $identifierValue Value of the identifier selected in the path attributes
    */
    private ?string $identifierValue = null;
    
    /**
     * Instantiates a new PostRecommendationsWithIdentifierValueRequest and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PostRecommendationsWithIdentifierValueRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PostRecommendationsWithIdentifierValueRequest {
        return new PostRecommendationsWithIdentifierValueRequest();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'identifierValue' => fn(ParseNode $n) => $o->setIdentifierValue($n->getStringValue()),
        ]);
    }

    /**
     * Gets the identifierValue property value. Value of the identifier selected in the path attributes
     * @return string|null
    */
    public function getIdentifierValue(): ?string {
        return $this->identifierValue;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('identifierValue', $this->getIdentifierValue());
    }

    /**
     * Sets the identifierValue property value. Value of the identifier selected in the path attributes
     * @param string|null $value Value to set for the identifierValue property.
    */
    public function setIdentifierValue(?string $value): void {
        $this->identifierValue = $value;
    }

}
