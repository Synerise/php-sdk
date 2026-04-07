<?php

declare(strict_types=1);

namespace Synerise\Tests\Helper;

use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Helper\HashString;

class HashStringTest extends TestCase
{
    public function testHashStringShouldReturnInt(): void
    {
        $result = HashString::hashString('test');

        $this->assertIsInt($result);
    }

    public function testHashStringShouldBeDeterministic(): void
    {
        $hash1 = HashString::hashString('hello@example.com');
        $hash2 = HashString::hashString('hello@example.com');

        $this->assertSame($hash1, $hash2);
    }

    public function testDifferentStringsShouldProduceDifferentHashes(): void
    {
        $hash1 = HashString::hashString('alice@example.com');
        $hash2 = HashString::hashString('bob@example.com');

        $this->assertNotSame($hash1, $hash2);
    }

    public function testEmptyStringShouldReturnZero(): void
    {
        $this->assertSame(0, HashString::hashString(''));
    }

    public function testKnownJavaHashCodeCompatibility(): void
    {
        // Java's String.hashCode() for "test" is 3556498
        $this->assertSame(3556498, HashString::hashString('test'));
    }
}
