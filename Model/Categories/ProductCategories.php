<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Categories;

use Aouby\Zapiex\Api\Categories\ProductCategoriesInterface;
use Aouby\Zapiex\Api\Endpoint\RequestInterface;

class ProductCategories implements ProductCategoriesInterface
{
    private RequestInterface $endpointRequest;

    /**
     * @param RequestInterface $endpointRequest
     */
    public function __construct(
        RequestInterface $endpointRequest
    ) {
        $this->endpointRequest = $endpointRequest;
    }

    /**
     * @inheritDoc
     */
    public function execute(): array
    {
        // TODO: Implement execute() method.
    }
}
