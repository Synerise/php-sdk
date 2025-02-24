<?php

namespace Synerise\Api\SearchConfig\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * State of a single index
*/
class IndexStateResponseSchema implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $errorReason Reason why index was not rebuild successfully
    */
    private ?string $errorReason = null;
    
    /**
     * @var string|null $indexId ID of the index
    */
    private ?string $indexId = null;
    
    /**
     * @var DateTime|null $lastConfigChange Last update time in YYYY-MM-DDThh:mm:ssZ format (ISO 8601, UTC)
    */
    private ?DateTime $lastConfigChange = null;
    
    /**
     * @var string|null $log Error log with additional information
    */
    private ?string $log = null;
    
    /**
     * @var IndexStateSchema|null $state State of the index
    */
    private ?IndexStateSchema $state = null;
    
    /**
     * Instantiates a new IndexStateResponseSchema and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return IndexStateResponseSchema
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): IndexStateResponseSchema {
        return new IndexStateResponseSchema();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the errorReason property value. Reason why index was not rebuild successfully
     * @return string|null
    */
    public function getErrorReason(): ?string {
        return $this->errorReason;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'errorReason' => fn(ParseNode $n) => $o->setErrorReason($n->getStringValue()),
            'indexId' => fn(ParseNode $n) => $o->setIndexId($n->getStringValue()),
            'lastConfigChange' => fn(ParseNode $n) => $o->setLastConfigChange($n->getDateTimeValue()),
            'log' => fn(ParseNode $n) => $o->setLog($n->getStringValue()),
            'state' => fn(ParseNode $n) => $o->setState($n->getEnumValue(IndexStateSchema::class)),
        ];
    }

    /**
     * Gets the indexId property value. ID of the index
     * @return string|null
    */
    public function getIndexId(): ?string {
        return $this->indexId;
    }

    /**
     * Gets the lastConfigChange property value. Last update time in YYYY-MM-DDThh:mm:ssZ format (ISO 8601, UTC)
     * @return DateTime|null
    */
    public function getLastConfigChange(): ?DateTime {
        return $this->lastConfigChange;
    }

    /**
     * Gets the log property value. Error log with additional information
     * @return string|null
    */
    public function getLog(): ?string {
        return $this->log;
    }

    /**
     * Gets the state property value. State of the index
     * @return IndexStateSchema|null
    */
    public function getState(): ?IndexStateSchema {
        return $this->state;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('errorReason', $this->getErrorReason());
        $writer->writeStringValue('indexId', $this->getIndexId());
        $writer->writeDateTimeValue('lastConfigChange', $this->getLastConfigChange());
        $writer->writeStringValue('log', $this->getLog());
        $writer->writeEnumValue('state', $this->getState());
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
     * Sets the errorReason property value. Reason why index was not rebuild successfully
     * @param string|null $value Value to set for the errorReason property.
    */
    public function setErrorReason(?string $value): void {
        $this->errorReason = $value;
    }

    /**
     * Sets the indexId property value. ID of the index
     * @param string|null $value Value to set for the indexId property.
    */
    public function setIndexId(?string $value): void {
        $this->indexId = $value;
    }

    /**
     * Sets the lastConfigChange property value. Last update time in YYYY-MM-DDThh:mm:ssZ format (ISO 8601, UTC)
     * @param DateTime|null $value Value to set for the lastConfigChange property.
    */
    public function setLastConfigChange(?DateTime $value): void {
        $this->lastConfigChange = $value;
    }

    /**
     * Sets the log property value. Error log with additional information
     * @param string|null $value Value to set for the log property.
    */
    public function setLog(?string $value): void {
        $this->log = $value;
    }

    /**
     * Sets the state property value. State of the index
     * @param IndexStateSchema|null $value Value to set for the state property.
    */
    public function setState(?IndexStateSchema $value): void {
        $this->state = $value;
    }

}
