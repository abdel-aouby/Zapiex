<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Api\Categories;

interface SearchCategoriesInterface
{
    /**
     * Retrieve search categories
     *
     * @return array
     */
    public function execute(): array;
}
