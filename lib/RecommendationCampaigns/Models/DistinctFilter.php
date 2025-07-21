<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Distinct filter allows to specify how many recommended items can have the same value of specified attributes.
*/
class DistinctFilter implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $elastic It allows to complete the recommended items with items which don't meet the distinct filter criteria.
    */
    private ?bool $elastic = null;
    
    /**
     * @var array<DistinctFilter_filters>|null $filters Array of distinct filters
    */
    private ?array $filters = null;
    
    /**
     * Instantiates a new DistinctFilter and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DistinctFilter
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DistinctFilter {
        return new DistinctFilter();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the elastic property value. It allows to complete the recommended items with items which don't meet the distinct filter criteria.
     * @return bool|null
    */
    public function getElastic(): ?bool {
        return $this->elastic;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'elastic' => fn(ParseNode $n) => $o->setElastic($n->getBooleanValue()),
            'filters' => fn(ParseNode $n) => $o->setFilters($n->getCollectionOfObjectValues([DistinctFilter_filters::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the filters property value. Array of distinct filters
     * @return array<DistinctFilter_filters>|null
    */
    public function getFilters(): ?array {
        return $this->filters;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('elastic', $this->getElastic());
        $writer->writeCollectionOfObjectValues('filters', $this->getFilters());
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
     * Sets the elastic property value. It allows to complete the recommended items with items which don't meet the distinct filter criteria.
     * @param bool|null $value Value to set for the elastic property.
    */
    public function setElastic(?bool $value): void {
        $this->elastic = $value;
    }

    /**
     * Sets the filters property value. Array of distinct filters
     * @param array<DistinctFilter_filters>|null $value Value to set for the filters property.
    */
    public function setFilters(?array $value): void {
        $this->filters = $value;
    }

}
