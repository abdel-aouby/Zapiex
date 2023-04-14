<?php

declare(strict_types=1);

namespace Aouby\Zapiex\Model\Endpoint;

use Aouby\Zapiex\Api\Endpoint\RequestInterface;
use LogicException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Serialize\SerializerInterface;

class Request implements RequestInterface
{
    public const JSON_DECODE_DEFAULT_DEPTH = 512;
    private Curl $curl;
    private SerializerInterface $serializer;

    /**
     * @param Curl $curl
     * @param SerializerInterface $serializer
     */
    public function __construct(
        Curl $curl,
        SerializerInterface $serializer
    ) {
        $this->curl = $curl;
        $this->serializer = $serializer;
    }

    /**
     * @inheritDoc
     */
    public function execute(
        string $url,
        bool $isPostRequest = true,
        array $auth = [],
        array $data = []
    ): array {
        if ($isPostRequest) {
            return $this->postRequest($url, $data, $auth);
        }

        if (empty($data)) {
            throw new LogicException(__('Data parameters are not allowed in GET method.'));
        }
        return $this->getRequest($url);
    }

    /**
     * Perform POST request
     *
     * @param string $url
     * @param array $data
     * @param array $auth
     * @return array
     * @throws LocalizedException
     * @throws \JsonException
     */
    private function postRequest(
        string $url,
        array $data,
        array $auth
    ): array {
        $this->curl->addHeader('Content-Type', 'application/json');

        if (isset($auth['name']) && isset($auth['key'])) {
            $this->curl->addHeader($auth['name'], $auth['key']);
        }

        $params = $this->serializer->serialize($data);
        $this->curl->addHeader('Content-Length', strlen($params));

        $options = [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        ];
        $this->curl->setOptions($options);

        $this->curl->post($url, $data);

        $body = $this->curl->getBody();
        if (empty($body) || $this->curl->getStatus() !== 200) {
            throw new LocalizedException(
                __('Failed to send zapiex API request. ' . $url . ' Error code: ' . $this->curl->getStatus())
            );
        }

        $result = json_decode(
            $body,
            true,
            self::JSON_DECODE_DEFAULT_DEPTH,
            JSON_THROW_ON_ERROR
        );

        /**
         * All zapiex POST request to API endpoints
         * In case of failure is returning the errors in following format: https://docs.zapiex.com/v3/#tag/Errors
         */
        if (!isset($result['statusCode']) || (int) $result['statusCode'] !== 200) {
            throw new LocalizedException(
                __(
                    'Failed to send zapiex API request: ' . $url . '. ' . PHP_EOL .
                    '(Request ID : ' . $result['requestId'] . ').' . PHP_EOL .
                    '(Status code : ' . $result['statusCode'] . '). ' . PHP_EOL .
                    '(Error type : ' . $result['errorType'] . '). ' . PHP_EOL .
                    '(Error message : ' . $result['errorMessage'] . '). ' . PHP_EOL
                )
            );
        }

        return $result;
    }

    /**
     * Perform GET request
     *
     * @param string $url
     * @return array
     * @throws LocalizedException
     * @throws \JsonException
     */
    private function getRequest(string $url): array
    {
        $this->curl->get($url);
        $body = $this->curl->getBody();
        if (empty($body) || $this->curl->getStatus() !== 200) {
            throw new LocalizedException(
                __('Failed to send zapiex API request. ' . $url . ' Error code: ' . $this->curl->getStatus())
            );
        }

        return json_decode(
            $body,
            true,
            self::JSON_DECODE_DEFAULT_DEPTH,
            JSON_THROW_ON_ERROR
        );
    }
}
