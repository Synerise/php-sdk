<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PaginationMeta_link implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var PaginationMeta_link_rel|null $rel Position of the linked page
    */
    private ?PaginationMeta_link_rel $rel = null;
    
    /**
     * @var string|null $url Page URL
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new PaginationMeta_link and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PaginationMeta_link
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PaginationMeta_link {
        return new PaginationMeta_link();
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
            'rel' => fn(ParseNode $n) => $o->setRel($n->getEnumValue(PaginationMeta_link_rel::class)),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
        ];
    }

    /**
     * Gets the rel property value. Position of the linked page
     * @return PaginationMeta_link_rel|null
    */
    public function getRel(): ?PaginationMeta_link_rel {
        return $this->rel;
    }

    /**
     * Gets the url property value. Page URL
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
        $writer->writeEnumValue('rel', $this->getRel());
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
     * Sets the rel property value. Position of the linked page
     * @param PaginationMeta_link_rel|null $value Value to set for the rel property.
    */
    public function setRel(?PaginationMeta_link_rel $value): void {
        $this->rel = $value;
    }

    /**
     * Sets the url property value. Page URL
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
