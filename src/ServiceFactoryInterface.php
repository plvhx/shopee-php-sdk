<?php

declare(strict_types=1);

namespace Gandung\Shopee;

use Gandung\Shopee\Constraints\SandboxedAwareInterface;
use Gandung\Shopee\Constraints\PartnerKeyAwareInterface;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
interface ServiceFactoryInterface extends
    SandboxedAwareInterface,
    PartnerKeyAwareInterface
{
    /**
     * Get discount object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getDiscount();

    /**
     * Get first mile tracking object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getFirstMileTracking();

    /**
     * Get image object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getImage();

    /**
     * Get item object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getItem();

    /**
     * Get logistics object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getLogistics();

    /**
     * Get orders object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getOrders();

    /**
     * Get payment object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getPayment();

    /**
     * Get public object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getPublicService();

    /**
     * Get returns object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getReturns();

    /**
     * Get shop object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getShop();

    /**
     * Get shop category object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getShopCategory();

    /**
     * Get top picks object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function getTopPicks();
}
