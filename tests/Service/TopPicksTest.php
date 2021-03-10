<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\TopPicks;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class TopPicksTest extends TestCase implements TokenGeneratorAwareInterface
{
    use AbstractServiceTestTrait;

    public function testCanGetTopPicksListWithSuccessResponse()
    {
        $topPicks   = new TopPicks($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/top-picks/get-top-picks-list-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $topPicks->setHttpClient($httpClient);

        $response = $topPicks->getTopPicksList([
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615381586,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetTopPicksListWithFailedResponse()
    {
        $topPicks   = new TopPicks($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/top-picks/get-top-picks-list-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $topPicks->setHttpClient($httpClient);

        $response = $topPicks->getTopPicksList([
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615381586,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddTopPicksWithSuccessResponse()
    {
        $topPicks   = new TopPicks($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/top-picks/add-top-picks-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $topPicks->setHttpClient($httpClient);

        $response = $topPicks->addTopPicks([
            'name' => 'foobar_1',
            'item_ids' => [
                0 => 100940495,
                1 => 100936359,
            ],
            'is_activated' => true,
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615381989,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddTopPicksWithFailedResponse()
    {
        $topPicks   = new TopPicks($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/top-picks/add-top-picks-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $topPicks->setHttpClient($httpClient);

        $response = $topPicks->addTopPicks([
            'name' => 'foobar_1',
            'item_ids' => [
                0 => 100940495,
                1 => 100936359,
            ],
            'is_activated' => true,
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615381989,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateTopPicksWithSuccessResponse()
    {
        $topPicks   = new TopPicks($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/top-picks/update-top-picks-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $topPicks->setHttpClient($httpClient);

        $response = $topPicks->updateTopPicks([
            'top_picks_id' => 1337,
            'name' => 'foobar_2',
            'item_ids' => [
                0 => 10,
                1 => 20,
            ],
            'is_activated' => true,
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615382448,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateTopPicksWithFailedResponse()
    {
        $topPicks   = new TopPicks($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/top-picks/update-top-picks-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $topPicks->setHttpClient($httpClient);

        $response = $topPicks->updateTopPicks([
            'top_picks_id' => 1337,
            'name' => 'foobar_2',
            'item_ids' => [
                0 => 10,
                1 => 20,
            ],
            'is_activated' => true,
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615382448,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteTopPicksWithSuccessResponse()
    {
        $topPicks   = new TopPicks($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/top-picks/delete-top-picks-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $topPicks->setHttpClient($httpClient);

        $response = $topPicks->deleteTopPicks([
            'top_picks_id' => 1337,
            'shopid' => 13123,
            'partner_id' => 850356,
            'timestamp' => 1615382797,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteTopPicksWithFailedResponse()
    {
        $topPicks   = new TopPicks($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/top-picks/delete-top-picks-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $topPicks->setHttpClient($httpClient);

        $response = $topPicks->deleteTopPicks([
            'top_picks_id' => 1337,
            'shopid' => 13123,
            'partner_id' => 850356,
            'timestamp' => 1615382797,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
