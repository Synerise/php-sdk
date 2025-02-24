<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Composed type wrapper for classes BM25Similarity, IDFSimilarity
*/
class Similarity implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var BM25Similarity|null $bM25Similarity Composed type representation for type BM25Similarity
    */
    private ?BM25Similarity $bM25Similarity = null;
    
    /**
     * @var IDFSimilarity|null $iDFSimilarity Composed type representation for type IDFSimilarity
    */
    private ?IDFSimilarity $iDFSimilarity = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Similarity
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Similarity {
        $result = new Similarity();
        return $result;
    }

    /**
     * Gets the BM25Similarity property value. Composed type representation for type BM25Similarity
     * @return BM25Similarity|null
    */
    public function getBM25Similarity(): ?BM25Similarity {
        return $this->bM25Similarity;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getBM25Similarity() !== null) {
            return $this->getBM25Similarity()->getFieldDeserializers();
        } else if ($this->getIDFSimilarity() !== null) {
            return $this->getIDFSimilarity()->getFieldDeserializers();
        }
        return [];
    }

    /**
     * Gets the IDFSimilarity property value. Composed type representation for type IDFSimilarity
     * @return IDFSimilarity|null
    */
    public function getIDFSimilarity(): ?IDFSimilarity {
        return $this->iDFSimilarity;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        if ($this->getBM25Similarity() !== null) {
            $writer->writeObjectValue(null, $this->getBM25Similarity());
        } else if ($this->getIDFSimilarity() !== null) {
            $writer->writeObjectValue(null, $this->getIDFSimilarity());
        }
    }

    /**
     * Sets the BM25Similarity property value. Composed type representation for type BM25Similarity
     * @param BM25Similarity|null $value Value to set for the BM25Similarity property.
    */
    public function setBM25Similarity(?BM25Similarity $value): void {
        $this->bM25Similarity = $value;
    }

    /**
     * Sets the IDFSimilarity property value. Composed type representation for type IDFSimilarity
     * @param IDFSimilarity|null $value Value to set for the IDFSimilarity property.
    */
    public function setIDFSimilarity(?IDFSimilarity $value): void {
        $this->iDFSimilarity = $value;
    }

}
