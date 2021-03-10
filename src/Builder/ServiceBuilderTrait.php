<?php

declare(strict_types=1);

namespace Gandung\Shopee\Builder;

use Gandung\Shopee\TokenGeneratorInterface;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
trait ServiceBuilderTrait
{
    /**
     * @var string
     */
    private $partnerKey;

    /**
     * @var boolean
     */
    private $sandboxed;

    /**
     * @var \Gandung\Shopee\TokenGeneratorInterface
     */
    private $tokenGenerator;

    /**
     * Get new instance of current class object.
     *
     * @return static
     */
    public static function create()
    {
        return new static();
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
    public function setSandboxStatus(bool $sandboxed)
    {
        $this->sandboxed = $sandboxed;
        return $this;
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
        return $this;
    }
}
