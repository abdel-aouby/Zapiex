<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Api\Product;

interface ProductInterface
{
    /**
     * Retrieve product
     *
     * @param string $productId
     * @return array
     */
    public function execute(string $productId): array;
}
