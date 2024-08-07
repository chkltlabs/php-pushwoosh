<?php

namespace Chkltlabs\PhpPushwoosh\Resources;

use Chkltlabs\PhpPushwoosh\Pushwoosh;
use Chkltlabs\PhpPushwoosh\PushwooshRequestException;
use Psr\Http\Client\ClientExceptionInterface;

class Messages extends AbstractResource
{
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function createMessage(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/createMessage',
            $params
        );
    }

    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function deleteMessage(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/deleteMessage',
            $params
        );
    }

    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function getMessageDetails(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/getMessageDetails',
            $params
        );
    }

    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function createTargetedMessage(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/createTargetedMessage',
            $params
        );
    }

    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function getPushHistory(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/getPushHistory',
            $params
        );
    }

    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function cancelMessage(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/cancelMessage',
            $params
        );
    }
}