<?php

namespace SSOReady\Saml\Requests;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;

class GetSamlRedirectUrlRequest extends JsonSerializableType
{
    /**
     * @var ?string $samlConnectionId The SAML connection to start a SAML login for.

     One of `samlConnectionId`, `organizationId`, or `organizationExternalId` must be specified.
     */
    #[JsonProperty('samlConnectionId')]
    public ?string $samlConnectionId;

    /**
     * @var ?string $organizationId The ID of the organization to start a SAML login for.

     The primary SAML connection in this organization will be used for logins.

     One of `samlConnectionId`, `organizationId`, or `organizationExternalId` must be specified.
     */
    #[JsonProperty('organizationId')]
    public ?string $organizationId;

    /**
     * @var ?string $organizationExternalId The `externalId` of the organization to start a SAML login for.

     The primary SAML connection in this organization will be used for logins.

     One of `samlConnectionId`, `organizationId`, or `organizationExternalId` must be specified.
     */
    #[JsonProperty('organizationExternalId')]
    public ?string $organizationExternalId;

    /**
     * @var ?string $state This string will be returned back to you when you redeem this login's SAML access code.

     You can do anything you like with this `state`, but the most common use-case is to keep track of where to redirect
     your user back to after logging in with SAML.
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @param array{
     *   samlConnectionId?: ?string,
     *   organizationId?: ?string,
     *   organizationExternalId?: ?string,
     *   state?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->samlConnectionId = $values['samlConnectionId'] ?? null;
        $this->organizationId = $values['organizationId'] ?? null;
        $this->organizationExternalId = $values['organizationExternalId'] ?? null;
        $this->state = $values['state'] ?? null;
    }
}
