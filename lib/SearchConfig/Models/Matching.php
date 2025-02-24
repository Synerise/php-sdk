<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Composed type wrapper for classes AdaptiveMatching, AllMatching, AnyMatching, MaximumNotMatching, MinimumMatching
*/
class Matching implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var AdaptiveMatching|null $adaptiveMatching Composed type representation for type AdaptiveMatching
    */
    private ?AdaptiveMatching $adaptiveMatching = null;
    
    /**
     * @var AllMatching|null $allMatching Composed type representation for type AllMatching
    */
    private ?AllMatching $allMatching = null;
    
    /**
     * @var AnyMatching|null $anyMatching Composed type representation for type AnyMatching
    */
    private ?AnyMatching $anyMatching = null;
    
    /**
     * @var MaximumNotMatching|null $maximumNotMatching Composed type representation for type MaximumNotMatching
    */
    private ?MaximumNotMatching $maximumNotMatching = null;
    
    /**
     * @var MinimumMatching|null $minimumMatching Composed type representation for type MinimumMatching
    */
    private ?MinimumMatching $minimumMatching = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Matching
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Matching {
        $result = new Matching();
        return $result;
    }

    /**
     * Gets the AdaptiveMatching property value. Composed type representation for type AdaptiveMatching
     * @return AdaptiveMatching|null
    */
    public function getAdaptiveMatching(): ?AdaptiveMatching {
        return $this->adaptiveMatching;
    }

    /**
     * Gets the AllMatching property value. Composed type representation for type AllMatching
     * @return AllMatching|null
    */
    public function getAllMatching(): ?AllMatching {
        return $this->allMatching;
    }

    /**
     * Gets the AnyMatching property value. Composed type representation for type AnyMatching
     * @return AnyMatching|null
    */
    public function getAnyMatching(): ?AnyMatching {
        return $this->anyMatching;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getAdaptiveMatching() !== null) {
            return $this->getAdaptiveMatching()->getFieldDeserializers();
        } else if ($this->getAllMatching() !== null) {
            return $this->getAllMatching()->getFieldDeserializers();
        } else if ($this->getAnyMatching() !== null) {
            return $this->getAnyMatching()->getFieldDeserializers();
        } else if ($this->getMaximumNotMatching() !== null) {
            return $this->getMaximumNotMatching()->getFieldDeserializers();
        } else if ($this->getMinimumMatching() !== null) {
            return $this->getMinimumMatching()->getFieldDeserializers();
        }
        return [];
    }

    /**
     * Gets the MaximumNotMatching property value. Composed type representation for type MaximumNotMatching
     * @return MaximumNotMatching|null
    */
    public function getMaximumNotMatching(): ?MaximumNotMatching {
        return $this->maximumNotMatching;
    }

    /**
     * Gets the MinimumMatching property value. Composed type representation for type MinimumMatching
     * @return MinimumMatching|null
    */
    public function getMinimumMatching(): ?MinimumMatching {
        return $this->minimumMatching;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        if ($this->getAdaptiveMatching() !== null) {
            $writer->writeObjectValue(null, $this->getAdaptiveMatching());
        } else if ($this->getAllMatching() !== null) {
            $writer->writeObjectValue(null, $this->getAllMatching());
        } else if ($this->getAnyMatching() !== null) {
            $writer->writeObjectValue(null, $this->getAnyMatching());
        } else if ($this->getMaximumNotMatching() !== null) {
            $writer->writeObjectValue(null, $this->getMaximumNotMatching());
        } else if ($this->getMinimumMatching() !== null) {
            $writer->writeObjectValue(null, $this->getMinimumMatching());
        }
    }

    /**
     * Sets the AdaptiveMatching property value. Composed type representation for type AdaptiveMatching
     * @param AdaptiveMatching|null $value Value to set for the AdaptiveMatching property.
    */
    public function setAdaptiveMatching(?AdaptiveMatching $value): void {
        $this->adaptiveMatching = $value;
    }

    /**
     * Sets the AllMatching property value. Composed type representation for type AllMatching
     * @param AllMatching|null $value Value to set for the AllMatching property.
    */
    public function setAllMatching(?AllMatching $value): void {
        $this->allMatching = $value;
    }

    /**
     * Sets the AnyMatching property value. Composed type representation for type AnyMatching
     * @param AnyMatching|null $value Value to set for the AnyMatching property.
    */
    public function setAnyMatching(?AnyMatching $value): void {
        $this->anyMatching = $value;
    }

    /**
     * Sets the MaximumNotMatching property value. Composed type representation for type MaximumNotMatching
     * @param MaximumNotMatching|null $value Value to set for the MaximumNotMatching property.
    */
    public function setMaximumNotMatching(?MaximumNotMatching $value): void {
        $this->maximumNotMatching = $value;
    }

    /**
     * Sets the MinimumMatching property value. Composed type representation for type MinimumMatching
     * @param MinimumMatching|null $value Value to set for the MinimumMatching property.
    */
    public function setMinimumMatching(?MinimumMatching $value): void {
        $this->minimumMatching = $value;
    }

}
