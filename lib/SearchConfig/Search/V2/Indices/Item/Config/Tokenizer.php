<?php

namespace Synerise\Api\SearchConfig\Search\V2\Indices\Item\Config;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\SearchConfig\Models\PatternTokenizer;
use Synerise\Api\SearchConfig\Models\StandardTokenizer;
use Synerise\Api\SearchConfig\Models\WhitespaceTokenizer;

/**
 * Composed type wrapper for classes PatternTokenizer, StandardTokenizer, WhitespaceTokenizer
*/
class Tokenizer implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var PatternTokenizer|null $patternTokenizer Composed type representation for type PatternTokenizer
    */
    private ?PatternTokenizer $patternTokenizer = null;
    
    /**
     * @var StandardTokenizer|null $standardTokenizer Composed type representation for type StandardTokenizer
    */
    private ?StandardTokenizer $standardTokenizer = null;
    
    /**
     * @var WhitespaceTokenizer|null $whitespaceTokenizer Composed type representation for type WhitespaceTokenizer
    */
    private ?WhitespaceTokenizer $whitespaceTokenizer = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Tokenizer
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Tokenizer {
        $result = new Tokenizer();
        return $result;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getPatternTokenizer() !== null) {
            return $this->getPatternTokenizer()->getFieldDeserializers();
        } else if ($this->getStandardTokenizer() !== null) {
            return $this->getStandardTokenizer()->getFieldDeserializers();
        } else if ($this->getWhitespaceTokenizer() !== null) {
            return $this->getWhitespaceTokenizer()->getFieldDeserializers();
        }
        return [];
    }

    /**
     * Gets the PatternTokenizer property value. Composed type representation for type PatternTokenizer
     * @return PatternTokenizer|null
    */
    public function getPatternTokenizer(): ?PatternTokenizer {
        return $this->patternTokenizer;
    }

    /**
     * Gets the StandardTokenizer property value. Composed type representation for type StandardTokenizer
     * @return StandardTokenizer|null
    */
    public function getStandardTokenizer(): ?StandardTokenizer {
        return $this->standardTokenizer;
    }

    /**
     * Gets the WhitespaceTokenizer property value. Composed type representation for type WhitespaceTokenizer
     * @return WhitespaceTokenizer|null
    */
    public function getWhitespaceTokenizer(): ?WhitespaceTokenizer {
        return $this->whitespaceTokenizer;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        if ($this->getPatternTokenizer() !== null) {
            $writer->writeObjectValue(null, $this->getPatternTokenizer());
        } else if ($this->getStandardTokenizer() !== null) {
            $writer->writeObjectValue(null, $this->getStandardTokenizer());
        } else if ($this->getWhitespaceTokenizer() !== null) {
            $writer->writeObjectValue(null, $this->getWhitespaceTokenizer());
        }
    }

    /**
     * Sets the PatternTokenizer property value. Composed type representation for type PatternTokenizer
     * @param PatternTokenizer|null $value Value to set for the PatternTokenizer property.
    */
    public function setPatternTokenizer(?PatternTokenizer $value): void {
        $this->patternTokenizer = $value;
    }

    /**
     * Sets the StandardTokenizer property value. Composed type representation for type StandardTokenizer
     * @param StandardTokenizer|null $value Value to set for the StandardTokenizer property.
    */
    public function setStandardTokenizer(?StandardTokenizer $value): void {
        $this->standardTokenizer = $value;
    }

    /**
     * Sets the WhitespaceTokenizer property value. Composed type representation for type WhitespaceTokenizer
     * @param WhitespaceTokenizer|null $value Value to set for the WhitespaceTokenizer property.
    */
    public function setWhitespaceTokenizer(?WhitespaceTokenizer $value): void {
        $this->whitespaceTokenizer = $value;
    }

}
