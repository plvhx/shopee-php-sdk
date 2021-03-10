<?php

declare(strict_types=1);

namespace Gandung\Shopee\Constraints;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
interface SandboxedAwareInterface
{
    /**
     * @return bool
     */
    public function isSandboxed();

    public function setSandboxStatus(bool $sandboxed);
}
