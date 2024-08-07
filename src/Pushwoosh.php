<?php

namespace Chkltlabs\PhpPushwoosh;

use Chkltlabs\PhpPushwoosh\Resources\AbstractResource;
use Chkltlabs\PhpPushwoosh\Resources\Applications;
use Chkltlabs\PhpPushwoosh\Resources\Campaigns;
use Chkltlabs\PhpPushwoosh\Resources\Configuration;
use Chkltlabs\PhpPushwoosh\Resources\CustomerJourney;
use Chkltlabs\PhpPushwoosh\Resources\Device;
use Chkltlabs\PhpPushwoosh\Resources\Email;
use Chkltlabs\PhpPushwoosh\Resources\Events;
use Chkltlabs\PhpPushwoosh\Resources\IOSLiveActivities;
use Chkltlabs\PhpPushwoosh\Resources\MessageInbox;
use Chkltlabs\PhpPushwoosh\Resources\Messages;
use Chkltlabs\PhpPushwoosh\Resources\Presets;
use Chkltlabs\PhpPushwoosh\Resources\Segmentation;
use Chkltlabs\PhpPushwoosh\Resources\SMS;
use Chkltlabs\PhpPushwoosh\Resources\Statistics;
use Chkltlabs\PhpPushwoosh\Resources\Tags;
use Chkltlabs\PhpPushwoosh\Resources\TestDevices;
use Chkltlabs\PhpPushwoosh\Resources\Users;
use Chkltlabs\PhpPushwoosh\Traits\HasCachedResources;
use Psr\Http\Client\ClientInterface;
use Shuttle\Shuttle;

/**
 * @property Applications $applications
 * @property Campaigns $campaigns
 * @property Configuration $configuration
 * @property CustomerJourney $customerJourney
 * @property Device $device
 * @property Email $email
 * @property Events $events
 * @property IOSLiveActivities $IOSLiveActivities
 * @property MessageInbox $messageInbox
 * @property Messages $messages
 * @property Presets $presets
 * @property Segmentation $segmentation
 * @property SMS $SMS
 * @property Statistics $statistics
 * @property Tags $tags
 * @property TestDevices $testDevices
 * @property Users $users
 *
 *
 */
class Pushwoosh
{
    use HasCachedResources;

    /**
     * ClientInterface instance.
     *
     * @var ClientInterface|null
     */
    protected ?ClientInterface $httpClient;

    const GO_URL = 'https://go.pushwoosh.com';
    const API_URL = 'https://api.pushwoosh.com';

    const API_URI = '/api/v2';

    const JSON_URI = '/json/1.3';
    /**
     * Resource instance cache.
     *
     * @var array<AbstractResource>
     */
    public array $resource_cache = [];

    public function __construct(
        public string $api_key,
        public string $project_id,
    )
    {

    }

    /**
     * Set a specific ClientInterface instance to be used to make HTTP calls.
     *
     * @param ClientInterface $httpClient
     * @return void
     */
    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
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
}