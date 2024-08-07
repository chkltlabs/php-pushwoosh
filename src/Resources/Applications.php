<?php

namespace Chkltlabs\PhpPushwoosh\Resources;

use Chkltlabs\PhpPushwoosh\Pushwoosh;
use Chkltlabs\PhpPushwoosh\PushwooshRequestException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

class Applications extends AbstractResource
{
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function createApplication(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/createApplication',
            $params
        );
    }
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function updateApplication(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/updateApplication',
            $params
        );
    }
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function deleteApplication(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/deleteApplication',
            $params
        );
    }
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function getApplication(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/getApplication',
            $params
        );
    }

    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function getApplications(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/getApplications',
            $params
        );
    }
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function getApplicationFile(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/getApplicationFile',
            $params
        );
    }
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function setApplicationPlatformStatus(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/getApplicationPlatformStatus',
            $params
        );
    }
}