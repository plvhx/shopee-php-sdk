<?php

declare(strict_types=1);

namespace Gandung\Shopee\Constraints;

use Gandung\Shopee\TokenGeneratorInterface;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
interface TokenGeneratorAwareInterface
{
    /**
     * Get token generator object.
     *
     * @return \Gandung\Shopee\TokenGeneratorInterface
     */
    public function getTokenGenerator(): TokenGeneratorInterface;

    /**
     * Set token generator object.
     *
     * @param \Gandung\Shopee\TokenGeneratorInterface|null $tokenGenerator
     * @return static
     */
    public function setTokenGenerator(TokenGeneratorInterface $tokenGenerator);
}
