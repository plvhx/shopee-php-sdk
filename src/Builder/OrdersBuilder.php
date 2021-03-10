<?php

declare(strict_types=1);

namespace Gandung\Shopee\Builder;

use Gandung\Shopee\ServiceInterface;
use Gandung\Shopee\Service\Orders;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class OrdersBuilder implements ServiceBuilderInterface
{
    use ServiceBuilderTrait;

    /**
     * {@inheritdoc}
     */
    public function build(): ServiceInterface
    {
        return new Orders(
            $this->getTokenGenerator(),
            $this->getPartnerKey(),
            $this->isSandboxed()
        );
    }
}
