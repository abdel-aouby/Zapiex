<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Api\Product;

interface ReviewsInterface
{
    /**
     * Retrieve product reviews
     *
     * @param string $productId
     * @return array
     */
    public function execute(string $productId): array;
}
