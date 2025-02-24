<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class FinalQuery implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $finalQuery Query that was ultimately used to perform the search.
    */
    private ?string $finalQuery = null;
    
    /**
     * @var array<FinalQuery_synonyms>|null $synonyms Used synonyms.
    */
    private ?array $synonyms = null;
    
    /**
     * Instantiates a new FinalQuery and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return FinalQuery
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): FinalQuery {
        return new FinalQuery();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'finalQuery' => fn(ParseNode $n) => $o->setFinalQuery($n->getStringValue()),
            'synonyms' => fn(ParseNode $n) => $o->setSynonyms($n->getCollectionOfObjectValues([FinalQuery_synonyms::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the finalQuery property value. Query that was ultimately used to perform the search.
     * @return string|null
    */
    public function getFinalQuery(): ?string {
        return $this->finalQuery;
    }

    /**
     * Gets the synonyms property value. Used synonyms.
     * @return array<FinalQuery_synonyms>|null
    */
    public function getSynonyms(): ?array {
        return $this->synonyms;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('finalQuery', $this->getFinalQuery());
        $writer->writeCollectionOfObjectValues('synonyms', $this->getSynonyms());
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
     * Sets the finalQuery property value. Query that was ultimately used to perform the search.
     * @param string|null $value Value to set for the finalQuery property.
    */
    public function setFinalQuery(?string $value): void {
        $this->finalQuery = $value;
    }

    /**
     * Sets the synonyms property value. Used synonyms.
     * @param array<FinalQuery_synonyms>|null $value Value to set for the synonyms property.
    */
    public function setSynonyms(?array $value): void {
        $this->synonyms = $value;
    }

}
