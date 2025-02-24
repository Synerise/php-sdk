<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class CreateClientRequestBody implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $address Profile's street address.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
    */
    private ?string $address = null;
    
    /**
     * @var Agreements|null $agreements This object contains the marketing agreements of the Profile.You can also pass the values as strings (`"true"`;`"True"`/`"false"`;`"False"`) or integers (`1` for true and `0` for false).
    */
    private ?Agreements $agreements = null;
    
    /**
     * @var Attributes|null $attributes This object contains custom attributes that can have any name (except for reserved attributes, see warning below) and data type, as required by your integration.The attribute names can't include any characters that match the pattern (ECMA flavor): `/[/r/n/u2028/u2029/u00AD/u0000/uFE00-/uFE0F]/`String values:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.  - can't include the "null" control character (`/u0000`)If you want to send a date/time attribute for use in analytics, take the following into account:- The date/time should be formatted according to ISO 8601.- The time zone of the workspace affects dates/times in the attributes that DON'T have a defined timezone. Example:    - `2023-10-09T12:00:00` doesn't have a timezone indicator and will be considered as a time in the workspace's time zone.    - `2023-10-09T12:00:00+02:00` has a timezone indicator (`+02:00`), so the timezone of the workspace doesn't affect it.    - `2023-10-09T12:00:00Z` is a time in the UTC time zone (denoted by the `Z` at the end), so the timezone of the workspace doesn't affect it.<strong><span style="color:red">WARNING<span></strong>: Some attributes are reserved and cannot be sent. If you send them, they are ignored.<details><summary>Click to expand the list of reserved attributes</summary><code>email</code><br><code>clientId</code><br><code>phone</code><br><code>customId</code><br><code>uuid</code><br><code>firstName</code><br><code>lastName</code><br><code>displayName</code><br><code>company</code><br><code>address</code><br><code>city</code><br><code>province</code><br><code>zipCode</code><br><code>countryCode</code><br><code>birthDate</code><br><code>sex</code><br><code>avatarUrl</code><br><code>anonymous</code><br><code>agreements</code><br><code>tags</code><br><code>businessProfileId</code><br><code>time</code><br><code>ip</code><br><code>source</code><br><code>newsletter_agreement</code><br><code>custom_identify</code><br><code>firstname</code><br><code>lastname</code><br><code>created</code><br><code>updated</code><br><code>last_activity_date</code><br><code>birthdate</code><br><code>external_avatar_url</code><br><code>displayname</code><br><code>receive_smses</code><br><code>receive_push_messages</code><br><code>receive_webpush_messages</code><br><code>receive_btooth_messages</code><br><code>receive_rfid_messages</code><br><code>receive_wifi_messages</code><br><code>confirmation_hash</code><br><code>ownerId</code><br><code>zipCode</code><br><code>anonymous_type</code><br><code>country_id</code><br><code>geo_loc_city</code><br><code>geo_loc_country</code><br><code>geo_loc_as</code><br><code>geo_loc_country_code</code><br><code>geo_loc_isp</code><br><code>geo_loc_lat</code><br><code>geo_loc_lon</code><br><code>geo_loc_org</code><br><code>geo_loc_query</code><br><code>geo_loc_region</code><br><code>geo_loc_region_name</code><br><code>geo_loc_status</code><br><code>geo_loc_timezone</code><br><code>geo_loc_zip</code><br><code>club_card_id</code><br><code>type</code><br><code>confirmed</code><br><code>facebookId</code><br><code>status</code></details>
    */
    private ?Attributes $attributes = null;
    
    /**
     * @var string|null $avatarUrl URL of the profile's avatar pictureThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
    */
    private ?string $avatarUrl = null;
    
    /**
     * @var string|null $birthDate Date of birth in the profile. Must be in `yyyy-mm-dd` format and later than `1900-01-01`.<br>**IMPORTANT**: Months and days must be zero-padded. For example: May 3, 1993 is `1993-05-03`.
    */
    private ?string $birthDate = null;
    
    /**
     * @var string|null $city Profile's city of residence.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
    */
    private ?string $city = null;
    
    /**
     * @var string|null $company Profiles's companyThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
    */
    private ?string $company = null;
    
    /**
     * @var string|null $countryCode Code of profile's country of residence in accordance with the ISO 3166 format
    */
    private ?string $countryCode = null;
    
    /**
     * @var string|null $customId A custom ID for the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
    */
    private ?string $customId = null;
    
    /**
     * @var string|null $displayName Currently unused
    */
    private ?string $displayName = null;
    
    /**
     * @var string|null $email The profile's e-mail address. - Must match the pattern (ECMA flavor): `/^(([^<>()[/]//.,;:/s@//"]+(/.[^<>()[/]//.,;:/s@//"]+)*)|(//".+//"))@((/[[0-9]{1,3}/.[0-9]{1,3}/.[0-9]{1,3}/.[0-9]{1,3}/])|(([a-zA-Z/-0-9]+/.)+[a-zA-Z]{2,}))$/`  - The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`By default, email is a unique identifier.If [non-unique emails](https://hub.synerise.com/docs/settings/configuration/non-unique-emails/) are enabled, this field should not be used. It is no longer an identifier. The configuration of non-unique emails includes creating an email parameter for communication.
    */
    private ?string $email = null;
    
    /**
     * @var string|null $firstName Profile's first name.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.  - can't include the "null" control character (`/u0000`)
    */
    private ?string $firstName = null;
    
    /**
     * @var string|null $lastName Profile's last nameThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
    */
    private ?string $lastName = null;
    
    /**
     * @var string|null $phone Phone number of the profile- Must match the pattern (ECMA flavor): `/(^/+[0-9 /-()/]{6,19}$)|(^[0-9 /-()/]{6,20}$)/`  - The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
    */
    private ?string $phone = null;
    
    /**
     * @var string|null $province Profile's province of residenceThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
    */
    private ?string $province = null;
    
    /**
     * @var InBodyClientSex|null $sex Profile's sex
    */
    private ?InBodyClientSex $sex = null;
    
    /**
     * @var array<string>|null $tags Tags can be used to group profiles.Tag names (strings):- can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
    */
    private ?array $tags = null;
    
    /**
     * @var string|null $uuid UUID of the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
    */
    private ?string $uuid = null;
    
    /**
     * @var string|null $zipCode Profile's zip codeThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
    */
    private ?string $zipCode = null;
    
    /**
     * Instantiates a new CreateClientRequestBody and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CreateClientRequestBody
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CreateClientRequestBody {
        return new CreateClientRequestBody();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the address property value. Profile's street address.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @return string|null
    */
    public function getAddress(): ?string {
        return $this->address;
    }

    /**
     * Gets the agreements property value. This object contains the marketing agreements of the Profile.You can also pass the values as strings (`"true"`;`"True"`/`"false"`;`"False"`) or integers (`1` for true and `0` for false).
     * @return Agreements|null
    */
    public function getAgreements(): ?Agreements {
        return $this->agreements;
    }

    /**
     * Gets the attributes property value. This object contains custom attributes that can have any name (except for reserved attributes, see warning below) and data type, as required by your integration.The attribute names can't include any characters that match the pattern (ECMA flavor): `/[/r/n/u2028/u2029/u00AD/u0000/uFE00-/uFE0F]/`String values:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.  - can't include the "null" control character (`/u0000`)If you want to send a date/time attribute for use in analytics, take the following into account:- The date/time should be formatted according to ISO 8601.- The time zone of the workspace affects dates/times in the attributes that DON'T have a defined timezone. Example:    - `2023-10-09T12:00:00` doesn't have a timezone indicator and will be considered as a time in the workspace's time zone.    - `2023-10-09T12:00:00+02:00` has a timezone indicator (`+02:00`), so the timezone of the workspace doesn't affect it.    - `2023-10-09T12:00:00Z` is a time in the UTC time zone (denoted by the `Z` at the end), so the timezone of the workspace doesn't affect it.<strong><span style="color:red">WARNING<span></strong>: Some attributes are reserved and cannot be sent. If you send them, they are ignored.<details><summary>Click to expand the list of reserved attributes</summary><code>email</code><br><code>clientId</code><br><code>phone</code><br><code>customId</code><br><code>uuid</code><br><code>firstName</code><br><code>lastName</code><br><code>displayName</code><br><code>company</code><br><code>address</code><br><code>city</code><br><code>province</code><br><code>zipCode</code><br><code>countryCode</code><br><code>birthDate</code><br><code>sex</code><br><code>avatarUrl</code><br><code>anonymous</code><br><code>agreements</code><br><code>tags</code><br><code>businessProfileId</code><br><code>time</code><br><code>ip</code><br><code>source</code><br><code>newsletter_agreement</code><br><code>custom_identify</code><br><code>firstname</code><br><code>lastname</code><br><code>created</code><br><code>updated</code><br><code>last_activity_date</code><br><code>birthdate</code><br><code>external_avatar_url</code><br><code>displayname</code><br><code>receive_smses</code><br><code>receive_push_messages</code><br><code>receive_webpush_messages</code><br><code>receive_btooth_messages</code><br><code>receive_rfid_messages</code><br><code>receive_wifi_messages</code><br><code>confirmation_hash</code><br><code>ownerId</code><br><code>zipCode</code><br><code>anonymous_type</code><br><code>country_id</code><br><code>geo_loc_city</code><br><code>geo_loc_country</code><br><code>geo_loc_as</code><br><code>geo_loc_country_code</code><br><code>geo_loc_isp</code><br><code>geo_loc_lat</code><br><code>geo_loc_lon</code><br><code>geo_loc_org</code><br><code>geo_loc_query</code><br><code>geo_loc_region</code><br><code>geo_loc_region_name</code><br><code>geo_loc_status</code><br><code>geo_loc_timezone</code><br><code>geo_loc_zip</code><br><code>club_card_id</code><br><code>type</code><br><code>confirmed</code><br><code>facebookId</code><br><code>status</code></details>
     * @return Attributes|null
    */
    public function getAttributes(): ?Attributes {
        return $this->attributes;
    }

    /**
     * Gets the avatarUrl property value. URL of the profile's avatar pictureThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @return string|null
    */
    public function getAvatarUrl(): ?string {
        return $this->avatarUrl;
    }

    /**
     * Gets the birthDate property value. Date of birth in the profile. Must be in `yyyy-mm-dd` format and later than `1900-01-01`.<br>**IMPORTANT**: Months and days must be zero-padded. For example: May 3, 1993 is `1993-05-03`.
     * @return string|null
    */
    public function getBirthDate(): ?string {
        return $this->birthDate;
    }

    /**
     * Gets the city property value. Profile's city of residence.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @return string|null
    */
    public function getCity(): ?string {
        return $this->city;
    }

    /**
     * Gets the company property value. Profiles's companyThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @return string|null
    */
    public function getCompany(): ?string {
        return $this->company;
    }

    /**
     * Gets the countryCode property value. Code of profile's country of residence in accordance with the ISO 3166 format
     * @return string|null
    */
    public function getCountryCode(): ?string {
        return $this->countryCode;
    }

    /**
     * Gets the customId property value. A custom ID for the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @return string|null
    */
    public function getCustomId(): ?string {
        return $this->customId;
    }

    /**
     * Gets the displayName property value. Currently unused
     * @return string|null
    */
    public function getDisplayName(): ?string {
        return $this->displayName;
    }

    /**
     * Gets the email property value. The profile's e-mail address. - Must match the pattern (ECMA flavor): `/^(([^<>()[/]//.,;:/s@//"]+(/.[^<>()[/]//.,;:/s@//"]+)*)|(//".+//"))@((/[[0-9]{1,3}/.[0-9]{1,3}/.[0-9]{1,3}/.[0-9]{1,3}/])|(([a-zA-Z/-0-9]+/.)+[a-zA-Z]{2,}))$/`  - The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`By default, email is a unique identifier.If [non-unique emails](https://hub.synerise.com/docs/settings/configuration/non-unique-emails/) are enabled, this field should not be used. It is no longer an identifier. The configuration of non-unique emails includes creating an email parameter for communication.
     * @return string|null
    */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'address' => fn(ParseNode $n) => $o->setAddress($n->getStringValue()),
            'agreements' => fn(ParseNode $n) => $o->setAgreements($n->getObjectValue([Agreements::class, 'createFromDiscriminatorValue'])),
            'attributes' => fn(ParseNode $n) => $o->setAttributes($n->getObjectValue([Attributes::class, 'createFromDiscriminatorValue'])),
            'avatarUrl' => fn(ParseNode $n) => $o->setAvatarUrl($n->getStringValue()),
            'birthDate' => fn(ParseNode $n) => $o->setBirthDate($n->getStringValue()),
            'city' => fn(ParseNode $n) => $o->setCity($n->getStringValue()),
            'company' => fn(ParseNode $n) => $o->setCompany($n->getStringValue()),
            'countryCode' => fn(ParseNode $n) => $o->setCountryCode($n->getStringValue()),
            'customId' => fn(ParseNode $n) => $o->setCustomId($n->getStringValue()),
            'displayName' => fn(ParseNode $n) => $o->setDisplayName($n->getStringValue()),
            'email' => fn(ParseNode $n) => $o->setEmail($n->getStringValue()),
            'firstName' => fn(ParseNode $n) => $o->setFirstName($n->getStringValue()),
            'lastName' => fn(ParseNode $n) => $o->setLastName($n->getStringValue()),
            'phone' => fn(ParseNode $n) => $o->setPhone($n->getStringValue()),
            'province' => fn(ParseNode $n) => $o->setProvince($n->getStringValue()),
            'sex' => fn(ParseNode $n) => $o->setSex($n->getEnumValue(InBodyClientSex::class)),
            'tags' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'string');
                }
                /** @var array<string>|null $val */
                $this->setTags($val);
            },
            'uuid' => fn(ParseNode $n) => $o->setUuid($n->getStringValue()),
            'zipCode' => fn(ParseNode $n) => $o->setZipCode($n->getStringValue()),
        ];
    }

    /**
     * Gets the firstName property value. Profile's first name.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.  - can't include the "null" control character (`/u0000`)
     * @return string|null
    */
    public function getFirstName(): ?string {
        return $this->firstName;
    }

    /**
     * Gets the lastName property value. Profile's last nameThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @return string|null
    */
    public function getLastName(): ?string {
        return $this->lastName;
    }

    /**
     * Gets the phone property value. Phone number of the profile- Must match the pattern (ECMA flavor): `/(^/+[0-9 /-()/]{6,19}$)|(^[0-9 /-()/]{6,20}$)/`  - The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @return string|null
    */
    public function getPhone(): ?string {
        return $this->phone;
    }

    /**
     * Gets the province property value. Profile's province of residenceThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @return string|null
    */
    public function getProvince(): ?string {
        return $this->province;
    }

    /**
     * Gets the sex property value. Profile's sex
     * @return InBodyClientSex|null
    */
    public function getSex(): ?InBodyClientSex {
        return $this->sex;
    }

    /**
     * Gets the tags property value. Tags can be used to group profiles.Tag names (strings):- can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @return array<string>|null
    */
    public function getTags(): ?array {
        return $this->tags;
    }

    /**
     * Gets the uuid property value. UUID of the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @return string|null
    */
    public function getUuid(): ?string {
        return $this->uuid;
    }

    /**
     * Gets the zipCode property value. Profile's zip codeThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @return string|null
    */
    public function getZipCode(): ?string {
        return $this->zipCode;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('address', $this->getAddress());
        $writer->writeObjectValue('agreements', $this->getAgreements());
        $writer->writeObjectValue('attributes', $this->getAttributes());
        $writer->writeStringValue('avatarUrl', $this->getAvatarUrl());
        $writer->writeStringValue('birthDate', $this->getBirthDate());
        $writer->writeStringValue('city', $this->getCity());
        $writer->writeStringValue('company', $this->getCompany());
        $writer->writeStringValue('countryCode', $this->getCountryCode());
        $writer->writeStringValue('customId', $this->getCustomId());
        $writer->writeStringValue('displayName', $this->getDisplayName());
        $writer->writeStringValue('email', $this->getEmail());
        $writer->writeStringValue('firstName', $this->getFirstName());
        $writer->writeStringValue('lastName', $this->getLastName());
        $writer->writeStringValue('phone', $this->getPhone());
        $writer->writeStringValue('province', $this->getProvince());
        $writer->writeEnumValue('sex', $this->getSex());
        $writer->writeCollectionOfPrimitiveValues('tags', $this->getTags());
        $writer->writeStringValue('uuid', $this->getUuid());
        $writer->writeStringValue('zipCode', $this->getZipCode());
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
     * Sets the address property value. Profile's street address.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the address property.
    */
    public function setAddress(?string $value): void {
        $this->address = $value;
    }

    /**
     * Sets the agreements property value. This object contains the marketing agreements of the Profile.You can also pass the values as strings (`"true"`;`"True"`/`"false"`;`"False"`) or integers (`1` for true and `0` for false).
     * @param Agreements|null $value Value to set for the agreements property.
    */
    public function setAgreements(?Agreements $value): void {
        $this->agreements = $value;
    }

    /**
     * Sets the attributes property value. This object contains custom attributes that can have any name (except for reserved attributes, see warning below) and data type, as required by your integration.The attribute names can't include any characters that match the pattern (ECMA flavor): `/[/r/n/u2028/u2029/u00AD/u0000/uFE00-/uFE0F]/`String values:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.  - can't include the "null" control character (`/u0000`)If you want to send a date/time attribute for use in analytics, take the following into account:- The date/time should be formatted according to ISO 8601.- The time zone of the workspace affects dates/times in the attributes that DON'T have a defined timezone. Example:    - `2023-10-09T12:00:00` doesn't have a timezone indicator and will be considered as a time in the workspace's time zone.    - `2023-10-09T12:00:00+02:00` has a timezone indicator (`+02:00`), so the timezone of the workspace doesn't affect it.    - `2023-10-09T12:00:00Z` is a time in the UTC time zone (denoted by the `Z` at the end), so the timezone of the workspace doesn't affect it.<strong><span style="color:red">WARNING<span></strong>: Some attributes are reserved and cannot be sent. If you send them, they are ignored.<details><summary>Click to expand the list of reserved attributes</summary><code>email</code><br><code>clientId</code><br><code>phone</code><br><code>customId</code><br><code>uuid</code><br><code>firstName</code><br><code>lastName</code><br><code>displayName</code><br><code>company</code><br><code>address</code><br><code>city</code><br><code>province</code><br><code>zipCode</code><br><code>countryCode</code><br><code>birthDate</code><br><code>sex</code><br><code>avatarUrl</code><br><code>anonymous</code><br><code>agreements</code><br><code>tags</code><br><code>businessProfileId</code><br><code>time</code><br><code>ip</code><br><code>source</code><br><code>newsletter_agreement</code><br><code>custom_identify</code><br><code>firstname</code><br><code>lastname</code><br><code>created</code><br><code>updated</code><br><code>last_activity_date</code><br><code>birthdate</code><br><code>external_avatar_url</code><br><code>displayname</code><br><code>receive_smses</code><br><code>receive_push_messages</code><br><code>receive_webpush_messages</code><br><code>receive_btooth_messages</code><br><code>receive_rfid_messages</code><br><code>receive_wifi_messages</code><br><code>confirmation_hash</code><br><code>ownerId</code><br><code>zipCode</code><br><code>anonymous_type</code><br><code>country_id</code><br><code>geo_loc_city</code><br><code>geo_loc_country</code><br><code>geo_loc_as</code><br><code>geo_loc_country_code</code><br><code>geo_loc_isp</code><br><code>geo_loc_lat</code><br><code>geo_loc_lon</code><br><code>geo_loc_org</code><br><code>geo_loc_query</code><br><code>geo_loc_region</code><br><code>geo_loc_region_name</code><br><code>geo_loc_status</code><br><code>geo_loc_timezone</code><br><code>geo_loc_zip</code><br><code>club_card_id</code><br><code>type</code><br><code>confirmed</code><br><code>facebookId</code><br><code>status</code></details>
     * @param Attributes|null $value Value to set for the attributes property.
    */
    public function setAttributes(?Attributes $value): void {
        $this->attributes = $value;
    }

    /**
     * Sets the avatarUrl property value. URL of the profile's avatar pictureThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the avatarUrl property.
    */
    public function setAvatarUrl(?string $value): void {
        $this->avatarUrl = $value;
    }

    /**
     * Sets the birthDate property value. Date of birth in the profile. Must be in `yyyy-mm-dd` format and later than `1900-01-01`.<br>**IMPORTANT**: Months and days must be zero-padded. For example: May 3, 1993 is `1993-05-03`.
     * @param string|null $value Value to set for the birthDate property.
    */
    public function setBirthDate(?string $value): void {
        $this->birthDate = $value;
    }

    /**
     * Sets the city property value. Profile's city of residence.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the city property.
    */
    public function setCity(?string $value): void {
        $this->city = $value;
    }

    /**
     * Sets the company property value. Profiles's companyThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the company property.
    */
    public function setCompany(?string $value): void {
        $this->company = $value;
    }

    /**
     * Sets the countryCode property value. Code of profile's country of residence in accordance with the ISO 3166 format
     * @param string|null $value Value to set for the countryCode property.
    */
    public function setCountryCode(?string $value): void {
        $this->countryCode = $value;
    }

    /**
     * Sets the customId property value. A custom ID for the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @param string|null $value Value to set for the customId property.
    */
    public function setCustomId(?string $value): void {
        $this->customId = $value;
    }

    /**
     * Sets the displayName property value. Currently unused
     * @param string|null $value Value to set for the displayName property.
    */
    public function setDisplayName(?string $value): void {
        $this->displayName = $value;
    }

    /**
     * Sets the email property value. The profile's e-mail address. - Must match the pattern (ECMA flavor): `/^(([^<>()[/]//.,;:/s@//"]+(/.[^<>()[/]//.,;:/s@//"]+)*)|(//".+//"))@((/[[0-9]{1,3}/.[0-9]{1,3}/.[0-9]{1,3}/.[0-9]{1,3}/])|(([a-zA-Z/-0-9]+/.)+[a-zA-Z]{2,}))$/`  - The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`By default, email is a unique identifier.If [non-unique emails](https://hub.synerise.com/docs/settings/configuration/non-unique-emails/) are enabled, this field should not be used. It is no longer an identifier. The configuration of non-unique emails includes creating an email parameter for communication.
     * @param string|null $value Value to set for the email property.
    */
    public function setEmail(?string $value): void {
        $this->email = $value;
    }

    /**
     * Sets the firstName property value. Profile's first name.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.  - can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the firstName property.
    */
    public function setFirstName(?string $value): void {
        $this->firstName = $value;
    }

    /**
     * Sets the lastName property value. Profile's last nameThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the lastName property.
    */
    public function setLastName(?string $value): void {
        $this->lastName = $value;
    }

    /**
     * Sets the phone property value. Phone number of the profile- Must match the pattern (ECMA flavor): `/(^/+[0-9 /-()/]{6,19}$)|(^[0-9 /-()/]{6,20}$)/`  - The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @param string|null $value Value to set for the phone property.
    */
    public function setPhone(?string $value): void {
        $this->phone = $value;
    }

    /**
     * Sets the province property value. Profile's province of residenceThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the province property.
    */
    public function setProvince(?string $value): void {
        $this->province = $value;
    }

    /**
     * Sets the sex property value. Profile's sex
     * @param InBodyClientSex|null $value Value to set for the sex property.
    */
    public function setSex(?InBodyClientSex $value): void {
        $this->sex = $value;
    }

    /**
     * Sets the tags property value. Tags can be used to group profiles.Tag names (strings):- can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param array<string>|null $value Value to set for the tags property.
    */
    public function setTags(?array $value): void {
        $this->tags = $value;
    }

    /**
     * Sets the uuid property value. UUID of the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @param string|null $value Value to set for the uuid property.
    */
    public function setUuid(?string $value): void {
        $this->uuid = $value;
    }

    /**
     * Sets the zipCode property value. Profile's zip codeThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the zipCode property.
    */
    public function setZipCode(?string $value): void {
        $this->zipCode = $value;
    }

}
