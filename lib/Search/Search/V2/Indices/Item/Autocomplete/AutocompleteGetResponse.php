<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\Autocomplete;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\Search\Models\AutocompleteResponse;
use Synerise\Api\Search\Models\SuggestionResponse;

/**
 * Composed type wrapper for classes AutocompleteResponse, SuggestionResponse
*/
class AutocompleteGetResponse implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var AutocompleteResponse|null $autocompleteResponse Composed type representation for type AutocompleteResponse
    */
    private ?AutocompleteResponse $autocompleteResponse = null;
    
    /**
     * @var SuggestionResponse|null $suggestionResponse Composed type representation for type SuggestionResponse
    */
    private ?SuggestionResponse $suggestionResponse = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AutocompleteGetResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AutocompleteGetResponse {
        $result = new AutocompleteGetResponse();
        return $result;
    }

    /**
     * Gets the AutocompleteResponse property value. Composed type representation for type AutocompleteResponse
     * @return AutocompleteResponse|null
    */
    public function getAutocompleteResponse(): ?AutocompleteResponse {
        return $this->autocompleteResponse;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getAutocompleteResponse() !== null) {
            return $this->getAutocompleteResponse()->getFieldDeserializers();
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
        if ($this->getAutocompleteResponse() !== null) {
            $writer->writeObjectValue(null, $this->getAutocompleteResponse());
        } else if ($this->getSuggestionResponse() !== null) {
            $writer->writeObjectValue(null, $this->getSuggestionResponse());
        }
    }

    /**
     * Sets the AutocompleteResponse property value. Composed type representation for type AutocompleteResponse
     * @param AutocompleteResponse|null $value Value to set for the AutocompleteResponse property.
    */
    public function setAutocompleteResponse(?AutocompleteResponse $value): void {
        $this->autocompleteResponse = $value;
    }

    /**
     * Sets the SuggestionResponse property value. Composed type representation for type SuggestionResponse
     * @param SuggestionResponse|null $value Value to set for the SuggestionResponse property.
    */
    public function setSuggestionResponse(?SuggestionResponse $value): void {
        $this->suggestionResponse = $value;
    }

}
