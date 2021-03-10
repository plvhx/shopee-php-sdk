<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Services;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\Payment;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class PaymentTest extends TestCase implements TokenGeneratorAwareInterface
{
    use AbstractServiceTestTrait;

    public function testCanGetTransactionListWithSuccessResponse()
    {
        $payment    = new Payment($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/payment/get-transaction-list-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $payment->setHttpClient($httpClient);

        $response = $payment->getTransactionList([
            'shopid' => '220289759',
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 100,
            'partner_id' => 850356,
            'timestamp' => 1615255322,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetTransactionListWithFailedResponse()
    {
        $payment    = new Payment($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/payment/get-transaction-list-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $payment->setHttpClient($httpClient);

        $response = $payment->getTransactionList([
            'shopid' => '220289759',
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 100,
            'partner_id' => 850356,
            'timestamp' => 1615255322,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetPayoutDetailWithSuccessResponse()
    {
        $payment    = new Payment($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/payment/get-payout-detail-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $payment->setHttpClient($httpClient);

        $response = $payment->getPayoutDetail([
            'shopid' => 123123,
            'payout_time_from' => 1615262920,
            'payout_time_to' => 1615270129,
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 100,
            'partner_id' => 850356,
            'timestamp' => 1615255776,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetPayoutDetailWithFailedResponse()
    {
        $payment    = new Payment($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/payment/get-payout-detail-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $payment->setHttpClient($httpClient);

        $response = $payment->getPayoutDetail([
            'shopid' => 123123,
            'payout_time_from' => 1615262920,
            'payout_time_to' => 1615270129,
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 100,
            'partner_id' => 850356,
            'timestamp' => 1615255776,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
