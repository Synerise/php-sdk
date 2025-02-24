<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

/**
 * The attributes that are taken into account as full text search terms
*/
class SearchableAttributesSchema implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<string>|null $fullText The least important parameters
    */
    private ?array $fullText = null;
    
    /**
     * @var array<string>|null $fullTextBoosted Medium-importance parameters
    */
    private ?array $fullTextBoosted = null;
    
    /**
     * @var array<string>|null $fullTextStronglyBoosted The most important parameters
    */
    private ?array $fullTextStronglyBoosted = null;
    
    /**
     * Instantiates a new SearchableAttributesSchema and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SearchableAttributesSchema
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SearchableAttributesSchema {
        return new SearchableAttributesSchema();
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
            'fullText' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setFullText($val);
            },
            'fullTextBoosted' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setFullTextBoosted($val);
            },
            'fullTextStronglyBoosted' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setFullTextStronglyBoosted($val);
            },
        ];
    }

    /**
     * Gets the fullText property value. The least important parameters
     * @return array<string>|null
    */
    public function getFullText(): ?array {
        return $this->fullText;
    }

    /**
     * Gets the fullTextBoosted property value. Medium-importance parameters
     * @return array<string>|null
    */
    public function getFullTextBoosted(): ?array {
        return $this->fullTextBoosted;
    }

    /**
     * Gets the fullTextStronglyBoosted property value. The most important parameters
     * @return array<string>|null
    */
    public function getFullTextStronglyBoosted(): ?array {
        return $this->fullTextStronglyBoosted;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfPrimitiveValues('fullText', $this->getFullText());
        $writer->writeCollectionOfPrimitiveValues('fullTextBoosted', $this->getFullTextBoosted());
        $writer->writeCollectionOfPrimitiveValues('fullTextStronglyBoosted', $this->getFullTextStronglyBoosted());
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
     * Sets the fullText property value. The least important parameters
     * @param array<string>|null $value Value to set for the fullText property.
    */
    public function setFullText(?array $value): void {
        $this->fullText = $value;
    }

    /**
     * Sets the fullTextBoosted property value. Medium-importance parameters
     * @param array<string>|null $value Value to set for the fullTextBoosted property.
    */
    public function setFullTextBoosted(?array $value): void {
        $this->fullTextBoosted = $value;
    }

    /**
     * Sets the fullTextStronglyBoosted property value. The most important parameters
     * @param array<string>|null $value Value to set for the fullTextStronglyBoosted property.
    */
    public function setFullTextStronglyBoosted(?array $value): void {
        $this->fullTextStronglyBoosted = $value;
    }

}
