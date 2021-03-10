<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests;

use Gandung\Shopee\ServiceFactoryInterface;
use Gandung\Shopee\TokenGenerator;
use Gandung\Shopee\Service\Discount;
use Gandung\Shopee\Service\FirstMileTracking;
use Gandung\Shopee\Service\Image;
use Gandung\Shopee\Service\Item;
use Gandung\Shopee\Service\Logistics;
use Gandung\Shopee\Service\Orders;
use Gandung\Shopee\Service\Payment;
use Gandung\Shopee\Service\PublicService;
use Gandung\Shopee\Service\Returns;
use Gandung\Shopee\Service\Shop;
use Gandung\Shopee\Service\ShopCategory;
use Gandung\Shopee\Service\TopPicks;
use PHPUnit\Framework\TestCase;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class ServiceFactoryInterfaceMockTest extends TestCase
{
    public function testCanMockIsSandboxedMethod()
    {
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('isSandboxed')
            ->willReturn(true);

        $this->assertTrue($factory->isSandboxed());
    }

    public function testCanMockSetSandboxStatusMethod()
    {
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('setSandboxStatus')
            ->with($this->equalTo(true));

        $factory->setSandboxStatus(true);
    }

    public function testCanMockGetPartnerKeyMethod()
    {
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getPartnerKey')
            ->willReturn("123123");

        $this->assertEquals("123123", $factory->getPartnerKey());
    }

    public function testCanMockSetPartnerKeyMethod()
    {
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('setPartnerKey')
            ->with($this->equalTo("123123"));

        $factory->setPartnerKey("123123");
    }

    public function testCanMockGetDiscountMethod()
    {
        $discount = new Discount(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getDiscount')
            ->willReturn($discount);

        $this->assertInstanceOf(Discount::class, $factory->getDiscount());
    }

    public function testCanMockGetFirstMileTrackingMethod()
    {
        $firstMileTracking = new FirstMileTracking(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getFirstMileTracking')
            ->willReturn($firstMileTracking);

        $this->assertInstanceOf(FirstMileTracking::class, $factory->getFirstMileTracking());
    }

    public function testCanMockGetImageMethod()
    {
        $image = new Image(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getImage')
            ->willReturn($image);

        $this->assertInstanceOf(Image::class, $factory->getImage());
    }

    public function testCanMockGetItemMethod()
    {
        $item = new Item(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getItem')
            ->willReturn($item);

        $this->assertInstanceOf(Item::class, $factory->getItem());
    }

    public function testCanMockGetLogisticsMethod()
    {
        $logistics = new Logistics(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getLogistics')
            ->willReturn($logistics);

        $this->assertInstanceOf(Logistics::class, $factory->getLogistics());
    }

    public function testCanMockGetOrdersMethod()
    {
        $orders = new Orders(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getOrders')
            ->willReturn($orders);

        $this->assertInstanceOf(Orders::class, $factory->getOrders());
    }

    public function testCanMockGetPaymentMethod()
    {
        $payment = new Payment(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getPayment')
            ->willReturn($payment);

        $this->assertInstanceOf(Payment::class, $factory->getPayment());
    }

    public function testCanMockGetPublicServiceMethod()
    {
        $publicService = new PublicService(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getPublicService')
            ->willReturn($publicService);

        $this->assertInstanceOf(PublicService::class, $factory->getPublicService());
    }

    public function testCanMockGetReturnsMethod()
    {
        $returns = new Returns(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getReturns')
            ->willReturn($returns);

        $this->assertInstanceOf(Returns::class, $factory->getReturns());
    }

    public function testCanMockGetShopMethod()
    {
        $shop = new Shop(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getShop')
            ->willReturn($shop);

        $this->assertInstanceOf(Shop::class, $factory->getShop());
    }

    public function testCanMockGetShopCategoryMethod()
    {
        $shopCategory = new ShopCategory(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getShopCategory')
            ->willReturn($shopCategory);

        $this->assertInstanceOf(ShopCategory::class, $factory->getShopCategory());
    }

    public function testCanMockGetTopPicksMethod()
    {
        $topPicks = new TopPicks(new TokenGenerator(), "123123", true);
        $factory = $this->createMock(ServiceFactoryInterface::class);

        $factory->expects($this->once())
            ->method('getTopPicks')
            ->willReturn($topPicks);

        $this->assertInstanceOf(TopPicks::class, $factory->getTopPicks());
    }
}
