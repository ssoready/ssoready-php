<?php

namespace Ssoready\Management\SamlConnections;

use Ssoready\Core\Client\RawClient;
use Ssoready\Management\SamlConnections\Requests\SamlConnectionsListSamlConnectionsRequest;
use Ssoready\Types\ListSamlConnectionsResponse;
use Ssoready\Exceptions\SsoreadyException;
use Ssoready\Exceptions\SsoreadyApiException;
use Ssoready\Core\Json\JsonApiRequest;
use Ssoready\Environments;
use Ssoready\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Ssoready\Types\SamlConnection;
use Ssoready\Types\CreateSamlConnectionResponse;
use Ssoready\Types\GetSamlConnectionResponse;
use Ssoready\Types\UpdateSamlConnectionResponse;

class SamlConnectionsClient
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
     * Lists SAML connections in an organization.
     *
     * @param SamlConnectionsListSamlConnectionsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return ListSamlConnectionsResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function listSamlConnections(SamlConnectionsListSamlConnectionsRequest $request, ?array $options = null): ListSamlConnectionsResponse
    {
        $query = [];
        if ($request->organizationId != null) {
            $query['organizationId'] = $request->organizationId;
        }
        if ($request->pageToken != null) {
            $query['pageToken'] = $request->pageToken;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/saml-connections",
                    method: HttpMethod::GET,
                    query: $query,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListSamlConnectionsResponse::fromJson($json);
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

    /**
     * Creates a SAML connection.
     *
     * @param SamlConnection $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return CreateSamlConnectionResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function createSamlConnection(SamlConnection $request, ?array $options = null): CreateSamlConnectionResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/saml-connections",
                    method: HttpMethod::POST,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateSamlConnectionResponse::fromJson($json);
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

    /**
     * Gets a SAML connection.
     *
     * @param string $id ID of the SAML connection to get.
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return GetSamlConnectionResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function getSamlConnection(string $id, ?array $options = null): GetSamlConnectionResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/saml-connections/$id",
                    method: HttpMethod::GET,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetSamlConnectionResponse::fromJson($json);
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

    /**
     * Updates a SAML connection.
     *
     * @param string $id The ID of the SAML connection to update.
     * @param SamlConnection $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return UpdateSamlConnectionResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function updateSamlConnection(string $id, SamlConnection $request, ?array $options = null): UpdateSamlConnectionResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/saml-connections/$id",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UpdateSamlConnectionResponse::fromJson($json);
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
