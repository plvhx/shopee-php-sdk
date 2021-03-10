<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\Item;
use Gandung\Shopee\Tests\AbstractServiceTestTrait;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

use function file_get_contents;
use function json_decode;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class ItemTest extends TestCase implements TokenGeneratorAwareInterface
{
    use AbstractServiceTestTrait;

    public function testCanGetCategoriesWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-categories-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getCategories([
            'shopid' => 123123,
            'language' => 'en',
            'partner_id' => 850356,
            'timestamp' => 1614628671,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetCategoriesWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-categories-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getCategories([
            'shopid' => 123123,
            'language' => 'en',
            'partner_id' => 850356,
            'timestamp' => 1614628671,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetAttributesWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-attributes-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getAttributes([
            'category_id' => 39,
            'is_cb' => true,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614635250
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetAttributesWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-attributes-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getAttributes([
            'category_id' => 39,
            'is_cb' => true,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614635250
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddItemWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/add-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->add([
            "category_id" => 1826,
            "name"        => "Foo #3",
            "description" => "This is Foo #3.",
            "price"       => 137896,
            "stock"       => 200,
            "item_sku"    => sprintf("%s-%s-%s", uniqid(), uniqid(), uniqid()),
            "variations"  => [
                [
                    "name"          => "Green",
                    "stock"         => 100,
                    "price"         => 137896,
                    "variation_sku" => sprintf("%s-%s-%s", uniqid(), uniqid(), uniqid())
                ]
            ],
            "images"      => [
                [
                    "url" => "https://cf.shopee.co.id/file/e2353534fc51609e68fc2cf09838db2f"
                ]
            ],
            "attributes"  => [
                [
                    "attributes_id" => 1373,
                    "value"         => "Merek"
                ]
            ],
            "logistics"   => [
                [
                    "logistic_id"  => 80014,
                    "enabled"      => true,
                    "shipping_fee" => 0.4,
                    "size_id"      => 1222,
                    "is_free"      => false
                ]
            ],
            "weight"         => 16,
            "package_length" => 2,
            "package_width"  => 2,
            "package_height" => 4,
            "days_to_ship"   => 3,
            "wholesales"     => [],
            "shopid"         => 220289759,
            "condition"      => "NEW",
            "status"         => "NORMAL",
            "is_pre_order"   => true,
            "partner_id"     => 850356,
            "timestamp"      => time()
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddItemWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/add-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->add([
            "category_id" => 1826,
            "name"        => "Foo #3",
            "description" => "This is Foo #3.",
            "price"       => 137896,
            "stock"       => 200,
            "item_sku"    => sprintf("%s-%s-%s", uniqid(), uniqid(), uniqid()),
            "variations"  => [
                [
                    "name"          => "Green",
                    "stock"         => 100,
                    "price"         => 137896,
                    "variation_sku" => sprintf("%s-%s-%s", uniqid(), uniqid(), uniqid())
                ]
            ],
            "images"      => [
                [
                    "url" => "https://cf.shopee.co.id/file/e2353534fc51609e68fc2cf09838db2f"
                ]
            ],
            "attributes"  => [
                [
                    "attributes_id" => 1373,
                    "value"         => "Merek"
                ]
            ],
            "logistics"   => [
                [
                    "logistic_id"  => 80014,
                    "enabled"      => true,
                    "shipping_fee" => 0.4,
                    "size_id"      => 1222,
                    "is_free"      => false
                ]
            ],
            "weight"         => 16,
            "package_length" => 2,
            "package_width"  => 2,
            "package_height" => 4,
            "days_to_ship"   => 3,
            "wholesales"     => [],
            "shopid"         => 220289759,
            "condition"      => "NEW",
            "status"         => "NORMAL",
            "is_pre_order"   => true,
            "partner_id"     => 850356,
            "timestamp"      => time()
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteItemWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/delete-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->delete([
            'item_id' => 100935675,
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1614657258,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteItemWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/delete-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->delete([
            'item_id' => 100935675,
            'shopid' => 123123,
            'partner_id' => 850356,
            'timestamp' => 1614657258,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUnlistItemsWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/unlist-item-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->unlistItem([
            'shopid' => 123123,
            'items' => [
                [
                    'item_id' => 100936359,
                    'unlist' => true,
                ],
                [
                    'item_id' => 100931321,
                    'unlist' => true,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1614659469,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUnlistItemsWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/unlist-item-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->unlistItem([
            'shopid' => 123123,
            'items' => [
                [
                    'item_id' => 100936359,
                    'unlist' => true,
                ],
                [
                    'item_id' => 100931321,
                    'unlist' => true,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1614659469,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddVariationsWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/add-variations-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->addVariations([
            'item_id' => 100936359,
            'variations' => [
                0 => [
                    'name' => 'foo-bar-baz',
                    'stock' => 10,
                    'price' => 1337,
                    'variation_sku' => '604015fca3784-604015fca378a',
                ],
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614812999,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddVariationsWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/add-variations-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->addVariations([
            'item_id' => 100936359,
            'variations' => [
                0 => [
                    'name' => 'foo-bar-baz',
                    'stock' => 10,
                    'price' => 1337,
                    'variation_sku' => '604015fca3784-604015fca378a',
                ],
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614812999,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteVariationWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/delete-variation-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->deleteVariation([
            'item_id' => 100936359,
            'variation_id' => 10000266143,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614872590,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteVariationWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/delete-variation-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->deleteVariation([
            'item_id' => 100936359,
            'variation_id' => 10000266143,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614872590,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetItemsListWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-items-list-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getItemsList([
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 100,
            'shopid' => 123123,
            'need_deleted_item' => false,
            'partner_id' => 850356,
            'timestamp' => 1614873156,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetItemsListWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-items-list-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getItemsList([
            'pagination_offset' => 0,
            'pagination_entries_per_page' => 100,
            'shopid' => 123123,
            'need_deleted_item' => false,
            'partner_id' => 850356,
            'timestamp' => 1614873156,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetItemDetailWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-item-detail-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getItemDetail([
            'item_id' => 123123,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614874555,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetItemDetailWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-item-detail-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getItemDetail([
            'item_id' => 123123,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614874555,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateItemWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-item-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateItem([
            'item_id' => 100936359,
            'category_id' => 31337,
            'name' => 'foo #4',
            'description' => 'this is foo #4.',
            'item_sku' => '6041740f82944-6041740f82949',
            'shopid' => 220289759,
            'condition' => 'NEW',
            'partner_id' => 850356,
            'timestamp' => 1614902564,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateItemWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-item-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateItem([
            'item_id' => 100936359,
            'category_id' => 31337,
            'name' => 'foo #4',
            'description' => 'this is foo #4.',
            'item_sku' => '6041740f82944-6041740f82949',
            'shopid' => 220289759,
            'condition' => 'NEW',
            'partner_id' => 850356,
            'timestamp' => 1614902564,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddItemImgWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/add-item-img-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->addItemImg([
            'item_id' => 100936359,
            'images' => [
                0 => 'http://foo.bar/nonexistent-image.jpg',
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614903217,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddItemImgWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/add-item-img-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->addItemImg([
            'item_id' => 100936359,
            'images' => [
                0 => 'http://foo.bar/nonexistent-image.jpg',
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614903217,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateItemImgWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-item-img-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateItemImg([
            'shopid' => 123456,
            'item_id' => 1208720868,
            'images' => [
                0 => 'http://foo.bar/nonexistent_image.jpg',
            ],
            'partner_id' => 850356,
            'timestamp' => 1615132414,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateItemImgWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-item-img-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateItemImg([
            'shopid' => 123456,
            'item_id' => 1208720868,
            'images' => [
                0 => 'http://foo.bar/nonexistent_image.jpg',
            ],
            'partner_id' => 850356,
            'timestamp' => 1615132414,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanInsertItemImgWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/insert-item-img-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->insertItemImg([
            'item_id' => 100936359,
            'image_url' => 'https://foo.bar/nonexistent-image.jpg',
            'image_position' => 3,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615133080,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanInsertItemImgWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/insert-item-img-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->insertItemImg([
            'item_id' => 100936359,
            'image_url' => 'https://foo.bar/nonexistent-image.jpg',
            'image_position' => 3,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615133080,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteItemImgWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/delete-item-img-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->deleteItemImg([
            'item_id' => 100936359,
            'images' => [
                0 => 'http://foo.bar/nonexistent-image.jpg',
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615133653,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanDeleteItemImgWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/delete-item-img-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->deleteItemImg([
            'item_id' => 100936359,
            'images' => [
                0 => 'http://foo.bar/nonexistent-image.jpg',
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615133653,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdatePriceWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-price-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updatePrice([
            'item_id' => 100936359,
            'price' => 15000,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615134013,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdatePriceWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-price-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updatePrice([
            'item_id' => 100936359,
            'price' => 15000,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615134013,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateStockWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-stock-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateStock([
            'item_id' => 100936359,
            'stock' => 300,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615134384,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateStockWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-stock-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateStock([
            'item_id' => 100936359,
            'stock' => 300,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615134384,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateVariationPriceWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-variation-price-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateVariationPrice([
            'item_id' => 100936359,
            'variation_id' => 1337,
            'price' => 1000,
            'shopid' => 220289759,
            'item_price' => 200,
            'partner_id' => 850356,
            'timestamp' => 1615134873,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateVariationPriceWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-variation-price-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateVariationPrice([
            'item_id' => 100936359,
            'variation_id' => 1337,
            'price' => 1000,
            'shopid' => 220289759,
            'item_price' => 200,
            'partner_id' => 850356,
            'timestamp' => 1615134873,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateVariationStockWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-variation-stock-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateVariationStock([
            'item_id' => 100936359,
            'variation_id' => 1337,
            'stock' => 300,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615137680,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateVariationStockWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-variation-stock-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateVariationStock([
            'item_id' => 100936359,
            'variation_id' => 1337,
            'stock' => 300,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615137680,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdatePriceBatchWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-price-batch-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updatePriceBatch([
            'shopid' => 220289759,
            'items' => [
                0 => [
                    'item_id' => 100936359,
                    'price' => 15000,
                    'item_price' => 1500,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615138013,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdatePriceBatchWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-price-batch-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updatePriceBatch([
            'shopid' => 220289759,
            'items' => [
                0 => [
                    'item_id' => 100936359,
                    'price' => 15000,
                    'item_price' => 1500,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615138013,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateStockBatchWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-stock-batch-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateStockBatch([
            'shopid' => 220289759,
            'items' => [
                0 => [
                    'item_id' => 100936359,
                    'stock' => 500,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615138489,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateStockBatchWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-stock-batch-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateStockBatch([
            'shopid' => 220289759,
            'items' => [
                0 => [
                    'item_id' => 100936359,
                    'stock' => 500,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615138489,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateVariationPriceBatchWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-variation-price-batch-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateVariationPriceBatch([
            'shopid' => 220289759,
            'variations' => [
                0 => [
                    'variation_id' => 1337,
                    'price' => 15000,
                    'item_id' => 100936359,
                    'item_price' => 1500,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615138784,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateVariationPriceBatchWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-variation-price-batch-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateVariationPriceBatch([
            'shopid' => 220289759,
            'variations' => [
                0 => [
                    'variation_id' => 1337,
                    'price' => 15000,
                    'item_id' => 100936359,
                    'item_price' => 1500,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615138784,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateVariationStockBatchWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-variation-stock-batch-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateVariationStockBatch([
            'shopid' => 220289759,
            'variations' => [
                0 => [
                    'variation_id' => 1337,
                    'stock' => 500,
                    'item_id' => 100936359,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615151108,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateVariationStockBatchWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-variation-stock-batch-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateVariationStockBatch([
            'shopid' => 220289759,
            'variations' => [
                0 => [
                    'variation_id' => 1337,
                    'stock' => 500,
                    'item_id' => 100936359,
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615151108,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanInitTierVariationWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/init-tier-variation-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->initTierVariation([
            'item_id' => 100936359,
            'tier_variation' => [
                0 => [
                    'name' => 'foo_tier #1',
                    'options' => [
                    ],
                    'images_url' => [
                    ],
                ],
            ],
            'variation' => [
                0 => [
                    'tier_index' => '[0]',
                    'stock' => 100,
                    'price' => 500,
                    'variation_sku' => 'foobar123',
                ],
            ],
            'shopid' => '220289759',
            'partner_id' => 850356,
            'timestamp' => 1615157109,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanInitTierVariationWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/init-tier-variation-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->initTierVariation([
            'item_id' => 100936359,
            'tier_variation' => [
                0 => [
                    'name' => 'foo_tier #1',
                    'options' => [
                    ],
                    'images_url' => [
                    ],
                ],
            ],
            'variation' => [
                0 => [
                    'tier_index' => '[0]',
                    'stock' => 100,
                    'price' => 500,
                    'variation_sku' => 'foobar123',
                ],
            ],
            'shopid' => '220289759',
            'partner_id' => 850356,
            'timestamp' => 1615157109,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddTierVariationWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/add-tier-variation-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->addTierVariation([
            'item_id' => 100936359,
            'variation' => [
                0 => [
                    'tier_index' => [
                        0 => 0,
                        1 => 1,
                    ],
                    'stock' => 500,
                    'price' => 1500,
                    'variation_sku' => 'foobar123',
                ],
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615158643,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanAddTierVariationWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/add-tier-variation-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->addTierVariation([
            'item_id' => 100936359,
            'variation' => [
                0 => [
                    'tier_index' => [
                        0 => 0,
                        1 => 1,
                    ],
                    'stock' => 500,
                    'price' => 1500,
                    'variation_sku' => 'foobar123',
                ],
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615158643,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetVariationsWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-variations-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getVariations([
            'item_id' => 100936359,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615159083,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetVariationsWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-variations-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getVariations([
            'item_id' => 100936359,
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615159083,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateTierVariationListWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-tier-variation-list-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateTierVariationList([
            'item_id' => '100936359',
            'tier_variation' => [
                0 => [
                    'name' => 'foo #1',
                    'options' => [
                    ],
                    'images_url' => [
                        0 => 'http://foo.bar/nonexistent-image.jpg',
                    ],
                ],
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615192633,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateTierVariationListWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-tier-variation-list-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateTierVariationList([
            'item_id' => '100936359',
            'tier_variation' => [
                0 => [
                    'name' => 'foo #1',
                    'options' => [
                    ],
                    'images_url' => [
                        0 => 'http://foo.bar/nonexistent-image.jpg',
                    ],
                ],
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1615192633,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateTierVariationIndexWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-tier-variation-index-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateTierVariationIndex([
            'item_id' => 100936359,
            'variation' => '{"tier_index": [0,1], "variation_id": 1337}',
            'shopid' => '220289759',
            'partner_id' => 850356,
            'timestamp' => 1615193330,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanUpdateTierVariationIndexWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/update-tier-variation-index-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->updateTierVariationIndex([
            'item_id' => 100936359,
            'variation' => '{"tier_index": [0,1], "variation_id": 1337}',
            'shopid' => '220289759',
            'partner_id' => 850356,
            'timestamp' => 1615193330,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanBoostItemWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("https://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/boost-item-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->boostItem([
            'shopid' => 220289759,
            'item_id' => [
                0 => 100936359,
            ],
            'partner_id' => 850356,
            'timestamp' => 1615193556,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanBoostItemWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("https://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/boost-item-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->boostItem([
            'shopid' => 220289759,
            'item_id' => [
                0 => 100936359,
            ],
            'partner_id' => 850356,
            'timestamp' => 1615193556,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetBoostedItemsWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("https://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-boosted-items-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getBoostedItems([
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615195567,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetBoostedItemsWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("https://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-boosted-items-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getBoostedItems([
            'shopid' => 1337,
            'partner_id' => 850356,
            'timestamp' => 1615195567,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanSetItemInstallmentTenuresWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("https://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/set-item-installment-tenures-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->setItemInstallmentTenures([
            'shopid' => 220289759,
            'item_id' => 100936359,
            'tenures' => [
                0 => 3,
                1 => 6,
                2 => 12,
                3 => 24,
            ],
            'partner_id' => 850356,
            'timestamp' => 1615196000,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanSetItemInstallmentTenuresWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("https://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/set-item-installment-tenures-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->setItemInstallmentTenures([
            'shopid' => 220289759,
            'item_id' => 100936359,
            'tenures' => [
                0 => 3,
                1 => 6,
                2 => 12,
                3 => 24,
            ],
            'partner_id' => 850356,
            'timestamp' => 1615196000,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetPromotionInfoWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-promotion-info-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getPromotionInfo([
            'shopid' => 220289759,
            'item_id_list' => [
                0 => 1337,
            ],
            'partner_id' => 850356,
            'timestamp' => 1615196587,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetPromotionInfoWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-promotion-info-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getPromotionInfo([
            'shopid' => 220289759,
            'item_id_list' => [
                0 => 1337,
            ],
            'partner_id' => 850356,
            'timestamp' => 1615196587,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetRecommendCatsWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-recommend-cats-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getRecommendCats([
            'name' => ' iphone',
            'shopid' => '220289759',
            'partner_id' => 850356,
            'timestamp' => 1615196860,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetRecommendCatsWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-recommend-cats-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getRecommendCats([
            'name' => ' iphone',
            'shopid' => '220289759',
            'partner_id' => 850356,
            'timestamp' => 1615196860,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetCommentWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-comment-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getComment([
            'shopid' => 220289759,
            'pagination_offset' => '0',
            'pagination_entries_per_page' => 10,
            'partner_id' => 850356,
            'timestamp' => 1615197450,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanGetCommentWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/get-comment-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->getComment([
            'shopid' => 220289759,
            'pagination_offset' => '0',
            'pagination_entries_per_page' => 10,
            'partner_id' => 850356,
            'timestamp' => 1615197450,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanReplyCommentsWithSuccessResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/reply-comments-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->replyComments([
            'shopid' => 220289759,
            'cmt_list' => [
                0 => [
                    'cmt_id' => 1337,
                    'comment' => 'this is a foobar. :))',
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615197825,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanReplyCommentsWithFailedResponse()
    {
        $item       = new Item($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://foo.bar");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/item/reply-comments-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $item->setHttpClient($httpClient);

        $response = $item->replyComments([
            'shopid' => 220289759,
            'cmt_list' => [
                0 => [
                    'cmt_id' => 1337,
                    'comment' => 'this is a foobar. :))',
                ],
            ],
            'partner_id' => 850356,
            'timestamp' => 1615197825,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
