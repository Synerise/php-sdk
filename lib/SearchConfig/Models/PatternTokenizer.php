<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * The pattern tokenizer uses a regular expression to either split text into terms whenever it matches a word separator
*/
class PatternTokenizer implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $pattern The pattern property
    */
    private ?string $pattern = null;
    
    /**
     * @var PatternTokenizer_type|null $type The type property
    */
    private ?PatternTokenizer_type $type = null;
    
    /**
     * Instantiates a new PatternTokenizer and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PatternTokenizer
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PatternTokenizer {
        return new PatternTokenizer();
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
            'pattern' => fn(ParseNode $n) => $o->setPattern($n->getStringValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(PatternTokenizer_type::class)),
        ];
    }

    /**
     * Gets the pattern property value. The pattern property
     * @return string|null
    */
    public function getPattern(): ?string {
        return $this->pattern;
    }

    /**
     * Gets the type property value. The type property
     * @return PatternTokenizer_type|null
    */
    public function getType(): ?PatternTokenizer_type {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('pattern', $this->getPattern());
        $writer->writeEnumValue('type', $this->getType());
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
     * Sets the pattern property value. The pattern property
     * @param string|null $value Value to set for the pattern property.
    */
    public function setPattern(?string $value): void {
        $this->pattern = $value;
    }

    /**
     * Sets the type property value. The type property
     * @param PatternTokenizer_type|null $value Value to set for the type property.
    */
    public function setType(?PatternTokenizer_type $value): void {
        $this->type = $value;
    }

}
