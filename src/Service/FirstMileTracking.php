<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class FirstMileTracking extends Resource
{
    /**
     * Use this API to generate first-mile tracking
     * number for the shipment method of pickup. Please
     * note that the prerequisite for using this API
     * is that the order status is ready_to_ship and the
     * tracking number of order has been obtained. Only
     * applicable to cross-border sellers in China.
     *
     * @param array $data
     * @return string
     */
    public function generateFMTrackingNo(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/fm_tn/generate',
            $data
        );
    }

    /**
     * Use this API to fetch first-mile tracking numbers of
     * the shop. Only applicable to cross-border sellers in China.
     *
     * @param array $data
     * @return string
     */
    public function getShopFMTrackingNo(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/fm_tn/get',
            $data
        );
    }

    /**
     * Use this API to bind orders with the first-mile tracking
     * number. Only applicable to cross-border sellers in China.
     *
     * @param array $data
     * @return string
     */
    public function firstMileCodeBindOrder(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/fm_tn/bind',
            $data
        );
    }

    /**
     * Use this API to fetch the detailed information of first-mile
     * tracking number. Only applicable to cross-border sellers in China.
     *
     * @param array $data
     * @return string
     */
    public function getFmTnDetail(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/fm_tn/detail',
            $data
        );
    }

    /**
     * Use the API to get the waybill of first-mile tracking number. Please
     * note that this API only used for the shipment method of pickup. Only
     * applicable to cross-border sellers in China.
     *
     * @param array $data
     * @return string
     */
    public function getFMTrackingNoWaybill(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/fm_tn/waybill',
            $data
        );
    }

    /**
     * Use this call to get all supported logistic channels for first mile.
     * Only applicable to cross-border in China.
     *
     * @param array $data
     * @return string
     */
    public function getShopFirstMileChannel(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/fm_tn/channels',
            $data
        );
    }

    /**
     * Use this API to unbind orders with the first-mile tracking number.
     * Only applicable to cross-border sellers in China.
     *
     * @param array $data
     * @return string
     */
    public function firstMileUnbind(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/fm_tn/unbind',
            $data
        );
    }
}
