<?php

namespace Synerise\Api\Catalogs\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * This object holds the metadata of the response.
*/
class ResponseMeta implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $requestTime The processing time of the request
    */
    private ?string $requestTime = null;
    
    /**
     * @var int|null $totalCount The total number of matching values (key-value pairs; array items; objects) in the database
    */
    private ?int $totalCount = null;
    
    /**
     * Instantiates a new ResponseMeta and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ResponseMeta
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ResponseMeta {
        return new ResponseMeta();
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
            'requestTime' => fn(ParseNode $n) => $o->setRequestTime($n->getStringValue()),
            'totalCount' => fn(ParseNode $n) => $o->setTotalCount($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the requestTime property value. The processing time of the request
     * @return string|null
    */
    public function getRequestTime(): ?string {
        return $this->requestTime;
    }

    /**
     * Gets the totalCount property value. The total number of matching values (key-value pairs; array items; objects) in the database
     * @return int|null
    */
    public function getTotalCount(): ?int {
        return $this->totalCount;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('requestTime', $this->getRequestTime());
        $writer->writeIntegerValue('totalCount', $this->getTotalCount());
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
     * Sets the requestTime property value. The processing time of the request
     * @param string|null $value Value to set for the requestTime property.
    */
    public function setRequestTime(?string $value): void {
        $this->requestTime = $value;
    }

    /**
     * Sets the totalCount property value. The total number of matching values (key-value pairs; array items; objects) in the database
     * @param int|null $value Value to set for the totalCount property.
    */
    public function setTotalCount(?int $value): void {
        $this->totalCount = $value;
    }

}
