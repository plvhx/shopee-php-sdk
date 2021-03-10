<?php

declare(strict_types=1);

namespace Gandung\Shopee\Builder;

use Gandung\Shopee\ServiceInterface;
use Gandung\Shopee\Service\TopPicks;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class TopPicksBuilder implements ServiceBuilderInterface
{
    use ServiceBuilderTrait;

    /**
     * {@inheritdoc}
     */
    public function build(): ServiceInterface
    {
        return new TopPicks(
            $this->getTokenGenerator(),
            $this->getPartnerKey(),
            $this->isSandboxed()
        );
    }
}
