<?php

namespace Synerise\Api\Recommendations\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Additional data
*/
class RecommendationResponseSchemaV2Materializer_extras implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<RecommendationResponseSchemaV2Materializer_extras_contextItems>|null $contextItems A list of context items provided in request
    */
    private ?array $contextItems = null;
    
    /**
     * @var string|null $correlationId Correlation identifier of a recommendation request
    */
    private ?string $correlationId = null;
    
    /**
     * @var array<RecommendationResponseSchemaV2Materializer_extras_slots>|null $slots A list of slots data
    */
    private ?array $slots = null;
    
    /**
     * Instantiates a new RecommendationResponseSchemaV2Materializer_extras and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationResponseSchemaV2Materializer_extras
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationResponseSchemaV2Materializer_extras {
        return new RecommendationResponseSchemaV2Materializer_extras();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the contextItems property value. A list of context items provided in request
     * @return array<RecommendationResponseSchemaV2Materializer_extras_contextItems>|null
    */
    public function getContextItems(): ?array {
        return $this->contextItems;
    }

    /**
     * Gets the correlationId property value. Correlation identifier of a recommendation request
     * @return string|null
    */
    public function getCorrelationId(): ?string {
        return $this->correlationId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'contextItems' => fn(ParseNode $n) => $o->setContextItems($n->getCollectionOfObjectValues([RecommendationResponseSchemaV2Materializer_extras_contextItems::class, 'createFromDiscriminatorValue'])),
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'slots' => fn(ParseNode $n) => $o->setSlots($n->getCollectionOfObjectValues([RecommendationResponseSchemaV2Materializer_extras_slots::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the slots property value. A list of slots data
     * @return array<RecommendationResponseSchemaV2Materializer_extras_slots>|null
    */
    public function getSlots(): ?array {
        return $this->slots;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('contextItems', $this->getContextItems());
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeCollectionOfObjectValues('slots', $this->getSlots());
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
     * Sets the contextItems property value. A list of context items provided in request
     * @param array<RecommendationResponseSchemaV2Materializer_extras_contextItems>|null $value Value to set for the contextItems property.
    */
    public function setContextItems(?array $value): void {
        $this->contextItems = $value;
    }

    /**
     * Sets the correlationId property value. Correlation identifier of a recommendation request
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the slots property value. A list of slots data
     * @param array<RecommendationResponseSchemaV2Materializer_extras_slots>|null $value Value to set for the slots property.
    */
    public function setSlots(?array $value): void {
        $this->slots = $value;
    }

}
