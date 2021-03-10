<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class Item extends Resource
{
    /**
     * Use this call to get categories of product item.
     *
     * @param array $data
     * @return string
     */
    public function getCategories(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/categories/get',
            $data
        );
    }

    /**
     * Use this call to get attributes of product item.
     *
     * @param array $data
     * @return string
     */
    public function getAttributes(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/attributes/get',
            $data
        );
    }

    /**
     * Use this call to add a product item. Should get
     * dependency by calling below API first 'shopee.item.GetCategories',
     * 'shopee.item.GetAttributes', 'shopee.logistics.GetLogistics'.
     *
     * @param array $data
     * @return string
     */
    public function add(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/add',
            $data
        );
    }

    /**
     * Use this call to delete a product item.
     *
     * @param array $data
     * @return string
     */
    public function delete(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/delete',
            $data
        );
    }

    /**
     * Use this api to unlist or list items in batch.
     *
     * @param array $data
     * @return string
     */
    public function unlistItem(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/unlist',
            $data
        );
    }

    /**
     * Use this call to add item variations, it only
     * supports non-tier-variation items.
     *
     * @param array $data
     * @return string
     */
    public function addVariations(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/add_variations',
            $data
        );
    }

    /**
     * Use this call to delete item
     * variation.
     *
     * @param array $data
     * @return string
     */
    public function deleteVariation(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/delete_variation',
            $data
        );
    }

    /**
     * Use this call to get a list of items.
     *
     * @param array $data
     * @return string
     */
    public function getItemsList(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/get',
            $data
        );
    }

    /**
     * Use this call to get detail of item.
     *
     * @param array $data
     * @return string
     */
    public function getItemDetail(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/get',
            $data
        );
    }

    /**
     * Use this call to update a product item. should get dependency
     * by calling below API first 'shopee.item.GetItemDetail'.
     *
     * @param array $data
     * @return string
     */
    public function updateItem(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/update',
            $data
        );
    }

    /**
     * Use this call to add product item images.
     *
     * @param array $data
     * @return string
     */
    public function addItemImg(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/img/add',
            $data
        );
    }

    /**
     * Override and update all the existing images
     * of an item.
     *
     * @param array $data
     * @return string
     */
    public function updateItemImg(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/img/update',
            $data
        );
    }

    /**
     * Use this call to add one item image in
     * assigned position.
     *
     * @param array $data
     * @return string
     */
    public function insertItemImg(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/img/insert',
            $data
        );
    }

    /**
     * Use this call to delete a product item image.
     *
     * @param array $data
     * @return string
     */
    public function deleteItemImg(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/img/delete',
            $data
        );
    }

    /**
     * Use this call to update item price. the 'item_price'
     * is only available for cross-border SIP whitelisted
     * sellers.
     *
     * @param array $data
     * @return string
     */
    public function updatePrice(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/update_price',
            $data
        );
    }

    /**
     * Use this call to update item stock.
     *
     * @param array $data
     * @return string
     */
    public function updateStock(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/update_stock',
            $data
        );
    }

    /**
     * Use this call to update item variation price.
     * The 'item_price' is only available for cross-border
     * SIP whitelisted sellers.
     *
     * @param array $data
     * @return string
     */
    public function updateVariationPrice(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/update_variation_price',
            $data
        );
    }

    /**
     * Use this call to update item variation stock.
     *
     * @param array $data
     * @return string
     */
    public function updateVariationStock(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/update_variation_stock',
            $data
        );
    }

    /**
     * Update items price in batch. The 'item_price'
     * is only available for cross-border SIP whitelisted
     * sellers.
     *
     * @param array $data
     * @return string
     */
    public function updatePriceBatch(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/update/items_price',
            $data
        );
    }

    /**
     * Update items stock in batch.
     *
     * @param array $data
     * @return string
     */
    public function updateStockBatch(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/update/items_stock',
            $data
        );
    }

    /**
     * Update variations price in batch. The 'item_price'
     * is only available for cross-border SIP whitelisted
     * sellers.
     *
     * @param array $data
     * @return string
     */
    public function updateVariationPriceBatch(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/update/vars_price',
            $data
        );
    }

    /**
     * Update variations stock in batch.
     *
     * @param array $data
     * @return string
     */
    public function updateVariationStockBatch(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/update/vars_stock',
            $data
        );
    }

    /**
     * Initialize a non-tier variation item to a tier-variation item,
     * upload variation image and initialize stock and price for each variation.
     * This API cannot edit tier_variation and variation price/stock.
     *
     * @param array $data
     * @return string
     */
    public function initTierVariation(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/tier_var/init',
            $data
        );
    }

    /**
     * Use this api to add new tier variations in batch.
     * Tier variation index of variations in the same item
     * must be unique.
     *
     * @param array $data
     * @return string
     */
    public function addTierVariation(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/tier_var/add',
            $data
        );
    }

    /**
     * Use this call to get tier-variation basic information
     * under an item.
     *
     * @param array $data
     * @return string
     */
    public function getVariations(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/tier_var/get',
            $data
        );
    }

    /**
     * Use this api to update tier-variation list or upload
     * variation image of a tier-variation item.
     *
     * @param array $data
     * @return string
     */
    public function updateTierVariationList(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/tier_var/update_list',
            $data
        );
    }

    /**
     * Use this api to update existing tier index under
     * the same variation_id.
     *
     * @param array $data
     * @return string
     */
    public function updateTierVariationIndex(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/tier_var/update',
            $data
        );
    }

    /**
     * Use this api to boost multiple items at once.
     *
     * @param array $data
     * @return string
     */
    public function boostItem(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/boost',
            $data
        );
    }

    /**
     * Use this api to get all boosted items.
     *
     * @param array $data
     * @return string
     */
    public function getBoostedItems(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/get_boosted',
            $data
        );
    }

    /**
     * Only for TW whitelisted shop. Use this API
     * to set the installment tenures of items.
     *
     * @param array $data
     * @return string
     */
    public function setItemInstallmentTenures(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/installment/set',
            $data
        );
    }

    /**
     * Use this api for get ongoing and upcoming
     * promotions.
     *
     * @param array $data
     * @return string
     */
    public function getPromotionInfo(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/promotion/get',
            $data
        );
    }

    /**
     * Use this API to get recommended category ids
     * according to item name.
     *
     * @param array $data
     * @return string
     */
    public function getRecommendCats(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/item/categories/get_recommend',
            $data
        );
    }

    /**
     * Use this api to get comment by shopid/itemid/comment_id.
     *
     * @param array $data
     * @return string
     */
    public function getComment(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/comments/get',
            $data
        );
    }

    /**
     * Use this api to reply comments from buyers in batch.
     *
     * @param array $data
     * @return string
     */
    public function replyComments(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/items/comments/reply',
            $data
        );
    }
}
