<?php

namespace Chkltlabs\PhpPushwoosh\Resources;

use Chkltlabs\PhpPushwoosh\PushwooshRequestException;
use Nimbly\Capsule\Request;
use Nimbly\Shuttle\Shuttle;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use UnexpectedValueException;

abstract class AbstractResource
{
    /**
     * @param ClientInterface $httpClient
     * @param string $api_key
     * @param string $project_id
//     * @param string $api_host_url
     */
    public function __construct(
        protected ClientInterface $httpClient,
        public string $api_key,
        public string $project_id,
//        protected string $api_host_url
    )
    {
        //...
    }

    /**
     * Get the ClientInterface instance being used to make HTTP calls.
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        if( empty($this->httpClient) ){
            $this->httpClient = new Shuttle();
        }

        return $this->httpClient;
    }

    /**
     * Build standard headers array
     *
     * @param array $headers
     * @return array
     */

    public function headers(array $headers = []): array
    {
        return \array_merge([
            'Cache-Control' => 'no-cache',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Connection' => 'keep-alive',
        ], $headers);
    }

    /**
     * Build the RequestInterface instance to be sent by the HttpClientInterface instance.
     *
     * @param string $method
     * @param string $path
     * @param array<array-key,mixed> $params
     * @return RequestInterface
     */
    protected function buildRequest(string $method, string $path, array $params = [], array $headers = []): RequestInterface
    {
        $path = \trim($this->getApiHostUrl(), '/').'/'.\trim($path, '/');
        $path .= ( strtolower($method) == 'get' ? '?'.http_build_query($params) : '');
        $params = $this->addAuthAndApp($params);
        $body = ( strtolower($method) == 'get' ? null : \json_encode((object) $params));
        return new Request(
            $method,
            $path,
            $body,
            $this->headers($headers)
        );
    }

    /**
     * Make an HTTP request and get back the ResponseInterface instance.
     *
     * @param string $method
     * @param string $path
     * @param array<array-key,mixed> $params
     * @return ResponseInterface
     * @throws PushwooshRequestException|ClientExceptionInterface
     */
    protected function sendRequestRawResponse(
        string $method,
        string $path,
        array $params = [],
        array $headers = []
    ): ResponseInterface
    {
        $response = $this->httpClient->sendRequest(
            $this->buildRequest($method, $path, $params, $headers)
        );

        if( $response->getStatusCode() < 200 || $response->getStatusCode() >= 300 ){
            throw new PushwooshRequestException($response);
        }

        return $response;
    }

    /**
     * Send a request and parse the response.
     *
     * @param string $method
     * @param string $path
     * @param array<array-key,mixed> $params
     * @return object
     * @throws PushwooshRequestException|ClientExceptionInterface|UnexpectedValueException
     */
    protected function sendRequest(string $method, string $path, array $params = [], array $headers = []): object
    {
        $response = $this->sendRequestRawResponse($method, $path, $params, $headers);

        $payload = \json_decode($response->getBody()->getContents());

        if( \json_last_error() !== JSON_ERROR_NONE ){
            throw new UnexpectedValueException("Invalid JSON response returned by Plaid");
        }

        return (object) $payload;
    }

    protected function addAuthAndApp(array $params): array
    {
        return [
            'request' => [
                'auth' => $this->api_key,
                'application' => $this->project_id,
                ...$params,
            ]
        ];
    }

    protected string $url;
    protected string $uri;
    protected function getApiHostUrl(): string
    {
        return $this->url.$this->uri;
    }

    protected function setUrl(string $url): void
    {
        $this->url = $url;
    }

    protected function setUri(string $uri): void
    {
        $this->uri = $uri;
    }
}