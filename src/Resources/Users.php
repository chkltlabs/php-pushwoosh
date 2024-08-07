<?php

namespace Chkltlabs\PhpPushwoosh\Resources;

use Chkltlabs\PhpPushwoosh\Pushwoosh;
use Chkltlabs\PhpPushwoosh\PushwooshRequestException;
use Psr\Http\Client\ClientExceptionInterface;

class Users extends AbstractResource
{
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function registerUser(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/registerUser',
            $params
        );
    }
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function postEvent(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/postEvent',
            $params
        );
    }
}