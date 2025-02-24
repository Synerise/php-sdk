<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SortedByMetric implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var SortedByMetric_metric|null $metric Metric used to sort the items.
    */
    private ?SortedByMetric_metric $metric = null;
    
    /**
     * @var SortedByMetric_ordering|null $ordering Applied ordering.
    */
    private ?SortedByMetric_ordering $ordering = null;
    
    /**
     * Instantiates a new SortedByMetric and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SortedByMetric
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SortedByMetric {
        return new SortedByMetric();
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
            'metric' => fn(ParseNode $n) => $o->setMetric($n->getEnumValue(SortedByMetric_metric::class)),
            'ordering' => fn(ParseNode $n) => $o->setOrdering($n->getEnumValue(SortedByMetric_ordering::class)),
        ];
    }

    /**
     * Gets the metric property value. Metric used to sort the items.
     * @return SortedByMetric_metric|null
    */
    public function getMetric(): ?SortedByMetric_metric {
        return $this->metric;
    }

    /**
     * Gets the ordering property value. Applied ordering.
     * @return SortedByMetric_ordering|null
    */
    public function getOrdering(): ?SortedByMetric_ordering {
        return $this->ordering;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('metric', $this->getMetric());
        $writer->writeEnumValue('ordering', $this->getOrdering());
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
     * Sets the metric property value. Metric used to sort the items.
     * @param SortedByMetric_metric|null $value Value to set for the metric property.
    */
    public function setMetric(?SortedByMetric_metric $value): void {
        $this->metric = $value;
    }

    /**
     * Sets the ordering property value. Applied ordering.
     * @param SortedByMetric_ordering|null $value Value to set for the ordering property.
    */
    public function setOrdering(?SortedByMetric_ordering $value): void {
        $this->ordering = $value;
    }

}
