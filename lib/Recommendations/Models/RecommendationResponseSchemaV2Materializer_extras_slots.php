<?php

namespace Synerise\Api\Recommendations\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class RecommendationResponseSchemaV2Materializer_extras_slots implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var SlotError|null $error Error details, if applicable
    */
    private ?SlotError $error = null;
    
    /**
     * @var int|null $id Slot identifier. Matches the index (zero-based numbering) of the slot provided in request
    */
    private ?int $id = null;
    
    /**
     * @var array<string>|null $itemIds A list of item ids that meet the slot criteria
    */
    private ?array $itemIds = null;
    
    /**
     * @var string|null $name Slot name provided in request
    */
    private ?string $name = null;
    
    /**
     * Instantiates a new RecommendationResponseSchemaV2Materializer_extras_slots and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationResponseSchemaV2Materializer_extras_slots
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationResponseSchemaV2Materializer_extras_slots {
        return new RecommendationResponseSchemaV2Materializer_extras_slots();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the error property value. Error details, if applicable
     * @return SlotError|null
    */
    public function getError(): ?SlotError {
        return $this->error;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'error' => fn(ParseNode $n) => $o->setError($n->getObjectValue([SlotError::class, 'createFromDiscriminatorValue'])),
            'id' => fn(ParseNode $n) => $o->setId($n->getIntegerValue()),
            'itemIds' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setItemIds($val);
            },
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
        ];
    }

    /**
     * Gets the id property value. Slot identifier. Matches the index (zero-based numbering) of the slot provided in request
     * @return int|null
    */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * Gets the itemIds property value. A list of item ids that meet the slot criteria
     * @return array<string>|null
    */
    public function getItemIds(): ?array {
        return $this->itemIds;
    }

    /**
     * Gets the name property value. Slot name provided in request
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('error', $this->getError());
        $writer->writeIntegerValue('id', $this->getId());
        $writer->writeCollectionOfPrimitiveValues('itemIds', $this->getItemIds());
        $writer->writeStringValue('name', $this->getName());
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
     * Sets the error property value. Error details, if applicable
     * @param SlotError|null $value Value to set for the error property.
    */
    public function setError(?SlotError $value): void {
        $this->error = $value;
    }

    /**
     * Sets the id property value. Slot identifier. Matches the index (zero-based numbering) of the slot provided in request
     * @param int|null $value Value to set for the id property.
    */
    public function setId(?int $value): void {
        $this->id = $value;
    }

    /**
     * Sets the itemIds property value. A list of item ids that meet the slot criteria
     * @param array<string>|null $value Value to set for the itemIds property.
    */
    public function setItemIds(?array $value): void {
        $this->itemIds = $value;
    }

    /**
     * Sets the name property value. Slot name provided in request
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

}
