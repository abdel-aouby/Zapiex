<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Search;

use Aouby\Zapiex\Api\Endpoint\RequestInterface;
use Aouby\Zapiex\Api\Search\ProductsByStoreInterface;
use Magento\Framework\Exception\InputException;

class ProductsByStore implements ProductsByStoreInterface
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
    public function execute(string $storeId): array
    {
        if (empty($productId)) {
            throw new InputException(__('Store ID must be specified.'));
        }

        $url = '';

        $data = [
            'storeId' => $storeId,
            'text' => '',
            'currency' => '',
            'locale' => '',
            'sort' => '',
            'page' => 1,
        ];

        $auth = [
            'name' => '',
            'key' => '',
        ];

        return $this->endpointRequest->execute($url, true, $auth, $data);
    }
}
