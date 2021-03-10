<?php

declare(strict_types=1);

namespace Gandung\Shopee\Tests\Service;

use Gandung\Shopee\Constraints\TokenGeneratorAwareInterface;
use Gandung\Shopee\Service\Image;
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
class ImageTest extends TestCase implements TokenGeneratorAwareInterface
{
    use AbstractServiceTestTrait;

    public function testCanCallUploadImgWithSuccessResponse()
    {
        $image      = new Image($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://example.com");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/image/upload-img-ok.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $image->setHttpClient($httpClient);

        $response = $image->uploadImg([
            'images' => [
                'http://example.com/nonexistent-image.jpg',
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614627159,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }

    public function testCanCallUploadImgWithFailedResponse()
    {
        $image      = new Image($this->getTokenGenerator(), "123123");
        $httpClient = $this->createHttpClient("http://example.com");
        $contents   = file_get_contents(
            __DIR__ . '/../data-fixtures/image/upload-img-fail.json'
        );

        $httpClient
            ->getConfig('handler')
            ->append(new Response(200, ['Content-Type' => 'application/json'], $contents));

        $image->setHttpClient($httpClient);

        $response = $image->uploadImg([
            'images' => [
                'http://example.com/nonexistent-image.jpg',
            ],
            'shopid' => 220289759,
            'partner_id' => 850356,
            'timestamp' => 1614627159,
        ]);

        $deserialized = json_decode($contents, true);
        $response     = json_decode($response, true);

        $this->assertEquals($deserialized, $response);
    }
}
