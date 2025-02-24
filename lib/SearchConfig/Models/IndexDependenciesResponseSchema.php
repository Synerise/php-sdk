<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class IndexDependenciesResponseSchema implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $dependentSuggestionIndices Array of all suggestion indices for which given index is one of the sources (but not the only source).
    */
    private ?array $dependentSuggestionIndices = null;
    
    /**
     * @var array<string>|null $strictlyDependentSuggestionIndices Array of all suggestion indices for which given index is the only source.
    */
    private ?array $strictlyDependentSuggestionIndices = null;
    
    /**
     * Instantiates a new IndexDependenciesResponseSchema and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return IndexDependenciesResponseSchema
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): IndexDependenciesResponseSchema {
        return new IndexDependenciesResponseSchema();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the dependentSuggestionIndices property value. Array of all suggestion indices for which given index is one of the sources (but not the only source).
     * @return array<string>|null
    */
    public function getDependentSuggestionIndices(): ?array {
        return $this->dependentSuggestionIndices;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'dependentSuggestionIndices' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setDependentSuggestionIndices($val);
            },
            'strictlyDependentSuggestionIndices' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setStrictlyDependentSuggestionIndices($val);
            },
        ];
    }

    /**
     * Gets the strictlyDependentSuggestionIndices property value. Array of all suggestion indices for which given index is the only source.
     * @return array<string>|null
    */
    public function getStrictlyDependentSuggestionIndices(): ?array {
        return $this->strictlyDependentSuggestionIndices;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('dependentSuggestionIndices', $this->getDependentSuggestionIndices());
        $writer->writeCollectionOfPrimitiveValues('strictlyDependentSuggestionIndices', $this->getStrictlyDependentSuggestionIndices());
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
     * Sets the dependentSuggestionIndices property value. Array of all suggestion indices for which given index is one of the sources (but not the only source).
     * @param array<string>|null $value Value to set for the dependentSuggestionIndices property.
    */
    public function setDependentSuggestionIndices(?array $value): void {
        $this->dependentSuggestionIndices = $value;
    }

    /**
     * Sets the strictlyDependentSuggestionIndices property value. Array of all suggestion indices for which given index is the only source.
     * @param array<string>|null $value Value to set for the strictlyDependentSuggestionIndices property.
    */
    public function setStrictlyDependentSuggestionIndices(?array $value): void {
        $this->strictlyDependentSuggestionIndices = $value;
    }

}
