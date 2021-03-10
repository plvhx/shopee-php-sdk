<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests;

use Gandung\Shopee\ServiceFactory;
use Gandung\Shopee\ServiceFactoryInterface;
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
class ServiceFactoryTest extends TestCase
{
    public function testCanGetInstance()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(ServiceFactoryInterface::class, $factory);
    }

    public function testCanGetInstanceWithSandboxEnabled()
    {
        $factory = new ServiceFactory("123123", true);
        $this->assertInstanceOf(ServiceFactoryInterface::class, $factory);
    }

    public function testCanGetInstanceWithSandboxDisabled()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(ServiceFactoryInterface::class, $factory);
    }

    public function testCanGetSandboxStatus()
    {
        $factory = new ServiceFactory("123123");
        $this->assertFalse($factory->isSandboxed());
    }

    public function testCanGetDiscountServiceObject()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(Discount::class, $factory->getDiscount());
    }

    public function testCanGetFirstMileTrackingObject()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(FirstMileTracking::class, $factory->getFirstMileTracking());
    }

    public function testCanGetImageObject()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(Image::class, $factory->getImage());
    }

    public function testCanGetItemObject()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(Item::class, $factory->getItem());
    }

    public function testCanGetLogisticsObject()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(Logistics::class, $factory->getLogistics());
    }

    public function testCanGetOrdersObject()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(Orders::class, $factory->getOrders());
    }

    public function testCanGetPaymentObject()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(Payment::class, $factory->getPayment());
    }

    public function testCanGetPublicService()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(PublicService::class, $factory->getPublicService());
    }

    public function testCanGetReturnsService()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(Returns::class, $factory->getReturns());
    }

    public function testCanGetShopService()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(Shop::class, $factory->getShop());
    }

    public function testCanGetShopCategoryService()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(ShopCategory::class, $factory->getShopCategory());
    }

    public function testCanGetTopPicksService()
    {
        $factory = new ServiceFactory("123123");
        $this->assertInstanceOf(TopPicks::class, $factory->getTopPicks());
    }
}
