<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests;

use Gandung\Shopee\AbstractService;
use Gandung\Shopee\TokenGenerator;
use Gandung\Shopee\Tests\Fixtures\ImplementorService;
use PHPUnit\Framework\TestCase;

use function spl_object_hash;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class AbstractServiceTest extends TestCase
{
    use AbstractServiceTestTrait;

    public function testCanGetInstanceOf1()
    {
        $service = new ImplementorService(new TokenGenerator());
        $this->assertInstanceOf(AbstractService::class, $service);
    }

    public function testCanGetInstanceOf2()
    {
        $service = new ImplementorService(new TokenGenerator(), "123123", true);
        $this->assertInstanceOf(AbstractService::class, $service);
    }

    public function testCanSetSandboxed()
    {
        $service = new ImplementorService(new TokenGenerator(), "123123", true);
        $this->assertTrue($service->isSandboxed());
        $service->setSandboxStatus(false);
        $this->assertFalse($service->isSandboxed());
    }

    public function testCanSetUrl()
    {
        $service = new ImplementorService(new TokenGenerator(), "123123", true);
        $this->assertEquals("https://partner.uat.shopeemobile.com", $service->getUrl());
        $service->setUrl("http://foo.bar.baz");
        $this->assertEquals("http://foo.bar.baz", $service->getUrl());
    }

    public function testCanSetHttpClient()
    {
        $service = new ImplementorService(new TokenGenerator(), "123123", true);
        $srcClient = $service->getHttpClient();
        $service->setHttpClient($this->createHttpClient($service->getUrl()));
        $destClient = $service->getHttpClient();
        $this->assertTrue(spl_object_hash($srcClient) !== spl_object_hash($destClient));
    }

    public function testCanSetToken()
    {
        $service = new ImplementorService(new TokenGenerator(), "123123", true);
        $srcTokenObj = $service->getTokenGenerator();
        $service->setTokenGenerator(new TokenGenerator());
        $destTokenObj = $service->getTokenGenerator();
        $this->assertTrue(spl_object_hash($srcTokenObj) !== spl_object_hash($destTokenObj));
    }
}
