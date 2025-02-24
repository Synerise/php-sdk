<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Composed type wrapper for classes SortedByAttribute, SortedByGeoPoint, SortedByMetric
*/
class Explanation_sortDetails implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var SortedByAttribute|null $sortedByAttribute Composed type representation for type SortedByAttribute
    */
    private ?SortedByAttribute $sortedByAttribute = null;
    
    /**
     * @var SortedByGeoPoint|null $sortedByGeoPoint Composed type representation for type SortedByGeoPoint
    */
    private ?SortedByGeoPoint $sortedByGeoPoint = null;
    
    /**
     * @var SortedByMetric|null $sortedByMetric Composed type representation for type SortedByMetric
    */
    private ?SortedByMetric $sortedByMetric = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Explanation_sortDetails
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Explanation_sortDetails {
        $result = new Explanation_sortDetails();
        return $result;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getSortedByAttribute() !== null) {
            return $this->getSortedByAttribute()->getFieldDeserializers();
        } else if ($this->getSortedByGeoPoint() !== null) {
            return $this->getSortedByGeoPoint()->getFieldDeserializers();
        } else if ($this->getSortedByMetric() !== null) {
            return $this->getSortedByMetric()->getFieldDeserializers();
        }
        return [];
    }

    /**
     * Gets the SortedByAttribute property value. Composed type representation for type SortedByAttribute
     * @return SortedByAttribute|null
    */
    public function getSortedByAttribute(): ?SortedByAttribute {
        return $this->sortedByAttribute;
    }

    /**
     * Gets the SortedByGeoPoint property value. Composed type representation for type SortedByGeoPoint
     * @return SortedByGeoPoint|null
    */
    public function getSortedByGeoPoint(): ?SortedByGeoPoint {
        return $this->sortedByGeoPoint;
    }

    /**
     * Gets the SortedByMetric property value. Composed type representation for type SortedByMetric
     * @return SortedByMetric|null
    */
    public function getSortedByMetric(): ?SortedByMetric {
        return $this->sortedByMetric;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        if ($this->getSortedByAttribute() !== null) {
            $writer->writeObjectValue(null, $this->getSortedByAttribute());
        } else if ($this->getSortedByGeoPoint() !== null) {
            $writer->writeObjectValue(null, $this->getSortedByGeoPoint());
        } else if ($this->getSortedByMetric() !== null) {
            $writer->writeObjectValue(null, $this->getSortedByMetric());
        }
    }

    /**
     * Sets the SortedByAttribute property value. Composed type representation for type SortedByAttribute
     * @param SortedByAttribute|null $value Value to set for the SortedByAttribute property.
    */
    public function setSortedByAttribute(?SortedByAttribute $value): void {
        $this->sortedByAttribute = $value;
    }

    /**
     * Sets the SortedByGeoPoint property value. Composed type representation for type SortedByGeoPoint
     * @param SortedByGeoPoint|null $value Value to set for the SortedByGeoPoint property.
    */
    public function setSortedByGeoPoint(?SortedByGeoPoint $value): void {
        $this->sortedByGeoPoint = $value;
    }

    /**
     * Sets the SortedByMetric property value. Composed type representation for type SortedByMetric
     * @param SortedByMetric|null $value Value to set for the SortedByMetric property.
    */
    public function setSortedByMetric(?SortedByMetric $value): void {
        $this->sortedByMetric = $value;
    }

}
