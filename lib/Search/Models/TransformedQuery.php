<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Query changes applied due to query rules.
*/
class TransformedQuery implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $finalQuery Query after applying query rules.
    */
    private ?string $finalQuery = null;
    
    /**
     * @var array<QueryModification>|null $modifications The modifications property
    */
    private ?array $modifications = null;
    
    /**
     * @var string|null $originalQuery Query before applying query rules.
    */
    private ?string $originalQuery = null;
    
    /**
     * Instantiates a new TransformedQuery and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TransformedQuery
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TransformedQuery {
        return new TransformedQuery();
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
            'modifications' => fn(ParseNode $n) => $o->setModifications($n->getCollectionOfObjectValues([QueryModification::class, 'createFromDiscriminatorValue'])),
            'originalQuery' => fn(ParseNode $n) => $o->setOriginalQuery($n->getStringValue()),
        ];
    }

    /**
     * Gets the finalQuery property value. Query after applying query rules.
     * @return string|null
    */
    public function getFinalQuery(): ?string {
        return $this->finalQuery;
    }

    /**
     * Gets the modifications property value. The modifications property
     * @return array<QueryModification>|null
    */
    public function getModifications(): ?array {
        return $this->modifications;
    }

    /**
     * Gets the originalQuery property value. Query before applying query rules.
     * @return string|null
    */
    public function getOriginalQuery(): ?string {
        return $this->originalQuery;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('finalQuery', $this->getFinalQuery());
        $writer->writeCollectionOfObjectValues('modifications', $this->getModifications());
        $writer->writeStringValue('originalQuery', $this->getOriginalQuery());
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
     * Sets the finalQuery property value. Query after applying query rules.
     * @param string|null $value Value to set for the finalQuery property.
    */
    public function setFinalQuery(?string $value): void {
        $this->finalQuery = $value;
    }

    /**
     * Sets the modifications property value. The modifications property
     * @param array<QueryModification>|null $value Value to set for the modifications property.
    */
    public function setModifications(?array $value): void {
        $this->modifications = $value;
    }

    /**
     * Sets the originalQuery property value. Query before applying query rules.
     * @param string|null $value Value to set for the originalQuery property.
    */
    public function setOriginalQuery(?string $value): void {
        $this->originalQuery = $value;
    }

}
