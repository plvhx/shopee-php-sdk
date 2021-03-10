<?php

declare(strict_types=1);

namespace Gandung\Shopee\Service;

/**
 * @author Paulus Gandung Prakosa <rvn.plvhx@gmail.com>
 */
class TopPicks extends Resource
{
    /**
     * Get the list of all collections.
     *
     * @param array $data
     * @return string
     */
    public function getTopPicksList(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/top_picks/get',
            $data
        );
    }

    /**
     * Add one collection. One shop can
     * have up to 10 collections.
     *
     * @param array $data
     * @return string
     */
    public function addTopPicks(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/top_picks/add',
            $data
        );
    }

    /**
     * Use this API to update the collection name, the item
     * list in a collection, or to activate a collection.
     *
     * @param array $data
     * @return string
     */
    public function updateTopPicks(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/top_picks/update',
            $data
        );
    }

    /**
     * Delete a collection.
     *
     * @param array $data
     * @return string
     */
    public function deleteTopPicks(array $data)
    {
        return $this->call(
            'POST',
            '/api/v1/top_picks/delete',
            $data
        );
    }
}
