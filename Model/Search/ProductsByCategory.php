<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Search;

use Aouby\Zapiex\Api\Endpoint\RequestInterface;
use Aouby\Zapiex\Api\Search\ProductsByCategoryInterface;

class ProductsByCategory implements ProductsByCategoryInterface
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
    public function execute(string $categoryId): array
    {
        // TODO: Implement execute() method.
    }
}
