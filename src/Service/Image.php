<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class Image extends Resource
{
    /**
     * Use this optional API to pre-validate your image urls
     * and convert them to Shopee image url to use in item upload
     * APIs. This way your potential invalid urls will not block
     * your item upload process.
     *
     * @param array $data
     * @return string
     */
    public function uploadImg(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/image/upload',
            $data
        );
    }
}
