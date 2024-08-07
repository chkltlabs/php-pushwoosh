<?php

namespace Chkltlabs\PhpPushwoosh\Resources;

use Chkltlabs\PhpPushwoosh\Pushwoosh;
use Chkltlabs\PhpPushwoosh\PushwooshRequestException;
use Psr\Http\Client\ClientExceptionInterface;

class CustomerJourney extends AbstractResource
{
    /**
     * @param array $params
     * @return object
     * @throws ClientExceptionInterface
     * @throws PushwooshRequestException
     */
    public function statistics(string $id): object
    {
        $this->setUrl('https://journey.pushwoosh.com');
        $this->setUri('/api');
        return $this->sendRequest(
            'GET',
            '/journey/'.$id.'/statistics/external',
            [],
            ['Authorization' => 'Api '.$this->api_key]
        );
    }
}
