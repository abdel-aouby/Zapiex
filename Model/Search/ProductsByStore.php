<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Search;

use Aouby\Zapiex\Api\Search\ProductsByStoreInterface;

class ProductsByStore implements ProductsByStoreInterface
{
    /**
     * @inheritDoc
     */
    public function execute(string $storeId): array
    {
        // TODO: Implement execute() method.
    }
}
