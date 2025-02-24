<?php

namespace Synerise\Api\Catalogs\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Metadata of the catalog that includes the entry
*/
class Item_bag implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $author ID of the catalog's creator
    */
    private ?string $author = null;
    
    /**
     * @var int|null $businessProfileId ID of the Business Profile that contains this catalog
    */
    private ?int $businessProfileId = null;
    
    /**
     * @var DateTime|null $creationDate Creation date
    */
    private ?DateTime $creationDate = null;
    
    /**
     * @var string|null $id Catalog ID
    */
    private ?string $id = null;
    
    /**
     * @var DateTime|null $lastModified Last modification date
    */
    private ?DateTime $lastModified = null;
    
    /**
     * @var array<MappingResponse>|null $mappings The mappings property
    */
    private ?array $mappings = null;
    
    /**
     * @var string|null $name Catalog name
    */
    private ?string $name = null;
    
    /**
     * @var PrimaryKey|null $primaryKey The primaryKey property
    */
    private ?PrimaryKey $primaryKey = null;
    
    /**
     * Instantiates a new Item_bag and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Item_bag
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Item_bag {
        return new Item_bag();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the author property value. ID of the catalog's creator
     * @return string|null
    */
    public function getAuthor(): ?string {
        return $this->author;
    }

    /**
     * Gets the businessProfileId property value. ID of the Business Profile that contains this catalog
     * @return int|null
    */
    public function getBusinessProfileId(): ?int {
        return $this->businessProfileId;
    }

    /**
     * Gets the creationDate property value. Creation date
     * @return DateTime|null
    */
    public function getCreationDate(): ?DateTime {
        return $this->creationDate;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'author' => fn(ParseNode $n) => $o->setAuthor($n->getStringValue()),
            'businessProfileId' => fn(ParseNode $n) => $o->setBusinessProfileId($n->getIntegerValue()),
            'creationDate' => fn(ParseNode $n) => $o->setCreationDate($n->getDateTimeValue()),
            'id' => fn(ParseNode $n) => $o->setId($n->getStringValue()),
            'lastModified' => fn(ParseNode $n) => $o->setLastModified($n->getDateTimeValue()),
            'mappings' => fn(ParseNode $n) => $o->setMappings($n->getCollectionOfObjectValues([MappingResponse::class, 'createFromDiscriminatorValue'])),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'primaryKey' => fn(ParseNode $n) => $o->setPrimaryKey($n->getObjectValue([PrimaryKey::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the id property value. Catalog ID
     * @return string|null
    */
    public function getId(): ?string {
        return $this->id;
    }

    /**
     * Gets the lastModified property value. Last modification date
     * @return DateTime|null
    */
    public function getLastModified(): ?DateTime {
        return $this->lastModified;
    }

    /**
     * Gets the mappings property value. The mappings property
     * @return array<MappingResponse>|null
    */
    public function getMappings(): ?array {
        return $this->mappings;
    }

    /**
     * Gets the name property value. Catalog name
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the primaryKey property value. The primaryKey property
     * @return PrimaryKey|null
    */
    public function getPrimaryKey(): ?PrimaryKey {
        return $this->primaryKey;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('author', $this->getAuthor());
        $writer->writeIntegerValue('businessProfileId', $this->getBusinessProfileId());
        $writer->writeDateTimeValue('creationDate', $this->getCreationDate());
        $writer->writeStringValue('id', $this->getId());
        $writer->writeDateTimeValue('lastModified', $this->getLastModified());
        $writer->writeCollectionOfObjectValues('mappings', $this->getMappings());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeObjectValue('primaryKey', $this->getPrimaryKey());
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
     * Sets the author property value. ID of the catalog's creator
     * @param string|null $value Value to set for the author property.
    */
    public function setAuthor(?string $value): void {
        $this->author = $value;
    }

    /**
     * Sets the businessProfileId property value. ID of the Business Profile that contains this catalog
     * @param int|null $value Value to set for the businessProfileId property.
    */
    public function setBusinessProfileId(?int $value): void {
        $this->businessProfileId = $value;
    }

    /**
     * Sets the creationDate property value. Creation date
     * @param DateTime|null $value Value to set for the creationDate property.
    */
    public function setCreationDate(?DateTime $value): void {
        $this->creationDate = $value;
    }

    /**
     * Sets the id property value. Catalog ID
     * @param string|null $value Value to set for the id property.
    */
    public function setId(?string $value): void {
        $this->id = $value;
    }

    /**
     * Sets the lastModified property value. Last modification date
     * @param DateTime|null $value Value to set for the lastModified property.
    */
    public function setLastModified(?DateTime $value): void {
        $this->lastModified = $value;
    }

    /**
     * Sets the mappings property value. The mappings property
     * @param array<MappingResponse>|null $value Value to set for the mappings property.
    */
    public function setMappings(?array $value): void {
        $this->mappings = $value;
    }

    /**
     * Sets the name property value. Catalog name
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the primaryKey property value. The primaryKey property
     * @param PrimaryKey|null $value Value to set for the primaryKey property.
    */
    public function setPrimaryKey(?PrimaryKey $value): void {
        $this->primaryKey = $value;
    }

}
