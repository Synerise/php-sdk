<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Filters from query rules.
*/
class QueryRuleFilters implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<QueryRuleFilters_rangeFilters>|null $rangeFilters Range-type filters
    */
    private ?array $rangeFilters = null;
    
    /**
     * @var array<QueryRuleFilters_textFilters>|null $textFilters Text-type filters
    */
    private ?array $textFilters = null;
    
    /**
     * Instantiates a new QueryRuleFilters and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return QueryRuleFilters
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): QueryRuleFilters {
        return new QueryRuleFilters();
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
            'rangeFilters' => fn(ParseNode $n) => $o->setRangeFilters($n->getCollectionOfObjectValues([QueryRuleFilters_rangeFilters::class, 'createFromDiscriminatorValue'])),
            'textFilters' => fn(ParseNode $n) => $o->setTextFilters($n->getCollectionOfObjectValues([QueryRuleFilters_textFilters::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the rangeFilters property value. Range-type filters
     * @return array<QueryRuleFilters_rangeFilters>|null
    */
    public function getRangeFilters(): ?array {
        return $this->rangeFilters;
    }

    /**
     * Gets the textFilters property value. Text-type filters
     * @return array<QueryRuleFilters_textFilters>|null
    */
    public function getTextFilters(): ?array {
        return $this->textFilters;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('rangeFilters', $this->getRangeFilters());
        $writer->writeCollectionOfObjectValues('textFilters', $this->getTextFilters());
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
     * Sets the rangeFilters property value. Range-type filters
     * @param array<QueryRuleFilters_rangeFilters>|null $value Value to set for the rangeFilters property.
    */
    public function setRangeFilters(?array $value): void {
        $this->rangeFilters = $value;
    }

    /**
     * Sets the textFilters property value. Text-type filters
     * @param array<QueryRuleFilters_textFilters>|null $value Value to set for the textFilters property.
    */
    public function setTextFilters(?array $value): void {
        $this->textFilters = $value;
    }

}
