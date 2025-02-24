<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog. If you want to send a date/time param for use in analytics, take the following into account: - The date/time should be formatted according to ISO 8601. - The time zone of the workspace affects dates/times in the params that DON'T have a defined timezone. Example:     - `2023-10-09T12:00:00` doesn't have a timezone indicator and will be considered as a time in the workspace's time zone.     - `2023-10-09T12:00:00+02:00` has a timezone indicator (`+02:00`), so the timezone of the workspace doesn't affect it.     - `2023-10-09T12:00:00Z` is a time in the UTC time zone (denoted by the `Z` at the end), so the timezone of the workspace doesn't affect it.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions: <span style="color:red"><strong>WARNING:</strong></span> - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event. - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br> <code>modifiedBy</code><br> <code>apiKey</code><br> <code>eventUUID</code><br> <code>ip</code><br> <code>time</code><br> <code>businessProfileId</code>
*/
class DefaultParamSource implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * Instantiates a new DefaultParamSource and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DefaultParamSource
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DefaultParamSource {
        return new DefaultParamSource();
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
        ];
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

}
