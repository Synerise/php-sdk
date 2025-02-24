<?php

namespace Synerise\Api\Catalogs\Bags\Item\Items\Download;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DownloadPostRequestBody implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $itemKey The name of the CSV column that contains unique identifiers
    */
    private ?string $itemKey = null;
    
    /**
     * @var string|null $url URL of the CSV file that you want to import
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new DownloadPostRequestBody and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DownloadPostRequestBody
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DownloadPostRequestBody {
        return new DownloadPostRequestBody();
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
            'itemKey' => fn(ParseNode $n) => $o->setItemKey($n->getStringValue()),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
        ];
    }

    /**
     * Gets the itemKey property value. The name of the CSV column that contains unique identifiers
     * @return string|null
    */
    public function getItemKey(): ?string {
        return $this->itemKey;
    }

    /**
     * Gets the url property value. URL of the CSV file that you want to import
     * @return string|null
    */
    public function getUrl(): ?string {
        return $this->url;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('itemKey', $this->getItemKey());
        $writer->writeStringValue('url', $this->getUrl());
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
     * Sets the itemKey property value. The name of the CSV column that contains unique identifiers
     * @param string|null $value Value to set for the itemKey property.
    */
    public function setItemKey(?string $value): void {
        $this->itemKey = $value;
    }

    /**
     * Sets the url property value. URL of the CSV file that you want to import
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
