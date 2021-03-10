<?php

declare(strict_types=1);

namespace Gandung\Shopee\Builder;

use Gandung\Shopee\ServiceInterface;
use Gandung\Shopee\Service\Shop;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class ShopBuilder implements ServiceBuilderInterface
{
    use ServiceBuilderTrait;

    /**
     * {@inheritdoc}
     */
    public function build(): ServiceInterface
    {
        return new Shop(
            $this->getTokenGenerator(),
            $this->getPartnerKey(),
            $this->isSandboxed()
        );
    }
}
