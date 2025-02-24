<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Autocomplete\Explain;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\Search\Models\AutocompleteResponseWithExplanation;
use Synerise\Api\Search\Models\SuggestionResponse;

/**
 * Composed type wrapper for classes AutocompleteResponseWithExplanation, SuggestionResponse
*/
class ExplainGetResponse implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var AutocompleteResponseWithExplanation|null $autocompleteResponseWithExplanation Composed type representation for type AutocompleteResponseWithExplanation
    */
    private ?AutocompleteResponseWithExplanation $autocompleteResponseWithExplanation = null;
    
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
     * Gets the AutocompleteResponseWithExplanation property value. Composed type representation for type AutocompleteResponseWithExplanation
     * @return AutocompleteResponseWithExplanation|null
    */
    public function getAutocompleteResponseWithExplanation(): ?AutocompleteResponseWithExplanation {
        return $this->autocompleteResponseWithExplanation;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getAutocompleteResponseWithExplanation() !== null) {
            return $this->getAutocompleteResponseWithExplanation()->getFieldDeserializers();
        } else if ($this->getSuggestionResponse() !== null) {
            return $this->getSuggestionResponse()->getFieldDeserializers();
        }
        return [];
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
        if ($this->getAutocompleteResponseWithExplanation() !== null) {
            $writer->writeObjectValue(null, $this->getAutocompleteResponseWithExplanation());
        } else if ($this->getSuggestionResponse() !== null) {
            $writer->writeObjectValue(null, $this->getSuggestionResponse());
        }
    }

    /**
     * Sets the AutocompleteResponseWithExplanation property value. Composed type representation for type AutocompleteResponseWithExplanation
     * @param AutocompleteResponseWithExplanation|null $value Value to set for the AutocompleteResponseWithExplanation property.
    */
    public function setAutocompleteResponseWithExplanation(?AutocompleteResponseWithExplanation $value): void {
        $this->autocompleteResponseWithExplanation = $value;
    }

    /**
     * Sets the SuggestionResponse property value. Composed type representation for type SuggestionResponse
     * @param SuggestionResponse|null $value Value to set for the SuggestionResponse property.
    */
    public function setSuggestionResponse(?SuggestionResponse $value): void {
        $this->suggestionResponse = $value;
    }

}
