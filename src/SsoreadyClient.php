<?php

namespace Ssoready;

use Ssoready\Saml\SamlClient;
use Ssoready\Scim\ScimClient;
use Ssoready\Management\ManagementClient;
use GuzzleHttp\ClientInterface;
use Ssoready\Core\Client\RawClient;
use Exception;

class SsoreadyClient
{
    /**
     * @var SamlClient $saml
     */
    public SamlClient $saml;

    /**
     * @var ScimClient $scim
     */
    public ScimClient $scim;

    /**
     * @var ManagementClient $management
     */
    public ManagementClient $management;

    /**
     * @var ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   headers?: array<string, string>,
     * } $options
     */
    private ?array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param ?string $apiKey The apiKey to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        ?string $apiKey = null,
        ?array $options = null,
    ) {
        $apiKey ??= $this->getFromEnvOrThrow('SSOREADY_API_KEY', 'Please pass in apiKey or set the environment variable SSOREADY_API_KEY.');
        $defaultHeaders = [
            'Authorization' => "Bearer $apiKey",
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Ssoready',
            'X-Fern-SDK-Version' => '0.1.0',
        ];

        $this->options = $options ?? [];
        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->saml = new SamlClient($this->client);
        $this->scim = new ScimClient($this->client);
        $this->management = new ManagementClient($this->client);
    }

    /**
     * @param string $env
     * @param string $message
     * @return string
     */
    private function getFromEnvOrThrow(string $env, string $message): string
    {
        $value = getenv($env);
        return $value ? (string) $value : throw new Exception($message);
    }
}
