<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests;

use Gandung\Shopee\TokenGenerator;
use Gandung\Shopee\TokenGeneratorInterface;
use PHPUnit\Framework\TestCase;

class TokenGeneratorTest extends TestCase
{
    public function testCanGetInstance()
    {
        $tokenGenerator = new TokenGenerator();
        $this->assertInstanceOf(TokenGeneratorInterface::class, $tokenGenerator);
    }

    public function testCanSetUrl()
    {
        $tokenGenerator = new TokenGenerator("123123", "http://example.com");
        $this->assertInstanceOf(TokenGeneratorInterface::class, $tokenGenerator);
        $this->assertEquals("http://example.com", $tokenGenerator->getUrl());
        $tokenGenerator->setUrl("http://foo.bar.baz");
        $this->assertEquals("http://foo.bar.baz", $tokenGenerator->getUrl());
    }

    public function testCanSetPartnerKey()
    {
        $tokenGenerator = new TokenGenerator("123123", "http://example.com");
        $this->assertInstanceOf(TokenGeneratorInterface::class, $tokenGenerator);
        $this->assertEquals("123123", $tokenGenerator->getPartnerKey());
        $tokenGenerator->setPartnerKey("sdfsdf");
        $this->assertEquals("sdfsdf", $tokenGenerator->getPartnerKey());
    }

    public function testCanSetData()
    {
        $tokenGenerator = new TokenGenerator("123123", "http://example.com", [10, 20]);
        $this->assertInstanceOf(TokenGeneratorInterface::class, $tokenGenerator);
        $this->assertEquals(json_encode([10, 20]), $tokenGenerator->getData());
        $tokenGenerator->setData(['foo' => 10, 'bar' => 20]);
        $this->assertEquals(
            json_encode(['foo' => 10, 'bar' => 20]),
            $tokenGenerator->getData()
        );
    }

    public function testCanGenerateToken()
    {
        $tokenGenerator = new TokenGenerator("123123", "http://example.com", [10, 20]);
        $this->assertInstanceOf(TokenGeneratorInterface::class, $tokenGenerator);
        $this->assertEquals(
            "4badd257706255dbc12012a04ff7d27edaef0524bd95b7b254a6fa4bbcc46399",
            $tokenGenerator->generateToken()
        );
    }
}
