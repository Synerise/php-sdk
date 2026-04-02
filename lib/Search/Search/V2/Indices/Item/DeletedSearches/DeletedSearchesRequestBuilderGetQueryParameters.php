<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\DeletedSearches;

/**
 * Retrieve the searches deleted from a profile's history.
*/
class DeletedSearchesRequestBuilderGetQueryParameters 
{
    /**
     * @var string|null $clientUUID UUID of the profile for which the search is performed
    */
    public ?string $clientUUID = null;
    
    /**
     * Instantiates a new DeletedSearchesRequestBuilderGetQueryParameters and sets the default values.
     * @param string|null $clientUUID UUID of the profile for which the search is performed
    */
    public function __construct(?string $clientUUID = null) {
        $this->clientUUID = $clientUUID;
    }

}
