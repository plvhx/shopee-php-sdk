<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\Orders;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class OrdersTest extends TestCase
{
    use AbstractServiceTestTrait;

    public function testCanGetOrdersListWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-orders-list-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getOrdersList([
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1615246876,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetOrdersListWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-orders-list-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getOrdersList([
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1615246876,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetOrdersByStatusWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-orders-by-status-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getOrdersByStatus([
            'order_status' => 'READY_TO_SHIP',
            'pagination_entries_per_page' => 100,
            'pagination_offset' => 0,
            'shopid' => 13123,
            'partner_id' => 850356,
            'timestamp' => 1615247226,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetOrdersByStatusWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-orders-by-status-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getOrdersByStatus([
            'order_status' => 'READY_TO_SHIP',
            'pagination_entries_per_page' => 100,
            'pagination_offset' => 0,
            'shopid' => 13123,
            'partner_id' => 850356,
            'timestamp' => 1615247226,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetOrderDetailsWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-order-details-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getOrderDetails([
            'ordersn_list' => [
                0 => 'fzdfngjdnf1',
                1 => 'sdjfgksdfngksdnfg2',
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615247519,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetOrderDetailsWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-order-details-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getOrderDetails([
            'ordersn_list' => [
                0 => 'fzdfngjdnf1',
                1 => 'sdjfgksdfngksdnfg2',
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615247519,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetEscrowDetailsWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-escrow-details-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getEscrowDetails([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615247926,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetEscrowDetailsWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-escrow-details-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getEscrowDetails([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615247926,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddOrderNoteWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/add-order-note-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->addOrderNote([
            'ordersn' => 'foobarbaz123',
            'note' => 'this is a shit.',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615250645,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddOrderNoteWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/add-order-note-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->addOrderNote([
            'ordersn' => 'foobarbaz123',
            'note' => 'this is a shit.',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615250645,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCancelOrderWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/cancel-order-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->cancelOrder([
            'ordersn' => 'foobarbaz123',
            'cancel_reason' => 'OUT_OF_STOCK',
            'item_id' => 100936359,
            'variation_id' => 1337,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615251005,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCancelOrderWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/cancel-order-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->cancelOrder([
            'ordersn' => 'foobarbaz123',
            'cancel_reason' => 'OUT_OF_STOCK',
            'item_id' => 100936359,
            'variation_id' => 1337,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615251005,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAcceptBuyerCancellationWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/accept-buyer-cancellation-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->acceptBuyerCancellation([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615251273,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAcceptBuyerCancellationWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/accept-buyer-cancellation-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->acceptBuyerCancellation([
            'ordersn' => 'foobarbaz123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615251273,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanRejectBuyerCancellationWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/reject-buyer-cancellation-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->rejectBuyerCancellation([
            'ordersn' => 'foobar123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615251486,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanRejectBuyerCancellationWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/reject-buyer-cancellation-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->rejectBuyerCancellation([
            'ordersn' => 'foobar123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615251486,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetForderInfoWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-forder-info-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getForderInfo([
            'shopid' => 220289759,
            'ordersn' => 'foobar123',
            'partner_id' => 850356,
            'timestamp' => 1615253182,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetForderInfoWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-forder-info-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getForderInfo([
            'shopid' => 220289759,
            'ordersn' => 'foobar123',
            'partner_id' => 850356,
            'timestamp' => 1615253182,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetEscrowReleasedOrdersWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-escrow-released-orders-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getEscrowReleasedOrders([
            'shopid' => 220289759,
            'release_time_from' => 1615260712,
            'release_time_to' => 1615267917,
            'partner_id' => 850356,
            'timestamp' => 1615253588,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetEscrowReleasedOrdersWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-escrow-released-orders-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getEscrowReleasedOrders([
            'shopid' => 220289759,
            'release_time_from' => 1615260712,
            'release_time_to' => 1615267917,
            'partner_id' => 850356,
            'timestamp' => 1615253588,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanSplitOrderWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/split-order-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->splitOrder([
            'shopid' => '220289759',
            'ordersn' => 'foobar123',
            'parcels' => [
                0 => [
                    'item_id' => '',
                    'variation_id' => '',
                    'order_item_id' => 0,
                    'promotion_group_id' => 0,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615253867,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanSplitOrderWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/split-order-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->splitOrder([
            'shopid' => '220289759',
            'ordersn' => 'foobar123',
            'parcels' => [
                0 => [
                    'item_id' => '',
                    'variation_id' => '',
                    'order_item_id' => 0,
                    'promotion_group_id' => 0,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615253867,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUndoSplitOrderWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/undo-split-order-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->undoSplitOrder([
            'shopid' => '220289759',
            'ordersn' => 'foobar123',
            'partner_id' => 850356,
            'timestamp' => 1615254217,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUndoSplitOrderWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/undo-split-order-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->undoSplitOrder([
            'shopid' => '220289759',
            'ordersn' => 'foobar123',
            'partner_id' => 850356,
            'timestamp' => 1615254217,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetUnbindOrderListWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-unbind-order-list-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getUnbindOrderList([
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615254517,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetUnbindOrderListWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/get-unbind-order-list-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->getUnbindOrderList([
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615254517,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanMyIncomeWithSuccessResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/my-income-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->myIncome([
            'ordersn' => 'foobar123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615254709,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanMyIncomeWithFailedResponse()
    {
        $orders     = new Orders($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/orders/my-income-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $orders->setHttpClient($httpClient);

        $response = $orders->myIncome([
            'ordersn' => 'foobar123',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615254709,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
