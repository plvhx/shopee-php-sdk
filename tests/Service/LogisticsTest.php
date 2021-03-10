<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\Logistics;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class LogisticsTest extends TestCase
{
    use AbstractServiceTestTrait;

    public function testCanGetLogisticsWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-logistics-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getLogistics([
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615198674,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetLogisticsWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-logistics-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getLogistics([
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615198674,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateShopLogisticsWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/update-shop-logistics-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->updateShopLogistics([
            'shopid' => 220289759,
            'logistic_id' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615200699,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateShopLogisticsWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/update-shop-logistics-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->updateShopLogistics([
            'shopid' => 220289759,
            'logistic_id' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615200699,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetParameterForInitWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-parameter-for-init-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getParameterForInit([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615214735,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetParameterForInitWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-parameter-for-init-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getParameterForInit([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615214735,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetAddressWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-address-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getAddress([
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615216104,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetAddressWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-address-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getAddress([
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615216104,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetTimeslotWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-timeslot-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getTimeSlot([
            'ordersn' => 'foobarbaz123',
            'address_id' => '1337',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615216539,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetTimeslotWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-timeslot-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getTimeSlot([
            'ordersn' => 'foobarbaz123',
            'address_id' => '1337',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615216539,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetBranchWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-branch-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getBranch([
            'ordersn' => 'foobarbaz123',
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1615220507,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetBranchWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-branch-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getBranch([
            'ordersn' => 'foobarbaz123',
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1615220507,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetLogisticInfoWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-logistic-info-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getLogisticInfo([
            'shopid' => 220289759,
            'ordersn' => 'foobarbaz123',
            'partner_id' => 850356,
            'timestamp' => 1615241854,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetLogisticInfoWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-logistic-info-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getLogisticInfo([
            'shopid' => 220289759,
            'ordersn' => 'foobarbaz123',
            'partner_id' => 850356,
            'timestamp' => 1615241854,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanInitWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/init-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->init([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615243029,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanInitWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/init-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->init([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615243029,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetAirwayBillWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-airway-bill-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getAirwayBill([
            'ordersn_list' => [
                0 => 'foo1',
                1 => 'bar2',
            ],
            'is_batch' => false,
            'shopid' => 220289759,
            'extinfo' => [
                'job_ordersn_list' => [
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615244163,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetAirwayBillWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-airway-bill-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getAirwayBill([
            'ordersn_list' => [
                0 => 'foo1',
                1 => 'bar2',
            ],
            'is_batch' => false,
            'shopid' => 220289759,
            'extinfo' => [
                'job_ordersn_list' => [
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615244163,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetOrderLogisticsWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-order-logistics-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getOrderLogistics([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'forder_id' => '10',
            'partner_id' => 850356,
            'timestamp' => 1615244557,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetOrderLogisticsWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-order-logistics-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getOrderLogistics([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'forder_id' => '10',
            'partner_id' => 850356,
            'timestamp' => 1615244557,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetLogisticsMessageWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-logistics-message-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getLogisticsMessage([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615244869,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetLogisticsMessageWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-logistics-message-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getLogisticsMessage([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615244869,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetForderWaybillWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-forder-waybill-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getForderWayBill([
            'shopid' => 220289759,
            'orders_list' => [
                0 => [
                    'ordersn' => 'foobarbaz123',
                    'forder_id' => '1337',
                    'is_job' => true,
                ],
            ],
            'is_batch' => false,
            'partner_id' => 850356,
            'timestamp' => 1615245520,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetForderWaybillWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/get-forder-waybill-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->getForderWayBill([
            'shopid' => 220289759,
            'orders_list' => [
                0 => [
                    'ordersn' => 'foobarbaz123',
                    'forder_id' => '1337',
                    'is_job' => true,
                ],
            ],
            'is_batch' => false,
            'partner_id' => 850356,
            'timestamp' => 1615245520,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanSetAddressWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/set-address-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->setAddress([
            'shopid' => '220289759',
            'default_address_id' => 1,
            'pick_up_address_id' => 1,
            'return_address_id' => 1,
            'partner_id' => 850356,
            'timestamp' => 1615245866,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanSetAddressWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/set-address-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->setAddress([
            'shopid' => '220289759',
            'default_address_id' => 1,
            'pick_up_address_id' => 1,
            'return_address_id' => 1,
            'partner_id' => 850356,
            'timestamp' => 1615245866,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteAddressWithSuccessResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/delete-address-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->deleteAddress([
            'shopid' => 220289759,
            'address_id' => 1,
            'partner_id' => 850356,
            'timestamp' => 1615246333,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteAddressWithFailedResponse()
    {
        $logistics  = new Logistics($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/logistics/delete-address-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $logistics->setHttpClient($httpClient);

        $response = $logistics->deleteAddress([
            'shopid' => 220289759,
            'address_id' => 1,
            'partner_id' => 850356,
            'timestamp' => 1615246333,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
