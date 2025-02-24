<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Used boost filter.
*/
class ExplanationBoostFilters implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var QueryRuleFilters|null $filters Filters from query rules.
    */
    private ?QueryRuleFilters $filters = null;
    
    /**
     * @var int|null $ruleId Id of the query rule from which the filter come.
    */
    private ?int $ruleId = null;
    
    /**
     * @var float|null $weight Weight of the filter.
    */
    private ?float $weight = null;
    
    /**
     * Instantiates a new ExplanationBoostFilters and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExplanationBoostFilters
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExplanationBoostFilters {
        return new ExplanationBoostFilters();
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
            'filters' => fn(ParseNode $n) => $o->setFilters($n->getObjectValue([QueryRuleFilters::class, 'createFromDiscriminatorValue'])),
            'ruleId' => fn(ParseNode $n) => $o->setRuleId($n->getIntegerValue()),
            'weight' => fn(ParseNode $n) => $o->setWeight($n->getFloatValue()),
        ];
    }

    /**
     * Gets the filters property value. Filters from query rules.
     * @return QueryRuleFilters|null
    */
    public function getFilters(): ?QueryRuleFilters {
        return $this->filters;
    }

    /**
     * Gets the ruleId property value. Id of the query rule from which the filter come.
     * @return int|null
    */
    public function getRuleId(): ?int {
        return $this->ruleId;
    }

    /**
     * Gets the weight property value. Weight of the filter.
     * @return float|null
    */
    public function getWeight(): ?float {
        return $this->weight;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('filters', $this->getFilters());
        $writer->writeIntegerValue('ruleId', $this->getRuleId());
        $writer->writeFloatValue('weight', $this->getWeight());
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
     * Sets the filters property value. Filters from query rules.
     * @param QueryRuleFilters|null $value Value to set for the filters property.
    */
    public function setFilters(?QueryRuleFilters $value): void {
        $this->filters = $value;
    }

    /**
     * Sets the ruleId property value. Id of the query rule from which the filter come.
     * @param int|null $value Value to set for the ruleId property.
    */
    public function setRuleId(?int $value): void {
        $this->ruleId = $value;
    }

    /**
     * Sets the weight property value. Weight of the filter.
     * @param float|null $value Value to set for the weight property.
    */
    public function setWeight(?float $value): void {
        $this->weight = $value;
    }

}
