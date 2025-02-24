<?php

namespace Synerise\Api\Catalogs\Bags\Item\Items;

/**
 * Retrieve the entries from a single catalog.
*/
class ItemsRequestBuilderGetQueryParameters 
{
    /**
     * @var string|null $itemKey Filter by the value of the unique identifier of the item (exact match)
    */
    public ?string $itemKey = null;
    
    /**
     * @var int|null $limit The maximum number of items to include in the response
    */
    public ?int $limit = null;
    
    /**
     * @var int|null $offset The offset for the search. For example, if your `limit` is 10 and you want to retrieve the third page of items, set the offset to 20. Items with indexes 20 to 29 are returned (the first item on the first page has the index 0).
    */
    public ?int $offset = null;
    
    /**
     * @var string|null $searchBy A search string. You can search the catalogs by their name or the first or last name of the author.
    */
    public ?string $searchBy = null;
    
    /**
     * Instantiates a new ItemsRequestBuilderGetQueryParameters and sets the default values.
     * @param string|null $itemKey Filter by the value of the unique identifier of the item (exact match)
     * @param int|null $limit The maximum number of items to include in the response
     * @param int|null $offset The offset for the search. For example, if your `limit` is 10 and you want to retrieve the third page of items, set the offset to 20. Items with indexes 20 to 29 are returned (the first item on the first page has the index 0).
     * @param string|null $searchBy A search string. You can search the catalogs by their name or the first or last name of the author.
    */
    public function __construct(?string $itemKey = null, ?int $limit = null, ?int $offset = null, ?string $searchBy = null) {
        $this->itemKey = $itemKey;
        $this->limit = $limit;
        $this->offset = $offset;
        $this->searchBy = $searchBy;
    }

}
