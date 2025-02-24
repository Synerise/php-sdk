<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ProductSearchClickEventDataCompat implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $clientUUID UUID of the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
    */
    private ?string $clientUUID = null;
    
    /**
     * @var string|null $correlationId `correlationId` of the request which this event relates to, for example a recommendation or search request (the parameter is included in the response to that request).
    */
    private ?string $correlationId = null;
    
    /**
     * @var string|null $eventTimestamp Time when the event occurred, in [ISO 8601](https://wikipedia.org/wiki/ISO_8601). This time isn't affected and doesn't affect the timezone of your workspace - you can send events with a timezone different than that of the workspace. Synerise calculates the times into UTC standard when saving events in the database.If not defined, the backend inserts the time of receiving the event.A time with a "Z" at the end (for example, `2022-10-14T12:02:06Z`) denotes a time in the UTC standard.If you want to send time in a different timezone, you can do this by appending `{+|-}hh:mm` at the end of the string.  Note that if the timezone is ahead (+) of UTC, the UTC time is calculated by subtraction. When the timezone is behind (-) UTC, the UTC time is calculated by addition.  For example: - if your timezone is UTC+1, append `+01:00`. When you send `2022-10-14T15:00:000+01:00`, it is saved in the database as `2022-10-14T14:00:000Z` - if your timezone is UTC-8, append `-08:00`. When you send `2022-10-14T22:00:000-08:00`, it is saved in the database as `2022-10-15T06:00:000Z` (note that the date also changes between timezones in this example)**IMPORTANT**: If you send an event with a future time, the parameter is rejected and the time of receiving the event is saved as the occurrence time. For example, if your timezone is UTC+1 and you send the event at 15:00 local time, future times are:  - later than 15:00 local time- later than 14:00 UTCWhen you retrieve an event, its time is always shown as UTC. The original time string that you sent (even if it was a future time and was rejected) can be retrieved with the [activities](https://developers.synerise.com/DataManagement/DataManagement.html#tag/Activities) endpoints, as `snr-original-time`.
    */
    private ?string $eventTimestamp = null;
    
    /**
     * @var int|null $position Position of the clicked item in the result list (count starts with 1)
    */
    private ?int $position = null;
    
    /**
     * @var string|null $productId itemId (also called `sku`, `productId`, and `retailer_part_no` in other APIs and SDKs) of the item
    */
    private ?string $productId = null;
    
    /**
     * @var SearchType|null $searchType Type of the search
    */
    private ?SearchType $searchType = null;
    
    /**
     * Instantiates a new ProductSearchClickEventDataCompat and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProductSearchClickEventDataCompat
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProductSearchClickEventDataCompat {
        return new ProductSearchClickEventDataCompat();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the clientUUID property value. UUID of the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @return string|null
    */
    public function getClientUUID(): ?string {
        return $this->clientUUID;
    }

    /**
     * Gets the correlationId property value. `correlationId` of the request which this event relates to, for example a recommendation or search request (the parameter is included in the response to that request).
     * @return string|null
    */
    public function getCorrelationId(): ?string {
        return $this->correlationId;
    }

    /**
     * Gets the EventTimestamp property value. Time when the event occurred, in [ISO 8601](https://wikipedia.org/wiki/ISO_8601). This time isn't affected and doesn't affect the timezone of your workspace - you can send events with a timezone different than that of the workspace. Synerise calculates the times into UTC standard when saving events in the database.If not defined, the backend inserts the time of receiving the event.A time with a "Z" at the end (for example, `2022-10-14T12:02:06Z`) denotes a time in the UTC standard.If you want to send time in a different timezone, you can do this by appending `{+|-}hh:mm` at the end of the string.  Note that if the timezone is ahead (+) of UTC, the UTC time is calculated by subtraction. When the timezone is behind (-) UTC, the UTC time is calculated by addition.  For example: - if your timezone is UTC+1, append `+01:00`. When you send `2022-10-14T15:00:000+01:00`, it is saved in the database as `2022-10-14T14:00:000Z` - if your timezone is UTC-8, append `-08:00`. When you send `2022-10-14T22:00:000-08:00`, it is saved in the database as `2022-10-15T06:00:000Z` (note that the date also changes between timezones in this example)**IMPORTANT**: If you send an event with a future time, the parameter is rejected and the time of receiving the event is saved as the occurrence time. For example, if your timezone is UTC+1 and you send the event at 15:00 local time, future times are:  - later than 15:00 local time- later than 14:00 UTCWhen you retrieve an event, its time is always shown as UTC. The original time string that you sent (even if it was a future time and was rejected) can be retrieved with the [activities](https://developers.synerise.com/DataManagement/DataManagement.html#tag/Activities) endpoints, as `snr-original-time`.
     * @return string|null
    */
    public function getEventTimestamp(): ?string {
        return $this->eventTimestamp;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'clientUUID' => fn(ParseNode $n) => $o->setClientUUID($n->getStringValue()),
            'correlationId' => fn(ParseNode $n) => $o->setCorrelationId($n->getStringValue()),
            'EventTimestamp' => fn(ParseNode $n) => $o->setEventTimestamp($n->getStringValue()),
            'position' => fn(ParseNode $n) => $o->setPosition($n->getIntegerValue()),
            'productId' => fn(ParseNode $n) => $o->setProductId($n->getStringValue()),
            'searchType' => fn(ParseNode $n) => $o->setSearchType($n->getEnumValue(SearchType::class)),
        ];
    }

    /**
     * Gets the position property value. Position of the clicked item in the result list (count starts with 1)
     * @return int|null
    */
    public function getPosition(): ?int {
        return $this->position;
    }

    /**
     * Gets the productId property value. itemId (also called `sku`, `productId`, and `retailer_part_no` in other APIs and SDKs) of the item
     * @return string|null
    */
    public function getProductId(): ?string {
        return $this->productId;
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
        $writer->writeStringValue('clientUUID', $this->getClientUUID());
        $writer->writeStringValue('correlationId', $this->getCorrelationId());
        $writer->writeStringValue('EventTimestamp', $this->getEventTimestamp());
        $writer->writeIntegerValue('position', $this->getPosition());
        $writer->writeStringValue('productId', $this->getProductId());
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
     * Sets the clientUUID property value. UUID of the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @param string|null $value Value to set for the clientUUID property.
    */
    public function setClientUUID(?string $value): void {
        $this->clientUUID = $value;
    }

    /**
     * Sets the correlationId property value. `correlationId` of the request which this event relates to, for example a recommendation or search request (the parameter is included in the response to that request).
     * @param string|null $value Value to set for the correlationId property.
    */
    public function setCorrelationId(?string $value): void {
        $this->correlationId = $value;
    }

    /**
     * Sets the EventTimestamp property value. Time when the event occurred, in [ISO 8601](https://wikipedia.org/wiki/ISO_8601). This time isn't affected and doesn't affect the timezone of your workspace - you can send events with a timezone different than that of the workspace. Synerise calculates the times into UTC standard when saving events in the database.If not defined, the backend inserts the time of receiving the event.A time with a "Z" at the end (for example, `2022-10-14T12:02:06Z`) denotes a time in the UTC standard.If you want to send time in a different timezone, you can do this by appending `{+|-}hh:mm` at the end of the string.  Note that if the timezone is ahead (+) of UTC, the UTC time is calculated by subtraction. When the timezone is behind (-) UTC, the UTC time is calculated by addition.  For example: - if your timezone is UTC+1, append `+01:00`. When you send `2022-10-14T15:00:000+01:00`, it is saved in the database as `2022-10-14T14:00:000Z` - if your timezone is UTC-8, append `-08:00`. When you send `2022-10-14T22:00:000-08:00`, it is saved in the database as `2022-10-15T06:00:000Z` (note that the date also changes between timezones in this example)**IMPORTANT**: If you send an event with a future time, the parameter is rejected and the time of receiving the event is saved as the occurrence time. For example, if your timezone is UTC+1 and you send the event at 15:00 local time, future times are:  - later than 15:00 local time- later than 14:00 UTCWhen you retrieve an event, its time is always shown as UTC. The original time string that you sent (even if it was a future time and was rejected) can be retrieved with the [activities](https://developers.synerise.com/DataManagement/DataManagement.html#tag/Activities) endpoints, as `snr-original-time`.
     * @param string|null $value Value to set for the EventTimestamp property.
    */
    public function setEventTimestamp(?string $value): void {
        $this->eventTimestamp = $value;
    }

    /**
     * Sets the position property value. Position of the clicked item in the result list (count starts with 1)
     * @param int|null $value Value to set for the position property.
    */
    public function setPosition(?int $value): void {
        $this->position = $value;
    }

    /**
     * Sets the productId property value. itemId (also called `sku`, `productId`, and `retailer_part_no` in other APIs and SDKs) of the item
     * @param string|null $value Value to set for the productId property.
    */
    public function setProductId(?string $value): void {
        $this->productId = $value;
    }

    /**
     * Sets the searchType property value. Type of the search
     * @param SearchType|null $value Value to set for the searchType property.
    */
    public function setSearchType(?SearchType $value): void {
        $this->searchType = $value;
    }

}
