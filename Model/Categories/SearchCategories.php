<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Categories;

use Aouby\Zapiex\Api\Categories\SearchCategoriesInterface;
use Aouby\Zapiex\Api\Endpoint\RequestInterface;

class SearchCategories implements SearchCategoriesInterface
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
        $url = '';
        return $this->endpointRequest->execute($url, false);
    }
}
