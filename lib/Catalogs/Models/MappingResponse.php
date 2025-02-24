<?php

namespace Synerise\Api\Catalogs\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class MappingResponse implements AdditionalDataHolder, Parsable 
{
    /**
     * @var string|null $action The action property
    */
    private ?string $action = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $bagId The bagId property
    */
    private ?int $bagId = null;
    
    /**
     * @var string|null $bpActionParamKey The bpActionParamKey property
    */
    private ?string $bpActionParamKey = null;
    
    /**
     * @var array<string>|null $enrichmentFields The enrichmentFields property
    */
    private ?array $enrichmentFields = null;
    
    /**
     * @var int|null $itemId The itemId property
    */
    private ?int $itemId = null;
    
    /**
     * @var string|null $paramKey The paramKey property
    */
    private ?string $paramKey = null;
    
    /**
     * Instantiates a new MappingResponse and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return MappingResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): MappingResponse {
        return new MappingResponse();
    }

    /**
     * Gets the action property value. The action property
     * @return string|null
    */
    public function getAction(): ?string {
        return $this->action;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the bagId property value. The bagId property
     * @return int|null
    */
    public function getBagId(): ?int {
        return $this->bagId;
    }

    /**
     * Gets the bpActionParamKey property value. The bpActionParamKey property
     * @return string|null
    */
    public function getBpActionParamKey(): ?string {
        return $this->bpActionParamKey;
    }

    /**
     * Gets the enrichmentFields property value. The enrichmentFields property
     * @return array<string>|null
    */
    public function getEnrichmentFields(): ?array {
        return $this->enrichmentFields;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'action' => fn(ParseNode $n) => $o->setAction($n->getStringValue()),
            'bagId' => fn(ParseNode $n) => $o->setBagId($n->getIntegerValue()),
            'bpActionParamKey' => fn(ParseNode $n) => $o->setBpActionParamKey($n->getStringValue()),
            'enrichmentFields' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setEnrichmentFields($val);
            },
            'itemId' => fn(ParseNode $n) => $o->setItemId($n->getIntegerValue()),
            'paramKey' => fn(ParseNode $n) => $o->setParamKey($n->getStringValue()),
        ];
    }

    /**
     * Gets the itemId property value. The itemId property
     * @return int|null
    */
    public function getItemId(): ?int {
        return $this->itemId;
    }

    /**
     * Gets the paramKey property value. The paramKey property
     * @return string|null
    */
    public function getParamKey(): ?string {
        return $this->paramKey;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('action', $this->getAction());
        $writer->writeIntegerValue('bagId', $this->getBagId());
        $writer->writeStringValue('bpActionParamKey', $this->getBpActionParamKey());
        $writer->writeCollectionOfPrimitiveValues('enrichmentFields', $this->getEnrichmentFields());
        $writer->writeIntegerValue('itemId', $this->getItemId());
        $writer->writeStringValue('paramKey', $this->getParamKey());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the action property value. The action property
     * @param string|null $value Value to set for the action property.
    */
    public function setAction(?string $value): void {
        $this->action = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the bagId property value. The bagId property
     * @param int|null $value Value to set for the bagId property.
    */
    public function setBagId(?int $value): void {
        $this->bagId = $value;
    }

    /**
     * Sets the bpActionParamKey property value. The bpActionParamKey property
     * @param string|null $value Value to set for the bpActionParamKey property.
    */
    public function setBpActionParamKey(?string $value): void {
        $this->bpActionParamKey = $value;
    }

    /**
     * Sets the enrichmentFields property value. The enrichmentFields property
     * @param array<string>|null $value Value to set for the enrichmentFields property.
    */
    public function setEnrichmentFields(?array $value): void {
        $this->enrichmentFields = $value;
    }

    /**
     * Sets the itemId property value. The itemId property
     * @param int|null $value Value to set for the itemId property.
    */
    public function setItemId(?int $value): void {
        $this->itemId = $value;
    }

    /**
     * Sets the paramKey property value. The paramKey property
     * @param string|null $value Value to set for the paramKey property.
    */
    public function setParamKey(?string $value): void {
        $this->paramKey = $value;
    }

}
