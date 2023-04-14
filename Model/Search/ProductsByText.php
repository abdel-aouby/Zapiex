<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Search;

use Aouby\Zapiex\Api\Endpoint\RequestInterface;
use Aouby\Zapiex\Api\Search\ProductsByTextInterface;

class ProductsByText implements ProductsByTextInterface
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
    public function execute(string $text): array
    {
        // TODO: Implement execute() method.
    }
}
