<?php

declare(strict_types=1);

namespace Gandung\Shopee;

use function hash_hmac;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class TokenGenerator implements TokenGeneratorInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $partnerKey;

    /**
     * @var array
     */
    private $data;

    /**
     * @var string $partnerKey
     * @var string $url
     * @var array $data
     * @return static
     */
    public function __construct(
        string $partnerKey = '',
        string $url = '',
        array $data = []
    ) {
        $this->setUrl($url);
        $this->setPartnerKey($partnerKey);
        $this->setData($data);
    }

    /**
     * {@inheritdoc}
     */
    public function generateToken()
    {
        return hash_hmac(
            'sha256',
            sprintf("%s|%s", $this->getUrl(), $this->getData()),
            $this->getPartnerKey()
        );
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
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPartnerKey(): string
    {
        return $this->partnerKey;
    }

    /**
     * {@inheritdoc}
     */
    public function setPartnerKey(string $partnerKey)
    {
        $this->partnerKey = $partnerKey;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return !sizeof($this->data) ? '' : json_encode($this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
