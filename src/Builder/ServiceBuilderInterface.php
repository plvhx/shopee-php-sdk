<?php

declare(strict_types=1);

namespace Gandung\Shopee\Builder;

use Gandung\Shopee\ServiceInterface;
use Gandung\Shopee\Constraints\PartnerKeyAwareInterface;
use Gandung\Shopee\Constraints\SandboxedAwareInterface;
use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
interface ServiceBuilderInterface extends
    PartnerKeyAwareInterface,
    SandboxedAwareInterface,
    TokenGeneratorAwareInterface
{
    /**
     * Build a specific service object.
     *
     * @return \Gandung\Shopee\ServiceInterface
     */
    public function build(): ServiceInterface;
}
