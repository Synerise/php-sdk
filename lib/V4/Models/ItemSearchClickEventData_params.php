<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions:  <span style="color:red"><strong>WARNING:</strong></span>  - If you want to send the `email` param, it must be exactly the same as the email of the profile who generated the event.  - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br>  <code>modifiedBy</code><br>  <code>apiKey</code><br>  <code>eventUUID</code><br>  <code>ip</code><br>  <code>time</code><br>  <code>businessProfileId</code>
*/
class ItemSearchClickEventData_params implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $correlationId `correlationId` of the request which this event relates to, for example a recommendation or search request (the parameter is included in the response to that request).
    */
    private ?string $correlationId = null;
    
    /**
     * @var string|null $item itemId (also called `sku`, `productId`, and `retailer_part_no` in other APIs and SDKs) of the item
    */
    private ?string $item = null;
    
    /**
     * @var int|null $position Position of the clicked item in the result list (count starts with 1)
    */
    private ?int $position = null;
    
    /**
     * @var SearchType|null $searchType Type of the search
    */
    private ?SearchType $searchType = null;
    
    /**
     * Instantiates a new ItemSearchClickEventData_params and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ItemSearchClickEventData_params
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ItemSearchClickEventData_params {
        return new ItemSearchClickEventData_params();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the correlationId property value. `correlationId` of the request which this event relates to, for example a recommendation or search request (the parameter is included in the response to that request).
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
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'item' => fn(ParseNode $n) => $o->setItem($n->getStringValue()),
            'position' => fn(ParseNode $n) => $o->setPosition($n->getIntegerValue()),
            'searchType' => fn(ParseNode $n) => $o->setSearchType($n->getEnumValue(SearchType::class)),
        ];
    }

    /**
     * Gets the item property value. itemId (also called `sku`, `productId`, and `retailer_part_no` in other APIs and SDKs) of the item
     * @return string|null
    */
    public function getItem(): ?string {
        return $this->item;
    }

    /**
     * Gets the position property value. Position of the clicked item in the result list (count starts with 1)
     * @return int|null
    */
    public function getPosition(): ?int {
        return $this->position;
    }

    /**
     * Gets the searchType property value. Type of the search
     * @return SearchType|null
    */
    public function getSearchType(): ?SearchType {
        return $this->searchType;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeStringValue('item', $this->getItem());
        $writer->writeIntegerValue('position', $this->getPosition());
        $writer->writeEnumValue('searchType', $this->getSearchType());
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
     * Sets the correlationId property value. `correlationId` of the request which this event relates to, for example a recommendation or search request (the parameter is included in the response to that request).
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the item property value. itemId (also called `sku`, `productId`, and `retailer_part_no` in other APIs and SDKs) of the item
     * @param string|null $value Value to set for the item property.
    */
    public function setItem(?string $value): void {
        $this->item = $value;
    }

    /**
     * Sets the position property value. Position of the clicked item in the result list (count starts with 1)
     * @param int|null $value Value to set for the position property.
    */
    public function setPosition(?int $value): void {
        $this->position = $value;
    }

    /**
     * Sets the searchType property value. Type of the search
     * @param SearchType|null $value Value to set for the searchType property.
    */
    public function setSearchType(?SearchType $value): void {
        $this->searchType = $value;
    }

}
