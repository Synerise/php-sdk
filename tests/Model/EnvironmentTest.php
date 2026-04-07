<?php

declare(strict_types=1);

namespace Synerise\Tests\Model;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Synerise\Sdk\Model\Environment;

class EnvironmentTest extends TestCase
{
    public function testAzureShouldBeValid(): void
    {
        $env = new Environment('azure');

        $this->assertSame('azure', $env->value());
        $this->assertSame('Microsoft Azure (EU)', $env->label());
    }

    public function testGcpShouldBeValid(): void
    {
        $env = new Environment('gcp');

        $this->assertSame('gcp', $env->value());
        $this->assertSame('Google Cloud Platform', $env->label());
    }

    public function testFromShouldCreateInstance(): void
    {
        $env = Environment::from('azure');

        $this->assertInstanceOf(Environment::class, $env);
    }

    public function testAzureUsShouldBeValid(): void
    {
        $env = new Environment('azure_us');

        $this->assertSame('azure_us', $env->value());
        $this->assertSame('Microsoft Azure (US)', $env->label());
        $this->assertSame('https://api.azu.synerise.com', $env->getApiHost());
        $this->assertSame('web.azu.snrbox.com', $env->getTrackerHost());
    }

    public function testHasShouldReturnTrueForValidValues(): void
    {
        $this->assertTrue(Environment::has('azure'));
        $this->assertTrue(Environment::has('azure_us'));
        $this->assertTrue(Environment::has('gcp'));
        $this->assertTrue(Environment::has('AZURE'));
    }

    public function testHasShouldReturnFalseForInvalidValues(): void
    {
        $this->assertFalse(Environment::has('aws'));
        $this->assertFalse(Environment::has(''));
    }

    public function testInvalidValueShouldThrow(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Environment('aws');
    }

    public function testGetApiHostShouldReturnCorrectUrl(): void
    {
        $azure = new Environment('azure');
        $gcp = new Environment('gcp');

        $this->assertSame('https://api.synerise.com', $azure->getApiHost());
        $this->assertSame('https://api.geb.synerise.com', $gcp->getApiHost());
    }

    public function testGetTrackerHostShouldReturnCorrectUrl(): void
    {
        $azure = new Environment('azure');
        $gcp = new Environment('gcp');

        $this->assertSame('web.snrbox.com', $azure->getTrackerHost());
        $this->assertSame('web.geb.snrbox.com', $gcp->getTrackerHost());
    }
}
