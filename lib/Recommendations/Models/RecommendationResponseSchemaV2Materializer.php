<?php

namespace Synerise\Api\Recommendations\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class RecommendationResponseSchemaV2Materializer implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<RecommendationResponseSchemaV2Materializer_data>|null $data Recommended items
    */
    private ?array $data = null;
    
    /**
     * @var RecommendationResponseSchemaV2Materializer_extras|null $extras Additional data
    */
    private ?RecommendationResponseSchemaV2Materializer_extras $extras = null;
    
    /**
     * Instantiates a new RecommendationResponseSchemaV2Materializer and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationResponseSchemaV2Materializer
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationResponseSchemaV2Materializer {
        return new RecommendationResponseSchemaV2Materializer();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the data property value. Recommended items
     * @return array<RecommendationResponseSchemaV2Materializer_data>|null
    */
    public function getData(): ?array {
        return $this->data;
    }

    /**
     * Gets the extras property value. Additional data
     * @return RecommendationResponseSchemaV2Materializer_extras|null
    */
    public function getExtras(): ?RecommendationResponseSchemaV2Materializer_extras {
        return $this->extras;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'data' => fn(ParseNode $n) => $o->setData($n->getCollectionOfObjectValues([RecommendationResponseSchemaV2Materializer_data::class, 'createFromDiscriminatorValue'])),
            'extras' => fn(ParseNode $n) => $o->setExtras($n->getObjectValue([RecommendationResponseSchemaV2Materializer_extras::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('data', $this->getData());
        $writer->writeObjectValue('extras', $this->getExtras());
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
     * Sets the data property value. Recommended items
     * @param array<RecommendationResponseSchemaV2Materializer_data>|null $value Value to set for the data property.
    */
    public function setData(?array $value): void {
        $this->data = $value;
    }

    /**
     * Sets the extras property value. Additional data
     * @param RecommendationResponseSchemaV2Materializer_extras|null $value Value to set for the extras property.
    */
    public function setExtras(?RecommendationResponseSchemaV2Materializer_extras $value): void {
        $this->extras = $value;
    }

}
