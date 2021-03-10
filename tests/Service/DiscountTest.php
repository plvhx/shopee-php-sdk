<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\Discount;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class DiscountTest extends TestCase implements TokenGeneratorAwareInterface
{
    use AbstractServiceTestTrait;

    public function testCanAddDiscountWithSuccessResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/add-discount-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->addDiscount([
            'discount_name' => 'api_test_discount',
            'start_time' => '1614306412',
            'end_time' => '1614310012',
            'items' => [
                [
                    'item_id' => 100931321,
                    'variations' => [
                        [
                            'variation_id' => 5257012,
                            'variation_promotion_price' => 100,
                        ],
                    ],
                    'purchase_limit' => 2,
                ],
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614303062
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddDiscountWithFailedResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/add-discount-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->addDiscount([
            'discount_name' => 'api_test_discount',
            'start_time' => '1614306412',
            'end_time' => '1614310012',
            'items' => [
                [
                    'item_id' => 100931321,
                    'variations' => [
                        [
                            'variation_id' => 5257012,
                            'variation_promotion_price' => 100,
                        ],
                    ],
                    'purchase_limit' => 2,
                ],
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614303062
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddDiscountItemWithSuccessResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/add-discount-item-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->addDiscountItem([
            'discount_id' => 1000014839,
            'items' => [
                [
                    'item_id' => 100931321,
                    'variations' => [
                        [
                            'variation_id' => 5257012,
                            'variation_promotion_price' => 100,
                        ],
                    ],
                    'item_promotion_price' => 100,
                    'purchase_limit' => 2,
                ],
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614367346,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddDiscountItemWithFailedResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/add-discount-item-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->addDiscountItem([
            'discount_id' => 1000014839,
            'items' => [
                [
                    'item_id' => 100931321,
                    'variations' => [
                        [
                            'variation_id' => 5257012,
                            'variation_promotion_price' => 100,
                        ],
                    ],
                    'item_promotion_price' => 100,
                    'purchase_limit' => 2,
                ],
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614367346,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteDiscountWithSuccessResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/delete-discount-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->deleteDiscount([
            'discount_id' => 1000014839,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614368355
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteDiscountWithFailedResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/delete-discount-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->deleteDiscount([
            'discount_id' => 1000014839,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614368355
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteDiscountItemWithSuccessResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/delete-discount-item-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->deleteDiscountItem([
            'discount_id' => 1000014840,
            'item_id' => 100931321,
            'variation_id' => 5257012,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614412516
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteDiscountItemWithFailedResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/delete-discount-item-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->deleteDiscountItem([
            'discount_id' => 1000014840,
            'item_id' => 100931321,
            'variation_id' => 5257012,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614412516
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetDiscountDetailWithSuccessResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/get-discount-detail-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->getDiscountDetail([
            'discount_id' => 1000014840,
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 20,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614413435,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetDiscountDetailWithFailedResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/get-discount-detail-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->getDiscountDetail([
            'discount_id' => 1000014840,
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 20,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614413435,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetDiscountsListWithSuccessResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/get-discounts-list-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->getDiscountsList([
            'discount_status' => 'UPCOMING',
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 20,
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1614560311
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetDiscountsListWithFailedResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/get-discounts-list-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->getDiscountsList([
            'discount_status' => 'UPCOMING',
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 20,
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1614560311
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateDiscountWithSuccessResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/update-discount-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->updateDiscount([
            'discount_id' => 1004513124,
            'end_time' => 1527483300,
            'start_time' => 1527443700,
            'shopid' => 123456,
            'partner_id' => 850356,
            'timestamp' => 1614596740
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateDiscountWithFailedResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/update-discount-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->updateDiscount([
            'discount_id' => 1004513124,
            'end_time' => 1527483300,
            'start_time' => 1527443700,
            'shopid' => 123456,
            'partner_id' => 850356,
            'timestamp' => 1614596740
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateDiscountItemsWithSuccessResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/update-discount-items-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->updateDiscountItems([
            'discount_id' => 1000015065,
            'items' => [
                [
                    'item_id' => 100931321,
                    'variations' => [
                        [
                            'variation_id' => 5257012,
                            'variation_promotion_price' => 200,
                        ],
                    ],
                    'item_promotion_price' => 200,
                    'purchase_limit' => 8,
                ],
            ],
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1614597260,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateDiscountItemsWithFailedResponse()
    {
        $discount   = new Discount($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/discount/update-discount-items-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $discount->setHttpClient($httpClient);

        $response = $discount->updateDiscountItems([
            'discount_id' => 1000015065,
            'items' => [
                [
                    'item_id' => 100931321,
                    'variations' => [
                        [
                            'variation_id' => 5257012,
                            'variation_promotion_price' => 200,
                        ],
                    ],
                    'item_promotion_price' => 200,
                    'purchase_limit' => 8,
                ],
            ],
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1614597260,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
