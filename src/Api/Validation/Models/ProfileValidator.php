<?php

namespace Synerise\Sdk\Api\Validation\Models;


use Synerise\Api\V4\Models\Attributes;
use Synerise\Api\V4\Models\Profile;
use Synerise\Sdk\Api\Validation\BirthDateValidator;
use Synerise\Sdk\Api\Validation\EmailValidator;
use Synerise\Sdk\Api\Validation\PhoneValidator;

class ProfileValidator
{
    public const RESERVED_ATTRIBUTES = [
        "email", "clientId", "phone", "customId", "uuid", "firstName", "lastName",
        "displayName", "company", "address", "city", "province", "zipCode", "countryCode",
        "birthDate", "sex", "avatarUrl", "anonymous", "agreements", "tags", "businessProfileId",
        "time", "ip", "source", "newsletter_agreement", "custom_identify", "firstname",
        "lastname", "created", "updated", "last_activity_date", "birthdate", "external_avatar_url",
        "displayname", "receive_smses", "receive_push_messages", "receive_webpush_messages",
        "receive_btooth_messages", "receive_rfid_messages", "receive_wifi_messages", "confirmation_hash",
        "ownerId", "zipCode", "anonymous_type", "country_id", "geo_loc_city", "geo_loc_country",
        "geo_loc_as", "geo_loc_country_code", "geo_loc_isp", "geo_loc_lat", "geo_loc_lon", "geo_loc_org",
        "geo_loc_query", "geo_loc_region", "geo_loc_region_name", "geo_loc_status", "geo_loc_timezone",
        "geo_loc_zip", "club_card_id", "type", "confirmed", "facebookId", "deletedAt", "status", ""
    ];

    /**
     * Validate Profile
     *
     * @param Profile $profile
     * @param bool $throwOnError
     * @return array
     */
    public static function validate(Profile $profile, bool $throwOnError = true): array
    {
        $errors = [];

        $attributesErrors = self::validateAttributes($profile->getAttributes());
        $errors = array_merge($errors, $attributesErrors);

        $birthDateErrors = BirthDateValidator::validate($profile->getBirthDate());
        $errors = array_merge($errors, $birthDateErrors);

        $phoneErrors = PhoneValidator::validate($profile->getPhone());
        $errors = array_merge($errors, $phoneErrors);

        $emailErrors = EmailValidator::validate($profile->getEmail());
        $errors = array_merge($errors, $emailErrors);

        if ($throwOnError && !empty($errors)) {
            throw new \InvalidArgumentException(
                'Profile validation failed: ' . implode(', ', $errors)
            );
        }

        return $errors;
    }

    /**
     * Validate profile attributes
     *
     * @param Attributes|null $attributes
     * @return array
     */
    private static function validateAttributes(?Attributes $attributes): array
    {
        $errors = [];

        if ($attributes === null || $attributes->getAdditionalData() === null) {
            return $errors;
        }

        $invalidAttributes = [];
        foreach (array_keys($attributes->getAdditionalData()) as $attributeName) {
            if (in_array($attributeName, self::RESERVED_ATTRIBUTES, true)) {
                $invalidAttributes[] = $attributeName;
            }
        }

        foreach ($invalidAttributes as $attributeName) {
            $errors[] = sprintf('Attribute name "%s" is reserved.', $attributeName);
        }

        return $errors;
    }

}
