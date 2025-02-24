<?php

namespace Synerise\Api\V4\Clients;

use Microsoft\Kiota\Abstractions\QueryParameter;

/**
 *  Retrieve a list of Profiles. You can filter, sort, and paginate the results.
*/
class ClientsRequestBuilderGetQueryParameters 
{
    /**
     * @QueryParameter("filters%5Banonymous%5D")
     * @var bool|null $filtersanonymous When set to `true`, only anonymous profiles are listed
    */
    public ?bool $filtersanonymous = null;
    
    /**
     * @QueryParameter("filters%5Bemail%5D")
     * @var string|null $filtersemail Filter profiles by email
    */
    public ?string $filtersemail = null;
    
    /**
     * @QueryParameter("filters%5BfirstName%5D")
     * @var string|null $filtersfirstName Filter profiles by first name
    */
    public ?string $filtersfirstName = null;
    
    /**
     * @QueryParameter("filters%5BlastName%5D")
     * @var string|null $filterslastName Filter profiles by last name
    */
    public ?string $filterslastName = null;
    
    /**
     * @QueryParameter("filters%5Bphone%5D")
     * @var string|null $filtersphone Filter profiles by phone
    */
    public ?string $filtersphone = null;
    
    /**
     * @var int|null $pageIndex Number of pages to retrieve
    */
    public ?int $pageIndex = null;
    
    /**
     * @var int|null $pageSize Number of entries on a page
    */
    public ?int $pageSize = null;
    
    /**
     * @var GetSortByQueryParameterType|null $sortBy Profile attribute by which the list will be sorted
    */
    public ?GetSortByQueryParameterType $sortBy = null;
    
    /**
     * @var GetSortOrderQueryParameterType|null $sortOrder Sorting order
    */
    public ?GetSortOrderQueryParameterType $sortOrder = null;
    
    /**
     * Instantiates a new ClientsRequestBuilderGetQueryParameters and sets the default values.
     * @param bool|null $filtersanonymous When set to `true`, only anonymous profiles are listed
     * @param string|null $filtersemail Filter profiles by email
     * @param string|null $filtersfirstName Filter profiles by first name
     * @param string|null $filterslastName Filter profiles by last name
     * @param string|null $filtersphone Filter profiles by phone
     * @param int|null $pageIndex Number of pages to retrieve
     * @param int|null $pageSize Number of entries on a page
     * @param GetSortByQueryParameterType|null $sortBy Profile attribute by which the list will be sorted
     * @param GetSortOrderQueryParameterType|null $sortOrder Sorting order
    */
    public function __construct(?bool $filtersanonymous = null, ?string $filtersemail = null, ?string $filtersfirstName = null, ?string $filterslastName = null, ?string $filtersphone = null, ?int $pageIndex = null, ?int $pageSize = null, ?GetSortByQueryParameterType $sortBy = null, ?GetSortOrderQueryParameterType $sortOrder = null) {
        $this->filtersanonymous = $filtersanonymous;
        $this->filtersemail = $filtersemail;
        $this->filtersfirstName = $filtersfirstName;
        $this->filterslastName = $filterslastName;
        $this->filtersphone = $filtersphone;
        $this->pageIndex = $pageIndex;
        $this->pageSize = $pageSize;
        $this->sortBy = $sortBy;
        $this->sortOrder = $sortOrder;
    }

}
