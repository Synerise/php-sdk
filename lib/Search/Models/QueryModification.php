<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Describes a change in query.
*/
class QueryModification implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $ruleId Id of the query rule which caused this change.
    */
    private ?int $ruleId = null;
    
    /**
     * @var QuerySlice|null $slice Query slice that was modified.
    */
    private ?QuerySlice $slice = null;
    
    /**
     * @var QuerySlice|null $transformedSlice Resulting query slice. Not present if the modification only removes words.
    */
    private ?QuerySlice $transformedSlice = null;
    
    /**
     * Instantiates a new QueryModification and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return QueryModification
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): QueryModification {
        return new QueryModification();
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
            'ruleId' => fn(ParseNode $n) => $o->setRuleId($n->getIntegerValue()),
            'slice' => fn(ParseNode $n) => $o->setSlice($n->getObjectValue([QuerySlice::class, 'createFromDiscriminatorValue'])),
            'transformedSlice' => fn(ParseNode $n) => $o->setTransformedSlice($n->getObjectValue([QuerySlice::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the ruleId property value. Id of the query rule which caused this change.
     * @return int|null
    */
    public function getRuleId(): ?int {
        return $this->ruleId;
    }

    /**
     * Gets the slice property value. Query slice that was modified.
     * @return QuerySlice|null
    */
    public function getSlice(): ?QuerySlice {
        return $this->slice;
    }

    /**
     * Gets the transformedSlice property value. Resulting query slice. Not present if the modification only removes words.
     * @return QuerySlice|null
    */
    public function getTransformedSlice(): ?QuerySlice {
        return $this->transformedSlice;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('ruleId', $this->getRuleId());
        $writer->writeObjectValue('slice', $this->getSlice());
        $writer->writeObjectValue('transformedSlice', $this->getTransformedSlice());
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
     * Sets the ruleId property value. Id of the query rule which caused this change.
     * @param int|null $value Value to set for the ruleId property.
    */
    public function setRuleId(?int $value): void {
        $this->ruleId = $value;
    }

    /**
     * Sets the slice property value. Query slice that was modified.
     * @param QuerySlice|null $value Value to set for the slice property.
    */
    public function setSlice(?QuerySlice $value): void {
        $this->slice = $value;
    }

    /**
     * Sets the transformedSlice property value. Resulting query slice. Not present if the modification only removes words.
     * @param QuerySlice|null $value Value to set for the transformedSlice property.
    */
    public function setTransformedSlice(?QuerySlice $value): void {
        $this->transformedSlice = $value;
    }

}
