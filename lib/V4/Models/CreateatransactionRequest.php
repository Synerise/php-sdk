<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class CreateatransactionRequest implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var Client|null $client You must provide at least one of those profile identifiers.
    */
    private ?Client $client = null;
    
    /**
     * @var CreateatransactionRequest_discountAmount|null $discountAmount How much the total cost decreased
    */
    private ?CreateatransactionRequest_discountAmount $discountAmount = null;
    
    /**
     * @var string|null $eventSalt When an event has an `eventSalt`, it can be overwritten by sending another event.`eventSalt` must be unique in a workspace. An example of creating a salt is by generating a UUID or concatenating the profile ID, event's name, and timestamp, including milliseconds. This creates a value whose possibility of being duplicated is practically zero.To overwrite an event with another one, the new event MUST:- have the same `eventSalt` as the original event- have the same date and time as the original event (If the date and time don't match the original event, event salt doesn't have any effect.)- belong to the same `clientId` as the original event- have the same action (event name) as the original event------**IMPORTANT**:  - DO NOT send the same `eventSalt` to different profiles!- DO NOT send the same `eventSalt` with a different action!- Pay attention to timezones - more details in the description of the `time` property (in v4/transactions events, it's called `recordedAt`).- If you send a future time in an event, it is rejected and the current time is assigned automatically. This means it's impossible to use event salt with future times.- Overwriting an event by using the event salt doesn't trigger automations.- An event without an `eventSalt` can't be overwritten. The parameter cannot be added to an event at a later time.- The parameter can't be retrieved later. You must keep track of the values that you send.  
    */
    private ?string $eventSalt = null;
    
    /**
     * @var TransactionMeta|null $metadata Any custom parameters
    */
    private ?TransactionMeta $metadata = null;
    
    /**
     * @var string|null $orderId ID of the transaction.If you want to be able to overwrite this transaction in the future, you use `eventSalt`. If you send a transaction with the same `orderId` multiple times, the system generates multiple transaction events.
    */
    private ?string $orderId = null;
    
    /**
     * @var PaymentInfo|null $paymentInfo Payment details
    */
    private ?PaymentInfo $paymentInfo = null;
    
    /**
     * @var array<Product>|null $products A list of items in the transaction.Each item creates a `product.buy` event. The UUID of that event is generated from a combination of:  - the UUID of the `transaction.charge` event created by the transaction  - the position of the item in this array. This has an effect on updating transaction events. This means that when you update a transaction (a transaction can only be updated if it has an `eventSalt` and the same timestamp as the original), you must keep the original order of items in the array. Otherwise, you may accidentally overwrite a `product.buy` event with another item's event. The system does NOT recognize the item by SKU in this case.**Example**:  1. You create a transaction with items A, B, and C (in that order).  2. You update the transaction and the items are now A, B, D, and C (in that order).  3. Because item D took the position of C in the event, it has the same UUID as C had earlier. The event of D overwrites the event of C, and C is generated as a new event.Additionally, because events can't be deleted from the database, cancelled items remain as events in a Profile's history. You can use a custom free-form property to tag items as cancelled. This way, you can keep cancelled items in `products` when updating a transaction without breaking the order of items. You can also use the property to filter cancelled items out in Analytics.
    */
    private ?array $products = null;
    
    /**
     * @var string|null $recordedAt Time when the event occurred, in [ISO 8601](https://wikipedia.org/wiki/ISO_8601). This time isn't affected and doesn't affect the timezone of your workspace - you can send events with a timezone different than that of the workspace. Synerise calculates the times into UTC standard when saving events in the database.If not defined, the backend inserts the time of receiving the event.A time with a "Z" at the end (for example, `2022-10-14T12:02:06Z`) denotes a time in the UTC standard.If you want to send time in a different timezone, you can do this by appending `{+|-}hh:mm` at the end of the string.  Note that if the timezone is ahead (+) of UTC, the UTC time is calculated by subtraction. When the timezone is behind (-) UTC, the UTC time is calculated by addition.  For example: - if your timezone is UTC+1, append `+01:00`. When you send `2022-10-14T15:00:000+01:00`, it is saved in the database as `2022-10-14T14:00:000Z` - if your timezone is UTC-8, append `-08:00`. When you send `2022-10-14T22:00:000-08:00`, it is saved in the database as `2022-10-15T06:00:000Z` (note that the date also changes between timezones in this example)**IMPORTANT**: If you send an event with a future time, the parameter is rejected and the time of receiving the event is saved as the occurrence time. For example, if your timezone is UTC+1 and you send the event at 15:00 local time, future times are:  - later than 15:00 local time- later than 14:00 UTCWhen you retrieve an event, its time is always shown as UTC. The original time string that you sent (even if it was a future time and was rejected) can be retrieved with the [activities](https://developers.synerise.com/DataManagement/DataManagement.html#tag/Activities) endpoints, as `snr-original-time`.
    */
    private ?string $recordedAt = null;
    
    /**
     * @var CreateatransactionRequest_revenue|null $revenue Transaction revenue (amount after taxation). This field is not calculated automatically by the backend, you must provide the value by summing up the results of `finalUnitPrice * quantity` from all items in the `products` array.
    */
    private ?CreateatransactionRequest_revenue $revenue = null;
    
    /**
     * @var EventSource|null $source Source of the event. 
    */
    private ?EventSource $source = null;
    
    /**
     * @var CreateatransactionRequest_value|null $value If you want to display the price before taxation, use this object. If you only want to display the price after taxation, set the values to the same as in `revenue`.
    */
    private ?CreateatransactionRequest_value $value = null;
    
    /**
     * Instantiates a new CreateatransactionRequest and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CreateatransactionRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CreateatransactionRequest {
        return new CreateatransactionRequest();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the client property value. You must provide at least one of those profile identifiers.
     * @return Client|null
    */
    public function getClient(): ?Client {
        return $this->client;
    }

    /**
     * Gets the discountAmount property value. How much the total cost decreased
     * @return CreateatransactionRequest_discountAmount|null
    */
    public function getDiscountAmount(): ?CreateatransactionRequest_discountAmount {
        return $this->discountAmount;
    }

    /**
     * Gets the eventSalt property value. When an event has an `eventSalt`, it can be overwritten by sending another event.`eventSalt` must be unique in a workspace. An example of creating a salt is by generating a UUID or concatenating the profile ID, event's name, and timestamp, including milliseconds. This creates a value whose possibility of being duplicated is practically zero.To overwrite an event with another one, the new event MUST:- have the same `eventSalt` as the original event- have the same date and time as the original event (If the date and time don't match the original event, event salt doesn't have any effect.)- belong to the same `clientId` as the original event- have the same action (event name) as the original event------**IMPORTANT**:  - DO NOT send the same `eventSalt` to different profiles!- DO NOT send the same `eventSalt` with a different action!- Pay attention to timezones - more details in the description of the `time` property (in v4/transactions events, it's called `recordedAt`).- If you send a future time in an event, it is rejected and the current time is assigned automatically. This means it's impossible to use event salt with future times.- Overwriting an event by using the event salt doesn't trigger automations.- An event without an `eventSalt` can't be overwritten. The parameter cannot be added to an event at a later time.- The parameter can't be retrieved later. You must keep track of the values that you send.  
     * @return string|null
    */
    public function getEventSalt(): ?string {
        return $this->eventSalt;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'client' => fn(ParseNode $n) => $o->setClient($n->getObjectValue([Client::class, 'createFromDiscriminatorValue'])),
            'discountAmount' => fn(ParseNode $n) => $o->setDiscountAmount($n->getObjectValue([CreateatransactionRequest_discountAmount::class, 'createFromDiscriminatorValue'])),
            'eventSalt' => fn(ParseNode $n) => $o->setEventSalt($n->getStringValue()),
            'metadata' => fn(ParseNode $n) => $o->setMetadata($n->getObjectValue([TransactionMeta::class, 'createFromDiscriminatorValue'])),
            'orderId' => fn(ParseNode $n) => $o->setOrderId($n->getStringValue()),
            'paymentInfo' => fn(ParseNode $n) => $o->setPaymentInfo($n->getObjectValue([PaymentInfo::class, 'createFromDiscriminatorValue'])),
            'products' => fn(ParseNode $n) => $o->setProducts($n->getCollectionOfObjectValues([Product::class, 'createFromDiscriminatorValue'])),
            'recordedAt' => fn(ParseNode $n) => $o->setRecordedAt($n->getStringValue()),
            'revenue' => fn(ParseNode $n) => $o->setRevenue($n->getObjectValue([CreateatransactionRequest_revenue::class, 'createFromDiscriminatorValue'])),
            'source' => fn(ParseNode $n) => $o->setSource($n->getEnumValue(EventSource::class)),
            'value' => fn(ParseNode $n) => $o->setValue($n->getObjectValue([CreateatransactionRequest_value::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the metadata property value. Any custom parameters
     * @return TransactionMeta|null
    */
    public function getMetadata(): ?TransactionMeta {
        return $this->metadata;
    }

    /**
     * Gets the orderId property value. ID of the transaction.If you want to be able to overwrite this transaction in the future, you use `eventSalt`. If you send a transaction with the same `orderId` multiple times, the system generates multiple transaction events.
     * @return string|null
    */
    public function getOrderId(): ?string {
        return $this->orderId;
    }

    /**
     * Gets the paymentInfo property value. Payment details
     * @return PaymentInfo|null
    */
    public function getPaymentInfo(): ?PaymentInfo {
        return $this->paymentInfo;
    }

    /**
     * Gets the products property value. A list of items in the transaction.Each item creates a `product.buy` event. The UUID of that event is generated from a combination of:  - the UUID of the `transaction.charge` event created by the transaction  - the position of the item in this array. This has an effect on updating transaction events. This means that when you update a transaction (a transaction can only be updated if it has an `eventSalt` and the same timestamp as the original), you must keep the original order of items in the array. Otherwise, you may accidentally overwrite a `product.buy` event with another item's event. The system does NOT recognize the item by SKU in this case.**Example**:  1. You create a transaction with items A, B, and C (in that order).  2. You update the transaction and the items are now A, B, D, and C (in that order).  3. Because item D took the position of C in the event, it has the same UUID as C had earlier. The event of D overwrites the event of C, and C is generated as a new event.Additionally, because events can't be deleted from the database, cancelled items remain as events in a Profile's history. You can use a custom free-form property to tag items as cancelled. This way, you can keep cancelled items in `products` when updating a transaction without breaking the order of items. You can also use the property to filter cancelled items out in Analytics.
     * @return array<Product>|null
    */
    public function getProducts(): ?array {
        return $this->products;
    }

    /**
     * Gets the recordedAt property value. Time when the event occurred, in [ISO 8601](https://wikipedia.org/wiki/ISO_8601). This time isn't affected and doesn't affect the timezone of your workspace - you can send events with a timezone different than that of the workspace. Synerise calculates the times into UTC standard when saving events in the database.If not defined, the backend inserts the time of receiving the event.A time with a "Z" at the end (for example, `2022-10-14T12:02:06Z`) denotes a time in the UTC standard.If you want to send time in a different timezone, you can do this by appending `{+|-}hh:mm` at the end of the string.  Note that if the timezone is ahead (+) of UTC, the UTC time is calculated by subtraction. When the timezone is behind (-) UTC, the UTC time is calculated by addition.  For example: - if your timezone is UTC+1, append `+01:00`. When you send `2022-10-14T15:00:000+01:00`, it is saved in the database as `2022-10-14T14:00:000Z` - if your timezone is UTC-8, append `-08:00`. When you send `2022-10-14T22:00:000-08:00`, it is saved in the database as `2022-10-15T06:00:000Z` (note that the date also changes between timezones in this example)**IMPORTANT**: If you send an event with a future time, the parameter is rejected and the time of receiving the event is saved as the occurrence time. For example, if your timezone is UTC+1 and you send the event at 15:00 local time, future times are:  - later than 15:00 local time- later than 14:00 UTCWhen you retrieve an event, its time is always shown as UTC. The original time string that you sent (even if it was a future time and was rejected) can be retrieved with the [activities](https://developers.synerise.com/DataManagement/DataManagement.html#tag/Activities) endpoints, as `snr-original-time`.
     * @return string|null
    */
    public function getRecordedAt(): ?string {
        return $this->recordedAt;
    }

    /**
     * Gets the revenue property value. Transaction revenue (amount after taxation). This field is not calculated automatically by the backend, you must provide the value by summing up the results of `finalUnitPrice * quantity` from all items in the `products` array.
     * @return CreateatransactionRequest_revenue|null
    */
    public function getRevenue(): ?CreateatransactionRequest_revenue {
        return $this->revenue;
    }

    /**
     * Gets the source property value. Source of the event. 
     * @return EventSource|null
    */
    public function getSource(): ?EventSource {
        return $this->source;
    }

    /**
     * Gets the value property value. If you want to display the price before taxation, use this object. If you only want to display the price after taxation, set the values to the same as in `revenue`.
     * @return CreateatransactionRequest_value|null
    */
    public function getValue(): ?CreateatransactionRequest_value {
        return $this->value;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('client', $this->getClient());
        $writer->writeObjectValue('discountAmount', $this->getDiscountAmount());
        $writer->writeStringValue('eventSalt', $this->getEventSalt());
        $writer->writeObjectValue('metadata', $this->getMetadata());
        $writer->writeStringValue('orderId', $this->getOrderId());
        $writer->writeObjectValue('paymentInfo', $this->getPaymentInfo());
        $writer->writeCollectionOfObjectValues('products', $this->getProducts());
        $writer->writeStringValue('recordedAt', $this->getRecordedAt());
        $writer->writeObjectValue('revenue', $this->getRevenue());
        $writer->writeEnumValue('source', $this->getSource());
        $writer->writeObjectValue('value', $this->getValue());
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
     * Sets the client property value. You must provide at least one of those profile identifiers.
     * @param Client|null $value Value to set for the client property.
    */
    public function setClient(?Client $value): void {
        $this->client = $value;
    }

    /**
     * Sets the discountAmount property value. How much the total cost decreased
     * @param CreateatransactionRequest_discountAmount|null $value Value to set for the discountAmount property.
    */
    public function setDiscountAmount(?CreateatransactionRequest_discountAmount $value): void {
        $this->discountAmount = $value;
    }

    /**
     * Sets the eventSalt property value. When an event has an `eventSalt`, it can be overwritten by sending another event.`eventSalt` must be unique in a workspace. An example of creating a salt is by generating a UUID or concatenating the profile ID, event's name, and timestamp, including milliseconds. This creates a value whose possibility of being duplicated is practically zero.To overwrite an event with another one, the new event MUST:- have the same `eventSalt` as the original event- have the same date and time as the original event (If the date and time don't match the original event, event salt doesn't have any effect.)- belong to the same `clientId` as the original event- have the same action (event name) as the original event------**IMPORTANT**:  - DO NOT send the same `eventSalt` to different profiles!- DO NOT send the same `eventSalt` with a different action!- Pay attention to timezones - more details in the description of the `time` property (in v4/transactions events, it's called `recordedAt`).- If you send a future time in an event, it is rejected and the current time is assigned automatically. This means it's impossible to use event salt with future times.- Overwriting an event by using the event salt doesn't trigger automations.- An event without an `eventSalt` can't be overwritten. The parameter cannot be added to an event at a later time.- The parameter can't be retrieved later. You must keep track of the values that you send.  
     * @param string|null $value Value to set for the eventSalt property.
    */
    public function setEventSalt(?string $value): void {
        $this->eventSalt = $value;
    }

    /**
     * Sets the metadata property value. Any custom parameters
     * @param TransactionMeta|null $value Value to set for the metadata property.
    */
    public function setMetadata(?TransactionMeta $value): void {
        $this->metadata = $value;
    }

    /**
     * Sets the orderId property value. ID of the transaction.If you want to be able to overwrite this transaction in the future, you use `eventSalt`. If you send a transaction with the same `orderId` multiple times, the system generates multiple transaction events.
     * @param string|null $value Value to set for the orderId property.
    */
    public function setOrderId(?string $value): void {
        $this->orderId = $value;
    }

    /**
     * Sets the paymentInfo property value. Payment details
     * @param PaymentInfo|null $value Value to set for the paymentInfo property.
    */
    public function setPaymentInfo(?PaymentInfo $value): void {
        $this->paymentInfo = $value;
    }

    /**
     * Sets the products property value. A list of items in the transaction.Each item creates a `product.buy` event. The UUID of that event is generated from a combination of:  - the UUID of the `transaction.charge` event created by the transaction  - the position of the item in this array. This has an effect on updating transaction events. This means that when you update a transaction (a transaction can only be updated if it has an `eventSalt` and the same timestamp as the original), you must keep the original order of items in the array. Otherwise, you may accidentally overwrite a `product.buy` event with another item's event. The system does NOT recognize the item by SKU in this case.**Example**:  1. You create a transaction with items A, B, and C (in that order).  2. You update the transaction and the items are now A, B, D, and C (in that order).  3. Because item D took the position of C in the event, it has the same UUID as C had earlier. The event of D overwrites the event of C, and C is generated as a new event.Additionally, because events can't be deleted from the database, cancelled items remain as events in a Profile's history. You can use a custom free-form property to tag items as cancelled. This way, you can keep cancelled items in `products` when updating a transaction without breaking the order of items. You can also use the property to filter cancelled items out in Analytics.
     * @param array<Product>|null $value Value to set for the products property.
    */
    public function setProducts(?array $value): void {
        $this->products = $value;
    }

    /**
     * Sets the recordedAt property value. Time when the event occurred, in [ISO 8601](https://wikipedia.org/wiki/ISO_8601). This time isn't affected and doesn't affect the timezone of your workspace - you can send events with a timezone different than that of the workspace. Synerise calculates the times into UTC standard when saving events in the database.If not defined, the backend inserts the time of receiving the event.A time with a "Z" at the end (for example, `2022-10-14T12:02:06Z`) denotes a time in the UTC standard.If you want to send time in a different timezone, you can do this by appending `{+|-}hh:mm` at the end of the string.  Note that if the timezone is ahead (+) of UTC, the UTC time is calculated by subtraction. When the timezone is behind (-) UTC, the UTC time is calculated by addition.  For example: - if your timezone is UTC+1, append `+01:00`. When you send `2022-10-14T15:00:000+01:00`, it is saved in the database as `2022-10-14T14:00:000Z` - if your timezone is UTC-8, append `-08:00`. When you send `2022-10-14T22:00:000-08:00`, it is saved in the database as `2022-10-15T06:00:000Z` (note that the date also changes between timezones in this example)**IMPORTANT**: If you send an event with a future time, the parameter is rejected and the time of receiving the event is saved as the occurrence time. For example, if your timezone is UTC+1 and you send the event at 15:00 local time, future times are:  - later than 15:00 local time- later than 14:00 UTCWhen you retrieve an event, its time is always shown as UTC. The original time string that you sent (even if it was a future time and was rejected) can be retrieved with the [activities](https://developers.synerise.com/DataManagement/DataManagement.html#tag/Activities) endpoints, as `snr-original-time`.
     * @param string|null $value Value to set for the recordedAt property.
    */
    public function setRecordedAt(?string $value): void {
        $this->recordedAt = $value;
    }

    /**
     * Sets the revenue property value. Transaction revenue (amount after taxation). This field is not calculated automatically by the backend, you must provide the value by summing up the results of `finalUnitPrice * quantity` from all items in the `products` array.
     * @param CreateatransactionRequest_revenue|null $value Value to set for the revenue property.
    */
    public function setRevenue(?CreateatransactionRequest_revenue $value): void {
        $this->revenue = $value;
    }

    /**
     * Sets the source property value. Source of the event. 
     * @param EventSource|null $value Value to set for the source property.
    */
    public function setSource(?EventSource $value): void {
        $this->source = $value;
    }

    /**
     * Sets the value property value. If you want to display the price before taxation, use this object. If you only want to display the price after taxation, set the values to the same as in `revenue`.
     * @param CreateatransactionRequest_value|null $value Value to set for the value property.
    */
    public function setValue(?CreateatransactionRequest_value $value): void {
        $this->value = $value;
    }

}
