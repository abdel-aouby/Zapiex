<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Endpoint;

use Aouby\Zapiex\Api\Endpoint\RequestInterface;

class Request implements RequestInterface
{
    /**
     * @inheritDoc
     */
    public function execute(
        string $url,
        array $data,
        array $auth,
        bool $isPostRequest = true
    ): array {
        // TODO: Implement execute() method.
    }
}
