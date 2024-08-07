<?php

namespace Chkltlabs\PhpPushwoosh\Resources;

use Chkltlabs\PhpPushwoosh\Pushwoosh;
use Chkltlabs\PhpPushwoosh\PushwooshRequestException;
use Psr\Http\Client\ClientExceptionInterface;

class Tags extends AbstractResource
{
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function addTag(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/addTag',
            $params
        );
    }
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function deleteTag(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/deleteTag',
            $params
        );
    }
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function listTags(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::JSON_URI);
        return $this->sendRequest(
            'POST',
            '/listTags',
            $params
        );
    }
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function bulkSetTags(array $params = []): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::API_URI);
        return $this->sendRequest(
            'POST',
            '/audience/bulkSetTags',
            $params
        );
    }

    /**
     * @param string $request_id
     * @param bool $detailed
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function bulkSetTagsStatus(string $request_id, bool $detailed = false): object
    {
        $this->setUrl(Pushwoosh::API_URL);
        $this->setUri(Pushwoosh::API_URI);
        $detailed = $detailed ? 'true' : 'false';
        return $this->sendRequest(
            'GET',
            '/audience/bulkSetTags/'
            .$request_id
            .'?detailed='
            .$detailed,
            []
        );
    }
}