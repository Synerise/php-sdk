<?php

declare(strict_types=1);

namespace Synerise\Tests\Model\Profile;

use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Model\Profile\BaseParams;

class BaseParamsTest extends TestCase
{
    public function testSerializeUsesStringValueForAllProperties(): void
    {
        $params = new BaseParams();
        $params->setHost('example.com');
        $params->setIdentityHash('abc123');
        $params->setUserHash('hash456');
        $params->setPermUuid('perm-uuid');
        $params->setUuid('uuid-value');
        $params->setInit('1000');
        $params->setLast('2000');
        $params->setCurrent('3000');
        $params->setUniqueVisits('5');
        $params->setGlobalControlGroup('true');

        // allVisits setter is private, set via deserializer
        $mockNode = $this->createMock(ParseNode::class);
        $mockNode->method('getStringValue')->willReturn('10');
        $deserializers = $params->getFieldDeserializers();
        $deserializers['allVisits']($mockNode);

        $writer = $this->createMock(SerializationWriter::class);

        $expected = [
            'allVisits' => '10',
            'current' => '3000',
            'globalControlGroup' => 'true',
            'host' => 'example.com',
            'identityHash' => 'abc123',
            'init' => '1000',
            'last' => '2000',
            'permUuid' => 'perm-uuid',
            'uniqueVisits' => '5',
            'user_hash' => 'hash456',
            'uuid' => 'uuid-value',
        ];

        $writer->expects($this->exactly(11))
            ->method('writeStringValue')
            ->willReturnCallback(function (string $key, ?string $value) use ($expected) {
                $this->assertArrayHasKey($key, $expected, "Unexpected key: $key");
                $this->assertSame($expected[$key], $value, "Value mismatch for key: $key");
            });

        $writer->expects($this->never())->method('writeIntegerValue');
        $writer->expects($this->never())->method('writeBooleanValue');

        $writer->expects($this->once())->method('writeAdditionalData');

        $params->serialize($writer);
    }
}
