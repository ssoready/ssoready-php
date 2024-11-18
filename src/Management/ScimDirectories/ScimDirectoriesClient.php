<?php

namespace SSOReady\Management\ScimDirectories;

use SSOReady\Core\Client\RawClient;
use SSOReady\Management\ScimDirectories\Requests\ScimDirectoriesListScimDirectoriesRequest;
use SSOReady\Types\ListScimDirectoriesResponse;
use SSOReady\Exceptions\SsoreadyException;
use SSOReady\Exceptions\SsoreadyApiException;
use SSOReady\Core\Json\JsonApiRequest;
use SSOReady\Environments;
use SSOReady\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use SSOReady\Types\ScimDirectory;
use SSOReady\Types\CreateScimDirectoryResponse;
use SSOReady\Types\GetScimDirectoryResponse;
use SSOReady\Types\UpdateScimDirectoryResponse;
use SSOReady\Types\RotateScimDirectoryBearerTokenResponse;

class ScimDirectoriesClient
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
     * Gets a list of SCIM directories in an organization.
     *
     * @param ScimDirectoriesListScimDirectoriesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return ListScimDirectoriesResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function listScimDirectories(ScimDirectoriesListScimDirectoriesRequest $request, ?array $options = null): ListScimDirectoriesResponse
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
                    path: "v1/scim-directories",
                    method: HttpMethod::GET,
                    query: $query,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return ListScimDirectoriesResponse::fromJson($json);
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
     * Creates a SCIM directory.
     *
     * @param ScimDirectory $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return CreateScimDirectoryResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function createScimDirectory(ScimDirectory $request, ?array $options = null): CreateScimDirectoryResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/scim-directories",
                    method: HttpMethod::POST,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CreateScimDirectoryResponse::fromJson($json);
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
     * Gets a SCIM directory.
     *
     * @param string $id The ID of the SCIM directory.
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return GetScimDirectoryResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function getScimDirectory(string $id, ?array $options = null): GetScimDirectoryResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/scim-directories/$id",
                    method: HttpMethod::GET,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetScimDirectoryResponse::fromJson($json);
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
     * Updates a SCIM directory.
     *
     * @param string $id The ID of the SCIM directory to update.
     * @param ScimDirectory $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return UpdateScimDirectoryResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function updateScimDirectory(string $id, ScimDirectory $request, ?array $options = null): UpdateScimDirectoryResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/scim-directories/$id",
                    method: HttpMethod::PATCH,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UpdateScimDirectoryResponse::fromJson($json);
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
     * Rotates a SCIM directory's bearer token.
     *
     * Every SCIM directory has a bearer token that SSOReady uses to authenticate requests sent from your customer's
     * Identity Provider. These bearer tokens are assigned by SSOReady, and are secret. Newly-created SCIM directories do
     * not have any bearer token at all; you must use this endpoint to get an initial value.
     *
     * Rotating a SCIM directory bearer token immediately invalidates the previous bearer token, if any. Your customer
     * will need to update their SCIM configuration with the new value to make SCIM syncing work again.
     *
     * SSOReady only stores the hash of these bearer tokens. If your customer has lost their copy, you must use this
     * endpoint to generate a new one.
     *
     * @param string $id The ID of the SCIM directory whose bearer token to rotate.
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return RotateScimDirectoryBearerTokenResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function rotateScimDirectoryBearerToken(string $id, ?array $options = null): RotateScimDirectoryBearerTokenResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/scim-directories/$id/rotate-bearer-token",
                    method: HttpMethod::POST,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return RotateScimDirectoryBearerTokenResponse::fromJson($json);
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
