<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Api\Search;

interface ProductsByCategoryInterface
{
    /**
     * Search products by category ID
     *
     * @param string $categoryId
     * @return array
     */
    public function execute(string $categoryId): array;
}
