<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Product;

use Aouby\Zapiex\Api\Product\ReviewsInterface;

class Reviews implements ReviewsInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $productId): array
    {
        // TODO: Implement execute() method.
    }
}
