<?php

namespace Synerise\Api\V4\Clients\CustomImport;

/**
 * Custom import or update profile
*/
class CustomImportRequestBuilderPostQueryParameters 
{
    /**
     * @var bool|null $phoneFilter Enables to searching profiles by phone in database if email is missing
    */
    public ?bool $phoneFilter = null;
    
    /**
     * Instantiates a new CustomImportRequestBuilderPostQueryParameters and sets the default values.
     * @param bool|null $phoneFilter Enables to searching profiles by phone in database if email is missing
    */
    public function __construct(?bool $phoneFilter = null) {
        $this->phoneFilter = $phoneFilter;
    }

}
