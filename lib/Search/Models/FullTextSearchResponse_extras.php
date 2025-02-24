<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Additional information
*/
class FullTextSearchResponse_extras implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $correlationId This ID is used:- for search result pagination- as `correlationId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
    */
    private ?string $correlationId = null;
    
    /**
     * @var ResultFacets|null $customFilteredFacets Facet value mappings
    */
    private ?ResultFacets $customFilteredFacets = null;
    
    /**
     * @var ResultFacets|null $filteredResultFacets Facet value mappings
    */
    private ?ResultFacets $filteredResultFacets = null;
    
    /**
     * @var string|null $searchId **DEPRECATED - use correlationId instead**This ID is used:- for search result pagination- as `searchId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
    */
    private ?string $searchId = null;
    
    /**
     * @var array<FullTextSuggestionSchema>|null $suggestions A list of search suggestions
    */
    private ?array $suggestions = null;
    
    /**
     * @var ResultFacets|null $unfilteredResultFacets Facet value mappings
    */
    private ?ResultFacets $unfilteredResultFacets = null;
    
    /**
     * @var UsedSuggestion|null $usedSuggestion If the query did not return any matches, the AI engine tries to find an alternative similar query and use it for the search instead. If that happens, the `usedSuggestion` object contains information about that alternative query offered by the AI engine and used in the search.
    */
    private ?UsedSuggestion $usedSuggestion = null;
    
    /**
     * Instantiates a new FullTextSearchResponse_extras and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return FullTextSearchResponse_extras
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): FullTextSearchResponse_extras {
        return new FullTextSearchResponse_extras();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the correlationId property value. This ID is used:- for search result pagination- as `correlationId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
     * @return string|null
    */
    public function getCorrelationId(): ?string {
        return $this->correlationId;
    }

    /**
     * Gets the customFilteredFacets property value. Facet value mappings
     * @return ResultFacets|null
    */
    public function getCustomFilteredFacets(): ?ResultFacets {
        return $this->customFilteredFacets;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'customFilteredFacets' => fn(ParseNode $n) => $o->setCustomFilteredFacets($n->getObjectValue([ResultFacets::class, 'createFromDiscriminatorValue'])),
            'filteredResultFacets' => fn(ParseNode $n) => $o->setFilteredResultFacets($n->getObjectValue([ResultFacets::class, 'createFromDiscriminatorValue'])),
            'searchId' => fn(ParseNode $n) => $o->setSearchId($n->getStringValue()),
            'suggestions' => fn(ParseNode $n) => $o->setSuggestions($n->getCollectionOfObjectValues([FullTextSuggestionSchema::class, 'createFromDiscriminatorValue'])),
            'unfilteredResultFacets' => fn(ParseNode $n) => $o->setUnfilteredResultFacets($n->getObjectValue([ResultFacets::class, 'createFromDiscriminatorValue'])),
            'usedSuggestion' => fn(ParseNode $n) => $o->setUsedSuggestion($n->getObjectValue([UsedSuggestion::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the filteredResultFacets property value. Facet value mappings
     * @return ResultFacets|null
    */
    public function getFilteredResultFacets(): ?ResultFacets {
        return $this->filteredResultFacets;
    }

    /**
     * Gets the searchId property value. **DEPRECATED - use correlationId instead**This ID is used:- for search result pagination- as `searchId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
     * @return string|null
    */
    public function getSearchId(): ?string {
        return $this->searchId;
    }

    /**
     * Gets the suggestions property value. A list of search suggestions
     * @return array<FullTextSuggestionSchema>|null
    */
    public function getSuggestions(): ?array {
        return $this->suggestions;
    }

    /**
     * Gets the unfilteredResultFacets property value. Facet value mappings
     * @return ResultFacets|null
    */
    public function getUnfilteredResultFacets(): ?ResultFacets {
        return $this->unfilteredResultFacets;
    }

    /**
     * Gets the usedSuggestion property value. If the query did not return any matches, the AI engine tries to find an alternative similar query and use it for the search instead. If that happens, the `usedSuggestion` object contains information about that alternative query offered by the AI engine and used in the search.
     * @return UsedSuggestion|null
    */
    public function getUsedSuggestion(): ?UsedSuggestion {
        return $this->usedSuggestion;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeObjectValue('customFilteredFacets', $this->getCustomFilteredFacets());
        $writer->writeObjectValue('filteredResultFacets', $this->getFilteredResultFacets());
        $writer->writeStringValue('searchId', $this->getSearchId());
        $writer->writeCollectionOfObjectValues('suggestions', $this->getSuggestions());
        $writer->writeObjectValue('unfilteredResultFacets', $this->getUnfilteredResultFacets());
        $writer->writeObjectValue('usedSuggestion', $this->getUsedSuggestion());
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
     * Sets the correlationId property value. This ID is used:- for search result pagination- as `correlationId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the customFilteredFacets property value. Facet value mappings
     * @param ResultFacets|null $value Value to set for the customFilteredFacets property.
    */
    public function setCustomFilteredFacets(?ResultFacets $value): void {
        $this->customFilteredFacets = $value;
    }

    /**
     * Sets the filteredResultFacets property value. Facet value mappings
     * @param ResultFacets|null $value Value to set for the filteredResultFacets property.
    */
    public function setFilteredResultFacets(?ResultFacets $value): void {
        $this->filteredResultFacets = $value;
    }

    /**
     * Sets the searchId property value. **DEPRECATED - use correlationId instead**This ID is used:- for search result pagination- as `searchId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
     * @param string|null $value Value to set for the searchId property.
    */
    public function setSearchId(?string $value): void {
        $this->searchId = $value;
    }

    /**
     * Sets the suggestions property value. A list of search suggestions
     * @param array<FullTextSuggestionSchema>|null $value Value to set for the suggestions property.
    */
    public function setSuggestions(?array $value): void {
        $this->suggestions = $value;
    }

    /**
     * Sets the unfilteredResultFacets property value. Facet value mappings
     * @param ResultFacets|null $value Value to set for the unfilteredResultFacets property.
    */
    public function setUnfilteredResultFacets(?ResultFacets $value): void {
        $this->unfilteredResultFacets = $value;
    }

    /**
     * Sets the usedSuggestion property value. If the query did not return any matches, the AI engine tries to find an alternative similar query and use it for the search instead. If that happens, the `usedSuggestion` object contains information about that alternative query offered by the AI engine and used in the search.
     * @param UsedSuggestion|null $value Value to set for the usedSuggestion property.
    */
    public function setUsedSuggestion(?UsedSuggestion $value): void {
        $this->usedSuggestion = $value;
    }

}
