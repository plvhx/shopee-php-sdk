<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class Logistics extends Resource
{
    /**
     * Use this call to get all supported logistic channels.
     *
     * @param array $data
     * @return string
     */
    public function getLogistics(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/channel/get',
            $data
        );
    }

    /**
     * Configure shop level logistics.
     *
     * @param array $data
     * @return string
     */
    public function updateShopLogistics(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/channels/update',
            $data
        );
    }

    /**
     * Use this call to get all required param for logistic
     * initiation.
     *
     * @param array $data
     * @return string
     */
    public function getParameterForInit(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/init_parameter/get',
            $data
        );
    }

    /**
     * For integrated logistics channel, use this call
     * to get pickup address for pickup mode order.
     *
     * @param array $data
     * @return string
     */
    public function getAddress(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/address/get',
            $data
        );
    }

    /**
     * For integrated logistics channel, use this call
     * to get pickup timeslot for pickup mode order.
     *
     * @param array $data
     * @return string
     */
    public function getTimeSlot(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/timeslot/get',
            $data
        );
    }

    /**
     * For integrated logistics, use this call to get dropoff
     * location for dropoff mode order.
     *
     * @param array $data
     * @return string
     */
    public function getBranch(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/branch/get',
            $data
        );
    }

    /**
     * Get all the logistics info of an order to Init. This API
     * consolidates the output of GetParameterForInit, GetAddress,
     * GetTimeSlot and GetBranch on each order so that developer
     * can get all the required parameters ready in this API for Init.
     * This API is an alternative of GetParameterForInit, GetAddress,
     * GetTimeSlot and GetBranch as a set.
     *
     * @param array $data
     * @return string
     */
    public function getLogisticInfo(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/init_info/get',
            $data
        );
    }

    /**
     * Use this call to initiate logistics including arrange Pickup,
     * Dropoff or shipment for non-integrated logistic channels. Should
     * call 'shopee.logistics.GetLogisticInfo' to fetch all required param
     * first. It's recommended to initiate logistics one hour AFTER the orders
     * were placed since there is one-hour window buyer can cancel any order
     * without request to seller.
     *
     * @param array $data
     * @return string
     */
    public function init(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/init',
            $data
        );
    }

    /**
     * Use this API to get airway bill for orders. AirwayBill is only
     * fetchable when the order status is under READY_TO_SHIP and
     * RETRY_SHIP.
     *
     * @param array $data
     * @return string
     */
    public function getAirwayBill(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/airway_bill/get_mass',
            $data
        );
    }

    /**
     * Use this call to fetch the logistics information of an order,
     * these info can be used for airwaybill printing. Dedicated for
     * crossborder SLS order airwaybill. May not be applicable for local
     * channel airwaybill.
     *
     * @param array $data
     * @return string
     */
    public function getOrderLogistics(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/order/get',
            $data
        );
    }

    /**
     * Use this call to get the logistics tracking information
     * of an order.
     *
     * @param array $data
     * @return string
     */
    public function getLogisticsMessage(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/tracking',
            $data
        );
    }

    /**
     * Use this API to get airwaybill for fulfillment orders.
     *
     * @param array $data
     * @return string
     */
    public function getForderWayBill(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/forder_waybill/get_mass',
            $data
        );
    }

    /**
     * Use this API to set default_address/pick_up_address/return_address
     * of shop. Please use GetAddress API to fetch the address_id.
     *
     * @param array $data
     * @return string
     */
    public function setAddress(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/address/set',
            $data
        );
    }

    /**
     * Use this API to delete the default/pick_up/return address of shop
     * by address_id. Please use GetAddress API to fetch the address_id.
     *
     * @param array $data
     * @return string
     */
    public function deleteAddress(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/logistics/address/delete',
            $data
        );
    }
}
