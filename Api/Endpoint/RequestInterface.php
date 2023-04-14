<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Api\Endpoint;

interface RequestInterface
{
    /**
     * Zapiex endpoint request
     *
     * @param string $url
     * @param bool $isPostRequest
     * @param array $auth
     * @param array $data
     * @return array
     */
    public function execute(
        string $url,
        bool $isPostRequest = true,
        array $auth = [],
        array $data = []
    ): array;
}
