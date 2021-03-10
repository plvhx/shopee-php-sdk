<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests;

use Gandung\Shopee\TokenGenerator;
use Gandung\Shopee\TokenGeneratorInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
trait AbstractServiceTestTrait
{
    /**
     * @var \Gandung\Shopee\TokenGeneratorInterface
     */
    private $tokenGenerator;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $this->setTokenGenerator(new TokenGenerator());
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
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
     * Create http client object based on
     * given url.
     *
     * @param string $url
     * @return \Psr\Http\Client\ClientInterface
     */
    private function createHttpClient(string $url)
    {
        return new Client(['handler' => new MockHandler(), 'base_uri' => $url]);
    }
}
