<?php

namespace Ssoready\Management;

use Ssoready\Management\Organizations\OrganizationsClient;
use Ssoready\Management\SamlConnections\SamlConnectionsClient;
use Ssoready\Management\ScimDirectories\ScimDirectoriesClient;
use Ssoready\Management\SetupUrls\SetupUrlsClient;
use Ssoready\Core\Client\RawClient;

class ManagementClient
{
    /**
     * @var OrganizationsClient $organizations
     */
    public OrganizationsClient $organizations;

    /**
     * @var SamlConnectionsClient $samlConnections
     */
    public SamlConnectionsClient $samlConnections;

    /**
     * @var ScimDirectoriesClient $scimDirectories
     */
    public ScimDirectoriesClient $scimDirectories;

    /**
     * @var SetupUrlsClient $setupUrls
     */
    public SetupUrlsClient $setupUrls;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     */
    public function __construct(
        RawClient $client,
    ) {
        $this->client = $client;
        $this->organizations = new OrganizationsClient($this->client);
        $this->samlConnections = new SamlConnectionsClient($this->client);
        $this->scimDirectories = new ScimDirectoriesClient($this->client);
        $this->setupUrls = new SetupUrlsClient($this->client);
    }
}
