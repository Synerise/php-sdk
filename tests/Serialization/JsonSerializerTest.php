<?php

declare(strict_types=1);

namespace Synerise\Tests\Serialization;

use JsonException;
use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Serialization\JsonSerializer;

class JsonSerializerTest extends TestCase
{
    private JsonSerializer $serializer;

    protected function setUp(): void
    {
        $this->serializer = new JsonSerializer();
    }

    public function testSerializeShouldReturnJsonString(): void
    {
        $data = ['key' => 'value', 'number' => 42];

        $result = $this->serializer->serialize($data);

        $this->assertSame('{"key":"value","number":42}', $result);
    }

    public function testSerializeEmptyArrayShouldReturnEmptyObject(): void
    {
        $result = $this->serializer->serialize([]);

        $this->assertSame('[]', $result);
    }

    public function testDeserializeShouldReturnArray(): void
    {
        $json = '{"key":"value","number":42}';

        $result = $this->serializer->deserialize($json);

        $this->assertSame(['key' => 'value', 'number' => 42], $result);
    }

    public function testDeserializeInvalidJsonShouldThrow(): void
    {
        $this->expectException(JsonException::class);

        $this->serializer->deserialize('not valid json');
    }

    public function testRoundTripShouldPreserveData(): void
    {
        $data = ['name' => 'Test', 'nested' => ['a' => 1, 'b' => 2]];

        $result = $this->serializer->deserialize($this->serializer->serialize($data));

        $this->assertSame($data, $result);
    }
}
