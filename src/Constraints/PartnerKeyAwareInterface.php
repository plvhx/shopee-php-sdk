<?php

declare(strict_types=1);

namespace Gandung\Shopee\Constraints;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
interface PartnerKeyAwareInterface
{
    /**
     * Get partner key.
     *
     * @return string
     */
    public function getPartnerKey(): string;

    /**
     * Set partner key.
     *
     * @param string $partnerKey
     * @return static
     */
    public function setPartnerKey(string $partnerKey);
}
