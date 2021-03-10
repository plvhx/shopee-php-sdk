<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class PublicService extends Resource
{
    /**
     * Use this call to get basic info of shops which
     * have authorized to the partner.
     *
     * @param array $data
     * @return string
     */
    public function getShopsByPartner(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop/get_partner_shop',
            $data
        );
    }

    /**
     * Use this api to get categories list filtered by country
     * and cross border without using ShopID.
     *
     * @param array $data
     * @return string
     */
    public function getCategoriesByCountry(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/categories/get_by_country',
            $data
        );
    }

    /**
     * Get supported payment method list by country.
     *
     * @param array $data
     * @return string
     */
    public function getPaymentList(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/payment/list',
            $data
        );
    }
}
