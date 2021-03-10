<?php

declare(strict_types=1);

namespace Gandung\Shopee;

use Gandung\Shopee\Constraints\PartnerKeyAwareInterface;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
interface TokenGeneratorInterface extends PartnerKeyAwareInterface
{
    /**
     * Get valid token for API endpoint authorization.
     *
     * @return string
     */
    public function generateToken();

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl();

    /**
     * Set url.
     *
     * @param string $url
     * @return static
     */
    public function setUrl(string $url);

    /**
     * Get data.
     *
     * @return string
     */
    public function getData();

    /**
     * Set data.
     *
     * @param array $data
     * @return static
     */
    public function setData(array $data);
}
