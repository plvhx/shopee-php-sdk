<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class Orders extends Resource
{
    /**
     * GetOrdersList is the recommended call to use for order
     * management. Use this call to retrieve basic information of all orders
     * which are updated within specific period of time. More details of each
     * order can be retrieved from GetOrderDetails.
     *
     * @param array $data
     * @return string
     */
    public function getOrdersList(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/basics',
            $data
        );
    }

    /**
     * GetOrdersByStatus is the recommended call to use for order
     * management. Use this call to retrieve basic information of all
     * orders which are specific status. More details of each order can be
     * retrieved from GetOrderDetails.
     *
     * @param array $data
     * @return string
     */
    public function getOrdersByStatus(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/get',
            $data
        );
    }

    /**
     * Use this call to retrieve detailed information about one or more
     * orders based on OrderSN.
     *
     * @param array $data
     * @return string
     */
    public function getOrderDetails(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/detail',
            $data
        );
    }

    /**
     * Use this call to retrieve detailed escrow information about one
     * order based on OrderSN.
     *
     * @param array $data
     * @return string
     */
    public function getEscrowDetails(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/my_income',
            $data
        );
    }

    /**
     * Use this call to add note for an order.
     *
     * @param array $data
     * @return string
     */
    public function addOrderNote(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/note/add',
            $data
        );
    }

    /**
     * Use this call to cancel an order from the seller side.
     *
     * @param array $data
     * @return string
     */
    public function cancelOrder(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/cancel',
            $data
        );
    }

    /**
     * Use this call to accept buyer cancellation.
     *
     * @param array $data
     * @return string
     */
    public function acceptBuyerCancellation(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/buyer_cancellation/accept',
            $data
        );
    }

    /**
     * Use this call to reject buyer cancellation.
     *
     * @param array $data
     * @return string
     */
    public function rejectBuyerCancellation(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/buyer_cancellation/reject',
            $data
        );
    }

    /**
     * Use this call to retrieve detailed information of all
     * the fulfill orders(forder) under a single regular order
     * based on orderSN.
     *
     * @param array $data
     * @return string
     */
    public function getForderInfo(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/forder/get',
            $data
        );
    }

    /**
     * Use this api to get orders release time and
     * escrow amount.
     *
     * @param array $data
     * @return string
     */
    public function getEscrowReleasedOrders(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/get_escrow_detail',
            $data
        );
    }

    /**
     * Use this API to split order into fulfillment orders.
     * This feature is only enabled for whitelisted shops.
     *
     * @param array $data
     * @return string
     */
    public function splitOrder(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/split',
            $data
        );
    }

    /**
     * Use this API to cancel split order from the seller side.
     *
     * @param array $data
     * @return string
     */
    public function undoSplitOrder(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/unsplit',
            $data
        );
    }

    /**
     * Use this call to get a list of unbind orders.
     *
     * @param array $data
     * @return string
     */
    public function getUnbindOrderList(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/unbind/list',
            $data
        );
    }

    /**
     * Use this API to fetch the accounting detail of order.
     *
     * @param array $data
     * @return string
     */
    public function myIncome(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/orders/income',
            $data
        );
    }
}
