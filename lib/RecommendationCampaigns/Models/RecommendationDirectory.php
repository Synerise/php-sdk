<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class RecommendationDirectory implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $createdAt Date when the directory was created
    */
    private ?string $createdAt = null;
    
    /**
     * @var string|null $directoryId Directory ID
    */
    private ?string $directoryId = null;
    
    /**
     * @var bool|null $isDefault Campaign type
    */
    private ?bool $isDefault = null;
    
    /**
     * @var string|null $title Directory name
    */
    private ?string $title = null;
    
    /**
     * @var string|null $updatedAt Date when the directory was last updated
    */
    private ?string $updatedAt = null;
    
    /**
     * Instantiates a new RecommendationDirectory and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationDirectory
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationDirectory {
        return new RecommendationDirectory();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the createdAt property value. Date when the directory was created
     * @return string|null
    */
    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }

    /**
     * Gets the directoryId property value. Directory ID
     * @return string|null
    */
    public function getDirectoryId(): ?string {
        return $this->directoryId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'createdAt' => fn(ParseNode $n) => $o->setCreatedAt($n->getStringValue()),
            'directoryId' => fn(ParseNode $n) => $o->setDirectoryId($n->getStringValue()),
            'isDefault' => fn(ParseNode $n) => $o->setIsDefault($n->getBooleanValue()),
            'title' => fn(ParseNode $n) => $o->setTitle($n->getStringValue()),
            'updatedAt' => fn(ParseNode $n) => $o->setUpdatedAt($n->getStringValue()),
        ];
    }

    /**
     * Gets the isDefault property value. Campaign type
     * @return bool|null
    */
    public function getIsDefault(): ?bool {
        return $this->isDefault;
    }

    /**
     * Gets the title property value. Directory name
     * @return string|null
    */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * Gets the updatedAt property value. Date when the directory was last updated
     * @return string|null
    */
    public function getUpdatedAt(): ?string {
        return $this->updatedAt;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('createdAt', $this->getCreatedAt());
        $writer->writeStringValue('directoryId', $this->getDirectoryId());
        $writer->writeBooleanValue('isDefault', $this->getIsDefault());
        $writer->writeStringValue('title', $this->getTitle());
        $writer->writeStringValue('updatedAt', $this->getUpdatedAt());
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
     * Sets the createdAt property value. Date when the directory was created
     * @param string|null $value Value to set for the createdAt property.
    */
    public function setCreatedAt(?string $value): void {
        $this->createdAt = $value;
    }

    /**
     * Sets the directoryId property value. Directory ID
     * @param string|null $value Value to set for the directoryId property.
    */
    public function setDirectoryId(?string $value): void {
        $this->directoryId = $value;
    }

    /**
     * Sets the isDefault property value. Campaign type
     * @param bool|null $value Value to set for the isDefault property.
    */
    public function setIsDefault(?bool $value): void {
        $this->isDefault = $value;
    }

    /**
     * Sets the title property value. Directory name
     * @param string|null $value Value to set for the title property.
    */
    public function setTitle(?string $value): void {
        $this->title = $value;
    }

    /**
     * Sets the updatedAt property value. Date when the directory was last updated
     * @param string|null $value Value to set for the updatedAt property.
    */
    public function setUpdatedAt(?string $value): void {
        $this->updatedAt = $value;
    }

}
