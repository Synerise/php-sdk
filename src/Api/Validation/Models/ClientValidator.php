<?php

namespace Synerise\Sdk\Api\Validation\Models;

use Synerise\Api\V4\Models\Client;

class ClientValidator
{
    /**
     * Pattern for generic uuid validation
     */
    public const PATTERN_UUID = '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/';

    /**
     * Validate Client
     * @param Client $client
     * @return array
     */
    public static function validate(Client $client): array
    {
        $invalid = [];
        if (empty($client->getUuid()) && empty($client->getEmail()) &&
            empty($client->getCustomId()) && empty($client->getId()))
        {
            $invalid[] = 'At least one client identifier required';
        }

        if (!empty($client->getUuid()) && !self::uuid($client->getUuid())){
            $invalid[] = "UUID format invalid ({$client->getUuid()})";
        }

        return $invalid;
    }

    /**
     * Validate string has UUID format
     * @param string $uuid
     * @return true
     */
    private static function uuid(string $uuid): bool
    {
        return preg_match(self::PATTERN_UUID, $uuid);
    }
}