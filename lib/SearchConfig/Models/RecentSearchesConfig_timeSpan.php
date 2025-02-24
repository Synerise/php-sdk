<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Defines period for which recent searches are to be returned
*/
class RecentSearchesConfig_timeSpan implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var RecentSearchesConfig_timeSpan_type|null $type One of the following time units
    */
    private ?RecentSearchesConfig_timeSpan_type $type = null;
    
    /**
     * @var int|null $value Value corresponding with the time unit
    */
    private ?int $value = null;
    
    /**
     * Instantiates a new RecentSearchesConfig_timeSpan and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecentSearchesConfig_timeSpan
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecentSearchesConfig_timeSpan {
        return new RecentSearchesConfig_timeSpan();
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
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(RecentSearchesConfig_timeSpan_type::class)),
            'value' => fn(ParseNode $n) => $o->setValue($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the type property value. One of the following time units
     * @return RecentSearchesConfig_timeSpan_type|null
    */
    public function getType(): ?RecentSearchesConfig_timeSpan_type {
        return $this->type;
    }

    /**
     * Gets the value property value. Value corresponding with the time unit
     * @return int|null
    */
    public function getValue(): ?int {
        return $this->value;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeEnumValue('type', $this->getType());
        $writer->writeIntegerValue('value', $this->getValue());
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
     * Sets the type property value. One of the following time units
     * @param RecentSearchesConfig_timeSpan_type|null $value Value to set for the type property.
    */
    public function setType(?RecentSearchesConfig_timeSpan_type $value): void {
        $this->type = $value;
    }

    /**
     * Sets the value property value. Value corresponding with the time unit
     * @param int|null $value Value to set for the value property.
    */
    public function setValue(?int $value): void {
        $this->value = $value;
    }

}
