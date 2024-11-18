<?php

namespace SSOReady\Saml;

use SSOReady\Core\Client\RawClient;
use SSOReady\Saml\Requests\RedeemSamlAccessCodeRequest;
use SSOReady\Types\RedeemSamlAccessCodeResponse;
use SSOReady\Exceptions\SsoreadyException;
use SSOReady\Exceptions\SsoreadyApiException;
use SSOReady\Core\Json\JsonApiRequest;
use SSOReady\Environments;
use SSOReady\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use SSOReady\Saml\Requests\GetSamlRedirectUrlRequest;
use SSOReady\Types\GetSamlRedirectUrlResponse;

class SamlClient
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
     * Exchanges a SAML access code for details about your user's SAML login details.
     *
     * @param RedeemSamlAccessCodeRequest $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return RedeemSamlAccessCodeResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function redeemSamlAccessCode(RedeemSamlAccessCodeRequest $request, ?array $options = null): RedeemSamlAccessCodeResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/saml/redeem",
                    method: HttpMethod::POST,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return RedeemSamlAccessCodeResponse::fromJson($json);
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
     * Gets a SAML initiation URL to redirect your users to.
     *
     * @param GetSamlRedirectUrlRequest $request
     * @param ?array{
     *   baseUrl?: string,
     * } $options
     * @return GetSamlRedirectUrlResponse
     * @throws SsoreadyException
     * @throws SsoreadyApiException
     */
    public function getSamlRedirectUrl(GetSamlRedirectUrlRequest $request, ?array $options = null): GetSamlRedirectUrlResponse
    {
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "v1/saml/redirect",
                    method: HttpMethod::POST,
                    body: $request,
                ),
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return GetSamlRedirectUrlResponse::fromJson($json);
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
