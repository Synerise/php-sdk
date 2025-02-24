<?php

namespace Synerise\Api\Catalogs\Items;

/**
 * Retrieve all items from all catalogs in the current Business Profile.
*/
class ItemsRequestBuilderGetQueryParameters 
{
    /**
     * @var int|null $limit The maximum number of items to include in the response
    */
    public ?int $limit = null;
    
    /**
     * @var int|null $offset The offset for the search. For example, if your `limit` is 10 and you want to retrieve the third page of items, set the offset to 20. Items with indexes 20 to 29 are returned (the first item on the first page has the index 0).
    */
    public ?int $offset = null;
    
    /**
     * Instantiates a new ItemsRequestBuilderGetQueryParameters and sets the default values.
     * @param int|null $limit The maximum number of items to include in the response
     * @param int|null $offset The offset for the search. For example, if your `limit` is 10 and you want to retrieve the third page of items, set the offset to 20. Items with indexes 20 to 29 are returned (the first item on the first page has the index 0).
    */
    public function __construct(?int $limit = null, ?int $offset = null) {
        $this->limit = $limit;
        $this->offset = $offset;
    }

}
