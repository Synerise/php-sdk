<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * This object contains custom attributes that can have any name (except for reserved attributes, see warning below) and data type, as required by your integration.The attribute names can't include any characters that match the pattern (ECMA flavor): `/[/r/n/u2028/u2029/u00AD/u0000/uFE00-/uFE0F]/`String values:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.  - can't include the "null" control character (`/u0000`)If you want to send a date/time attribute for use in analytics, take the following into account:- The date/time should be formatted according to ISO 8601.- The time zone of the workspace affects dates/times in the attributes that DON'T have a defined timezone. Example:    - `2023-10-09T12:00:00` doesn't have a timezone indicator and will be considered as a time in the workspace's time zone.    - `2023-10-09T12:00:00+02:00` has a timezone indicator (`+02:00`), so the timezone of the workspace doesn't affect it.    - `2023-10-09T12:00:00Z` is a time in the UTC time zone (denoted by the `Z` at the end), so the timezone of the workspace doesn't affect it.<strong><span style="color:red">WARNING<span></strong>: Some attributes are reserved and cannot be sent. If you send them, they are ignored.<details><summary>Click to expand the list of reserved attributes</summary><code>email</code><br><code>clientId</code><br><code>phone</code><br><code>customId</code><br><code>uuid</code><br><code>firstName</code><br><code>lastName</code><br><code>displayName</code><br><code>company</code><br><code>address</code><br><code>city</code><br><code>province</code><br><code>zipCode</code><br><code>countryCode</code><br><code>birthDate</code><br><code>sex</code><br><code>avatarUrl</code><br><code>anonymous</code><br><code>agreements</code><br><code>tags</code><br><code>businessProfileId</code><br><code>time</code><br><code>ip</code><br><code>source</code><br><code>newsletter_agreement</code><br><code>custom_identify</code><br><code>firstname</code><br><code>lastname</code><br><code>created</code><br><code>updated</code><br><code>last_activity_date</code><br><code>birthdate</code><br><code>external_avatar_url</code><br><code>displayname</code><br><code>receive_smses</code><br><code>receive_push_messages</code><br><code>receive_webpush_messages</code><br><code>receive_btooth_messages</code><br><code>receive_rfid_messages</code><br><code>receive_wifi_messages</code><br><code>confirmation_hash</code><br><code>ownerId</code><br><code>zipCode</code><br><code>anonymous_type</code><br><code>country_id</code><br><code>geo_loc_city</code><br><code>geo_loc_country</code><br><code>geo_loc_as</code><br><code>geo_loc_country_code</code><br><code>geo_loc_isp</code><br><code>geo_loc_lat</code><br><code>geo_loc_lon</code><br><code>geo_loc_org</code><br><code>geo_loc_query</code><br><code>geo_loc_region</code><br><code>geo_loc_region_name</code><br><code>geo_loc_status</code><br><code>geo_loc_timezone</code><br><code>geo_loc_zip</code><br><code>club_card_id</code><br><code>type</code><br><code>confirmed</code><br><code>facebookId</code><br><code>status</code></details>
*/
class Attributes implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * Instantiates a new Attributes and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Attributes
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Attributes {
        return new Attributes();
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
