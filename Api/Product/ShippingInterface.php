<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Api\Product;

interface ShippingInterface
{
    /**
     * Retrieve product shipping
     *
     * @param string $productId
     * @return array
     */
    public function execute(string $productId): array;
}
