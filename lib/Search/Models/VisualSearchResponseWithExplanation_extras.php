<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Additional information
*/
class VisualSearchResponseWithExplanation_extras implements AdditionalDataHolder, Parsable 
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
     * @var Explanation|null $explanation Explanation for performed search.
    */
    private ?Explanation $explanation = null;
    
    /**
     * @var ResultFacets|null $filteredResultFacets Facet value mappings
    */
    private ?ResultFacets $filteredResultFacets = null;
    
    /**
     * @var string|null $searchId **DEPRECATED - use correlationId instead**This ID is used:- for search result pagination- as `searchId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
    */
    private ?string $searchId = null;
    
    /**
     * @var ResultFacets|null $unfilteredResultFacets Facet value mappings
    */
    private ?ResultFacets $unfilteredResultFacets = null;
    
    /**
     * Instantiates a new VisualSearchResponseWithExplanation_extras and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return VisualSearchResponseWithExplanation_extras
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): VisualSearchResponseWithExplanation_extras {
        return new VisualSearchResponseWithExplanation_extras();
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
     * Gets the explanation property value. Explanation for performed search.
     * @return Explanation|null
    */
    public function getExplanation(): ?Explanation {
        return $this->explanation;
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
            'explanation' => fn(ParseNode $n) => $o->setExplanation($n->getObjectValue([Explanation::class, 'createFromDiscriminatorValue'])),
            'filteredResultFacets' => fn(ParseNode $n) => $o->setFilteredResultFacets($n->getObjectValue([ResultFacets::class, 'createFromDiscriminatorValue'])),
            'searchId' => fn(ParseNode $n) => $o->setSearchId($n->getStringValue()),
            'unfilteredResultFacets' => fn(ParseNode $n) => $o->setUnfilteredResultFacets($n->getObjectValue([ResultFacets::class, 'createFromDiscriminatorValue'])),
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
     * Gets the unfilteredResultFacets property value. Facet value mappings
     * @return ResultFacets|null
    */
    public function getUnfilteredResultFacets(): ?ResultFacets {
        return $this->unfilteredResultFacets;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeObjectValue('customFilteredFacets', $this->getCustomFilteredFacets());
        $writer->writeObjectValue('explanation', $this->getExplanation());
        $writer->writeObjectValue('filteredResultFacets', $this->getFilteredResultFacets());
        $writer->writeStringValue('searchId', $this->getSearchId());
        $writer->writeObjectValue('unfilteredResultFacets', $this->getUnfilteredResultFacets());
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
     * Sets the explanation property value. Explanation for performed search.
     * @param Explanation|null $value Value to set for the explanation property.
    */
    public function setExplanation(?Explanation $value): void {
        $this->explanation = $value;
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
     * Sets the unfilteredResultFacets property value. Facet value mappings
     * @param ResultFacets|null $value Value to set for the unfilteredResultFacets property.
    */
    public function setUnfilteredResultFacets(?ResultFacets $value): void {
        $this->unfilteredResultFacets = $value;
    }

}
