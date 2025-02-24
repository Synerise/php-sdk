<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SuggestionIndices implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $daysInterval Suggestions will be created from search statistics from last `daysInterval` days
    */
    private ?int $daysInterval = null;
    
    /**
     * @var string|null $indexId ID of the index
    */
    private ?string $indexId = null;
    
    /**
     * @var int|null $minHits Minimum search hits of a query to be used as a suggestion
    */
    private ?int $minHits = null;
    
    /**
     * @var int|null $minLetters Minimum required number of letters for a suggestion to remain
    */
    private ?int $minLetters = null;
    
    /**
     * @var int|null $minPopularity Minimum popularity of a query to be used as a suggestion
    */
    private ?int $minPopularity = null;
    
    /**
     * @var bool|null $validate When `true`, the suggestions presence in searchable attributes is verified
    */
    private ?bool $validate = null;
    
    /**
     * Instantiates a new SuggestionIndices and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SuggestionIndices
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SuggestionIndices {
        return new SuggestionIndices();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the daysInterval property value. Suggestions will be created from search statistics from last `daysInterval` days
     * @return int|null
    */
    public function getDaysInterval(): ?int {
        return $this->daysInterval;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'daysInterval' => fn(ParseNode $n) => $o->setDaysInterval($n->getIntegerValue()),
            'indexId' => fn(ParseNode $n) => $o->setIndexId($n->getStringValue()),
            'minHits' => fn(ParseNode $n) => $o->setMinHits($n->getIntegerValue()),
            'minLetters' => fn(ParseNode $n) => $o->setMinLetters($n->getIntegerValue()),
            'minPopularity' => fn(ParseNode $n) => $o->setMinPopularity($n->getIntegerValue()),
            'validate' => fn(ParseNode $n) => $o->setValidate($n->getBooleanValue()),
        ];
    }

    /**
     * Gets the indexId property value. ID of the index
     * @return string|null
    */
    public function getIndexId(): ?string {
        return $this->indexId;
    }

    /**
     * Gets the minHits property value. Minimum search hits of a query to be used as a suggestion
     * @return int|null
    */
    public function getMinHits(): ?int {
        return $this->minHits;
    }

    /**
     * Gets the minLetters property value. Minimum required number of letters for a suggestion to remain
     * @return int|null
    */
    public function getMinLetters(): ?int {
        return $this->minLetters;
    }

    /**
     * Gets the minPopularity property value. Minimum popularity of a query to be used as a suggestion
     * @return int|null
    */
    public function getMinPopularity(): ?int {
        return $this->minPopularity;
    }

    /**
     * Gets the validate property value. When `true`, the suggestions presence in searchable attributes is verified
     * @return bool|null
    */
    public function getValidate(): ?bool {
        return $this->validate;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('daysInterval', $this->getDaysInterval());
        $writer->writeStringValue('indexId', $this->getIndexId());
        $writer->writeIntegerValue('minHits', $this->getMinHits());
        $writer->writeIntegerValue('minLetters', $this->getMinLetters());
        $writer->writeIntegerValue('minPopularity', $this->getMinPopularity());
        $writer->writeBooleanValue('validate', $this->getValidate());
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
     * Sets the daysInterval property value. Suggestions will be created from search statistics from last `daysInterval` days
     * @param int|null $value Value to set for the daysInterval property.
    */
    public function setDaysInterval(?int $value): void {
        $this->daysInterval = $value;
    }

    /**
     * Sets the indexId property value. ID of the index
     * @param string|null $value Value to set for the indexId property.
    */
    public function setIndexId(?string $value): void {
        $this->indexId = $value;
    }

    /**
     * Sets the minHits property value. Minimum search hits of a query to be used as a suggestion
     * @param int|null $value Value to set for the minHits property.
    */
    public function setMinHits(?int $value): void {
        $this->minHits = $value;
    }

    /**
     * Sets the minLetters property value. Minimum required number of letters for a suggestion to remain
     * @param int|null $value Value to set for the minLetters property.
    */
    public function setMinLetters(?int $value): void {
        $this->minLetters = $value;
    }

    /**
     * Sets the minPopularity property value. Minimum popularity of a query to be used as a suggestion
     * @param int|null $value Value to set for the minPopularity property.
    */
    public function setMinPopularity(?int $value): void {
        $this->minPopularity = $value;
    }

    /**
     * Sets the validate property value. When `true`, the suggestions presence in searchable attributes is verified
     * @param bool|null $value Value to set for the validate property.
    */
    public function setValidate(?bool $value): void {
        $this->validate = $value;
    }

}
