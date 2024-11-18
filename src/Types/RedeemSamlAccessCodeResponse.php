<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;
use Ssoready\Core\Types\ArrayType;

class RedeemSamlAccessCodeResponse extends JsonSerializableType
{
    /**
     * @var ?string $email The user's email address.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $state The `state` you provided when getting a SAML initiation URL, if any.

    If your user logged in to your product using Identity Provider-initiated SAML (e.g. they clicked on your app inside
    their corporate Okta dashboard), then `state` will be empty.

    SSOReady validates the authenticity of non-empty `state` values. You do not need to implement your own CSRF on top
    of it, but doing so anyway will have no bad consequences.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?array<string, string> $attributes Arbitrary key-value pairs the Identity Provider included about the user.

    Typically, these `attributes` are used to pass along the user's first/last name, or whether they should be
    considered an admin within their company.
     */
    #[JsonProperty('attributes'), ArrayType(['string' => 'string'])]
    public ?array $attributes;

    /**
     * @var ?string $organizationId The ID of the organization this user belongs to.
     */
    #[JsonProperty('organizationId')]
    public ?string $organizationId;

    /**
     * @var ?string $organizationExternalId The `externalId`, if any, of the organization this user belongs to.
     */
    #[JsonProperty('organizationExternalId')]
    public ?string $organizationExternalId;

    /**
     * @var ?string $samlFlowId A unique identifier of this particular SAML login. It is not a secret. You can safely log it.

    SSOReady maintains an audit log of every SAML login. Use this SAML flow ID to find this login in the audit logs.
     */
    #[JsonProperty('samlFlowId')]
    public ?string $samlFlowId;

    /**
     * @param array{
     *   email?: ?string,
     *   state?: ?string,
     *   attributes?: ?array<string, string>,
     *   organizationId?: ?string,
     *   organizationExternalId?: ?string,
     *   samlFlowId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->email = $values['email'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->attributes = $values['attributes'] ?? null;
        $this->organizationId = $values['organizationId'] ?? null;
        $this->organizationExternalId = $values['organizationExternalId'] ?? null;
        $this->samlFlowId = $values['samlFlowId'] ?? null;
    }
}
