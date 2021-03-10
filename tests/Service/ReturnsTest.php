<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\Returns;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class ReturnsTest extends TestCase implements TokenGeneratorAwareInterface
{
    use AbstractServiceTestTrait;

    public function testCanConfirmReturnWithSuccessResponse()
    {
        $returns    = new Returns($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/returns/confirm-return-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $returns->setHttpClient($httpClient);

        $response = $returns->confirmReturn([
            'returnsn' => '31337',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615258198,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanConfirmReturnWithFailedResponse()
    {
        $returns    = new Returns($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/returns/confirm-return-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $returns->setHttpClient($httpClient);

        $response = $returns->confirmReturn([
            'returnsn' => '31337',
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615258198,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDisputeReturnWithSuccessResponse()
    {
        $returns    = new Returns($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/returns/dispute-return-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $returns->setHttpClient($httpClient);

        $response = $returns->disputeReturn([
            'returnsn' => '31337',
            'email' => 'foobar@example.com',
            'dispute_reason' => 'OTHER',
            'dispute_text_reason' => 'I would like to reject the request',
            'images' => [
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615258921,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDisputeReturnWithFailedResponse()
    {
        $returns    = new Returns($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/returns/dispute-return-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $returns->setHttpClient($httpClient);

        $response = $returns->disputeReturn([
            'returnsn' => '31337',
            'email' => 'foobar@example.com',
            'dispute_reason' => 'OTHER',
            'dispute_text_reason' => 'I would like to reject the request',
            'images' => [
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615258921,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetReturnListWithSuccessResponse()
    {
        $returns    = new Returns($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/returns/get-return-list-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $returns->setHttpClient($httpClient);

        $response = $returns->getReturnList([
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 100,
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615261421,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetReturnListWithFailedResponse()
    {
        $returns    = new Returns($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/returns/get-return-list-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $returns->setHttpClient($httpClient);

        $response = $returns->getReturnList([
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 100,
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615261421,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetReturnDetailWithSuccessResponse()
    {
        $returns    = new Returns($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/returns/get-return-detail-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $returns->setHttpClient($httpClient);

        $response = $returns->getReturnDetail([
            'shopid' => 220289759,
            'returnsn' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1615268691,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetReturnDetailWithFailedResponse()
    {
        $returns    = new Returns($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/returns/get-return-detail-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $returns->setHttpClient($httpClient);

        $response = $returns->getReturnDetail([
            'shopid' => 220289759,
            'returnsn' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1615268691,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
