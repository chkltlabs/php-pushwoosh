<?php

namespace Chkltlabs\PhpPushwoosh\Resources;

use Chkltlabs\PhpPushwoosh\Pushwoosh;
use Chkltlabs\PhpPushwoosh\PushwooshRequestException;
use Psr\Http\Client\ClientExceptionInterface;

class MessageInbox extends AbstractResource
{
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function getInboxMessages(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/getInboxMessages',
            $params
        );
    }

    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function inboxStatus(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/inboxStatus',
            $params
        );
    }
}