<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Api\Categories;

interface ProductCategoriesInterface
{
    /**
     * Retrieve product categories
     *
     * @return array
     */
    public function execute(): array;
}
