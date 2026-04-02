<?php

declare(strict_types=1);

namespace Synerise\Sdk\Serialization;

use Exception;

interface Serializer
{
    /**
     * Serialize array to string
     * @param array<string, mixed> $data
     * @return string
     * @throws Exception
     */
    public function serialize(array $data): string;

    /**
     * Deserialize string to array
     * @param string $string
     * @return array<string, mixed>
     * @throws Exception
     */
    public function deserialize(string $string): array;
}
