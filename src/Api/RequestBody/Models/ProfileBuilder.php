<?php

namespace Synerise\Sdk\Api\RequestBody\Models;

use InvalidArgumentException;
use Synerise\Api\V4\Models\Agreements;
use Synerise\Api\V4\Models\Attributes;
use Synerise\Api\V4\Models\Profile;
use Synerise\Api\V4\Models\ProfileSex;
use Synerise\Sdk\Api\Validation\Models\ProfileValidator;

class ProfileBuilder
{

    private Profile $profile;

    public function __construct()
    {
        $this->profile = new Profile();
    }

    public static function initialize(): self
    {
        return new ProfileBuilder();
    }

    public function build(bool $validate = true): Profile
    {
        $identifier = $this->profile->getUuid()
            ?? $this->profile->getCustomId()
            ?? $this->profile->getEmail()
            ?? $this->profile->getPhone();

        if (!$identifier) {
            throw new InvalidArgumentException('You must provide at least one of profile identifier.');
        }

        if ($validate) {
            ProfileValidator::validate($this->profile);
        }

        return $this->profile;
    }

    public function addAttribute(string $attributeName, $attributeValue): self
    {
        $attributes = $this->profile->getAttributes();
        if (!$attributes) {
            $attributes = new Attributes();
        }

        $attributesAdditionalData = $attributes->getAdditionalData();
        $attributesAdditionalData[$attributeName] = $attributeValue;
        $attributes->setAdditionalData($attributesAdditionalData);

        $this->setAttributes($attributes);

        return $this;
    }

    public function removeAttribute(string $attributeName): self
    {
        $attributes = $this->profile->getAttributes();
        if ($attributes === null) {
            return $this;
        }

        $additionalData = $attributes->getAdditionalData();
        if ($additionalData === null) {
            return $this;
        }

        $filteredData = array_filter(
            $additionalData,
            fn($key) => $key !== $attributeName,
            ARRAY_FILTER_USE_KEY
        );
        $attributes->setAdditionalData($filteredData);

        return $this;
    }

    public function addTag(string $tagName): self
    {
        if ($tagName === 'null') {
            throw new InvalidArgumentException('Tag name cannot be "null"');
        }

        $tags = $this->profile->getTags();
        if (!$tags) {
            $tags = [];
        }
        $tags[] = $tagName;

        $this->profile->setTags(array_unique($tags));
        return $this;
    }

    public function removeTag(string $tagName): self
    {
        $tags = $this->profile->getTags();
        if ($tags === null) {
            return $this;
        }

        $tags = array_filter($tags, function ($tag) use ($tagName) {
            return $tag !== $tagName;
        });
        $this->profile->setTags($tags);

        return $this;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
     */
    public function setAdditionalData(?array $value): self
    {
        $this->profile->setAdditionalData($value);
        return $this;
    }

    /**
     * Sets the address property value. Profile's street address.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the address property.
     */
    public function setAddress(?string $value): self
    {
        $this->profile->setAddress($value);
        return $this;
    }

    /**
     * Sets the agreements property value. This object contains the marketing agreements of the Profile.You can also pass the values as strings (`"true"`;`"True"`/`"false"`;`"False"`) or integers (`1` for true and `0` for false).
     * @param Agreements|null $value Value to set for the agreements property.
     */
    public function setAgreements(?Agreements $value): self
    {
        $this->profile->setAgreements($value);
        return $this;
    }

    /**
     * Sets the attributes property value. This object contains custom attributes that can have any name (except for reserved attributes, see warning below) and data type, as required by your integration.The attribute names can't include any characters that match the pattern (ECMA flavor): `/[/r/n/u2028/u2029/u00AD/u0000/uFE00-/uFE0F]/`String values:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.  - can't include the "null" control character (`/u0000`)If you want to send a date/time attribute for use in analytics, take the following into account:- The date/time should be formatted according to ISO 8601.- The time zone of the workspace affects dates/times in the attributes that DON'T have a defined timezone. Example:    - `2023-10-09T12:00:00` doesn't have a timezone indicator and will be considered as a time in the workspace's time zone.    - `2023-10-09T12:00:00+02:00` has a timezone indicator (`+02:00`), so the timezone of the workspace doesn't affect it.    - `2023-10-09T12:00:00Z` is a time in the UTC time zone (denoted by the `Z` at the end), so the timezone of the workspace doesn't affect it.<strong><span style="color:red">WARNING<span></strong>: Some attributes are reserved and cannot be sent. If you send them, they are ignored.<details><summary>Click to expand the list of reserved attributes</summary><code>email</code><br><code>clientId</code><br><code>phone</code><br><code>customId</code><br><code>uuid</code><br><code>firstName</code><br><code>lastName</code><br><code>displayName</code><br><code>company</code><br><code>address</code><br><code>city</code><br><code>province</code><br><code>zipCode</code><br><code>countryCode</code><br><code>birthDate</code><br><code>sex</code><br><code>avatarUrl</code><br><code>anonymous</code><br><code>agreements</code><br><code>tags</code><br><code>businessProfileId</code><br><code>time</code><br><code>ip</code><br><code>source</code><br><code>newsletter_agreement</code><br><code>custom_identify</code><br><code>firstname</code><br><code>lastname</code><br><code>created</code><br><code>updated</code><br><code>last_activity_date</code><br><code>birthdate</code><br><code>external_avatar_url</code><br><code>displayname</code><br><code>receive_smses</code><br><code>receive_push_messages</code><br><code>receive_webpush_messages</code><br><code>receive_btooth_messages</code><br><code>receive_rfid_messages</code><br><code>receive_wifi_messages</code><br><code>confirmation_hash</code><br><code>ownerId</code><br><code>zipCode</code><br><code>anonymous_type</code><br><code>country_id</code><br><code>geo_loc_city</code><br><code>geo_loc_country</code><br><code>geo_loc_as</code><br><code>geo_loc_country_code</code><br><code>geo_loc_isp</code><br><code>geo_loc_lat</code><br><code>geo_loc_lon</code><br><code>geo_loc_org</code><br><code>geo_loc_query</code><br><code>geo_loc_region</code><br><code>geo_loc_region_name</code><br><code>geo_loc_status</code><br><code>geo_loc_timezone</code><br><code>geo_loc_zip</code><br><code>club_card_id</code><br><code>type</code><br><code>confirmed</code><br><code>facebookId</code><br><code>status</code></details>
     * @param Attributes|null $value Value to set for the attributes property.
     */
    public function setAttributes(?Attributes $value): self
    {
        $this->profile->setAttributes($value);
        return $this;
    }

    /**
     * Sets the avatarUrl property value. URL of the profile's avatar pictureThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the avatarUrl property.
     */
    public function setAvatarUrl(?string $value): self
    {
        $this->profile->setAvatarUrl($value);
        return $this;
    }

    /**
     * Sets the birthDate property value. Date of birth in the profile. Must be in `yyyy-mm-dd` format and later than `1900-01-01`.<br>**IMPORTANT**: Months and days must be zero-padded. For example: May 3, 1993 is `1993-05-03`.
     * @param string|null $value Value to set for the birthDate property.
     */
    public function setBirthDate(?string $value): self
    {
        $this->profile->setBirthDate($value);
        return $this;
    }

    /**
     * Sets the city property value. Profile's city of residence.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the city property.
     */
    public function setCity(?string $value): self
    {
        $this->profile->setCity($value);
        return $this;
    }

    /**
     * Sets the company property value. Profiles's companyThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the company property.
     */
    public function setCompany(?string $value): self
    {
        $this->profile->setCompany($value);
        return $this;
    }

    /**
     * Sets the countryCode property value. Code of profile's country of residence in accordance with the ISO 3166 format
     * @param string|null $value Value to set for the countryCode property.
     */
    public function setCountryCode(?string $value): self
    {
        $this->profile->setCountryCode($value);
        return $this;
    }

    /**
     * Sets the customId property value. A custom ID for the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @param string|null $value Value to set for the customId property.
     */
    public function setCustomId(?string $value): self
    {
        $this->profile->setCustomId($value);
        return $this;
    }

    /**
     * Sets the displayName property value. Currently unused
     * @param string|null $value Value to set for the displayName property.
     */
    public function setDisplayName(?string $value): self
    {
        $this->profile->setDisplayName($value);
        return $this;
    }

    /**
     * Sets the email property value. The profile's e-mail address. - Must match the pattern (ECMA flavor): `/^(([^<>()[/]//.,;:/s@//"]+(/.[^<>()[/]//.,;:/s@//"]+)*)|(//".+//"))@((/[[0-9]{1,3}/.[0-9]{1,3}/.[0-9]{1,3}/.[0-9]{1,3}/])|(([a-zA-Z/-0-9]+/.)+[a-zA-Z]{2,}))$/`  - The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`By default, email is a unique identifier.If [non-unique emails](https://hub.synerise.com/docs/settings/configuration/non-unique-emails/) are enabled, this field should not be used. It is no longer an identifier. The configuration of non-unique emails includes creating an email parameter for communication.
     * @param string|null $value Value to set for the email property.
     */
    public function setEmail(?string $value): self
    {
        $this->profile->setEmail($value);
        return $this;
    }

    /**
     * Sets the firstName property value. Profile's first name.The value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.  - can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the firstName property.
     */
    public function setFirstName(?string $value): self
    {
        $this->profile->setFirstName($value);
        return $this;
    }

    /**
     * Sets the lastName property value. Profile's last nameThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the lastName property.
     */
    public function setLastName(?string $value): self
    {
        $this->profile->setLastName($value);
        return $this;
    }

    /**
     * Sets the phone property value. Phone number of the profile- Must match the pattern (ECMA flavor): `/(^/+[0-9 /-()/]{6,19}$)|(^[0-9 /-()/]{6,20}$)/`  - The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @param string|null $value Value to set for the phone property.
     */
    public function setPhone(?string $value): self
    {
        $this->profile->setPhone($value);
        return $this;
    }

    /**
     * Sets the province property value. Profile's province of residenceThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the province property.
     */
    public function setProvince(?string $value): self
    {
        $this->profile->setProvince($value);
        return $this;
    }

    /**
     * Sets the sex property value. Profile's sex
     * @param ProfileSex|null $value Value to set for the sex property.
     */
    public function setSex(?ProfileSex $value): self
    {
        $this->profile->setSex($value);
        return $this;
    }

    /**
     * Sets the tags property value. Tags can be used to group profiles.Tag names (strings):- can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param array<string>|null $value Value to set for the tags property.
     */
    public function setTags(?array $value): self
    {
        $this->profile->setTags($value);
        return $this;
    }

    /**
     * Sets the uuid property value. UUID of the Profile. It is a unique identifier.The value can't include any characters that match the pattern (ECMA flavor): `/([/uD800-/uDBFF][/uDC00-/uDFFF])|([/r/n/u2028/u2029/u00AD]|[/uFE00-/uFE0F]|[/u0000])/`
     * @param string|null $value Value to set for the uuid property.
     */
    public function setUuid(?string $value): self
    {
        $this->profile->setUuid($value);
        return $this;
    }

    /**
     * Sets the zipCode property value. Profile's zip codeThe value:  - can't include variation selectors (`[/uFE00-/uFE0F]`), unless there are other characters in the string.- can't include the "null" control character (`/u0000`)
     * @param string|null $value Value to set for the zipCode property.
     */
    public function setZipCode(?string $value): self
    {
        $this->profile->setZipCode($value);
        return $this;
    }

}
