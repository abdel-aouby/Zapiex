<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Product;

use Aouby\Zapiex\Api\Endpoint\RequestInterface;
use Aouby\Zapiex\Api\Product\ShippingInterface;
use Magento\Framework\Exception\InputException;

class Shipping implements ShippingInterface
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
        if (empty($productId)) {
            throw new InputException(__('Product ID must be specified.'));
        }

        $url = '';

        $data = [
            'productId' => $productId,
            'currency' => '',
            'quantity' => '',
            'shipFrom' => '',
            'shipTo' => '',
        ];

        $auth = [
            'name' => '',
            'key' => '',
        ];

        return $this->endpointRequest->execute($url, true, $auth, $data);
    }
}
