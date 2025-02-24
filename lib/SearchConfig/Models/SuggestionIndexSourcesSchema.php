<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Sources for the suggestions
*/
class SuggestionIndexSourcesSchema implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<SuggestionIndices>|null $external An array of external queries that can be used as suggestions
    */
    private ?array $external = null;
    
    /**
     * @var array<SuggestionIndices>|null $generate A group of attributes to use for generating suggestions.If the group consists of single facet, all values of the facet are used as suggestions.If the group consists of more than one facet, all combinations of the facets' values are used.**Example 1:**- Given the `["brand"]` group, the generated suggestions are: `["apple", "samsung", "nokia"]`- Given the `["color"]` group, the generated suggestions are: `["red", "blue"]`**Example 2:**Given the `["color", "brand"]` group, the generated suggestions are:<br/>`["red apple", "red samsung", "red nokia", "blue apple", "blue samsung", "blue nokia"]`
    */
    private ?array $generate = null;
    
    /**
     * @var array<SuggestionIndices>|null $indices A list of search indices
    */
    private ?array $indices = null;
    
    /**
     * Instantiates a new SuggestionIndexSourcesSchema and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SuggestionIndexSourcesSchema
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SuggestionIndexSourcesSchema {
        return new SuggestionIndexSourcesSchema();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the external property value. An array of external queries that can be used as suggestions
     * @return array<SuggestionIndices>|null
    */
    public function getExternal(): ?array {
        return $this->external;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'external' => fn(ParseNode $n) => $o->setExternal($n->getCollectionOfObjectValues([SuggestionIndices::class, 'createFromDiscriminatorValue'])),
            'generate' => fn(ParseNode $n) => $o->setGenerate($n->getCollectionOfObjectValues([SuggestionIndices::class, 'createFromDiscriminatorValue'])),
            'indices' => fn(ParseNode $n) => $o->setIndices($n->getCollectionOfObjectValues([SuggestionIndices::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the generate property value. A group of attributes to use for generating suggestions.If the group consists of single facet, all values of the facet are used as suggestions.If the group consists of more than one facet, all combinations of the facets' values are used.**Example 1:**- Given the `["brand"]` group, the generated suggestions are: `["apple", "samsung", "nokia"]`- Given the `["color"]` group, the generated suggestions are: `["red", "blue"]`**Example 2:**Given the `["color", "brand"]` group, the generated suggestions are:<br/>`["red apple", "red samsung", "red nokia", "blue apple", "blue samsung", "blue nokia"]`
     * @return array<SuggestionIndices>|null
    */
    public function getGenerate(): ?array {
        return $this->generate;
    }

    /**
     * Gets the indices property value. A list of search indices
     * @return array<SuggestionIndices>|null
    */
    public function getIndices(): ?array {
        return $this->indices;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('external', $this->getExternal());
        $writer->writeCollectionOfObjectValues('generate', $this->getGenerate());
        $writer->writeCollectionOfObjectValues('indices', $this->getIndices());
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
     * Sets the external property value. An array of external queries that can be used as suggestions
     * @param array<SuggestionIndices>|null $value Value to set for the external property.
    */
    public function setExternal(?array $value): void {
        $this->external = $value;
    }

    /**
     * Sets the generate property value. A group of attributes to use for generating suggestions.If the group consists of single facet, all values of the facet are used as suggestions.If the group consists of more than one facet, all combinations of the facets' values are used.**Example 1:**- Given the `["brand"]` group, the generated suggestions are: `["apple", "samsung", "nokia"]`- Given the `["color"]` group, the generated suggestions are: `["red", "blue"]`**Example 2:**Given the `["color", "brand"]` group, the generated suggestions are:<br/>`["red apple", "red samsung", "red nokia", "blue apple", "blue samsung", "blue nokia"]`
     * @param array<SuggestionIndices>|null $value Value to set for the generate property.
    */
    public function setGenerate(?array $value): void {
        $this->generate = $value;
    }

    /**
     * Sets the indices property value. A list of search indices
     * @param array<SuggestionIndices>|null $value Value to set for the indices property.
    */
    public function setIndices(?array $value): void {
        $this->indices = $value;
    }

}
