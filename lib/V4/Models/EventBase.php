<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class EventBase implements AdditionalDataHolder, Parsable 
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
     * @var string|null $eventSalt When an event has an `eventSalt`, it can be overwritten by sending another event.`eventSalt` must be unique in a workspace. An example of creating a salt is by generating a UUID or concatenating the profile ID, event's name, and timestamp, including milliseconds. This creates a value whose possibility of being duplicated is practically zero.To overwrite an event with another one, the new event MUST:- have the same `eventSalt` as the original event- have the same date and time as the original event (If the date and time don't match the original event, event salt doesn't have any effect.)- belong to the same `clientId` as the original event- have the same action (event name) as the original event------**IMPORTANT**:  - DO NOT send the same `eventSalt` to different profiles!- DO NOT send the same `eventSalt` with a different action!- Pay attention to timezones - more details in the description of the `time` property (in v4/transactions events, it's called `recordedAt`).- If you send a future time in an event, it is rejected and the current time is assigned automatically. This means it's impossible to use event salt with future times.- Overwriting an event by using the event salt doesn't trigger automations.- An event without an `eventSalt` can't be overwritten. The parameter cannot be added to an event at a later time.- The parameter can't be retrieved later. You must keep track of the values that you send.  
    */
    private ?string $eventSalt = null;
    
    /**
     * @var string|null $label This parameter is required, but not saved in the database. It can't be used in Analytics, Automations, and so on.
    */
    private ?string $label = null;
    
    /**
     * @var string|null $time Time when the event occurred, in [ISO 8601](https://wikipedia.org/wiki/ISO_8601). This time isn't affected and doesn't affect the timezone of your workspace - you can send events with a timezone different than that of the workspace. Synerise calculates the times into UTC standard when saving events in the database.If not defined, the backend inserts the time of receiving the event.A time with a "Z" at the end (for example, `2022-10-14T12:02:06Z`) denotes a time in the UTC standard.If you want to send time in a different timezone, you can do this by appending `{+|-}hh:mm` at the end of the string.  Note that if the timezone is ahead (+) of UTC, the UTC time is calculated by subtraction. When the timezone is behind (-) UTC, the UTC time is calculated by addition.  For example: - if your timezone is UTC+1, append `+01:00`. When you send `2022-10-14T15:00:000+01:00`, it is saved in the database as `2022-10-14T14:00:000Z` - if your timezone is UTC-8, append `-08:00`. When you send `2022-10-14T22:00:000-08:00`, it is saved in the database as `2022-10-15T06:00:000Z` (note that the date also changes between timezones in this example)**IMPORTANT**: If you send an event with a future time, the parameter is rejected and the time of receiving the event is saved as the occurrence time. For example, if your timezone is UTC+1 and you send the event at 15:00 local time, future times are:  - later than 15:00 local time- later than 14:00 UTCWhen you retrieve an event, its time is always shown as UTC. The original time string that you sent (even if it was a future time and was rejected) can be retrieved with the [activities](https://developers.synerise.com/DataManagement/DataManagement.html#tag/Activities) endpoints, as `snr-original-time`.
    */
    private ?string $time = null;
    
    /**
     * Instantiates a new EventBase and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return EventBase
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): EventBase {
        return new EventBase();
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
            'eventSalt' => fn(ParseNode $n) => $o->setEventSalt($n->getStringValue()),
            'label' => fn(ParseNode $n) => $o->setLabel($n->getStringValue()),
            'time' => fn(ParseNode $n) => $o->setTime($n->getStringValue()),
        ];
    }

    /**
     * Gets the label property value. This parameter is required, but not saved in the database. It can't be used in Analytics, Automations, and so on.
     * @return string|null
    */
    public function getLabel(): ?string {
        return $this->label;
    }

    /**
     * Gets the time property value. Time when the event occurred, in [ISO 8601](https://wikipedia.org/wiki/ISO_8601). This time isn't affected and doesn't affect the timezone of your workspace - you can send events with a timezone different than that of the workspace. Synerise calculates the times into UTC standard when saving events in the database.If not defined, the backend inserts the time of receiving the event.A time with a "Z" at the end (for example, `2022-10-14T12:02:06Z`) denotes a time in the UTC standard.If you want to send time in a different timezone, you can do this by appending `{+|-}hh:mm` at the end of the string.  Note that if the timezone is ahead (+) of UTC, the UTC time is calculated by subtraction. When the timezone is behind (-) UTC, the UTC time is calculated by addition.  For example: - if your timezone is UTC+1, append `+01:00`. When you send `2022-10-14T15:00:000+01:00`, it is saved in the database as `2022-10-14T14:00:000Z` - if your timezone is UTC-8, append `-08:00`. When you send `2022-10-14T22:00:000-08:00`, it is saved in the database as `2022-10-15T06:00:000Z` (note that the date also changes between timezones in this example)**IMPORTANT**: If you send an event with a future time, the parameter is rejected and the time of receiving the event is saved as the occurrence time. For example, if your timezone is UTC+1 and you send the event at 15:00 local time, future times are:  - later than 15:00 local time- later than 14:00 UTCWhen you retrieve an event, its time is always shown as UTC. The original time string that you sent (even if it was a future time and was rejected) can be retrieved with the [activities](https://developers.synerise.com/DataManagement/DataManagement.html#tag/Activities) endpoints, as `snr-original-time`.
     * @return string|null
    */
    public function getTime(): ?string {
        return $this->time;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('client', $this->getClient());
        $writer->writeStringValue('eventSalt', $this->getEventSalt());
        $writer->writeStringValue('label', $this->getLabel());
        $writer->writeStringValue('time', $this->getTime());
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
     * Sets the eventSalt property value. When an event has an `eventSalt`, it can be overwritten by sending another event.`eventSalt` must be unique in a workspace. An example of creating a salt is by generating a UUID or concatenating the profile ID, event's name, and timestamp, including milliseconds. This creates a value whose possibility of being duplicated is practically zero.To overwrite an event with another one, the new event MUST:- have the same `eventSalt` as the original event- have the same date and time as the original event (If the date and time don't match the original event, event salt doesn't have any effect.)- belong to the same `clientId` as the original event- have the same action (event name) as the original event------**IMPORTANT**:  - DO NOT send the same `eventSalt` to different profiles!- DO NOT send the same `eventSalt` with a different action!- Pay attention to timezones - more details in the description of the `time` property (in v4/transactions events, it's called `recordedAt`).- If you send a future time in an event, it is rejected and the current time is assigned automatically. This means it's impossible to use event salt with future times.- Overwriting an event by using the event salt doesn't trigger automations.- An event without an `eventSalt` can't be overwritten. The parameter cannot be added to an event at a later time.- The parameter can't be retrieved later. You must keep track of the values that you send.  
     * @param string|null $value Value to set for the eventSalt property.
    */
    public function setEventSalt(?string $value): void {
        $this->eventSalt = $value;
    }

    /**
     * Sets the label property value. This parameter is required, but not saved in the database. It can't be used in Analytics, Automations, and so on.
     * @param string|null $value Value to set for the label property.
    */
    public function setLabel(?string $value): void {
        $this->label = $value;
    }

    /**
     * Sets the time property value. Time when the event occurred, in [ISO 8601](https://wikipedia.org/wiki/ISO_8601). This time isn't affected and doesn't affect the timezone of your workspace - you can send events with a timezone different than that of the workspace. Synerise calculates the times into UTC standard when saving events in the database.If not defined, the backend inserts the time of receiving the event.A time with a "Z" at the end (for example, `2022-10-14T12:02:06Z`) denotes a time in the UTC standard.If you want to send time in a different timezone, you can do this by appending `{+|-}hh:mm` at the end of the string.  Note that if the timezone is ahead (+) of UTC, the UTC time is calculated by subtraction. When the timezone is behind (-) UTC, the UTC time is calculated by addition.  For example: - if your timezone is UTC+1, append `+01:00`. When you send `2022-10-14T15:00:000+01:00`, it is saved in the database as `2022-10-14T14:00:000Z` - if your timezone is UTC-8, append `-08:00`. When you send `2022-10-14T22:00:000-08:00`, it is saved in the database as `2022-10-15T06:00:000Z` (note that the date also changes between timezones in this example)**IMPORTANT**: If you send an event with a future time, the parameter is rejected and the time of receiving the event is saved as the occurrence time. For example, if your timezone is UTC+1 and you send the event at 15:00 local time, future times are:  - later than 15:00 local time- later than 14:00 UTCWhen you retrieve an event, its time is always shown as UTC. The original time string that you sent (even if it was a future time and was rejected) can be retrieved with the [activities](https://developers.synerise.com/DataManagement/DataManagement.html#tag/Activities) endpoints, as `snr-original-time`.
     * @param string|null $value Value to set for the time property.
    */
    public function setTime(?string $value): void {
        $this->time = $value;
    }

}
