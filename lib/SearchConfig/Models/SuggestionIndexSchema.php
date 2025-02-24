<?php

namespace Synerise\Api\SearchConfig\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SuggestionIndexSchema implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $author ID of the user who created the suggestion index
    */
    private ?int $author = null;
    
    /**
     * @var DateTime|null $createdAt Creation time in YYYY-MM-DDThh:mm:ssZ format (ISO 8601, UTC)
    */
    private ?DateTime $createdAt = null;
    
    /**
     * @var array<SuggestionIndices>|null $denylist Suggestions that will be ignored and *not* shown
    */
    private ?array $denylist = null;
    
    /**
     * @var string|null $description Description of the suggestion index
    */
    private ?string $description = null;
    
    /**
     * @var bool|null $enabled When `true`, index is enabled and can be queried.
    */
    private ?bool $enabled = null;
    
    /**
     * @var string|null $indexId ID of the index
    */
    private ?string $indexId = null;
    
    /**
     * @var string|null $indexName Name of the suggestion index
    */
    private ?string $indexName = null;
    
    /**
     * @var SuggestionIndexSourcesSchema|null $sources Sources for the suggestions
    */
    private ?SuggestionIndexSourcesSchema $sources = null;
    
    /**
     * @var DateTime|null $updatedAt Last update time in YYYY-MM-DDThh:mm:ssZ format (ISO 8601, UTC)
    */
    private ?DateTime $updatedAt = null;
    
    /**
     * Instantiates a new SuggestionIndexSchema and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SuggestionIndexSchema
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SuggestionIndexSchema {
        return new SuggestionIndexSchema();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the author property value. ID of the user who created the suggestion index
     * @return int|null
    */
    public function getAuthor(): ?int {
        return $this->author;
    }

    /**
     * Gets the createdAt property value. Creation time in YYYY-MM-DDThh:mm:ssZ format (ISO 8601, UTC)
     * @return DateTime|null
    */
    public function getCreatedAt(): ?DateTime {
        return $this->createdAt;
    }

    /**
     * Gets the denylist property value. Suggestions that will be ignored and *not* shown
     * @return array<SuggestionIndices>|null
    */
    public function getDenylist(): ?array {
        return $this->denylist;
    }

    /**
     * Gets the description property value. Description of the suggestion index
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the enabled property value. When `true`, index is enabled and can be queried.
     * @return bool|null
    */
    public function getEnabled(): ?bool {
        return $this->enabled;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'author' => fn(ParseNode $n) => $o->setAuthor($n->getIntegerValue()),
            'createdAt' => fn(ParseNode $n) => $o->setCreatedAt($n->getDateTimeValue()),
            'denylist' => fn(ParseNode $n) => $o->setDenylist($n->getCollectionOfObjectValues([SuggestionIndices::class, 'createFromDiscriminatorValue'])),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'enabled' => fn(ParseNode $n) => $o->setEnabled($n->getBooleanValue()),
            'indexId' => fn(ParseNode $n) => $o->setIndexId($n->getStringValue()),
            'indexName' => fn(ParseNode $n) => $o->setIndexName($n->getStringValue()),
            'sources' => fn(ParseNode $n) => $o->setSources($n->getObjectValue([SuggestionIndexSourcesSchema::class, 'createFromDiscriminatorValue'])),
            'updatedAt' => fn(ParseNode $n) => $o->setUpdatedAt($n->getDateTimeValue()),
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
     * Gets the indexName property value. Name of the suggestion index
     * @return string|null
    */
    public function getIndexName(): ?string {
        return $this->indexName;
    }

    /**
     * Gets the sources property value. Sources for the suggestions
     * @return SuggestionIndexSourcesSchema|null
    */
    public function getSources(): ?SuggestionIndexSourcesSchema {
        return $this->sources;
    }

    /**
     * Gets the updatedAt property value. Last update time in YYYY-MM-DDThh:mm:ssZ format (ISO 8601, UTC)
     * @return DateTime|null
    */
    public function getUpdatedAt(): ?DateTime {
        return $this->updatedAt;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('author', $this->getAuthor());
        $writer->writeDateTimeValue('createdAt', $this->getCreatedAt());
        $writer->writeCollectionOfObjectValues('denylist', $this->getDenylist());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeBooleanValue('enabled', $this->getEnabled());
        $writer->writeStringValue('indexId', $this->getIndexId());
        $writer->writeStringValue('indexName', $this->getIndexName());
        $writer->writeObjectValue('sources', $this->getSources());
        $writer->writeDateTimeValue('updatedAt', $this->getUpdatedAt());
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
     * Sets the author property value. ID of the user who created the suggestion index
     * @param int|null $value Value to set for the author property.
    */
    public function setAuthor(?int $value): void {
        $this->author = $value;
    }

    /**
     * Sets the createdAt property value. Creation time in YYYY-MM-DDThh:mm:ssZ format (ISO 8601, UTC)
     * @param DateTime|null $value Value to set for the createdAt property.
    */
    public function setCreatedAt(?DateTime $value): void {
        $this->createdAt = $value;
    }

    /**
     * Sets the denylist property value. Suggestions that will be ignored and *not* shown
     * @param array<SuggestionIndices>|null $value Value to set for the denylist property.
    */
    public function setDenylist(?array $value): void {
        $this->denylist = $value;
    }

    /**
     * Sets the description property value. Description of the suggestion index
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the enabled property value. When `true`, index is enabled and can be queried.
     * @param bool|null $value Value to set for the enabled property.
    */
    public function setEnabled(?bool $value): void {
        $this->enabled = $value;
    }

    /**
     * Sets the indexId property value. ID of the index
     * @param string|null $value Value to set for the indexId property.
    */
    public function setIndexId(?string $value): void {
        $this->indexId = $value;
    }

    /**
     * Sets the indexName property value. Name of the suggestion index
     * @param string|null $value Value to set for the indexName property.
    */
    public function setIndexName(?string $value): void {
        $this->indexName = $value;
    }

    /**
     * Sets the sources property value. Sources for the suggestions
     * @param SuggestionIndexSourcesSchema|null $value Value to set for the sources property.
    */
    public function setSources(?SuggestionIndexSourcesSchema $value): void {
        $this->sources = $value;
    }

    /**
     * Sets the updatedAt property value. Last update time in YYYY-MM-DDThh:mm:ssZ format (ISO 8601, UTC)
     * @param DateTime|null $value Value to set for the updatedAt property.
    */
    public function setUpdatedAt(?DateTime $value): void {
        $this->updatedAt = $value;
    }

}
