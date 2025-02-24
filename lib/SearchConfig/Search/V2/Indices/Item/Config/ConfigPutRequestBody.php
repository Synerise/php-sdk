<?php

namespace Synerise\Api\SearchConfig\Search\V2\Indices\Item\Config;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;
use Synerise\Api\SearchConfig\Models\Analyzers;
use Synerise\Api\SearchConfig\Models\DistinctFilterAttributesSchema;
use Synerise\Api\SearchConfig\Models\FacetableAttributesSchema;
use Synerise\Api\SearchConfig\Models\FilterableAttributesSchema;
use Synerise\Api\SearchConfig\Models\RecentSearchesConfig;
use Synerise\Api\SearchConfig\Models\ScoringSchema;
use Synerise\Api\SearchConfig\Models\SearchableAttributesSchema;
use Synerise\Api\SearchConfig\Models\SortableAttributesSchema;
use Synerise\Api\SearchConfig\Models\Suggestions;

class ConfigPutRequestBody implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var Analyzers|null $analyzers Controls analyzer settings.
    */
    private ?Analyzers $analyzers = null;
    
    /**
     * @var array<string>|null $attributesWithoutPrefixSearch Searchable attributes which will not be used in a prefix search
    */
    private ?array $attributesWithoutPrefixSearch = null;
    
    /**
     * @var array<string>|null $attributesWithoutTypoTolerance Searchable attributes for which typo tolerance is off
    */
    private ?array $attributesWithoutTypoTolerance = null;
    
    /**
     * @var string|null $description Description of the index
    */
    private ?string $description = null;
    
    /**
     * @var array<string>|null $displayableAttributes Attributes shown in the search results
    */
    private ?array $displayableAttributes = null;
    
    /**
     * @var DistinctFilterAttributesSchema|null $distinctFilterAttributes Attributes for which distinct can be used
    */
    private ?DistinctFilterAttributesSchema $distinctFilterAttributes = null;
    
    /**
     * @var bool|null $enabled When `true`, the index is enabled and can be queried.
    */
    private ?bool $enabled = null;
    
    /**
     * @var FacetableAttributesSchema|null $facetableAttributes Attributes for which facets are returned in the search response. By default, all facetable attributes are also filterable and sortable.
    */
    private ?FacetableAttributesSchema $facetableAttributes = null;
    
    /**
     * @var FilterableAttributesSchema|null $filterableAttributes Attributes for which filters can be used
    */
    private ?FilterableAttributesSchema $filterableAttributes = null;
    
    /**
     * @var bool|null $ignoreUnavailableItems When `true`, unavailable items are not indexed, which makes the search run faster.
    */
    private ?bool $ignoreUnavailableItems = null;
    
    /**
     * @var string|null $indexName Human-friendly name of the index
    */
    private ?string $indexName = null;
    
    /**
     * @var string|null $itemsCatalogId ID of the item catalog from which the index will be created
    */
    private ?string $itemsCatalogId = null;
    
    /**
     * @var string|null $language Search language as ISO 639-1 code
    */
    private ?string $language = null;
    
    /**
     * @var RecentSearchesConfig|null $recentSearches Recent searches configuration
    */
    private ?RecentSearchesConfig $recentSearches = null;
    
    /**
     * @var ScoringSchema|null $scoring Item scoring settings that affect the presentation order of the results.`0` means the lowest importance of a parameter, `1` is the highest importance.
    */
    private ?ScoringSchema $scoring = null;
    
    /**
     * @var SearchableAttributesSchema|null $searchableAttributes The attributes that are taken into account as full text search terms
    */
    private ?SearchableAttributesSchema $searchableAttributes = null;
    
    /**
     * @var SortableAttributesSchema|null $sortableAttributes Attributes using which search results can be sorted
    */
    private ?SortableAttributesSchema $sortableAttributes = null;
    
    /**
     * @var Suggestions|null $suggestions Controls manner in which suggestions are generated
    */
    private ?Suggestions $suggestions = null;
    
    /**
     * @var Tokenizer|null $tokenizer Used for tokenizing full text into individual words
    */
    private ?Tokenizer $tokenizer = null;
    
    /**
     * @var bool|null $typoToleranceOnNumericValues When `true`, typo tolerance is active on numbers
    */
    private ?bool $typoToleranceOnNumericValues = null;
    
    /**
     * @var array<string>|null $valuesWithoutTypoTolerance Attributes values for which typo tolerance is off
    */
    private ?array $valuesWithoutTypoTolerance = null;
    
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
     * Gets the analyzers property value. Controls analyzer settings.
     * @return Analyzers|null
    */
    public function getAnalyzers(): ?Analyzers {
        return $this->analyzers;
    }

    /**
     * Gets the attributesWithoutPrefixSearch property value. Searchable attributes which will not be used in a prefix search
     * @return array<string>|null
    */
    public function getAttributesWithoutPrefixSearch(): ?array {
        return $this->attributesWithoutPrefixSearch;
    }

    /**
     * Gets the attributesWithoutTypoTolerance property value. Searchable attributes for which typo tolerance is off
     * @return array<string>|null
    */
    public function getAttributesWithoutTypoTolerance(): ?array {
        return $this->attributesWithoutTypoTolerance;
    }

    /**
     * Gets the description property value. Description of the index
     * @return string|null
    */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * Gets the displayableAttributes property value. Attributes shown in the search results
     * @return array<string>|null
    */
    public function getDisplayableAttributes(): ?array {
        return $this->displayableAttributes;
    }

    /**
     * Gets the distinctFilterAttributes property value. Attributes for which distinct can be used
     * @return DistinctFilterAttributesSchema|null
    */
    public function getDistinctFilterAttributes(): ?DistinctFilterAttributesSchema {
        return $this->distinctFilterAttributes;
    }

    /**
     * Gets the enabled property value. When `true`, the index is enabled and can be queried.
     * @return bool|null
    */
    public function getEnabled(): ?bool {
        return $this->enabled;
    }

    /**
     * Gets the facetableAttributes property value. Attributes for which facets are returned in the search response. By default, all facetable attributes are also filterable and sortable.
     * @return FacetableAttributesSchema|null
    */
    public function getFacetableAttributes(): ?FacetableAttributesSchema {
        return $this->facetableAttributes;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'analyzers' => fn(ParseNode $n) => $o->setAnalyzers($n->getObjectValue([Analyzers::class, 'createFromDiscriminatorValue'])),
            'attributesWithoutPrefixSearch' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setAttributesWithoutPrefixSearch($val);
            },
            'attributesWithoutTypoTolerance' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setAttributesWithoutTypoTolerance($val);
            },
            'description' => fn(ParseNode $n) => $o->setDescription($n->getStringValue()),
            'displayableAttributes' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setDisplayableAttributes($val);
            },
            'distinctFilterAttributes' => fn(ParseNode $n) => $o->setDistinctFilterAttributes($n->getObjectValue([DistinctFilterAttributesSchema::class, 'createFromDiscriminatorValue'])),
            'enabled' => fn(ParseNode $n) => $o->setEnabled($n->getBooleanValue()),
            'facetableAttributes' => fn(ParseNode $n) => $o->setFacetableAttributes($n->getObjectValue([FacetableAttributesSchema::class, 'createFromDiscriminatorValue'])),
            'filterableAttributes' => fn(ParseNode $n) => $o->setFilterableAttributes($n->getObjectValue([FilterableAttributesSchema::class, 'createFromDiscriminatorValue'])),
            'ignoreUnavailableItems' => fn(ParseNode $n) => $o->setIgnoreUnavailableItems($n->getBooleanValue()),
            'indexName' => fn(ParseNode $n) => $o->setIndexName($n->getStringValue()),
            'itemsCatalogId' => fn(ParseNode $n) => $o->setItemsCatalogId($n->getStringValue()),
            'language' => fn(ParseNode $n) => $o->setLanguage($n->getStringValue()),
            'recentSearches' => fn(ParseNode $n) => $o->setRecentSearches($n->getObjectValue([RecentSearchesConfig::class, 'createFromDiscriminatorValue'])),
            'scoring' => fn(ParseNode $n) => $o->setScoring($n->getObjectValue([ScoringSchema::class, 'createFromDiscriminatorValue'])),
            'searchableAttributes' => fn(ParseNode $n) => $o->setSearchableAttributes($n->getObjectValue([SearchableAttributesSchema::class, 'createFromDiscriminatorValue'])),
            'sortableAttributes' => fn(ParseNode $n) => $o->setSortableAttributes($n->getObjectValue([SortableAttributesSchema::class, 'createFromDiscriminatorValue'])),
            'suggestions' => fn(ParseNode $n) => $o->setSuggestions($n->getObjectValue([Suggestions::class, 'createFromDiscriminatorValue'])),
            'tokenizer' => fn(ParseNode $n) => $o->setTokenizer($n->getObjectValue([Tokenizer::class, 'createFromDiscriminatorValue'])),
            'typoToleranceOnNumericValues' => fn(ParseNode $n) => $o->setTypoToleranceOnNumericValues($n->getBooleanValue()),
            'valuesWithoutTypoTolerance' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setValuesWithoutTypoTolerance($val);
            },
        ];
    }

    /**
     * Gets the filterableAttributes property value. Attributes for which filters can be used
     * @return FilterableAttributesSchema|null
    */
    public function getFilterableAttributes(): ?FilterableAttributesSchema {
        return $this->filterableAttributes;
    }

    /**
     * Gets the ignoreUnavailableItems property value. When `true`, unavailable items are not indexed, which makes the search run faster.
     * @return bool|null
    */
    public function getIgnoreUnavailableItems(): ?bool {
        return $this->ignoreUnavailableItems;
    }

    /**
     * Gets the indexName property value. Human-friendly name of the index
     * @return string|null
    */
    public function getIndexName(): ?string {
        return $this->indexName;
    }

    /**
     * Gets the itemsCatalogId property value. ID of the item catalog from which the index will be created
     * @return string|null
    */
    public function getItemsCatalogId(): ?string {
        return $this->itemsCatalogId;
    }

    /**
     * Gets the language property value. Search language as ISO 639-1 code
     * @return string|null
    */
    public function getLanguage(): ?string {
        return $this->language;
    }

    /**
     * Gets the recentSearches property value. Recent searches configuration
     * @return RecentSearchesConfig|null
    */
    public function getRecentSearches(): ?RecentSearchesConfig {
        return $this->recentSearches;
    }

    /**
     * Gets the scoring property value. Item scoring settings that affect the presentation order of the results.`0` means the lowest importance of a parameter, `1` is the highest importance.
     * @return ScoringSchema|null
    */
    public function getScoring(): ?ScoringSchema {
        return $this->scoring;
    }

    /**
     * Gets the searchableAttributes property value. The attributes that are taken into account as full text search terms
     * @return SearchableAttributesSchema|null
    */
    public function getSearchableAttributes(): ?SearchableAttributesSchema {
        return $this->searchableAttributes;
    }

    /**
     * Gets the sortableAttributes property value. Attributes using which search results can be sorted
     * @return SortableAttributesSchema|null
    */
    public function getSortableAttributes(): ?SortableAttributesSchema {
        return $this->sortableAttributes;
    }

    /**
     * Gets the suggestions property value. Controls manner in which suggestions are generated
     * @return Suggestions|null
    */
    public function getSuggestions(): ?Suggestions {
        return $this->suggestions;
    }

    /**
     * Gets the tokenizer property value. Used for tokenizing full text into individual words
     * @return Tokenizer|null
    */
    public function getTokenizer(): ?Tokenizer {
        return $this->tokenizer;
    }

    /**
     * Gets the typoToleranceOnNumericValues property value. When `true`, typo tolerance is active on numbers
     * @return bool|null
    */
    public function getTypoToleranceOnNumericValues(): ?bool {
        return $this->typoToleranceOnNumericValues;
    }

    /**
     * Gets the valuesWithoutTypoTolerance property value. Attributes values for which typo tolerance is off
     * @return array<string>|null
    */
    public function getValuesWithoutTypoTolerance(): ?array {
        return $this->valuesWithoutTypoTolerance;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('analyzers', $this->getAnalyzers());
        $writer->writeCollectionOfPrimitiveValues('attributesWithoutPrefixSearch', $this->getAttributesWithoutPrefixSearch());
        $writer->writeCollectionOfPrimitiveValues('attributesWithoutTypoTolerance', $this->getAttributesWithoutTypoTolerance());
        $writer->writeStringValue('description', $this->getDescription());
        $writer->writeCollectionOfPrimitiveValues('displayableAttributes', $this->getDisplayableAttributes());
        $writer->writeObjectValue('distinctFilterAttributes', $this->getDistinctFilterAttributes());
        $writer->writeBooleanValue('enabled', $this->getEnabled());
        $writer->writeObjectValue('facetableAttributes', $this->getFacetableAttributes());
        $writer->writeObjectValue('filterableAttributes', $this->getFilterableAttributes());
        $writer->writeBooleanValue('ignoreUnavailableItems', $this->getIgnoreUnavailableItems());
        $writer->writeStringValue('indexName', $this->getIndexName());
        $writer->writeStringValue('itemsCatalogId', $this->getItemsCatalogId());
        $writer->writeStringValue('language', $this->getLanguage());
        $writer->writeObjectValue('recentSearches', $this->getRecentSearches());
        $writer->writeObjectValue('scoring', $this->getScoring());
        $writer->writeObjectValue('searchableAttributes', $this->getSearchableAttributes());
        $writer->writeObjectValue('sortableAttributes', $this->getSortableAttributes());
        $writer->writeObjectValue('suggestions', $this->getSuggestions());
        $writer->writeObjectValue('tokenizer', $this->getTokenizer());
        $writer->writeBooleanValue('typoToleranceOnNumericValues', $this->getTypoToleranceOnNumericValues());
        $writer->writeCollectionOfPrimitiveValues('valuesWithoutTypoTolerance', $this->getValuesWithoutTypoTolerance());
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
     * Sets the analyzers property value. Controls analyzer settings.
     * @param Analyzers|null $value Value to set for the analyzers property.
    */
    public function setAnalyzers(?Analyzers $value): void {
        $this->analyzers = $value;
    }

    /**
     * Sets the attributesWithoutPrefixSearch property value. Searchable attributes which will not be used in a prefix search
     * @param array<string>|null $value Value to set for the attributesWithoutPrefixSearch property.
    */
    public function setAttributesWithoutPrefixSearch(?array $value): void {
        $this->attributesWithoutPrefixSearch = $value;
    }

    /**
     * Sets the attributesWithoutTypoTolerance property value. Searchable attributes for which typo tolerance is off
     * @param array<string>|null $value Value to set for the attributesWithoutTypoTolerance property.
    */
    public function setAttributesWithoutTypoTolerance(?array $value): void {
        $this->attributesWithoutTypoTolerance = $value;
    }

    /**
     * Sets the description property value. Description of the index
     * @param string|null $value Value to set for the description property.
    */
    public function setDescription(?string $value): void {
        $this->description = $value;
    }

    /**
     * Sets the displayableAttributes property value. Attributes shown in the search results
     * @param array<string>|null $value Value to set for the displayableAttributes property.
    */
    public function setDisplayableAttributes(?array $value): void {
        $this->displayableAttributes = $value;
    }

    /**
     * Sets the distinctFilterAttributes property value. Attributes for which distinct can be used
     * @param DistinctFilterAttributesSchema|null $value Value to set for the distinctFilterAttributes property.
    */
    public function setDistinctFilterAttributes(?DistinctFilterAttributesSchema $value): void {
        $this->distinctFilterAttributes = $value;
    }

    /**
     * Sets the enabled property value. When `true`, the index is enabled and can be queried.
     * @param bool|null $value Value to set for the enabled property.
    */
    public function setEnabled(?bool $value): void {
        $this->enabled = $value;
    }

    /**
     * Sets the facetableAttributes property value. Attributes for which facets are returned in the search response. By default, all facetable attributes are also filterable and sortable.
     * @param FacetableAttributesSchema|null $value Value to set for the facetableAttributes property.
    */
    public function setFacetableAttributes(?FacetableAttributesSchema $value): void {
        $this->facetableAttributes = $value;
    }

    /**
     * Sets the filterableAttributes property value. Attributes for which filters can be used
     * @param FilterableAttributesSchema|null $value Value to set for the filterableAttributes property.
    */
    public function setFilterableAttributes(?FilterableAttributesSchema $value): void {
        $this->filterableAttributes = $value;
    }

    /**
     * Sets the ignoreUnavailableItems property value. When `true`, unavailable items are not indexed, which makes the search run faster.
     * @param bool|null $value Value to set for the ignoreUnavailableItems property.
    */
    public function setIgnoreUnavailableItems(?bool $value): void {
        $this->ignoreUnavailableItems = $value;
    }

    /**
     * Sets the indexName property value. Human-friendly name of the index
     * @param string|null $value Value to set for the indexName property.
    */
    public function setIndexName(?string $value): void {
        $this->indexName = $value;
    }

    /**
     * Sets the itemsCatalogId property value. ID of the item catalog from which the index will be created
     * @param string|null $value Value to set for the itemsCatalogId property.
    */
    public function setItemsCatalogId(?string $value): void {
        $this->itemsCatalogId = $value;
    }

    /**
     * Sets the language property value. Search language as ISO 639-1 code
     * @param string|null $value Value to set for the language property.
    */
    public function setLanguage(?string $value): void {
        $this->language = $value;
    }

    /**
     * Sets the recentSearches property value. Recent searches configuration
     * @param RecentSearchesConfig|null $value Value to set for the recentSearches property.
    */
    public function setRecentSearches(?RecentSearchesConfig $value): void {
        $this->recentSearches = $value;
    }

    /**
     * Sets the scoring property value. Item scoring settings that affect the presentation order of the results.`0` means the lowest importance of a parameter, `1` is the highest importance.
     * @param ScoringSchema|null $value Value to set for the scoring property.
    */
    public function setScoring(?ScoringSchema $value): void {
        $this->scoring = $value;
    }

    /**
     * Sets the searchableAttributes property value. The attributes that are taken into account as full text search terms
     * @param SearchableAttributesSchema|null $value Value to set for the searchableAttributes property.
    */
    public function setSearchableAttributes(?SearchableAttributesSchema $value): void {
        $this->searchableAttributes = $value;
    }

    /**
     * Sets the sortableAttributes property value. Attributes using which search results can be sorted
     * @param SortableAttributesSchema|null $value Value to set for the sortableAttributes property.
    */
    public function setSortableAttributes(?SortableAttributesSchema $value): void {
        $this->sortableAttributes = $value;
    }

    /**
     * Sets the suggestions property value. Controls manner in which suggestions are generated
     * @param Suggestions|null $value Value to set for the suggestions property.
    */
    public function setSuggestions(?Suggestions $value): void {
        $this->suggestions = $value;
    }

    /**
     * Sets the tokenizer property value. Used for tokenizing full text into individual words
     * @param Tokenizer|null $value Value to set for the tokenizer property.
    */
    public function setTokenizer(?Tokenizer $value): void {
        $this->tokenizer = $value;
    }

    /**
     * Sets the typoToleranceOnNumericValues property value. When `true`, typo tolerance is active on numbers
     * @param bool|null $value Value to set for the typoToleranceOnNumericValues property.
    */
    public function setTypoToleranceOnNumericValues(?bool $value): void {
        $this->typoToleranceOnNumericValues = $value;
    }

    /**
     * Sets the valuesWithoutTypoTolerance property value. Attributes values for which typo tolerance is off
     * @param array<string>|null $value Value to set for the valuesWithoutTypoTolerance property.
    */
    public function setValuesWithoutTypoTolerance(?array $value): void {
        $this->valuesWithoutTypoTolerance = $value;
    }

}
