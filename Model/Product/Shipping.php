<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Product;

use Aouby\Zapiex\Api\Product\ShippingInterface;

class Shipping implements ShippingInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $productId): array
    {
        // TODO: Implement execute() method.
    }
}
