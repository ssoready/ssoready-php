<?php

namespace Ssoready\Saml;

use Ssoready\Core\Client\RawClient;
use Ssoready\Saml\Requests\RedeemSamlAccessCodeRequest;
use Ssoready\Types\RedeemSamlAccessCodeResponse;
use Ssoready\Exceptions\SsoreadyException;
use Ssoready\Exceptions\SsoreadyApiException;
use Ssoready\Core\Json\JsonApiRequest;
use Ssoready\Environments;
use Ssoready\Core\Client\HttpMethod;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Ssoready\Saml\Requests\GetSamlRedirectUrlRequest;
use Ssoready\Types\GetSamlRedirectUrlResponse;

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
