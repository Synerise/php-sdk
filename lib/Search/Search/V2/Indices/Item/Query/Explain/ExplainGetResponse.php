<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Query\Explain;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\Search\Models\FullTextSearchResponseWithExplanation;
use Synerise\Api\Search\Models\SuggestionResponse;

/**
 * Composed type wrapper for classes FullTextSearchResponseWithExplanation, SuggestionResponse
*/
class ExplainGetResponse implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var FullTextSearchResponseWithExplanation|null $fullTextSearchResponseWithExplanation Composed type representation for type FullTextSearchResponseWithExplanation
    */
    private ?FullTextSearchResponseWithExplanation $fullTextSearchResponseWithExplanation = null;
    
    /**
     * @var SuggestionResponse|null $suggestionResponse Composed type representation for type SuggestionResponse
    */
    private ?SuggestionResponse $suggestionResponse = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExplainGetResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExplainGetResponse {
        $result = new ExplainGetResponse();
        return $result;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getFullTextSearchResponseWithExplanation() !== null) {
            return $this->getFullTextSearchResponseWithExplanation()->getFieldDeserializers();
        } else if ($this->getSuggestionResponse() !== null) {
            return $this->getSuggestionResponse()->getFieldDeserializers();
        }
        return [];
    }

    /**
     * Gets the FullTextSearchResponseWithExplanation property value. Composed type representation for type FullTextSearchResponseWithExplanation
     * @return FullTextSearchResponseWithExplanation|null
    */
    public function getFullTextSearchResponseWithExplanation(): ?FullTextSearchResponseWithExplanation {
        return $this->fullTextSearchResponseWithExplanation;
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
        if ($this->getFullTextSearchResponseWithExplanation() !== null) {
            $writer->writeObjectValue(null, $this->getFullTextSearchResponseWithExplanation());
        } else if ($this->getSuggestionResponse() !== null) {
            $writer->writeObjectValue(null, $this->getSuggestionResponse());
        }
    }

    /**
     * Sets the FullTextSearchResponseWithExplanation property value. Composed type representation for type FullTextSearchResponseWithExplanation
     * @param FullTextSearchResponseWithExplanation|null $value Value to set for the FullTextSearchResponseWithExplanation property.
    */
    public function setFullTextSearchResponseWithExplanation(?FullTextSearchResponseWithExplanation $value): void {
        $this->fullTextSearchResponseWithExplanation = $value;
    }

    /**
     * Sets the SuggestionResponse property value. Composed type representation for type SuggestionResponse
     * @param SuggestionResponse|null $value Value to set for the SuggestionResponse property.
    */
    public function setSuggestionResponse(?SuggestionResponse $value): void {
        $this->suggestionResponse = $value;
    }

}
