<?php

declare(strict_types=1);

namespace Gandung\Shopee;

use Gandung\Shopee\TokenGeneratorInterface;
use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
abstract class AbstractService implements ServiceInterface
{
    /**
     * @var bool
     */
    private $sandboxed;

    /**
     * @var string
     */
    private $url;

    /**
     * @var \Psr\Http\Client\ClientInterface
     */
    private $client;

    /**
     * @var \Gandung\Shopee\TokenGeneratorInterface
     */
    private $tokenGenerator;

    /**
     * @param \Gandung\Shopee\TokenGeneratorInterface|null $token
     * @param string $partnerKey
     * @param bool $sandboxed
     * @return static
     */
    public function __construct(
        TokenGeneratorInterface $token = null,
        string $partnerKey = '',
        bool $sandboxed = false
    ) {
        $this->initialize($token, $partnerKey, $sandboxed);
    }

    /**
     * @param \Gandung\Shopee\TokenGeneratorInterface|null $token
     * @param string $partnerKey
     * @param bool $sandboxed
     * @return void
     */
    private function initialize(
        TokenGeneratorInterface $token = null,
        string $partnerKey,
        bool $sandboxed = false
    ) {
        $this->setSandboxStatus($sandboxed);
        $this->setUrl(
            !$this->isSandboxed()
                ? $this->getProductionUrl()
                : $this->getSandboxedUrl()
        );
        $this->setHttpClient(new Client([
            'base_uri' => $this->getUrl()
        ]));
        $this->setTokenGenerator($token->setPartnerKey($partnerKey));
    }

    /**
     * {@inheritdoc}
     */
    public function setSandboxStatus(bool $sandboxed)
    {
        $this->sandboxed = $sandboxed;
    }

    /**
     * {@inheritdoc}
     */
    public function isSandboxed()
    {
        return $this->sandboxed;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * {@inheritdoc}
     */
    public function getHttpClient()
    {
        return $this->client;
    }

    /**
     * {@inheritdoc}
     */
    public function setHttpClient(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function getTokenGenerator(): TokenGeneratorInterface
    {
        return $this->tokenGenerator;
    }

    /**
     * {@inheritdoc}
     */
    public function setTokenGenerator(TokenGeneratorInterface $tokenGenerator)
    {
        $this->tokenGenerator = $tokenGenerator;
    }

    /**
     * @return string
     */
    protected function getProductionUrl()
    {
        return 'https://partner.shopeemobile.com';
    }

    /**
     * @return string
     */
    protected function getSandboxedUrl()
    {
        return 'https://partner.uat.shopeemobile.com';
    }
}
