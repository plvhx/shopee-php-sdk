<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests;

use Gandung\Shopee\TokenGeneratorInterface;
use PHPUnit\Framework\TestCase;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class TokenGeneratorInterfaceMockTest extends TestCase
{
    public function testCanMockGetPartnerKeyMethod()
    {
        $tokenGenerator = $this->createMock(TokenGeneratorInterface::class);

        $tokenGenerator->expects($this->once())
            ->method('getPartnerKey')
            ->willReturn('sdf123sdf123');

        $this->assertEquals('sdf123sdf123', $tokenGenerator->getPartnerKey());
    }

    public function testCanMockSetPartnerKeyMethod()
    {
        $tokenGenerator = $this->createMock(TokenGeneratorInterface::class);

        $tokenGenerator->expects($this->once())
            ->method('setPartnerKey')
            ->with($this->equalTo('sdf123sdf123'));

        $tokenGenerator->setPartnerKey('sdf123sdf123');
    }

    public function testCanMockGenerateTokenMethod()
    {
        $tokenGenerator = $this->createMock(TokenGeneratorInterface::class);

        $tokenGenerator->expects($this->once())
            ->method('generateToken')
            ->willReturn("123123");

        $this->assertEquals("123123", $tokenGenerator->generateToken());
    }

    public function testCanMockGetUrlMethod()
    {
        $tokenGenerator = $this->createMock(TokenGeneratorInterface::class);

        $tokenGenerator->expects($this->once())
            ->method('getUrl')
            ->willReturn('http://example.com');

        $this->assertEquals('http://example.com', $tokenGenerator->getUrl());
    }

    public function testCanMockSetUrlMethod()
    {
        $tokenGenerator = $this->createMock(TokenGeneratorInterface::class);

        $tokenGenerator->expects($this->once())
            ->method('setUrl')
            ->with($this->equalTo('http://foo.bar'));

        $tokenGenerator->setUrl('http://foo.bar');
    }

    public function testCanMockGetDataMethod()
    {
        $data = json_encode(['foo', 'bar', 'baz']);
        $tokenGenerator = $this->createMock(TokenGeneratorInterface::class);

        $tokenGenerator->expects($this->once())
            ->method('getData')
            ->willReturn($data);

        $this->assertEquals($data, $tokenGenerator->getData());
    }

    public function testCanMockSetDataMethod()
    {
        $data = ['foo', 'bar', 'baz'];
        $tokenGenerator = $this->createMock(TokenGeneratorInterface::class);

        $tokenGenerator->expects($this->once())
            ->method('setData')
            ->with($this->equalTo($data));

        $tokenGenerator->setData($data);
    }
}
