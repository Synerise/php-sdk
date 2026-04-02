<?php

declare(strict_types=1);

namespace Synerise\Tests\Serialization;

use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Serialization\KeyValuePairSerializer;

class KeyValuePairSerializerTest extends TestCase
{
    public function testSerializeWithDefaultDelimiters(): void
    {
        $serializer = new KeyValuePairSerializer();

        $result = $serializer->serialize(['key1' => 'value1', 'key2' => 'value2']);

        $this->assertSame('key1:value1&key2:value2', $result);
    }

    public function testSerializeWithCustomDelimiters(): void
    {
        $serializer = new KeyValuePairSerializer('=', ';');

        $result = $serializer->serialize(['a' => '1', 'b' => '2']);

        $this->assertSame('a=1;b=2', $result);
    }

    public function testSerializeEmptyArrayShouldReturnEmptyString(): void
    {
        $serializer = new KeyValuePairSerializer();

        $result = $serializer->serialize([]);

        $this->assertSame('', $result);
    }

    public function testSerializeShouldUrlEncodeValues(): void
    {
        $serializer = new KeyValuePairSerializer();

        $result = $serializer->serialize(['key' => 'hello world']);

        $this->assertSame('key:hello+world', $result);
    }

    public function testDeserializeWithDefaultDelimiters(): void
    {
        $serializer = new KeyValuePairSerializer();

        $result = $serializer->deserialize('key1:value1&key2:value2');

        $this->assertSame(['key1' => 'value1', 'key2' => 'value2'], $result);
    }

    public function testDeserializeWithCustomDelimiters(): void
    {
        $serializer = new KeyValuePairSerializer('=', ';');

        $result = $serializer->deserialize('a=1;b=2');

        $this->assertSame(['a' => '1', 'b' => '2'], $result);
    }

    public function testRoundTripShouldPreserveData(): void
    {
        $serializer = new KeyValuePairSerializer();
        $data = ['name' => 'test', 'version' => '1.0'];

        $result = $serializer->deserialize($serializer->serialize($data));

        $this->assertSame($data, $result);
    }
}
