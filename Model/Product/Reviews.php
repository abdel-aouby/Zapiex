<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Product;

use Aouby\Zapiex\Api\Endpoint\RequestInterface;
use Aouby\Zapiex\Api\Product\ReviewsInterface;

class Reviews implements ReviewsInterface
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
    public function execute(string $productId): array
    {
        // TODO: Implement execute() method.
    }
}
