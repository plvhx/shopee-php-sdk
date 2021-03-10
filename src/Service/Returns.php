<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class Returns extends Resource
{
    /**
     * Use this API to confirm when buyer requests
     * return/refund or when seller receive returned
     * parcel and want to confirm.
     *
     * @param array $data
     * @return string
     */
    public function confirmReturn(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/returns/confirm',
            $data
        );
    }

    /**
     * Use this API to dispute when buyer requests return/refund
     * or when seller receives parcel and want to dispute.
     *
     * @param array $data
     * @return string
     */
    public function disputeReturn(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/returns/dispute',
            $data
        );
    }

    /**
     * Get return list.
     *
     * @param array $data
     * @return string
     */
    public function getReturnList(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/returns/get',
            $data
        );
    }

    /**
     * Use this API to get detail information of a returned order.
     *
     * @param array $data
     * @return string
     */
    public function getReturnDetail(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/returns/detail',
            $data
        );
    }
}
