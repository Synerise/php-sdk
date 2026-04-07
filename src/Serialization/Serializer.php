<?php

declare(strict_types=1);

namespace Synerise\Sdk\Serialization;

use Exception;

interface Serializer
{
    /**
     * Serialize array to string
     * @param array<string, mixed> $data
     * @throws Exception
     * @return string
     */
    public function serialize(array $data): string;

    /**
     * Deserialize string to array
     * @param string $string
     * @throws Exception
     * @return array<string, mixed>
     */
    public function deserialize(string $string): array;
}
