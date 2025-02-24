<?php

namespace Synerise\Api\SearchConfig\Search\V2\Indices\Item\Copy;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CopyPostRequestBody implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $copyRules Copy rules if required
    */
    private ?bool $copyRules = null;
    
    /**
     * @var bool|null $copySynonyms Copy synonyms if required
    */
    private ?bool $copySynonyms = null;
    
    /**
     * @var string|null $targetIndexId ID of the index
    */
    private ?string $targetIndexId = null;
    
    /**
     * Instantiates a new CopyPostRequestBody and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CopyPostRequestBody
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CopyPostRequestBody {
        return new CopyPostRequestBody();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the copyRules property value. Copy rules if required
     * @return bool|null
    */
    public function getCopyRules(): ?bool {
        return $this->copyRules;
    }

    /**
     * Gets the copySynonyms property value. Copy synonyms if required
     * @return bool|null
    */
    public function getCopySynonyms(): ?bool {
        return $this->copySynonyms;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'copyRules' => fn(ParseNode $n) => $o->setCopyRules($n->getBooleanValue()),
            'copySynonyms' => fn(ParseNode $n) => $o->setCopySynonyms($n->getBooleanValue()),
            'targetIndexId' => fn(ParseNode $n) => $o->setTargetIndexId($n->getStringValue()),
        ];
    }

    /**
     * Gets the targetIndexId property value. ID of the index
     * @return string|null
    */
    public function getTargetIndexId(): ?string {
        return $this->targetIndexId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('copyRules', $this->getCopyRules());
        $writer->writeBooleanValue('copySynonyms', $this->getCopySynonyms());
        $writer->writeStringValue('targetIndexId', $this->getTargetIndexId());
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
     * Sets the copyRules property value. Copy rules if required
     * @param bool|null $value Value to set for the copyRules property.
    */
    public function setCopyRules(?bool $value): void {
        $this->copyRules = $value;
    }

    /**
     * Sets the copySynonyms property value. Copy synonyms if required
     * @param bool|null $value Value to set for the copySynonyms property.
    */
    public function setCopySynonyms(?bool $value): void {
        $this->copySynonyms = $value;
    }

    /**
     * Sets the targetIndexId property value. ID of the index
     * @param string|null $value Value to set for the targetIndexId property.
    */
    public function setTargetIndexId(?string $value): void {
        $this->targetIndexId = $value;
    }

}
