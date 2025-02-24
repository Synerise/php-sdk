<?php

namespace Synerise\Api\V4\Events\LoggedOut;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\V4\Models\DefaultParamSource;
use Synerise\Api\V4\Models\EventBase;

class LoggedOutPostRequestBody extends EventBase implements Parsable 
{
    /**
     * @var DefaultParamSource|null $params Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog. If you want to send a date/time param for use in analytics, take the following into account: - The date/time should be formatted according to ISO 8601. - The time zone of the workspace affects dates/times in the params that DON'T have a defined timezone. Example:     - `2023-10-09T12:00:00` doesn't have a timezone indicator and will be considered as a time in the workspace's time zone.     - `2023-10-09T12:00:00+02:00` has a timezone indicator (`+02:00`), so the timezone of the workspace doesn't affect it.     - `2023-10-09T12:00:00Z` is a time in the UTC time zone (denoted by the `Z` at the end), so the timezone of the workspace doesn't affect it.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions: <span style="color:red"><strong>WARNING:</strong></span> - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event. - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br> <code>modifiedBy</code><br> <code>apiKey</code><br> <code>eventUUID</code><br> <code>ip</code><br> <code>time</code><br> <code>businessProfileId</code>
    */
    private ?DefaultParamSource $params = null;
    
    /**
     * Instantiates a new LoggedOutPostRequestBody and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return LoggedOutPostRequestBody
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): LoggedOutPostRequestBody {
        return new LoggedOutPostRequestBody();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'params' => fn(ParseNode $n) => $o->setParams($n->getObjectValue([DefaultParamSource::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the params property value. Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog. If you want to send a date/time param for use in analytics, take the following into account: - The date/time should be formatted according to ISO 8601. - The time zone of the workspace affects dates/times in the params that DON'T have a defined timezone. Example:     - `2023-10-09T12:00:00` doesn't have a timezone indicator and will be considered as a time in the workspace's time zone.     - `2023-10-09T12:00:00+02:00` has a timezone indicator (`+02:00`), so the timezone of the workspace doesn't affect it.     - `2023-10-09T12:00:00Z` is a time in the UTC time zone (denoted by the `Z` at the end), so the timezone of the workspace doesn't affect it.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions: <span style="color:red"><strong>WARNING:</strong></span> - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event. - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br> <code>modifiedBy</code><br> <code>apiKey</code><br> <code>eventUUID</code><br> <code>ip</code><br> <code>time</code><br> <code>businessProfileId</code>
     * @return DefaultParamSource|null
    */
    public function getParams(): ?DefaultParamSource {
        return $this->params;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('params', $this->getParams());
    }

    /**
     * Sets the params property value. Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog. If you want to send a date/time param for use in analytics, take the following into account: - The date/time should be formatted according to ISO 8601. - The time zone of the workspace affects dates/times in the params that DON'T have a defined timezone. Example:     - `2023-10-09T12:00:00` doesn't have a timezone indicator and will be considered as a time in the workspace's time zone.     - `2023-10-09T12:00:00+02:00` has a timezone indicator (`+02:00`), so the timezone of the workspace doesn't affect it.     - `2023-10-09T12:00:00Z` is a time in the UTC time zone (denoted by the `Z` at the end), so the timezone of the workspace doesn't affect it.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions: <span style="color:red"><strong>WARNING:</strong></span> - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event. - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br> <code>modifiedBy</code><br> <code>apiKey</code><br> <code>eventUUID</code><br> <code>ip</code><br> <code>time</code><br> <code>businessProfileId</code>
     * @param DefaultParamSource|null $value Value to set for the params property.
    */
    public function setParams(?DefaultParamSource $value): void {
        $this->params = $value;
    }

}
