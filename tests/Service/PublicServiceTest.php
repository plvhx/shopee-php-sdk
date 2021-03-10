<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\PublicService;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class PublicServiceTest extends TestCase implements TokenGeneratorAwareInterface
{
    use AbstractServiceTestTrait;

    public function testCanGetShopsByPartnerWithSuccessResponse()
    {
        $publicService = new PublicService($this->getTokenGenerator(), "123123");
        $httpClient    = $this->createHttpClient("http://foo.bar");
        $contents      = file_get_contents(
            __DIR__ . '/../data-fixtures/public-service/get-shops-by-partner-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $publicService->setHttpClient($httpClient);

        $response = $publicService->getShopsByPartner([
            'partner_id' => 850356,
            'timestamp' => 1615256650
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetShopsByPartnerWithFailedResponse()
    {
        $publicService = new PublicService($this->getTokenGenerator(), "123123");
        $httpClient    = $this->createHttpClient("http://foo.bar");
        $contents      = file_get_contents(
            __DIR__ . '/../data-fixtures/public-service/get-shops-by-partner-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $publicService->setHttpClient($httpClient);

        $response = $publicService->getShopsByPartner([
            'partner_id' => 850356,
            'timestamp' => 1615256650
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetCategoriesByCountryWithSuccessResponse()
    {
        $publicService = new PublicService($this->getTokenGenerator(), "123123");
        $httpClient    = $this->createHttpClient("http://foo.bar");
        $contents      = file_get_contents(
            __DIR__ . '/../data-fixtures/public-service/get-categories-by-country-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $publicService->setHttpClient($httpClient);

        $response = $publicService->getCategoriesByCountry([
            'country' => 'SG',
            'is_cb' => 1,
            'language' => 'en',
            'partner_id' => 850356,
            'timestamp' => 1615256939,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetCategoriesByCountryWithFailedResponse()
    {
        $publicService = new PublicService($this->getTokenGenerator(), "123123");
        $httpClient    = $this->createHttpClient("http://foo.bar");
        $contents      = file_get_contents(
            __DIR__ . '/../data-fixtures/public-service/get-categories-by-country-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $publicService->setHttpClient($httpClient);

        $response = $publicService->getCategoriesByCountry([
            'country' => 'SG',
            'is_cb' => 1,
            'language' => 'en',
            'partner_id' => 850356,
            'timestamp' => 1615256939,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetPaymentListWithSuccessResponse()
    {
        $publicService = new PublicService($this->getTokenGenerator(), "123123");
        $httpClient    = $this->createHttpClient("http://foo.bar");
        $contents      = file_get_contents(
            __DIR__ . '/../data-fixtures/public-service/get-payment-list-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $publicService->setHttpClient($httpClient);

        $response = $publicService->getPaymentList([
            'country' => 'ID',
            'partner_id' => 850356,
            'timestamp' => 1615257613,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetPaymentListWithFailedResponse()
    {
        $publicService = new PublicService($this->getTokenGenerator(), "123123");
        $httpClient    = $this->createHttpClient("http://foo.bar");
        $contents      = file_get_contents(
            __DIR__ . '/../data-fixtures/public-service/get-payment-list-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $publicService->setHttpClient($httpClient);

        $response = $publicService->getPaymentList([
            'country' => 'ID',
            'partner_id' => 850356,
            'timestamp' => 1615257613,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
