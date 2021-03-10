<?php

declare(strict_types=1);

namespace Gandung\Shopee\Builder;

use Gandung\Shopee\ServiceInterface;
use Gandung\Shopee\Service\Image;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class ImageBuilder implements ServiceBuilderInterface
{
    use ServiceBuilderTrait;

    /**
     * {@inheritdoc}
     */
    public function build(): ServiceInterface
    {
        return new Image(
            $this->getTokenGenerator(),
            $this->getPartnerKey(),
            $this->isSandboxed()
        );
    }
}
