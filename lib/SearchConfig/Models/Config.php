<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class Config implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var Config_matchingType|null $matchingType <span style="color:red"><strong>IMPORTANT</strong></span>: All patterns are case-**in**sensitive, including regex.- Using Phrase matching, the suggestion must match the whole pattern exactly.- Using FullWord matching, any word of the suggestion must exactly match the pattern.- Using PartialWord matching, any word of the suggestion must partially match the pattern.- Using RegularExpression matching, the pattern is treated as a regular expression and must match the suggestion.
    */
    private ?Config_matchingType $matchingType = null;
    
    /**
     * @var string|null $pattern Pattern (text) to be used while denylisting suggestions. If the suggestion matches the pattern in a way defined by `matchingType`, it's not shown.
    */
    private ?string $pattern = null;
    
    /**
     * Instantiates a new Config and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Config
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Config {
        return new Config();
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
            'matchingType' => fn(ParseNode $n) => $o->setMatchingType($n->getEnumValue(Config_matchingType::class)),
            'pattern' => fn(ParseNode $n) => $o->setPattern($n->getStringValue()),
        ];
    }

    /**
     * Gets the matchingType property value. <span style="color:red"><strong>IMPORTANT</strong></span>: All patterns are case-**in**sensitive, including regex.- Using Phrase matching, the suggestion must match the whole pattern exactly.- Using FullWord matching, any word of the suggestion must exactly match the pattern.- Using PartialWord matching, any word of the suggestion must partially match the pattern.- Using RegularExpression matching, the pattern is treated as a regular expression and must match the suggestion.
     * @return Config_matchingType|null
    */
    public function getMatchingType(): ?Config_matchingType {
        return $this->matchingType;
    }

    /**
     * Gets the pattern property value. Pattern (text) to be used while denylisting suggestions. If the suggestion matches the pattern in a way defined by `matchingType`, it's not shown.
     * @return string|null
    */
    public function getPattern(): ?string {
        return $this->pattern;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('matchingType', $this->getMatchingType());
        $writer->writeStringValue('pattern', $this->getPattern());
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
     * Sets the matchingType property value. <span style="color:red"><strong>IMPORTANT</strong></span>: All patterns are case-**in**sensitive, including regex.- Using Phrase matching, the suggestion must match the whole pattern exactly.- Using FullWord matching, any word of the suggestion must exactly match the pattern.- Using PartialWord matching, any word of the suggestion must partially match the pattern.- Using RegularExpression matching, the pattern is treated as a regular expression and must match the suggestion.
     * @param Config_matchingType|null $value Value to set for the matchingType property.
    */
    public function setMatchingType(?Config_matchingType $value): void {
        $this->matchingType = $value;
    }

    /**
     * Sets the pattern property value. Pattern (text) to be used while denylisting suggestions. If the suggestion matches the pattern in a way defined by `matchingType`, it's not shown.
     * @param string|null $value Value to set for the pattern property.
    */
    public function setPattern(?string $value): void {
        $this->pattern = $value;
    }

}
