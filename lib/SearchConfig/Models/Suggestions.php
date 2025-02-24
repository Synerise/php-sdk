<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Controls manner in which suggestions are generated
*/
class Suggestions implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $gramSize Describes max size of the n-grams in the field
    */
    private ?int $gramSize = null;
    
    /**
     * @var int|null $maxErrors Maximum number of errors for terms to be considered as misspelling in order to for a correction
    */
    private ?int $maxErrors = null;
    
    /**
     * @var int|null $minWordLength The minimum length a suggest text term must have in order to be included
    */
    private ?int $minWordLength = null;
    
    /**
     * @var Suggestions_smoothingModel|null $smoothingModel Controls balance weight between infrequent grams and frequent grams
    */
    private ?Suggestions_smoothingModel $smoothingModel = null;
    
    /**
     * @var bool|null $useAlways Controls is suggestions are used only if no documents match, or always
    */
    private ?bool $useAlways = null;
    
    /**
     * Instantiates a new Suggestions and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Suggestions
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Suggestions {
        return new Suggestions();
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
            'gramSize' => fn(ParseNode $n) => $o->setGramSize($n->getIntegerValue()),
            'maxErrors' => fn(ParseNode $n) => $o->setMaxErrors($n->getIntegerValue()),
            'minWordLength' => fn(ParseNode $n) => $o->setMinWordLength($n->getIntegerValue()),
            'smoothingModel' => fn(ParseNode $n) => $o->setSmoothingModel($n->getEnumValue(Suggestions_smoothingModel::class)),
            'useAlways' => fn(ParseNode $n) => $o->setUseAlways($n->getBooleanValue()),
        ];
    }

    /**
     * Gets the gramSize property value. Describes max size of the n-grams in the field
     * @return int|null
    */
    public function getGramSize(): ?int {
        return $this->gramSize;
    }

    /**
     * Gets the maxErrors property value. Maximum number of errors for terms to be considered as misspelling in order to for a correction
     * @return int|null
    */
    public function getMaxErrors(): ?int {
        return $this->maxErrors;
    }

    /**
     * Gets the minWordLength property value. The minimum length a suggest text term must have in order to be included
     * @return int|null
    */
    public function getMinWordLength(): ?int {
        return $this->minWordLength;
    }

    /**
     * Gets the smoothingModel property value. Controls balance weight between infrequent grams and frequent grams
     * @return Suggestions_smoothingModel|null
    */
    public function getSmoothingModel(): ?Suggestions_smoothingModel {
        return $this->smoothingModel;
    }

    /**
     * Gets the useAlways property value. Controls is suggestions are used only if no documents match, or always
     * @return bool|null
    */
    public function getUseAlways(): ?bool {
        return $this->useAlways;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('gramSize', $this->getGramSize());
        $writer->writeIntegerValue('maxErrors', $this->getMaxErrors());
        $writer->writeIntegerValue('minWordLength', $this->getMinWordLength());
        $writer->writeEnumValue('smoothingModel', $this->getSmoothingModel());
        $writer->writeBooleanValue('useAlways', $this->getUseAlways());
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
     * Sets the gramSize property value. Describes max size of the n-grams in the field
     * @param int|null $value Value to set for the gramSize property.
    */
    public function setGramSize(?int $value): void {
        $this->gramSize = $value;
    }

    /**
     * Sets the maxErrors property value. Maximum number of errors for terms to be considered as misspelling in order to for a correction
     * @param int|null $value Value to set for the maxErrors property.
    */
    public function setMaxErrors(?int $value): void {
        $this->maxErrors = $value;
    }

    /**
     * Sets the minWordLength property value. The minimum length a suggest text term must have in order to be included
     * @param int|null $value Value to set for the minWordLength property.
    */
    public function setMinWordLength(?int $value): void {
        $this->minWordLength = $value;
    }

    /**
     * Sets the smoothingModel property value. Controls balance weight between infrequent grams and frequent grams
     * @param Suggestions_smoothingModel|null $value Value to set for the smoothingModel property.
    */
    public function setSmoothingModel(?Suggestions_smoothingModel $value): void {
        $this->smoothingModel = $value;
    }

    /**
     * Sets the useAlways property value. Controls is suggestions are used only if no documents match, or always
     * @param bool|null $value Value to set for the useAlways property.
    */
    public function setUseAlways(?bool $value): void {
        $this->useAlways = $value;
    }

}
