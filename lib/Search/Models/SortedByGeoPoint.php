<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SortedByGeoPoint implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var SortedByGeoPoint_ordering|null $ordering Applied ordering.
    */
    private ?SortedByGeoPoint_ordering $ordering = null;
    
    /**
     * @var string|null $point Point used to sort the items.
    */
    private ?string $point = null;
    
    /**
     * Instantiates a new SortedByGeoPoint and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SortedByGeoPoint
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SortedByGeoPoint {
        return new SortedByGeoPoint();
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
            'ordering' => fn(ParseNode $n) => $o->setOrdering($n->getEnumValue(SortedByGeoPoint_ordering::class)),
            'point' => fn(ParseNode $n) => $o->setPoint($n->getStringValue()),
        ];
    }

    /**
     * Gets the ordering property value. Applied ordering.
     * @return SortedByGeoPoint_ordering|null
    */
    public function getOrdering(): ?SortedByGeoPoint_ordering {
        return $this->ordering;
    }

    /**
     * Gets the point property value. Point used to sort the items.
     * @return string|null
    */
    public function getPoint(): ?string {
        return $this->point;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('ordering', $this->getOrdering());
        $writer->writeStringValue('point', $this->getPoint());
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
     * Sets the ordering property value. Applied ordering.
     * @param SortedByGeoPoint_ordering|null $value Value to set for the ordering property.
    */
    public function setOrdering(?SortedByGeoPoint_ordering $value): void {
        $this->ordering = $value;
    }

    /**
     * Sets the point property value. Point used to sort the items.
     * @param string|null $value Value to set for the point property.
    */
    public function setPoint(?string $value): void {
        $this->point = $value;
    }

}
