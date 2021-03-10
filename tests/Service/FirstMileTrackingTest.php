<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\FirstMileTracking;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class FirstMileTrackingTest extends TestCase implements TokenGeneratorAwareInterface
{
    use AbstractServiceTestTrait;

    public function testCanGetShopFMTrackingNoWithSuccessResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/get-shop-fm-tracking-no-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->getShopFMTrackingNo([
            'shopid' => 123123,
            'from_date' => '2021-03-01',
            'to_date' => '2021-03-15',
            'partner_id' => 850356,
            'timestamp' => 1614598317
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetShopFMTrackingNoWithFailedResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/get-shop-fm-tracking-no-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->getShopFMTrackingNo([
            'shopid' => 123123,
            'from_date' => '2021-03-01',
            'to_date' => '2021-03-15',
            'partner_id' => 850356,
            'timestamp' => 1614598317
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGenerateFMTrackingNoWithSuccessResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/generate-fm-tracking-no-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->generateFMTrackingNo([
            'shopid' => 220289759,
            'declare_date' => '2021-03-01',
            'seller_info' => [
                'address' => 'Lane 427, Sec.3, Jung Feng Rd.',
                'name' => 'Huan Lai',
                'zipcode' => '31052',
                'area' => 'Taiwan',
                'phone' => '03-5967669',
            ],
            'partner_id' => 850356,
            'timestamp' => 1614599556
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGenerateFMTrackingNoWithFailedResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/generate-fm-tracking-no-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->generateFMTrackingNo([
            'shopid' => 220289759,
            'declare_date' => '2021-03-01',
            'seller_info' => [
                'address' => 'Lane 427, Sec.3, Jung Feng Rd.',
                'name' => 'Huan Lai',
                'zipcode' => '31052',
                'area' => 'Taiwan',
                'phone' => '03-5967669',
            ],
            'partner_id' => 850356,
            'timestamp' => 1614599556
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallFirstMileCodeBindOrderWithSuccessResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/first-mile-code-bind-order-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->firstMileCodeBindOrder([
            'order_list' => [
                [
                    'ordersn' => '',
                    'forder_id' => '',
                ],
            ],
            'fm_tn' => '123123',
            'shipment_method' => 'foobar',
            'partner_id' => 850356,
            'timestamp' => 1614607825
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallFirstMileCodeBindOrderWithFailedResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/first-mile-code-bind-order-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->firstMileCodeBindOrder([
            'order_list' => [
                [
                    'ordersn' => '',
                    'forder_id' => '',
                ],
            ],
            'fm_tn' => '123123',
            'shipment_method' => 'foobar',
            'partner_id' => 850356,
            'timestamp' => 1614607825
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallGetFmTnDetailWithSuccessResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/get-fm-tn-detail-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->getFmTnDetail([
            'shopid' => 123123,
            'fm_tn' => '123123',
            'page' => 0,
            'partner_id' => 850356,
            'timestamp' => 1614609002
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallGetFmTnDetailWithFailedResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/get-fm-tn-detail-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->getFmTnDetail([
            'shopid' => 123123,
            'fm_tn' => '123123',
            'page' => 0,
            'partner_id' => 850356,
            'timestamp' => 1614609002
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallGetFMTrackingNoWaybillWithSuccessResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/get-fm-tracking-no-waybill-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->getFMTrackingNoWaybill([
            'shopid' => 220289759,
            'fm_tn_list' => [
                'aa',
                'bb',
                'cc',
            ],
            'partner_id' => 850356,
            'timestamp' => 1614609562
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallGetFMTrackingNoWaybillWithFailedResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/get-fm-tracking-no-waybill-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->getFMTrackingNoWaybill([
            'shopid' => 220289759,
            'fm_tn_list' => [
                'aa',
                'bb',
                'cc',
            ],
            'partner_id' => 850356,
            'timestamp' => 1614609562
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallGetShopFirstMileChannelWithSuccessResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/get-shop-first-mile-channel-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->getShopFirstMileChannel([
            'shopid' => 220289759,
            'area' => '10',
            'partner_id' => 850356,
            'timestamp' => 1614623843
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallGetShopFirstMileChannelWithFailedResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/get-shop-first-mile-channel-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->getShopFirstMileChannel([
            'shopid' => 220289759,
            'area' => '10',
            'partner_id' => 850356,
            'timestamp' => 1614623843
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallFirstMileUnbindWithSuccessResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/first-mile-unbind-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->firstMileUnbind([
            'shopid' => 220289759,
            'fm_tn' => '123123',
            'order_list' => [
                [
                    'ordersn' => '123123',
                    'forder_id' => '123123',
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1614625277,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallFirstMileUnbindWithFailedResponse()
    {
        $fm         = new FirstMileTracking($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/first-mile-tracking/first-mile-unbind-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $fm->setHttpClient($httpClient);

        $response = $fm->firstMileUnbind([
            'shopid' => 220289759,
            'fm_tn' => '123123',
            'order_list' => [
                [
                    'ordersn' => '123123',
                    'forder_id' => '123123',
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1614625277,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
