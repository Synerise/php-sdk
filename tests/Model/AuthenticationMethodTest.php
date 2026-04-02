<?php

declare(strict_types=1);

namespace Synerise\Tests\Model;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Model\AuthenticationMethod;

class AuthenticationMethodTest extends TestCase
{
    public function testBearerShouldBeValid(): void
    {
        $method = new AuthenticationMethod('bearer');

        $this->assertSame('bearer', $method->value());
        $this->assertSame('Bearer', $method->label());
    }

    public function testBasicShouldBeValid(): void
    {
        $method = new AuthenticationMethod('basic');

        $this->assertSame('basic', $method->value());
        $this->assertSame('Basic', $method->label());
    }

    public function testFromShouldCreateInstance(): void
    {
        $method = AuthenticationMethod::from('bearer');

        $this->assertInstanceOf(AuthenticationMethod::class, $method);
        $this->assertSame('bearer', $method->value());
    }

    public function testHasShouldReturnTrueForValidValues(): void
    {
        $this->assertTrue(AuthenticationMethod::has('bearer'));
        $this->assertTrue(AuthenticationMethod::has('basic'));
        $this->assertTrue(AuthenticationMethod::has('BEARER'));
    }

    public function testHasShouldReturnFalseForInvalidValues(): void
    {
        $this->assertFalse(AuthenticationMethod::has('oauth'));
        $this->assertFalse(AuthenticationMethod::has(''));
    }

    public function testInvalidValueShouldThrow(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new AuthenticationMethod('invalid');
    }
}
