<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Api\Search;

interface ProductsByStoreInterface
{
    /**
     * Retrieve all of a store's products or only those matching your criteria.
     *
     * @param string $storeId
     * @return array
     */
    public function execute(string $storeId): array;
}
