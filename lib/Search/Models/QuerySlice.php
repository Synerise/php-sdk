<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Describes a slice of query.
*/
class QuerySlice implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $from Number of the first word (zero-indexed, inclusive).
    */
    private ?int $from = null;
    
    /**
     * @var int|null $to Number of the last word (zero-indexed, inclusive).
    */
    private ?int $to = null;
    
    /**
     * Instantiates a new QuerySlice and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return QuerySlice
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): QuerySlice {
        return new QuerySlice();
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
            'from' => fn(ParseNode $n) => $o->setFrom($n->getIntegerValue()),
            'to' => fn(ParseNode $n) => $o->setTo($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the from property value. Number of the first word (zero-indexed, inclusive).
     * @return int|null
    */
    public function getFrom(): ?int {
        return $this->from;
    }

    /**
     * Gets the to property value. Number of the last word (zero-indexed, inclusive).
     * @return int|null
    */
    public function getTo(): ?int {
        return $this->to;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('from', $this->getFrom());
        $writer->writeIntegerValue('to', $this->getTo());
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
     * Sets the from property value. Number of the first word (zero-indexed, inclusive).
     * @param int|null $value Value to set for the from property.
    */
    public function setFrom(?int $value): void {
        $this->from = $value;
    }

    /**
     * Sets the to property value. Number of the last word (zero-indexed, inclusive).
     * @param int|null $value Value to set for the to property.
    */
    public function setTo(?int $value): void {
        $this->to = $value;
    }

}
