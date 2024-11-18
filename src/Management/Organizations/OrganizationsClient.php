<?php

namespace SSOReady\Management\Organizations;

use SSOReady\Core\Client\RawClient;
use SSOReady\Management\Organizations\Requests\OrganizationsListOrganizationsRequest;
use SSOReady\Types\ListOrganizationsResponse;
use SSOReady\Exceptions\SsoreadyException;
use SSOReady\Exceptions\SsoreadyApiException;
use SSOReady\Core\Json\JsonApiRequest;
use SSOReady\Environments;
use SSOReady\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use SSOReady\Types\Organization;
use SSOReady\Types\CreateOrganizationResponse;
use SSOReady\Types\GetOrganizationResponse;
use SSOReady\Types\UpdateOrganizationResponse;

class OrganizationsClient
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
     * Gets a list of organizations.
     *
     * @param OrganizationsListOrganizationsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return ListOrganizationsResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function listOrganizations(OrganizationsListOrganizationsRequest $request, ?array $options = null): ListOrganizationsResponse
    {
        $query = [];
        if ($request->pageToken != null) {
            $query['pageToken'] = $request->pageToken;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/organizations",
                    method: HttpMethod::GET,
                    query: $query,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListOrganizationsResponse::fromJson($json);
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
     * Creates an organization.
     *
     * @param Organization $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return CreateOrganizationResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function createOrganization(Organization $request, ?array $options = null): CreateOrganizationResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/organizations",
                    method: HttpMethod::POST,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateOrganizationResponse::fromJson($json);
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
     * Gets an organization.
     *
     * @param string $id ID of the organization to get.
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return GetOrganizationResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function getOrganization(string $id, ?array $options = null): GetOrganizationResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/organizations/$id",
                    method: HttpMethod::GET,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetOrganizationResponse::fromJson($json);
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
     * Updates an organization.
     *
     * @param string $id ID of the organization to update.
     * @param Organization $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return UpdateOrganizationResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function updateOrganization(string $id, Organization $request, ?array $options = null): UpdateOrganizationResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/organizations/$id",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UpdateOrganizationResponse::fromJson($json);
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
