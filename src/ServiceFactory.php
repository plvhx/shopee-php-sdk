<?php

declare(strict_types=1);

namespace Gandung\Shopee;

use Gandung\Shopee\Builder\DiscountBuilder;
use Gandung\Shopee\Builder\FirstMileTrackingBuilder;
use Gandung\Shopee\Builder\ImageBuilder;
use Gandung\Shopee\Builder\ItemBuilder;
use Gandung\Shopee\Builder\LogisticsBuilder;
use Gandung\Shopee\Builder\OrdersBuilder;
use Gandung\Shopee\Builder\PaymentBuilder;
use Gandung\Shopee\Builder\PublicServiceBuilder;
use Gandung\Shopee\Builder\ReturnsBuilder;
use Gandung\Shopee\Builder\ShopBuilder;
use Gandung\Shopee\Builder\ShopCategoryBuilder;
use Gandung\Shopee\Builder\TopPicksBuilder;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
final class ServiceFactory implements ServiceFactoryInterface
{
    /**
     * @var bool
     */
    private $sandboxed = false;

    /**
     * @var \Gandung\Shopee\TokenGeneratorInterface
     */
    private $tokenGenerator;

    /**
     * @param string $partnerKey
     * @return static
     */
    public function __construct(string $partnerKey, bool $sandboxed = false)
    {
        $this->setPartnerKey($partnerKey);
        $this->setSandboxStatus($sandboxed);
    }

    /**
     * {@inheritdoc}
     */
    public function isSandboxed()
    {
        return $this->sandboxed;
    }

    /**
     * {@inheritdoc}
     */
    public function setSandboxStatus(bool $sandboxed)
    {
        $this->sandboxed = $sandboxed;
    }

    /**
     * {@inheritdoc}
     */
    public function getPartnerKey(): string
    {
        return $this->partnerKey;
    }

    /**
     * {@inheritdoc}
     */
    public function setPartnerKey(string $partnerKey)
    {
        $this->partnerKey = $partnerKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getDiscount()
    {
        return DiscountBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getFirstMileTracking()
    {
        return FirstMileTrackingBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getImage()
    {
        return ImageBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getItem()
    {
        return ItemBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getLogistics()
    {
        return LogisticsBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrders()
    {
        return OrdersBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getPayment()
    {
        return PaymentBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getPublicService()
    {
        return PublicServiceBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getReturns()
    {
        return ReturnsBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getShop()
    {
        return ShopBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getShopCategory()
    {
        return ShopCategoryBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }

    /**
     * {@inheritdoc}
     */
    public function getTopPicks()
    {
        return TopPicksBuilder::create()
            ->setSandboxStatus($this->isSandboxed())
            ->setPartnerKey($this->getPartnerKey())
            ->setTokenGenerator(new TokenGenerator())
            ->build();
    }
}
