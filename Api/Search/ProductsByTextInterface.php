<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Api\Search;

interface ProductsByTextInterface
{
    /**
     * Search products by text
     *
     * @param string $text
     * @return array
     */
    public function execute(string $text): array;
}
