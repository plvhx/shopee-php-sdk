<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class Payment extends Resource
{
    /**
     * Use this API to get the transaction records of
     * wallet.
     *
     * @param array $data
     * @return string
     */
    public function getTransactionList(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/wallet/transaction/list',
            $data
        );
    }

    /**
     * Use this API to fetch the detailed amount of
     * online adjustment.
     *
     * @param array $data
     * @return string
     */
    public function getPayoutDetail(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/payment/get_payout_details',
            $data
        );
    }
}
