<?php

namespace Synerise\Sdk\Serialization;

use Exception;
use InvalidArgumentException;
use RuntimeException;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Serialization\Json\JsonParseNode;

class StringJsonParseNodeFactory
{
    /**
     * Registered serializers array
     * @var array<string, Serializer>
     */
    private array $serializers;

    /**
     * @param array $serializers
     */
    public function __construct(array $serializers = [])
    {
        if (!empty($serializers)) {
            foreach ($serializers as $serializer) {
                if (!$serializer instanceof Serializer) {
                    throw new InvalidArgumentException('Object must implement Serializer interface');
                }
            }
            $this->serializers = $serializers;
        } else {
            $this->serializers = [
                'json' => new JsonSerializer(),
                'key-value' => new KeyValuePairSerializer(),
            ];
        }
    }

    /**
     * Creates a {@link ParseNode} from the given string.
     * @param string $string string to be parsed.
     * @param string $contentType string defining serializer to be used
     * @return JsonParseNode a {@link ParseNode} that can deserialize the given string.
     */
    public function getRootParseNode(string $string, string $contentType = 'json'): JsonParseNode
    {
        if (empty($contentType)) {
            throw new InvalidArgumentException('$contentType cannot be empty.');
        }
        if (!in_array($contentType, $this->getValidContentTypes())){
            throw new InvalidArgumentException("Invalid content type: $contentType.");
        }
        if (empty($string)){
            throw new InvalidArgumentException('$string cannot be empty.');
        }
        try {
            $content = $this->getSerializer($contentType)->deserialize($string);
        } catch (Exception $ex){
            throw new RuntimeException('The was a problem parsing the response.', 1, $ex);
        }
        return new JsonParseNode($content);
    }

    /**
     * Get an array of registered deserializers codes
     * @return string[]
     */
    protected function getValidContentTypes(): array {
        return array_keys($this->serializers);
    }

    /**
     * Get serializer by content type code
     * @param $contentType
     * @return Serializer
     */
    protected function getSerializer($contentType): Serializer {
        return $this->serializers[$contentType];
    }
}