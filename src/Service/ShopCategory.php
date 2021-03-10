<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class ShopCategory extends Resource
{
    /**
     * Use this call to add a new collection.
     *
     * @param array $data
     * @return string
     */
    public function addShopCategory(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop_category/add',
            $data
        );
    }

    /**
     * Use this call to get list of in-shop categories.
     *
     * @param array $data
     * @return string
     */
    public function getShopCategories(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop_categorys/get',
            $data
        );
    }

    /**
     * Use this call to delete a existing collection.
     *
     * @param array $data
     * @return string
     */
    public function deleteShopCategory(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop_category/delete',
            $data
        );
    }

    /**
     * Use this call to update a existing collection.
     *
     * @param array $data
     * @return string
     */
    public function updateShopCategory(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop_category/update',
            $data
        );
    }

    /**
     * Use this call to add items to certain shop category.
     *
     * @param array $data
     * @return string
     */
    public function addItems($data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop_category/add/items',
            $data
        );
    }

    /**
     * Use this call to get items list of certain shop category.
     *
     * @param array $data
     * @return string
     */
    public function getItems(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop_category/get/items',
            $data
        );
    }

    /**
     * Use this api to delete items from shop category.
     *
     * @param array $data
     * @return string
     */
    public function deleteItems(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/shop_category/del/items',
            $data
        );
    }
}
