<?php

namespace Synerise\Api\SearchConfig\Search\V2\SuggestionIndices\Item\Config;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\SearchConfig\Models\Config;
use Synerise\Api\SearchConfig\Models\SuggestionIndexSourcesSchema;

class ConfigPutRequestBody implements AdditionalDataHolder, Parsable 
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
     * @var array<Config>|null $denylist Suggestions that will be ignored and *not* shown
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
     * @var string|null $indexName Name of the suggestion index
    */
    private ?string $indexName = null;
    
    /**
     * @var SuggestionIndexSourcesSchema|null $sources Sources for the suggestions
    */
    private ?SuggestionIndexSourcesSchema $sources = null;
    
    /**
     * Instantiates a new ConfigPutRequestBody and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ConfigPutRequestBody
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ConfigPutRequestBody {
        return new ConfigPutRequestBody();
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
     * Gets the denylist property value. Suggestions that will be ignored and *not* shown
     * @return array<Config>|null
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
            'denylist' => fn(ParseNode $n) => $o->setDenylist($n->getCollectionOfObjectValues([Config::class, 'createFromDiscriminatorValue'])),
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'enabled' => fn(ParseNode $n) => $o->setEnabled($n->getBooleanValue()),
            'indexName' => fn(ParseNode $n) => $o->setIndexName($n->getStringValue()),
            'sources' => fn(ParseNode $n) => $o->setSources($n->getObjectValue([SuggestionIndexSourcesSchema::class, 'createFromDiscriminatorValue'])),
        ];
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
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('author', $this->getAuthor());
        $writer->writeCollectionOfObjectValues('denylist', $this->getDenylist());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeBooleanValue('enabled', $this->getEnabled());
        $writer->writeStringValue('indexName', $this->getIndexName());
        $writer->writeObjectValue('sources', $this->getSources());
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
     * Sets the denylist property value. Suggestions that will be ignored and *not* shown
     * @param array<Config>|null $value Value to set for the denylist property.
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

}
