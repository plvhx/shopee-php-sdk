<?php

declare(strict_types=1);

namespace Gandung\Shopee\Builder;

use Gandung\Shopee\ServiceInterface;
use Gandung\Shopee\Service\Returns;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class ReturnsBuilder implements ServiceBuilderInterface
{
    use ServiceBuilderTrait;

    /**
     * {@inheritdoc}
     */
    public function build(): ServiceInterface
    {
        return new Returns(
            $this->getTokenGenerator(),
            $this->getPartnerKey(),
            $this->isSandboxed()
        );
    }
}
