<?php

namespace Synerise\Sdk\Serialization;

use JsonException;

class JsonSerializer implements Serializer
{
    /**
     * @inheritDoc
     * @throws JsonException
     */
    public function serialize(array $data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR);
    }

    /**
     * @inheritDoc
     * @throws JsonException
     */
    public function deserialize(string $string): array
    {
        return json_decode($string, true, 512, JSON_THROW_ON_ERROR );
    }
}