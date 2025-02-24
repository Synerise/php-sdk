<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Autocomplete;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;
use Synerise\Api\Search\Models\CustomFilteredFacets;
use Synerise\Api\Search\Models\DistinctFilterSearch;
use Synerise\Api\Search\Models\IncludeFacets;
use Synerise\Api\Search\Models\PaginationOrdering;
use Synerise\Api\Search\Models\SortByMetric;

class AutocompletePostRequestBody implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $caseSensitiveFacetValues Specifies whether facets aggregation should be case sensitive.
    */
    private ?bool $caseSensitiveFacetValues = null;
    
    /**
     * @var string|null $clientUUID UUID of the profile for which the search is performed
    */
    private ?string $clientUUID = null;
    
    /**
     * @var array<string>|null $context List of context strings for a search query
    */
    private ?array $context = null;
    
    /**
     * @var CustomFilteredFacets|null $customFilteredFacets A key-value map that takes attributes as keys and IQL query strings as values.For each key a facet is returned that includes only the items filtered by the provided IQL query string.
    */
    private ?CustomFilteredFacets $customFilteredFacets = null;
    
    /**
     * @var array<string>|null $displayAttributes List of ad hoc attributes that will be returned for each found item
    */
    private ?array $displayAttributes = null;
    
    /**
     * @var DistinctFilterSearch|null $distinctFilter Distinct filters regulate how many items with the same value of a particular attribute can be returned.
    */
    private ?DistinctFilterSearch $distinctFilter = null;
    
    /**
     * @var array<int>|null $excludeQueryRules List of query rules that will not be applied.
    */
    private ?array $excludeQueryRules = null;
    
    /**
     * @var array<string>|null $facets A list of attributes for which facets will be returned. A single `*` value matches all facetable attributes.To determine which groups of facets should be returned, use the `includeFacets` parameter.
    */
    private ?array $facets = null;
    
    /**
     * @var int|null $facetsSize Determines how many items will be used for facets aggregation.
    */
    private ?int $facetsSize = null;
    
    /**
     * @var int|null $filterAroundRadius Radius in meters to be used when filtering using geo-location. Can only be used when filtering by a single geo-point.
    */
    private ?int $filterAroundRadius = null;
    
    /**
     * @var array<string>|null $filterGeoPoints The definition of a geographical area to filter by.Given one geo-point, the results will be limited to a radius around a point. To override the default radius (1000 meters), provide the `filterAroundRadius` parameter.**Example input:** `["34.052235,-118.243685"]`Given two geo-points, the results will be limited to a rectangular area. The first point defines the upper-left corner of the rectangle and the second is the lower-right corner.**Example input:** `["50,-100", "25,150"]`Given three or more geo-points, the results will be limited to a polygonal area.**Example input:** `["50,0", "40,20", "-20,10"]`
    */
    private ?array $filterGeoPoints = null;
    
    /**
     * @var string|null $filters IQL query string. For details, see the [Help Center](https://help.synerise.com/developers/iql/).
    */
    private ?string $filters = null;
    
    /**
     * @var bool|null $ignoreQueryRules If set to `true`, query rules are not applied.
    */
    private ?bool $ignoreQueryRules = null;
    
    /**
     * @var IncludeFacets|null $includeFacets Determines which groups of facets will be returned: both filtered and unfiltered; just filtered; just unfiltered; or no group at at all.To determine which attributes should be returned as facets in each group, use the `facets` parameter.
    */
    private ?IncludeFacets $includeFacets = null;
    
    /**
     * @var bool|null $includeMeta When `true`, pagination metadata is included in the response body.When `false`, the data is included in the response headers:- Link: links to neighbors, first, and last pages in pagination.- X-Pagination-Total-Count: total number of items on all pages- X-Pagination-Total-Pages: total number of pages- X-Pagination-Page: current page- X-Pagination-Limit: maximum number of items on a page- X-Pagination-Sorted-By: parameter that the items were sorted by- X-Pagination-Ordering: sorting direction
    */
    private ?bool $includeMeta = null;
    
    /**
     * @var int|null $limit The number of items to return per page
    */
    private ?int $limit = null;
    
    /**
     * @var int|null $maxValuesPerFacet Determines how many values will be retrieved per facet.
    */
    private ?int $maxValuesPerFacet = null;
    
    /**
     * @var PaginationOrdering|null $ordering Sorting order
    */
    private ?PaginationOrdering $ordering = null;
    
    /**
     * @var int|null $page Page number to return for pagination. The first page has the index `1`.
    */
    private ?int $page = null;
    
    /**
     * @var string|null $query Query text to use in the search
    */
    private ?string $query = null;
    
    /**
     * @var string|null $sortBy Name of the attribute by which the data will be sorted.Sorting by attribute may cause a promoted item to be in a different position that defined in a query rule.
    */
    private ?string $sortBy = null;
    
    /**
     * @var string|null $sortByGeoPoints Geo-point (`{latitude},{longitude}`) for data sorting. Results are sorted by distance from this point. `ordering: asc` means "closest first".
    */
    private ?string $sortByGeoPoints = null;
    
    /**
     * @var SortByMetric|null $sortByMetric Name of the metric by which the data will be sorted
    */
    private ?SortByMetric $sortByMetric = null;
    
    /**
     * Instantiates a new AutocompletePostRequestBody and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
        $this->setIncludeFacets(new IncludeFacets('filtered'));
        $this->setOrdering(new PaginationOrdering('asc'));
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AutocompletePostRequestBody
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AutocompletePostRequestBody {
        return new AutocompletePostRequestBody();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the caseSensitiveFacetValues property value. Specifies whether facets aggregation should be case sensitive.
     * @return bool|null
    */
    public function getCaseSensitiveFacetValues(): ?bool {
        return $this->caseSensitiveFacetValues;
    }

    /**
     * Gets the clientUUID property value. UUID of the profile for which the search is performed
     * @return string|null
    */
    public function getClientUUID(): ?string {
        return $this->clientUUID;
    }

    /**
     * Gets the context property value. List of context strings for a search query
     * @return array<string>|null
    */
    public function getContext(): ?array {
        return $this->context;
    }

    /**
     * Gets the customFilteredFacets property value. A key-value map that takes attributes as keys and IQL query strings as values.For each key a facet is returned that includes only the items filtered by the provided IQL query string.
     * @return CustomFilteredFacets|null
    */
    public function getCustomFilteredFacets(): ?CustomFilteredFacets {
        return $this->customFilteredFacets;
    }

    /**
     * Gets the displayAttributes property value. List of ad hoc attributes that will be returned for each found item
     * @return array<string>|null
    */
    public function getDisplayAttributes(): ?array {
        return $this->displayAttributes;
    }

    /**
     * Gets the distinctFilter property value. Distinct filters regulate how many items with the same value of a particular attribute can be returned.
     * @return DistinctFilterSearch|null
    */
    public function getDistinctFilter(): ?DistinctFilterSearch {
        return $this->distinctFilter;
    }

    /**
     * Gets the excludeQueryRules property value. List of query rules that will not be applied.
     * @return array<int>|null
    */
    public function getExcludeQueryRules(): ?array {
        return $this->excludeQueryRules;
    }

    /**
     * Gets the facets property value. A list of attributes for which facets will be returned. A single `*` value matches all facetable attributes.To determine which groups of facets should be returned, use the `includeFacets` parameter.
     * @return array<string>|null
    */
    public function getFacets(): ?array {
        return $this->facets;
    }

    /**
     * Gets the facetsSize property value. Determines how many items will be used for facets aggregation.
     * @return int|null
    */
    public function getFacetsSize(): ?int {
        return $this->facetsSize;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'caseSensitiveFacetValues' => fn(ParseNode $n) => $o->setCaseSensitiveFacetValues($n->getBooleanValue()),
            'clientUUID' => fn(ParseNode $n) => $o->setClientUUID($n->getStringValue()),
            'context' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setContext($val);
            },
            'customFilteredFacets' => fn(ParseNode $n) => $o->setCustomFilteredFacets($n->getObjectValue([CustomFilteredFacets::class, 'createFromDiscriminatorValue'])),
            'displayAttributes' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setDisplayAttributes($val);
            },
            'distinctFilter' => fn(ParseNode $n) => $o->setDistinctFilter($n->getObjectValue([DistinctFilterSearch::class, 'createFromDiscriminatorValue'])),
            'excludeQueryRules' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'int');
                }
                /** @var array<int>|null $val */
                $this->setExcludeQueryRules($val);
            },
            'facets' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setFacets($val);
            },
            'facetsSize' => fn(ParseNode $n) => $o->setFacetsSize($n->getIntegerValue()),
            'filterAroundRadius' => fn(ParseNode $n) => $o->setFilterAroundRadius($n->getIntegerValue()),
            'filterGeoPoints' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setFilterGeoPoints($val);
            },
            'filters' => fn(ParseNode $n) => $o->setFilters($n->getStringValue()),
            'ignoreQueryRules' => fn(ParseNode $n) => $o->setIgnoreQueryRules($n->getBooleanValue()),
            'includeFacets' => fn(ParseNode $n) => $o->setIncludeFacets($n->getEnumValue(IncludeFacets::class)),
            'includeMeta' => fn(ParseNode $n) => $o->setIncludeMeta($n->getBooleanValue()),
            'limit' => fn(ParseNode $n) => $o->setLimit($n->getIntegerValue()),
            'maxValuesPerFacet' => fn(ParseNode $n) => $o->setMaxValuesPerFacet($n->getIntegerValue()),
            'ordering' => fn(ParseNode $n) => $o->setOrdering($n->getEnumValue(PaginationOrdering::class)),
            'page' => fn(ParseNode $n) => $o->setPage($n->getIntegerValue()),
            'query' => fn(ParseNode $n) => $o->setQuery($n->getStringValue()),
            'sortBy' => fn(ParseNode $n) => $o->setSortBy($n->getStringValue()),
            'sortByGeoPoints' => fn(ParseNode $n) => $o->setSortByGeoPoints($n->getStringValue()),
            'sortByMetric' => fn(ParseNode $n) => $o->setSortByMetric($n->getEnumValue(SortByMetric::class)),
        ];
    }

    /**
     * Gets the filterAroundRadius property value. Radius in meters to be used when filtering using geo-location. Can only be used when filtering by a single geo-point.
     * @return int|null
    */
    public function getFilterAroundRadius(): ?int {
        return $this->filterAroundRadius;
    }

    /**
     * Gets the filterGeoPoints property value. The definition of a geographical area to filter by.Given one geo-point, the results will be limited to a radius around a point. To override the default radius (1000 meters), provide the `filterAroundRadius` parameter.**Example input:** `["34.052235,-118.243685"]`Given two geo-points, the results will be limited to a rectangular area. The first point defines the upper-left corner of the rectangle and the second is the lower-right corner.**Example input:** `["50,-100", "25,150"]`Given three or more geo-points, the results will be limited to a polygonal area.**Example input:** `["50,0", "40,20", "-20,10"]`
     * @return array<string>|null
    */
    public function getFilterGeoPoints(): ?array {
        return $this->filterGeoPoints;
    }

    /**
     * Gets the filters property value. IQL query string. For details, see the [Help Center](https://help.synerise.com/developers/iql/).
     * @return string|null
    */
    public function getFilters(): ?string {
        return $this->filters;
    }

    /**
     * Gets the ignoreQueryRules property value. If set to `true`, query rules are not applied.
     * @return bool|null
    */
    public function getIgnoreQueryRules(): ?bool {
        return $this->ignoreQueryRules;
    }

    /**
     * Gets the includeFacets property value. Determines which groups of facets will be returned: both filtered and unfiltered; just filtered; just unfiltered; or no group at at all.To determine which attributes should be returned as facets in each group, use the `facets` parameter.
     * @return IncludeFacets|null
    */
    public function getIncludeFacets(): ?IncludeFacets {
        return $this->includeFacets;
    }

    /**
     * Gets the includeMeta property value. When `true`, pagination metadata is included in the response body.When `false`, the data is included in the response headers:- Link: links to neighbors, first, and last pages in pagination.- X-Pagination-Total-Count: total number of items on all pages- X-Pagination-Total-Pages: total number of pages- X-Pagination-Page: current page- X-Pagination-Limit: maximum number of items on a page- X-Pagination-Sorted-By: parameter that the items were sorted by- X-Pagination-Ordering: sorting direction
     * @return bool|null
    */
    public function getIncludeMeta(): ?bool {
        return $this->includeMeta;
    }

    /**
     * Gets the limit property value. The number of items to return per page
     * @return int|null
    */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * Gets the maxValuesPerFacet property value. Determines how many values will be retrieved per facet.
     * @return int|null
    */
    public function getMaxValuesPerFacet(): ?int {
        return $this->maxValuesPerFacet;
    }

    /**
     * Gets the ordering property value. Sorting order
     * @return PaginationOrdering|null
    */
    public function getOrdering(): ?PaginationOrdering {
        return $this->ordering;
    }

    /**
     * Gets the page property value. Page number to return for pagination. The first page has the index `1`.
     * @return int|null
    */
    public function getPage(): ?int {
        return $this->page;
    }

    /**
     * Gets the query property value. Query text to use in the search
     * @return string|null
    */
    public function getQuery(): ?string {
        return $this->query;
    }

    /**
     * Gets the sortBy property value. Name of the attribute by which the data will be sorted.Sorting by attribute may cause a promoted item to be in a different position that defined in a query rule.
     * @return string|null
    */
    public function getSortBy(): ?string {
        return $this->sortBy;
    }

    /**
     * Gets the sortByGeoPoints property value. Geo-point (`{latitude},{longitude}`) for data sorting. Results are sorted by distance from this point. `ordering: asc` means "closest first".
     * @return string|null
    */
    public function getSortByGeoPoints(): ?string {
        return $this->sortByGeoPoints;
    }

    /**
     * Gets the sortByMetric property value. Name of the metric by which the data will be sorted
     * @return SortByMetric|null
    */
    public function getSortByMetric(): ?SortByMetric {
        return $this->sortByMetric;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('caseSensitiveFacetValues', $this->getCaseSensitiveFacetValues());
        $writer->writeStringValue('clientUUID', $this->getClientUUID());
        $writer->writeCollectionOfPrimitiveValues('context', $this->getContext());
        $writer->writeObjectValue('customFilteredFacets', $this->getCustomFilteredFacets());
        $writer->writeCollectionOfPrimitiveValues('displayAttributes', $this->getDisplayAttributes());
        $writer->writeObjectValue('distinctFilter', $this->getDistinctFilter());
        $writer->writeCollectionOfPrimitiveValues('excludeQueryRules', $this->getExcludeQueryRules());
        $writer->writeCollectionOfPrimitiveValues('facets', $this->getFacets());
        $writer->writeIntegerValue('facetsSize', $this->getFacetsSize());
        $writer->writeIntegerValue('filterAroundRadius', $this->getFilterAroundRadius());
        $writer->writeCollectionOfPrimitiveValues('filterGeoPoints', $this->getFilterGeoPoints());
        $writer->writeStringValue('filters', $this->getFilters());
        $writer->writeBooleanValue('ignoreQueryRules', $this->getIgnoreQueryRules());
        $writer->writeEnumValue('includeFacets', $this->getIncludeFacets());
        $writer->writeBooleanValue('includeMeta', $this->getIncludeMeta());
        $writer->writeIntegerValue('limit', $this->getLimit());
        $writer->writeIntegerValue('maxValuesPerFacet', $this->getMaxValuesPerFacet());
        $writer->writeEnumValue('ordering', $this->getOrdering());
        $writer->writeIntegerValue('page', $this->getPage());
        $writer->writeStringValue('query', $this->getQuery());
        $writer->writeStringValue('sortBy', $this->getSortBy());
        $writer->writeStringValue('sortByGeoPoints', $this->getSortByGeoPoints());
        $writer->writeEnumValue('sortByMetric', $this->getSortByMetric());
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
     * Sets the caseSensitiveFacetValues property value. Specifies whether facets aggregation should be case sensitive.
     * @param bool|null $value Value to set for the caseSensitiveFacetValues property.
    */
    public function setCaseSensitiveFacetValues(?bool $value): void {
        $this->caseSensitiveFacetValues = $value;
    }

    /**
     * Sets the clientUUID property value. UUID of the profile for which the search is performed
     * @param string|null $value Value to set for the clientUUID property.
    */
    public function setClientUUID(?string $value): void {
        $this->clientUUID = $value;
    }

    /**
     * Sets the context property value. List of context strings for a search query
     * @param array<string>|null $value Value to set for the context property.
    */
    public function setContext(?array $value): void {
        $this->context = $value;
    }

    /**
     * Sets the customFilteredFacets property value. A key-value map that takes attributes as keys and IQL query strings as values.For each key a facet is returned that includes only the items filtered by the provided IQL query string.
     * @param CustomFilteredFacets|null $value Value to set for the customFilteredFacets property.
    */
    public function setCustomFilteredFacets(?CustomFilteredFacets $value): void {
        $this->customFilteredFacets = $value;
    }

    /**
     * Sets the displayAttributes property value. List of ad hoc attributes that will be returned for each found item
     * @param array<string>|null $value Value to set for the displayAttributes property.
    */
    public function setDisplayAttributes(?array $value): void {
        $this->displayAttributes = $value;
    }

    /**
     * Sets the distinctFilter property value. Distinct filters regulate how many items with the same value of a particular attribute can be returned.
     * @param DistinctFilterSearch|null $value Value to set for the distinctFilter property.
    */
    public function setDistinctFilter(?DistinctFilterSearch $value): void {
        $this->distinctFilter = $value;
    }

    /**
     * Sets the excludeQueryRules property value. List of query rules that will not be applied.
     * @param array<int>|null $value Value to set for the excludeQueryRules property.
    */
    public function setExcludeQueryRules(?array $value): void {
        $this->excludeQueryRules = $value;
    }

    /**
     * Sets the facets property value. A list of attributes for which facets will be returned. A single `*` value matches all facetable attributes.To determine which groups of facets should be returned, use the `includeFacets` parameter.
     * @param array<string>|null $value Value to set for the facets property.
    */
    public function setFacets(?array $value): void {
        $this->facets = $value;
    }

    /**
     * Sets the facetsSize property value. Determines how many items will be used for facets aggregation.
     * @param int|null $value Value to set for the facetsSize property.
    */
    public function setFacetsSize(?int $value): void {
        $this->facetsSize = $value;
    }

    /**
     * Sets the filterAroundRadius property value. Radius in meters to be used when filtering using geo-location. Can only be used when filtering by a single geo-point.
     * @param int|null $value Value to set for the filterAroundRadius property.
    */
    public function setFilterAroundRadius(?int $value): void {
        $this->filterAroundRadius = $value;
    }

    /**
     * Sets the filterGeoPoints property value. The definition of a geographical area to filter by.Given one geo-point, the results will be limited to a radius around a point. To override the default radius (1000 meters), provide the `filterAroundRadius` parameter.**Example input:** `["34.052235,-118.243685"]`Given two geo-points, the results will be limited to a rectangular area. The first point defines the upper-left corner of the rectangle and the second is the lower-right corner.**Example input:** `["50,-100", "25,150"]`Given three or more geo-points, the results will be limited to a polygonal area.**Example input:** `["50,0", "40,20", "-20,10"]`
     * @param array<string>|null $value Value to set for the filterGeoPoints property.
    */
    public function setFilterGeoPoints(?array $value): void {
        $this->filterGeoPoints = $value;
    }

    /**
     * Sets the filters property value. IQL query string. For details, see the [Help Center](https://help.synerise.com/developers/iql/).
     * @param string|null $value Value to set for the filters property.
    */
    public function setFilters(?string $value): void {
        $this->filters = $value;
    }

    /**
     * Sets the ignoreQueryRules property value. If set to `true`, query rules are not applied.
     * @param bool|null $value Value to set for the ignoreQueryRules property.
    */
    public function setIgnoreQueryRules(?bool $value): void {
        $this->ignoreQueryRules = $value;
    }

    /**
     * Sets the includeFacets property value. Determines which groups of facets will be returned: both filtered and unfiltered; just filtered; just unfiltered; or no group at at all.To determine which attributes should be returned as facets in each group, use the `facets` parameter.
     * @param IncludeFacets|null $value Value to set for the includeFacets property.
    */
    public function setIncludeFacets(?IncludeFacets $value): void {
        $this->includeFacets = $value;
    }

    /**
     * Sets the includeMeta property value. When `true`, pagination metadata is included in the response body.When `false`, the data is included in the response headers:- Link: links to neighbors, first, and last pages in pagination.- X-Pagination-Total-Count: total number of items on all pages- X-Pagination-Total-Pages: total number of pages- X-Pagination-Page: current page- X-Pagination-Limit: maximum number of items on a page- X-Pagination-Sorted-By: parameter that the items were sorted by- X-Pagination-Ordering: sorting direction
     * @param bool|null $value Value to set for the includeMeta property.
    */
    public function setIncludeMeta(?bool $value): void {
        $this->includeMeta = $value;
    }

    /**
     * Sets the limit property value. The number of items to return per page
     * @param int|null $value Value to set for the limit property.
    */
    public function setLimit(?int $value): void {
        $this->limit = $value;
    }

    /**
     * Sets the maxValuesPerFacet property value. Determines how many values will be retrieved per facet.
     * @param int|null $value Value to set for the maxValuesPerFacet property.
    */
    public function setMaxValuesPerFacet(?int $value): void {
        $this->maxValuesPerFacet = $value;
    }

    /**
     * Sets the ordering property value. Sorting order
     * @param PaginationOrdering|null $value Value to set for the ordering property.
    */
    public function setOrdering(?PaginationOrdering $value): void {
        $this->ordering = $value;
    }

    /**
     * Sets the page property value. Page number to return for pagination. The first page has the index `1`.
     * @param int|null $value Value to set for the page property.
    */
    public function setPage(?int $value): void {
        $this->page = $value;
    }

    /**
     * Sets the query property value. Query text to use in the search
     * @param string|null $value Value to set for the query property.
    */
    public function setQuery(?string $value): void {
        $this->query = $value;
    }

    /**
     * Sets the sortBy property value. Name of the attribute by which the data will be sorted.Sorting by attribute may cause a promoted item to be in a different position that defined in a query rule.
     * @param string|null $value Value to set for the sortBy property.
    */
    public function setSortBy(?string $value): void {
        $this->sortBy = $value;
    }

    /**
     * Sets the sortByGeoPoints property value. Geo-point (`{latitude},{longitude}`) for data sorting. Results are sorted by distance from this point. `ordering: asc` means "closest first".
     * @param string|null $value Value to set for the sortByGeoPoints property.
    */
    public function setSortByGeoPoints(?string $value): void {
        $this->sortByGeoPoints = $value;
    }

    /**
     * Sets the sortByMetric property value. Name of the metric by which the data will be sorted
     * @param SortByMetric|null $value Value to set for the sortByMetric property.
    */
    public function setSortByMetric(?SortByMetric $value): void {
        $this->sortByMetric = $value;
    }

}
