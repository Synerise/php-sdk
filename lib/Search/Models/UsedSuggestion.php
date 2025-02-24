<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * If the query from the request doesn't return any matches (for example due to a spelling error in the query), the AI engine may suggest a similar query and use it instead. This object is included in the response only if that mechanism was triggered.
*/
class UsedSuggestion implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $highlighted The suggested text query with the HTML emphasis tag added
    */
    private ?string $highlighted = null;
    
    /**
     * @var float|null $score Estimated accuracy of the suggestion. `1.0` means 100%.
    */
    private ?float $score = null;
    
    /**
     * @var string|null $text The suggested text query
    */
    private ?string $text = null;
    
    /**
     * Instantiates a new UsedSuggestion and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UsedSuggestion
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UsedSuggestion {
        return new UsedSuggestion();
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
            'highlighted' => fn(ParseNode $n) => $o->setHighlighted($n->getStringValue()),
            'score' => fn(ParseNode $n) => $o->setScore($n->getFloatValue()),
            'text' => fn(ParseNode $n) => $o->setText($n->getStringValue()),
        ];
    }

    /**
     * Gets the highlighted property value. The suggested text query with the HTML emphasis tag added
     * @return string|null
    */
    public function getHighlighted(): ?string {
        return $this->highlighted;
    }

    /**
     * Gets the score property value. Estimated accuracy of the suggestion. `1.0` means 100%.
     * @return float|null
    */
    public function getScore(): ?float {
        return $this->score;
    }

    /**
     * Gets the text property value. The suggested text query
     * @return string|null
    */
    public function getText(): ?string {
        return $this->text;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('highlighted', $this->getHighlighted());
        $writer->writeFloatValue('score', $this->getScore());
        $writer->writeStringValue('text', $this->getText());
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
     * Sets the highlighted property value. The suggested text query with the HTML emphasis tag added
     * @param string|null $value Value to set for the highlighted property.
    */
    public function setHighlighted(?string $value): void {
        $this->highlighted = $value;
    }

    /**
     * Sets the score property value. Estimated accuracy of the suggestion. `1.0` means 100%.
     * @param float|null $value Value to set for the score property.
    */
    public function setScore(?float $value): void {
        $this->score = $value;
    }

    /**
     * Sets the text property value. The suggested text query
     * @param string|null $value Value to set for the text property.
    */
    public function setText(?string $value): void {
        $this->text = $value;
    }

}
