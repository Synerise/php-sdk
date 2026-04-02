<?php

declare(strict_types=1);

namespace Synerise\Tests\Serialization;

use InvalidArgumentException;
use Microsoft\Kiota\Serialization\Json\JsonParseNode;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use Synerise\Sdk\Serialization\StringJsonParseNodeFactory;

class StringJsonParseNodeFactoryTest extends TestCase
{
    public function testGetRootParseNodeWithJsonShouldReturnParseNode(): void
    {
        $factory = new StringJsonParseNodeFactory();

        $result = $factory->getRootParseNode('{"key":"value"}', 'json');

        $this->assertInstanceOf(JsonParseNode::class, $result);
    }

    public function testGetRootParseNodeWithKeyValueShouldReturnParseNode(): void
    {
        $factory = new StringJsonParseNodeFactory();

        $result = $factory->getRootParseNode('key:value', 'key-value');

        $this->assertInstanceOf(JsonParseNode::class, $result);
    }

    public function testGetRootParseNodeDefaultsToJson(): void
    {
        $factory = new StringJsonParseNodeFactory();

        $result = $factory->getRootParseNode('{"test":true}');

        $this->assertInstanceOf(JsonParseNode::class, $result);
    }

    public function testEmptyContentTypeShouldThrow(): void
    {
        $factory = new StringJsonParseNodeFactory();

        $this->expectException(InvalidArgumentException::class);

        $factory->getRootParseNode('data', '');
    }

    public function testInvalidContentTypeShouldThrow(): void
    {
        $factory = new StringJsonParseNodeFactory();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid content type');

        $factory->getRootParseNode('data', 'xml');
    }

    public function testEmptyStringShouldThrow(): void
    {
        $factory = new StringJsonParseNodeFactory();

        $this->expectException(InvalidArgumentException::class);

        $factory->getRootParseNode('', 'json');
    }

    public function testInvalidJsonShouldThrowRuntimeException(): void
    {
        $factory = new StringJsonParseNodeFactory();

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('problem parsing');

        $factory->getRootParseNode('not valid json', 'json');
    }

    public function testCustomSerializersShouldBeUsed(): void
    {
        $factory = new StringJsonParseNodeFactory([
            'json' => new \Synerise\Sdk\Serialization\JsonSerializer(),
        ]);

        $result = $factory->getRootParseNode('{"custom":true}', 'json');

        $this->assertInstanceOf(JsonParseNode::class, $result);
    }

    public function testInvalidSerializerShouldThrow(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new StringJsonParseNodeFactory(['bad' => new \stdClass()]);
    }
}
