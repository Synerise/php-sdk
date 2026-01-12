<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\DeletedSearches;

/**
 * Delete a recent search from the history accessible to a profile. The search remains in the database and you can retrieve it by using [this endpoint](#operation/GetDeletedSearches).
*/
class DeletedSearchesRequestBuilderPostQueryParameters 
{
    /**
     * @var string|null $clientUUID UUID of the profile for which the search is performed
    */
    public ?string $clientUUID = null;
    
    /**
     * Instantiates a new DeletedSearchesRequestBuilderPostQueryParameters and sets the default values.
     * @param string|null $clientUUID UUID of the profile for which the search is performed
    */
    public function __construct(?string $clientUUID = null) {
        $this->clientUUID = $clientUUID;
    }

}
