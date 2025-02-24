<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Applied rules consequences.
*/
class RulesConsequencesExplanation implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<ExplanationBoostFilters>|null $boostFilters The boostFilters property
    */
    private ?array $boostFilters = null;
    
    /**
     * @var array<ExplanationFilters>|null $filters The filters property
    */
    private ?array $filters = null;
    
    /**
     * @var array<HideHit>|null $hiddenHits The hiddenHits property
    */
    private ?array $hiddenHits = null;
    
    /**
     * @var TransformedQuery|null $query Query changes applied due to query rules.
    */
    private ?TransformedQuery $query = null;
    
    /**
     * @var ReturnNoData|null $returnNoData Indicates if no data consequence is activated.
    */
    private ?ReturnNoData $returnNoData = null;
    
    /**
     * Instantiates a new RulesConsequencesExplanation and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RulesConsequencesExplanation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RulesConsequencesExplanation {
        return new RulesConsequencesExplanation();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the boostFilters property value. The boostFilters property
     * @return array<ExplanationBoostFilters>|null
    */
    public function getBoostFilters(): ?array {
        return $this->boostFilters;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'boostFilters' => fn(ParseNode $n) => $o->setBoostFilters($n->getCollectionOfObjectValues([ExplanationBoostFilters::class, 'createFromDiscriminatorValue'])),
            'filters' => fn(ParseNode $n) => $o->setFilters($n->getCollectionOfObjectValues([ExplanationFilters::class, 'createFromDiscriminatorValue'])),
            'hiddenHits' => fn(ParseNode $n) => $o->setHiddenHits($n->getCollectionOfObjectValues([HideHit::class, 'createFromDiscriminatorValue'])),
            'query' => fn(ParseNode $n) => $o->setQuery($n->getObjectValue([TransformedQuery::class, 'createFromDiscriminatorValue'])),
            'returnNoData' => fn(ParseNode $n) => $o->setReturnNoData($n->getObjectValue([ReturnNoData::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the filters property value. The filters property
     * @return array<ExplanationFilters>|null
    */
    public function getFilters(): ?array {
        return $this->filters;
    }

    /**
     * Gets the hiddenHits property value. The hiddenHits property
     * @return array<HideHit>|null
    */
    public function getHiddenHits(): ?array {
        return $this->hiddenHits;
    }

    /**
     * Gets the query property value. Query changes applied due to query rules.
     * @return TransformedQuery|null
    */
    public function getQuery(): ?TransformedQuery {
        return $this->query;
    }

    /**
     * Gets the returnNoData property value. Indicates if no data consequence is activated.
     * @return ReturnNoData|null
    */
    public function getReturnNoData(): ?ReturnNoData {
        return $this->returnNoData;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('boostFilters', $this->getBoostFilters());
        $writer->writeCollectionOfObjectValues('filters', $this->getFilters());
        $writer->writeCollectionOfObjectValues('hiddenHits', $this->getHiddenHits());
        $writer->writeObjectValue('query', $this->getQuery());
        $writer->writeObjectValue('returnNoData', $this->getReturnNoData());
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
     * Sets the boostFilters property value. The boostFilters property
     * @param array<ExplanationBoostFilters>|null $value Value to set for the boostFilters property.
    */
    public function setBoostFilters(?array $value): void {
        $this->boostFilters = $value;
    }

    /**
     * Sets the filters property value. The filters property
     * @param array<ExplanationFilters>|null $value Value to set for the filters property.
    */
    public function setFilters(?array $value): void {
        $this->filters = $value;
    }

    /**
     * Sets the hiddenHits property value. The hiddenHits property
     * @param array<HideHit>|null $value Value to set for the hiddenHits property.
    */
    public function setHiddenHits(?array $value): void {
        $this->hiddenHits = $value;
    }

    /**
     * Sets the query property value. Query changes applied due to query rules.
     * @param TransformedQuery|null $value Value to set for the query property.
    */
    public function setQuery(?TransformedQuery $value): void {
        $this->query = $value;
    }

    /**
     * Sets the returnNoData property value. Indicates if no data consequence is activated.
     * @param ReturnNoData|null $value Value to set for the returnNoData property.
    */
    public function setReturnNoData(?ReturnNoData $value): void {
        $this->returnNoData = $value;
    }

}
