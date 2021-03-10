<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\ShopCategory;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class ShopCategoryTest extends TestCase implements TokenGeneratorAwareInterface
{
    use AbstractServiceTestTrait;

    public function testCanAddShopCategoryWithSuccessResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/add-shop-category-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->addShopCategory([
            'shopid' => 123123,
            'name' => 'foo_1',
            'sort_weight' => 40,
            'partner_id' => 850356,
            'timestamp' => 1615375545,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddShopCategoryWithFailedResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/add-shop-category-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->addShopCategory([
            'shopid' => 123123,
            'name' => 'foo_1',
            'sort_weight' => 40,
            'partner_id' => 850356,
            'timestamp' => 1615375545,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetShopCategoriesWithSuccessResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/get-shop-categories-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->getShopCategories([
            'shopid' => 123123,
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 20,
            'partner_id' => 850356,
            'timestamp' => 1615375917,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetShopCategoriesWithFailedResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/get-shop-categories-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->getShopCategories([
            'shopid' => 123123,
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 20,
            'partner_id' => 850356,
            'timestamp' => 1615375917,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteShopCategoryWithSuccessResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/delete-shop-category-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->deleteShopCategory([
            'shopid' => 220289759,
            'shop_category_id' => 100000832,
            'partner_id' => 850356,
            'timestamp' => 1615376687,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteShopCategoryWithFailedResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/delete-shop-category-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->deleteShopCategory([
            'shopid' => 220289759,
            'shop_category_id' => 100000832,
            'partner_id' => 850356,
            'timestamp' => 1615376687,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateShopCategoryWithSuccessResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/update-shop-category-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->updateShopCategory([
            'shopid' => 220289759,
            'shop_category_id' => 1337,
            'name' => 'foo_1',
            'sort_weight' => 40,
            'status' => 'NORMAL',
            'partner_id' => 850356,
            'timestamp' => 1615378970,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateShopCategoryWithFailedResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/update-shop-category-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->updateShopCategory([
            'shopid' => 220289759,
            'shop_category_id' => 1337,
            'name' => 'foo_1',
            'sort_weight' => 40,
            'status' => 'NORMAL',
            'partner_id' => 850356,
            'timestamp' => 1615378970,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddItemsWithSuccessResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/add-items-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->addItems([
            'shopid' => 123456,
            'shop_category_id' => 7075387,
            'items' => [
                0 => 786585724,
            ],
            'partner_id' => 850356,
            'timestamp' => 1615379568,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddItemsWithFailedResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/add-items-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->addItems([
            'shopid' => 123456,
            'shop_category_id' => 7075387,
            'items' => [
                0 => 786585724,
            ],
            'partner_id' => 850356,
            'timestamp' => 1615379568,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetItemsWithSuccessResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/get-items-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->getItems([
            'shopid' => 220289759,
            'shop_category_id' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615379811,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetItemsWithFailedResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/get-items-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->getItems([
            'shopid' => 220289759,
            'shop_category_id' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615379811,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteItemsWithSuccessResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/delete-items-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->deleteItems([
            'shop_category_id' => 100000373,
            'items' => [
                0 => 100940495,
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615380151,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteItemsWithFailedResponse()
    {
        $shopCategory = new ShopCategory($this->getTokenGenerator(), "123123");
        $httpClient   = $this->createHttpClient("http://foo.bar");
        $contents     = file_get_contents(
            __DIR__ . '/../data-fixtures/shop-category/delete-items-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $shopCategory->setHttpClient($httpClient);

        $response = $shopCategory->deleteItems([
            'shop_category_id' => 100000373,
            'items' => [
                0 => 100940495,
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615380151,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
