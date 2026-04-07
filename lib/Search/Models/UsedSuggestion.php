<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * If the query did not return any matches, the AI engine tries to find an alternative similar query and use it for the search instead. If that happens, the `usedSuggestion` object contains information about that alternative query offered by the AI engine and used in the search.
*/
class UsedSuggestion extends FullTextSuggestionSchema implements Parsable 
{
    /**
     * Instantiates a new UsedSuggestion and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return UsedSuggestion
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): UsedSuggestion {
        return new UsedSuggestion();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
        ]);
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
    }

}
