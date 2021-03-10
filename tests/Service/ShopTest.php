<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\Shop;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class ShopTest extends TestCase implements TokenGeneratorAwareInterface
{
    use AbstractServiceTestTrait;

    public function testCanGetShopInfoWithSuccessResponse()
    {
        $shop       = new Shop($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/shop/get-shop-info-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shop->setHttpClient($httpClient);

        $response = $shop->getShopInfo([
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1615372369,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetShopInfoWithFailedResponse()
    {
        $shop       = new Shop($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/shop/get-shop-info-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shop->setHttpClient($httpClient);

        $response = $shop->getShopInfo([
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1615372369,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateShopInfoWithSuccessResponse()
    {
        $shop       = new Shop($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/shop/update-shop-info-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shop->setHttpClient($httpClient);

        $response = $shop->updateShopInfo([
            'shop_name' => 'foo_bar_baz',
            'images' => [
            ],
            'videos' => [
            ],
            'disable_make_offer' => 0,
            'enable_display_unitno' => true,
            'shop_description' => 'this is a foo!',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615373043,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateShopInfoWithFailedResponse()
    {
        $shop       = new Shop($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/shop/update-shop-info-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shop->setHttpClient($httpClient);

        $response = $shop->updateShopInfo([
            'shop_name' => 'foo_bar_baz',
            'images' => [
            ],
            'videos' => [
            ],
            'disable_make_offer' => 0,
            'enable_display_unitno' => true,
            'shop_description' => 'this is a foo!',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615373043,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanPerformanceWithSuccessResponse()
    {
        $shop       = new Shop($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/shop/performance-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shop->setHttpClient($httpClient);

        $response = $shop->performance([
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1615373362,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanPerformanceWithFailedResponse()
    {
        $shop       = new Shop($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/shop/performance-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shop->setHttpClient($httpClient);

        $response = $shop->performance([
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1615373362,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanSetShopInstallmentStatusWithSuccessResponse()
    {
        $shop       = new Shop($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/shop/set-shop-installment-status-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shop->setHttpClient($httpClient);

        $response = $shop->setShopInstallmentStatus([
            'shopid' => 220289759,
            'installment_status' => 1,
            'partner_id' => 850356,
            'timestamp' => 1615373714,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanSetShopInstallmentStatusWithFailedResponse()
    {
        $shop       = new Shop($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/shop/set-shop-installment-status-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shop->setHttpClient($httpClient);

        $response = $shop->setShopInstallmentStatus([
            'shopid' => 220289759,
            'installment_status' => 1,
            'partner_id' => 850356,
            'timestamp' => 1615373714,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
