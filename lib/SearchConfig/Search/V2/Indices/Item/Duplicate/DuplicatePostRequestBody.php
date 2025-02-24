<?php

namespace Synerise\Api\SearchConfig\Search\V2\Indices\Item\Duplicate;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DuplicatePostRequestBody implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $duplicateRules Duplicate rules if required
    */
    private ?bool $duplicateRules = null;
    
    /**
     * @var bool|null $duplicateSynonyms Duplicate synonyms if required
    */
    private ?bool $duplicateSynonyms = null;
    
    /**
     * Instantiates a new DuplicatePostRequestBody and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DuplicatePostRequestBody
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DuplicatePostRequestBody {
        return new DuplicatePostRequestBody();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the duplicateRules property value. Duplicate rules if required
     * @return bool|null
    */
    public function getDuplicateRules(): ?bool {
        return $this->duplicateRules;
    }

    /**
     * Gets the duplicateSynonyms property value. Duplicate synonyms if required
     * @return bool|null
    */
    public function getDuplicateSynonyms(): ?bool {
        return $this->duplicateSynonyms;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'duplicateRules' => fn(ParseNode $n) => $o->setDuplicateRules($n->getBooleanValue()),
            'duplicateSynonyms' => fn(ParseNode $n) => $o->setDuplicateSynonyms($n->getBooleanValue()),
        ];
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('duplicateRules', $this->getDuplicateRules());
        $writer->writeBooleanValue('duplicateSynonyms', $this->getDuplicateSynonyms());
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
     * Sets the duplicateRules property value. Duplicate rules if required
     * @param bool|null $value Value to set for the duplicateRules property.
    */
    public function setDuplicateRules(?bool $value): void {
        $this->duplicateRules = $value;
    }

    /**
     * Sets the duplicateSynonyms property value. Duplicate synonyms if required
     * @param bool|null $value Value to set for the duplicateSynonyms property.
    */
    public function setDuplicateSynonyms(?bool $value): void {
        $this->duplicateSynonyms = $value;
    }

}
