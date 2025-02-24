<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Additional information
*/
class SuggestionResponse_extras implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $correlationId This ID is used:- for search result pagination- as `correlationId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
    */
    private ?string $correlationId = null;
    
    /**
     * @var string|null $searchId **DEPRECATED - use correlationId instead**This ID is used:- for search result pagination- as `searchId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
    */
    private ?string $searchId = null;
    
    /**
     * Instantiates a new SuggestionResponse_extras and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SuggestionResponse_extras
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SuggestionResponse_extras {
        return new SuggestionResponse_extras();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the correlationId property value. This ID is used:- for search result pagination- as `correlationId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
     * @return string|null
    */
    public function getCorrelationId(): ?string {
        return $this->correlationId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'searchId' => fn(ParseNode $n) => $o->setSearchId($n->getStringValue()),
        ];
    }

    /**
     * Gets the searchId property value. **DEPRECATED - use correlationId instead**This ID is used:- for search result pagination- as `searchId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
     * @return string|null
    */
    public function getSearchId(): ?string {
        return $this->searchId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeStringValue('searchId', $this->getSearchId());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the correlationId property value. This ID is used:- for search result pagination- as `correlationId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the searchId property value. **DEPRECATED - use correlationId instead**This ID is used:- for search result pagination- as `searchId` of the search event in events such as `items.search.click`Search results are cached for 10 minutes.The cached value will be used if the ID is provided in subsequent calls. This makes search faster and eliminates personalization non-determinism.
     * @param string|null $value Value to set for the searchId property.
    */
    public function setSearchId(?string $value): void {
        $this->searchId = $value;
    }

}
