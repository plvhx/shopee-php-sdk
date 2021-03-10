<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class Discount extends Resource
{
    /**
     * Use this api to add shop discount activity.
     * Maximum number of upcoming and ongoing discounts
     * together is capped at 1000 discounts.
     *
     * @param array $data
     * @return string
     */
    public function addDiscount(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/discount/add',
            $data
        );
    }

    /**
     * Use this api to add shop discount item.
     *
     * @param array $data
     * @return string
     */
    public function addDiscountItem(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/discount/items/add',
            $data
        );
    }

    /**
     * Use this api to delete one account activity
     * before it starts.
     *
     * @param array $data
     * @return string
     */
    public function deleteDiscount(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/discount/delete',
            $data
        );
    }

    /**
     * Use this api to delete items of the discount activity.
     *
     * @param array $data
     * @return string
     */
    public function deleteDiscountItem(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/discount/item/delete',
            $data
        );
    }

    /**
     * Use this api to get one shop discount activity detail.
     *
     * @param array $data
     * @return string
     */
    public function getDiscountDetail(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/discount/detail',
            $data
        );
    }

    /**
     * Use this api to get shop discount activity list.
     *
     * @param array $data
     * @return string
     */
    public function getDiscountsList(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/discounts/get',
            $data
        );
    }

    /**
     * Use this api to update one discount information.
     * Maximum number of upcoming and ongoing discounts
     * together is capped at 1000 discounts.
     *
     * @param array $data
     * @return string
     */
    public function updateDiscount(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/discount/update',
            $data
        );
    }

    /**
     * Use this api to update items of the discount activity.
     *
     * @param array $data
     * @return string
     */
    public function updateDiscountItems(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/discount/items/update',
            $data
        );
    }
}
