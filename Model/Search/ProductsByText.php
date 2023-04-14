<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Search;

use Aouby\Zapiex\Api\Endpoint\RequestInterface;
use Aouby\Zapiex\Api\Search\ProductsByTextInterface;
use Magento\Framework\Exception\InputException;

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
        if (empty($productId)) {
            throw new InputException(__('Search text must be specified.'));
        }

        $url = '';

        $data = [
            'text' => $text,
            'shipFrom' => '',
            'shipTo' => '',
            'sort' => '',
            'page' => 1,
        ];

        $minPrice = '';
        $maxPrice = '';
        if ($minPrice && $maxPrice && $minPrice < $maxPrice) {
            $data['priceRange'] = [
                'from' => $minPrice,
                'to' => $maxPrice,
            ];
        }

        $auth = [
            'name' => '',
            'key' => '',
        ];

        return $this->endpointRequest->execute($url, true, $auth, $data);
    }
}
