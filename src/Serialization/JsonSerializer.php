<?php

declare(strict_types=1);

namespace Synerise\Sdk\Serialization;

use JsonException;

class JsonSerializer implements Serializer
{
    /**
     * @inheritDoc
     * @param array<string, mixed> $data
     * @throws JsonException
     */
    public function serialize(array $data): string
    {
        return json_encode($data, JSON_THROW_ON_ERROR);
    }

    /**
     * @inheritDoc
     * @throws JsonException
     * @return array<string, mixed>
     */
    public function deserialize(string $string): array
    {
        /** @var array<string, mixed> */
        return json_decode($string, true, 512, JSON_THROW_ON_ERROR);
    }
}
