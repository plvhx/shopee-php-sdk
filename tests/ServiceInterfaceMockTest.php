<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests;

use Gandung\Shopee\ServiceInterface;
use Gandung\Shopee\TokenGenerator;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class ServiceInterfaceMockTest extends TestCase
{
    use AbstractServiceTestTrait;

    public function testCanMockIsSandboxedMethod()
    {
        $service = $this->createMock(ServiceInterface::class);

        $service->expects($this->once())
            ->method('isSandboxed')
            ->willReturn(true);

        $this->assertTrue($service->isSandboxed());
    }

    public function testCanMockSetSandboxStatusMethod()
    {
        $service = $this->createMock(ServiceInterface::class);

        $service->expects($this->once())
            ->method('setSandboxStatus')
            ->with($this->equalTo(true));

        $service->setSandboxStatus(true);
    }

    public function testCanMockGetTokenGeneratorMethod()
    {
        $tokenGenerator = new TokenGenerator();
        $service = $this->createMock(ServiceInterface::class);

        $service->expects($this->once())
            ->method('getTokenGenerator')
            ->willReturn($tokenGenerator);

        $this->assertInstanceOf(TokenGenerator::class, $service->getTokenGenerator());
    }

    public function testCanMockSetTokenGeneratorMethod()
    {
        $tokenGenerator = new TokenGenerator();
        $service = $this->createMock(ServiceInterface::class);

        $service->expects($this->once())
            ->method('setTokenGenerator')
            ->with($this->equalTo($tokenGenerator));

        $service->setTokenGenerator($tokenGenerator);
    }

    public function testCanMockGetHttpClientMethod()
    {
        $httpClient = $this->createHttpClient('http://foo.bar');
        $service = $this->createMock(ServiceInterface::class);

        $service->expects($this->once())
            ->method('getHttpClient')
            ->willReturn($httpClient);

        $this->assertInstanceOf(ClientInterface::class, $service->getHttpClient());
    }

    public function testCanMockSetHttpClientMethod()
    {
        $httpClient = $this->createHttpClient('http://foo.bar');
        $service = $this->createMock(ServiceInterface::class);

        $service->expects($this->once())
            ->method('setHttpClient')
            ->with($this->equalTo($httpClient));

        $service->setHttpClient($httpClient);
    }

    public function testCanMockGetUrlMethod()
    {
        $service = $this->createMock(ServiceInterface::class);

        $service->expects($this->once())
            ->method('getUrl')
            ->willReturn('http://example.com');

        $this->assertEquals('http://example.com', $service->getUrl());
    }

    public function testCanMockSetUrlMethod()
    {
        $service = $this->createMock(ServiceInterface::class);

        $service->expects($this->once())
            ->method('setUrl')
            ->with($this->equalTo('http://example.com'));

        $service->setUrl('http://example.com');
    }
}
