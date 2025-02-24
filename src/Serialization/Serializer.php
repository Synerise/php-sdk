<?php

namespace Synerise\Sdk\Serialization;

use Exception;

interface Serializer
{
    /**
     * Serialize array to string
     * @param array $data
     * @return string
     * @throws Exception
     */
    public function serialize(array $data): string;

    /**
     * Deserialize string to array
     * @param string $string
     * @return array
     * @throws Exception
     */
    public function deserialize(string $string): array;
}