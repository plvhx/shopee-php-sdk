<?php

declare(strict_types=1);

namespace Gandung\Shopee;

use Gandung\Shopee\Constraints\SandboxedAwareInterface;
use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Psr\Http\Client\ClientInterface;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
interface ServiceInterface extends
    SandboxedAwareInterface,
    TokenGeneratorAwareInterface
{
    /**
     * @return \Psr\Http\Client\ClientInterface $client
     */
    public function getHttpClient();

    /**
     * @param \Psr\Http\Client\ClientInterface $client
     * @return void
     */
    public function setHttpClient(ClientInterface $client);

    /**
     * @param string $url
     * @return void
     */
    public function setUrl(string $url);

    /**
     * @return string
     */
    public function getUrl();
}
