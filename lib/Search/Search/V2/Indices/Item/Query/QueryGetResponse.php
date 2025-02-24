<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Query;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\Search\Models\FullTextSearchResponse;
use Synerise\Api\Search\Models\SuggestionResponse;

/**
 * Composed type wrapper for classes FullTextSearchResponse, SuggestionResponse
*/
class QueryGetResponse implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var FullTextSearchResponse|null $fullTextSearchResponse Composed type representation for type FullTextSearchResponse
    */
    private ?FullTextSearchResponse $fullTextSearchResponse = null;
    
    /**
     * @var SuggestionResponse|null $suggestionResponse Composed type representation for type SuggestionResponse
    */
    private ?SuggestionResponse $suggestionResponse = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return QueryGetResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): QueryGetResponse {
        $result = new QueryGetResponse();
        return $result;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getFullTextSearchResponse() !== null) {
            return $this->getFullTextSearchResponse()->getFieldDeserializers();
        } else if ($this->getSuggestionResponse() !== null) {
            return $this->getSuggestionResponse()->getFieldDeserializers();
        }
        return [];
    }

    /**
     * Gets the FullTextSearchResponse property value. Composed type representation for type FullTextSearchResponse
     * @return FullTextSearchResponse|null
    */
    public function getFullTextSearchResponse(): ?FullTextSearchResponse {
        return $this->fullTextSearchResponse;
    }

    /**
     * Gets the SuggestionResponse property value. Composed type representation for type SuggestionResponse
     * @return SuggestionResponse|null
    */
    public function getSuggestionResponse(): ?SuggestionResponse {
        return $this->suggestionResponse;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        if ($this->getFullTextSearchResponse() !== null) {
            $writer->writeObjectValue(null, $this->getFullTextSearchResponse());
        } else if ($this->getSuggestionResponse() !== null) {
            $writer->writeObjectValue(null, $this->getSuggestionResponse());
        }
    }

    /**
     * Sets the FullTextSearchResponse property value. Composed type representation for type FullTextSearchResponse
     * @param FullTextSearchResponse|null $value Value to set for the FullTextSearchResponse property.
    */
    public function setFullTextSearchResponse(?FullTextSearchResponse $value): void {
        $this->fullTextSearchResponse = $value;
    }

    /**
     * Sets the SuggestionResponse property value. Composed type representation for type SuggestionResponse
     * @param SuggestionResponse|null $value Value to set for the SuggestionResponse property.
    */
    public function setSuggestionResponse(?SuggestionResponse $value): void {
        $this->suggestionResponse = $value;
    }

}
