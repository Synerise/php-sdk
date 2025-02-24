<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class FinalQuery_synonyms implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $synonyms List of the synonyms.
    */
    private ?array $synonyms = null;
    
    /**
     * @var string|null $word Phrase that the synonyms relate to.
    */
    private ?string $word = null;
    
    /**
     * Instantiates a new FinalQuery_synonyms and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return FinalQuery_synonyms
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): FinalQuery_synonyms {
        return new FinalQuery_synonyms();
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
            'synonyms' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setSynonyms($val);
            },
            'word' => fn(ParseNode $n) => $o->setWord($n->getStringValue()),
        ];
    }

    /**
     * Gets the synonyms property value. List of the synonyms.
     * @return array<string>|null
    */
    public function getSynonyms(): ?array {
        return $this->synonyms;
    }

    /**
     * Gets the word property value. Phrase that the synonyms relate to.
     * @return string|null
    */
    public function getWord(): ?string {
        return $this->word;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('synonyms', $this->getSynonyms());
        $writer->writeStringValue('word', $this->getWord());
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
     * Sets the synonyms property value. List of the synonyms.
     * @param array<string>|null $value Value to set for the synonyms property.
    */
    public function setSynonyms(?array $value): void {
        $this->synonyms = $value;
    }

    /**
     * Sets the word property value. Phrase that the synonyms relate to.
     * @param string|null $value Value to set for the word property.
    */
    public function setWord(?string $value): void {
        $this->word = $value;
    }

}
