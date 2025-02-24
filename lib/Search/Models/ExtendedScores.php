<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Extended score factors. Only included if it is possible to gather them.
*/
class ExtendedScores implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var ExtendedScores_attributes|null $attributes The attributes property
    */
    private ?ExtendedScores_attributes $attributes = null;
    
    /**
     * @var array<ExtendedScores_boostFilters>|null $boostFilters Matched boost filters.
    */
    private ?array $boostFilters = null;
    
    /**
     * Instantiates a new ExtendedScores and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ExtendedScores
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ExtendedScores {
        return new ExtendedScores();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the attributes property value. The attributes property
     * @return ExtendedScores_attributes|null
    */
    public function getAttributes(): ?ExtendedScores_attributes {
        return $this->attributes;
    }

    /**
     * Gets the boostFilters property value. Matched boost filters.
     * @return array<ExtendedScores_boostFilters>|null
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
            'attributes' => fn(ParseNode $n) => $o->setAttributes($n->getObjectValue([ExtendedScores_attributes::class, 'createFromDiscriminatorValue'])),
            'boostFilters' => fn(ParseNode $n) => $o->setBoostFilters($n->getCollectionOfObjectValues([ExtendedScores_boostFilters::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('attributes', $this->getAttributes());
        $writer->writeCollectionOfObjectValues('boostFilters', $this->getBoostFilters());
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
     * Sets the attributes property value. The attributes property
     * @param ExtendedScores_attributes|null $value Value to set for the attributes property.
    */
    public function setAttributes(?ExtendedScores_attributes $value): void {
        $this->attributes = $value;
    }

    /**
     * Sets the boostFilters property value. Matched boost filters.
     * @param array<ExtendedScores_boostFilters>|null $value Value to set for the boostFilters property.
    */
    public function setBoostFilters(?array $value): void {
        $this->boostFilters = $value;
    }

}
