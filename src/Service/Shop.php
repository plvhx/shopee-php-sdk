<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class Shop extends Resource
{
    /**
     * Use this call to get information of shop.
     *
     * @param array $data
     * @return string
     */
    public function getShopInfo(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop/get',
            $data
        );
    }

    /**
     * Use this call to update information of shop.
     *
     * @param array $data
     * @return string
     */
    public function updateShopInfo(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop/update',
            $data
        );
    }

    /**
     * Shop performance includes the indexes from 'My Performance'
     * of Seller Center.
     *
     * @param array $data
     * @return string
     */
    public function performance(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop/performance',
            $data
        );
    }

    /**
     * Only for TW whitelisted shop. Use this API
     * to set the installment status of shop.
     *
     * @param array $data
     * @return string
     */
    public function setShopInstallmentStatus(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop/set_installment_status',
            $data
        );
    }
}
