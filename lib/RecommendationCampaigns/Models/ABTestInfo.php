<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Information whether campaign is part of an a/b test
*/
class ABTestInfo implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $experimentId Experiment ID
    */
    private ?int $experimentId = null;
    
    /**
     * @var bool|null $isBaseline Information whether campaign is a baseline.
    */
    private ?bool $isBaseline = null;
    
    /**
     * @var ABTestInfo_status|null $status Status
    */
    private ?ABTestInfo_status $status = null;
    
    /**
     * @var int|null $variantId Variant ID
    */
    private ?int $variantId = null;
    
    /**
     * Instantiates a new ABTestInfo and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ABTestInfo
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ABTestInfo {
        return new ABTestInfo();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the experimentId property value. Experiment ID
     * @return int|null
    */
    public function getExperimentId(): ?int {
        return $this->experimentId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'experimentId' => fn(ParseNode $n) => $o->setExperimentId($n->getIntegerValue()),
            'isBaseline' => fn(ParseNode $n) => $o->setIsBaseline($n->getBooleanValue()),
            'status' => fn(ParseNode $n) => $o->setStatus($n->getEnumValue(ABTestInfo_status::class)),
            'variantId' => fn(ParseNode $n) => $o->setVariantId($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the isBaseline property value. Information whether campaign is a baseline.
     * @return bool|null
    */
    public function getIsBaseline(): ?bool {
        return $this->isBaseline;
    }

    /**
     * Gets the status property value. Status
     * @return ABTestInfo_status|null
    */
    public function getStatus(): ?ABTestInfo_status {
        return $this->status;
    }

    /**
     * Gets the variantId property value. Variant ID
     * @return int|null
    */
    public function getVariantId(): ?int {
        return $this->variantId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('experimentId', $this->getExperimentId());
        $writer->writeBooleanValue('isBaseline', $this->getIsBaseline());
        $writer->writeEnumValue('status', $this->getStatus());
        $writer->writeIntegerValue('variantId', $this->getVariantId());
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
     * Sets the experimentId property value. Experiment ID
     * @param int|null $value Value to set for the experimentId property.
    */
    public function setExperimentId(?int $value): void {
        $this->experimentId = $value;
    }

    /**
     * Sets the isBaseline property value. Information whether campaign is a baseline.
     * @param bool|null $value Value to set for the isBaseline property.
    */
    public function setIsBaseline(?bool $value): void {
        $this->isBaseline = $value;
    }

    /**
     * Sets the status property value. Status
     * @param ABTestInfo_status|null $value Value to set for the status property.
    */
    public function setStatus(?ABTestInfo_status $value): void {
        $this->status = $value;
    }

    /**
     * Sets the variantId property value. Variant ID
     * @param int|null $value Value to set for the variantId property.
    */
    public function setVariantId(?int $value): void {
        $this->variantId = $value;
    }

}
