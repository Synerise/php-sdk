<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Enhanced TF-IDF scoring model
*/
class BM25Similarity implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var float|null $b Controls to what degree document length normalizes tf values
    */
    private ?float $b = null;
    
    /**
     * @var float|null $k1 Controls non-linear term frequency normalization (saturation)
    */
    private ?float $k1 = null;
    
    /**
     * @var BM25Similarity_type|null $type The type property
    */
    private ?BM25Similarity_type $type = null;
    
    /**
     * Instantiates a new BM25Similarity and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BM25Similarity
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BM25Similarity {
        return new BM25Similarity();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the b property value. Controls to what degree document length normalizes tf values
     * @return float|null
    */
    public function getB(): ?float {
        return $this->b;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'b' => fn(ParseNode $n) => $o->setB($n->getFloatValue()),
            'k1' => fn(ParseNode $n) => $o->setK1($n->getFloatValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(BM25Similarity_type::class)),
        ];
    }

    /**
     * Gets the k1 property value. Controls non-linear term frequency normalization (saturation)
     * @return float|null
    */
    public function getK1(): ?float {
        return $this->k1;
    }

    /**
     * Gets the type property value. The type property
     * @return BM25Similarity_type|null
    */
    public function getType(): ?BM25Similarity_type {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeFloatValue('b', $this->getB());
        $writer->writeFloatValue('k1', $this->getK1());
        $writer->writeEnumValue('type', $this->getType());
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
     * Sets the b property value. Controls to what degree document length normalizes tf values
     * @param float|null $value Value to set for the b property.
    */
    public function setB(?float $value): void {
        $this->b = $value;
    }

    /**
     * Sets the k1 property value. Controls non-linear term frequency normalization (saturation)
     * @param float|null $value Value to set for the k1 property.
    */
    public function setK1(?float $value): void {
        $this->k1 = $value;
    }

    /**
     * Sets the type property value. The type property
     * @param BM25Similarity_type|null $value Value to set for the type property.
    */
    public function setType(?BM25Similarity_type $value): void {
        $this->type = $value;
    }

}
