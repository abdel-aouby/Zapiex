<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Api\Endpoint;

interface RequestInterface
{
    /**
     * Zapiex endpoint request
     *
     * @param string $url
     * @param array $data
     * @param array $auth
     * @param bool $isPostRequest
     * @return array
     */
    public function execute(
        string $url,
        array $data,
        array $auth,
        bool $isPostRequest = true
    ): array;
}
