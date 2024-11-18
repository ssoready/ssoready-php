<?php

namespace SSOReady\Scim;

use SSOReady\Core\Client\RawClient;
use SSOReady\Scim\Requests\ScimListScimGroupsRequest;
use SSOReady\Types\ListScimGroupsResponse;
use SSOReady\Exceptions\SsoreadyException;
use SSOReady\Exceptions\SsoreadyApiException;
use SSOReady\Core\Json\JsonApiRequest;
use SSOReady\Environments;
use SSOReady\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use SSOReady\Types\GetScimGroupResponse;
use SSOReady\Scim\Requests\ScimListScimUsersRequest;
use SSOReady\Types\ListScimUsersResponse;
use SSOReady\Types\GetScimUserResponse;

class ScimClient
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
     * Gets a list of SCIM groups in a SCIM directory.
     *
     * @param ScimListScimGroupsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return ListScimGroupsResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function listScimGroups(ScimListScimGroupsRequest $request, ?array $options = null): ListScimGroupsResponse
    {
        $query = [];
        if ($request->scimDirectoryId != null) {
            $query['scimDirectoryId'] = $request->scimDirectoryId;
        }
        if ($request->organizationId != null) {
            $query['organizationId'] = $request->organizationId;
        }
        if ($request->organizationExternalId != null) {
            $query['organizationExternalId'] = $request->organizationExternalId;
        }
        if ($request->pageToken != null) {
            $query['pageToken'] = $request->pageToken;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/scim/groups",
                    method: HttpMethod::GET,
                    query: $query,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListScimGroupsResponse::fromJson($json);
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
     * Gets a SCIM group in a SCIM directory.
     *
     * @param string $id ID of the SCIM group to get.
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return GetScimGroupResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function getScimGroup(string $id, ?array $options = null): GetScimGroupResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/scim/groups/$id",
                    method: HttpMethod::GET,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetScimGroupResponse::fromJson($json);
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
     * Gets a list of SCIM users in a SCIM directory.
     *
     * @param ScimListScimUsersRequest $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return ListScimUsersResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function listScimUsers(ScimListScimUsersRequest $request, ?array $options = null): ListScimUsersResponse
    {
        $query = [];
        if ($request->scimDirectoryId != null) {
            $query['scimDirectoryId'] = $request->scimDirectoryId;
        }
        if ($request->organizationId != null) {
            $query['organizationId'] = $request->organizationId;
        }
        if ($request->organizationExternalId != null) {
            $query['organizationExternalId'] = $request->organizationExternalId;
        }
        if ($request->scimGroupId != null) {
            $query['scimGroupId'] = $request->scimGroupId;
        }
        if ($request->pageToken != null) {
            $query['pageToken'] = $request->pageToken;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/scim/users",
                    method: HttpMethod::GET,
                    query: $query,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListScimUsersResponse::fromJson($json);
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
     * Gets a SCIM user.
     *
     * @param string $id ID of the SCIM user to get.
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return GetScimUserResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function getScimUser(string $id, ?array $options = null): GetScimUserResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/scim/users/$id",
                    method: HttpMethod::GET,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetScimUserResponse::fromJson($json);
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
