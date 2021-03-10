<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

use Gandung\Shopee\AbstractService;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
abstract class Resource extends AbstractService
{
    /**
     * Call the resource with proper and valid access token.
     *
     * @param string $method
     * @param string $uri
     * @param array $data
     * @return string
     */
    protected function call(string $method, string $uri, array $data = [])
    {
        $option = [];

        $this->getTokenGenerator()
            ->setUrl($this->isSandboxed()
                ? sprintf("%s%s", $this->getSandboxedUrl(), $uri)
                : sprintf("%s%s", $this->getProductionUrl(), $uri));

        if (!empty($data)) {
            $this->getTokenGenerator()->setData($data);
            $option = array_merge($option, ['json' => $data]);
        }

        $option = array_merge(
            $option,
            [
                'headers' => [
                    'Authorization' => $this->getTokenGenerator()->generateToken()
                ]
            ]
        );

        return $this->getHttpClient()
            ->request($method, $uri, $option)
            ->getBody()
            ->getContents();
    }
}
