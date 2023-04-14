<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Search;

use Aouby\Zapiex\Api\Search\ProductsByCategoryInterface;

class ProductsByCategory implements ProductsByCategoryInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $categoryId): array
    {
        // TODO: Implement execute() method.
    }
}
