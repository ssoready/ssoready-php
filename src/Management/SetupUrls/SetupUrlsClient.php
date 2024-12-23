<?php

namespace SSOReady\Management\SetupUrls;

use SSOReady\Core\Client\RawClient;
use SSOReady\Management\SetupUrls\Requests\CreateSetupUrlRequest;
use SSOReady\Types\CreateSetupUrlResponse;
use SSOReady\Exceptions\SsoreadyException;
use SSOReady\Exceptions\SsoreadyApiException;
use SSOReady\Core\Json\JsonApiRequest;
use SSOReady\Environments;
use SSOReady\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class SetupUrlsClient
{
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
    }

    /**
     * Creates a short-lived self-serve setup URL that you can send to your customer.
     *
     * Setup URLs let your customer configure their SAML settings, SCIM settings, or both.
     *
     * @param CreateSetupUrlRequest $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return CreateSetupUrlResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function createSetupUrl(CreateSetupUrlRequest $request, ?array $options = null): CreateSetupUrlResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/setup-urls",
                    method: HttpMethod::POST,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateSetupUrlResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new SsoreadyException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (ClientExceptionInterface $e) {
            throw new SsoreadyException(message: $e->getMessage(), previous: $e);
        }
        throw new SsoreadyApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
