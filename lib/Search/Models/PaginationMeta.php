<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Optional metadata, such as pagination. This is returned if the `includeMeta` parameter was set to true in the request.
*/
class PaginationMeta implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var float|null $code HTTP response code
    */
    private ?float $code = null;
    
    /**
     * @var float|null $limit The maximal number of items on a page
    */
    private ?float $limit = null;
    
    /**
     * @var array<PaginationMeta_link>|null $link Links to neighboring pages, first page, and last page in pagination
    */
    private ?array $link = null;
    
    /**
     * @var string|null $ordering Sorting order
    */
    private ?string $ordering = null;
    
    /**
     * @var float|null $page The current page
    */
    private ?float $page = null;
    
    /**
     * @var string|null $sortedBy The column (attribute) that the campaigns were sorted by
    */
    private ?string $sortedBy = null;
    
    /**
     * @var float|null $totalCount The total number of search results
    */
    private ?float $totalCount = null;
    
    /**
     * @var float|null $totalPages The total number of pages
    */
    private ?float $totalPages = null;
    
    /**
     * Instantiates a new PaginationMeta and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PaginationMeta
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PaginationMeta {
        return new PaginationMeta();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the code property value. HTTP response code
     * @return float|null
    */
    public function getCode(): ?float {
        return $this->code;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'code' => fn(ParseNode $n) => $o->setCode($n->getFloatValue()),
            'limit' => fn(ParseNode $n) => $o->setLimit($n->getFloatValue()),
            'link' => fn(ParseNode $n) => $o->setLink($n->getCollectionOfObjectValues([PaginationMeta_link::class, 'createFromDiscriminatorValue'])),
            'ordering' => fn(ParseNode $n) => $o->setOrdering($n->getStringValue()),
            'page' => fn(ParseNode $n) => $o->setPage($n->getFloatValue()),
            'sortedBy' => fn(ParseNode $n) => $o->setSortedBy($n->getStringValue()),
            'totalCount' => fn(ParseNode $n) => $o->setTotalCount($n->getFloatValue()),
            'totalPages' => fn(ParseNode $n) => $o->setTotalPages($n->getFloatValue()),
        ];
    }

    /**
     * Gets the limit property value. The maximal number of items on a page
     * @return float|null
    */
    public function getLimit(): ?float {
        return $this->limit;
    }

    /**
     * Gets the link property value. Links to neighboring pages, first page, and last page in pagination
     * @return array<PaginationMeta_link>|null
    */
    public function getLink(): ?array {
        return $this->link;
    }

    /**
     * Gets the ordering property value. Sorting order
     * @return string|null
    */
    public function getOrdering(): ?string {
        return $this->ordering;
    }

    /**
     * Gets the page property value. The current page
     * @return float|null
    */
    public function getPage(): ?float {
        return $this->page;
    }

    /**
     * Gets the sortedBy property value. The column (attribute) that the campaigns were sorted by
     * @return string|null
    */
    public function getSortedBy(): ?string {
        return $this->sortedBy;
    }

    /**
     * Gets the totalCount property value. The total number of search results
     * @return float|null
    */
    public function getTotalCount(): ?float {
        return $this->totalCount;
    }

    /**
     * Gets the totalPages property value. The total number of pages
     * @return float|null
    */
    public function getTotalPages(): ?float {
        return $this->totalPages;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeFloatValue('code', $this->getCode());
        $writer->writeFloatValue('limit', $this->getLimit());
        $writer->writeCollectionOfObjectValues('link', $this->getLink());
        $writer->writeStringValue('ordering', $this->getOrdering());
        $writer->writeFloatValue('page', $this->getPage());
        $writer->writeStringValue('sortedBy', $this->getSortedBy());
        $writer->writeFloatValue('totalCount', $this->getTotalCount());
        $writer->writeFloatValue('totalPages', $this->getTotalPages());
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
     * Sets the code property value. HTTP response code
     * @param float|null $value Value to set for the code property.
    */
    public function setCode(?float $value): void {
        $this->code = $value;
    }

    /**
     * Sets the limit property value. The maximal number of items on a page
     * @param float|null $value Value to set for the limit property.
    */
    public function setLimit(?float $value): void {
        $this->limit = $value;
    }

    /**
     * Sets the link property value. Links to neighboring pages, first page, and last page in pagination
     * @param array<PaginationMeta_link>|null $value Value to set for the link property.
    */
    public function setLink(?array $value): void {
        $this->link = $value;
    }

    /**
     * Sets the ordering property value. Sorting order
     * @param string|null $value Value to set for the ordering property.
    */
    public function setOrdering(?string $value): void {
        $this->ordering = $value;
    }

    /**
     * Sets the page property value. The current page
     * @param float|null $value Value to set for the page property.
    */
    public function setPage(?float $value): void {
        $this->page = $value;
    }

    /**
     * Sets the sortedBy property value. The column (attribute) that the campaigns were sorted by
     * @param string|null $value Value to set for the sortedBy property.
    */
    public function setSortedBy(?string $value): void {
        $this->sortedBy = $value;
    }

    /**
     * Sets the totalCount property value. The total number of search results
     * @param float|null $value Value to set for the totalCount property.
    */
    public function setTotalCount(?float $value): void {
        $this->totalCount = $value;
    }

    /**
     * Sets the totalPages property value. The total number of pages
     * @param float|null $value Value to set for the totalPages property.
    */
    public function setTotalPages(?float $value): void {
        $this->totalPages = $value;
    }

}
