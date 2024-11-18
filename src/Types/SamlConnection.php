<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;

class SamlConnection extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier for this SAML connection.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $organizationId The organization this SAML connection belongs to.
     */
    #[JsonProperty('organizationId')]
    public ?string $organizationId;

    /**
     * @var ?bool $primary Whether this is the primary SAML connection for the organization.
     */
    #[JsonProperty('primary')]
    public ?bool $primary;

    /**
     * @var ?string $idpRedirectUrl URL to redirect to when initiating SAML flows.

    IDP redirect URLs are assigned by an Identity Provider, and need to be inputted into SSOReady.
     */
    #[JsonProperty('idpRedirectUrl')]
    public ?string $idpRedirectUrl;

    /**
     * @var ?string $idpCertificate Certificate to authenticate SAML assertions. This is a PEM-encoded X.509 certificate.

    IDP certificates are assigned by an Identity Provider, and need to be inputted into SSOReady.
     */
    #[JsonProperty('idpCertificate')]
    public ?string $idpCertificate;

    /**
     * @var ?string $idpEntityId Identifier for the identity provider when handling SAML operations.

    IDP entity IDs are assigned by an Identity Provider, and need to be inputted into SSOReady.
     */
    #[JsonProperty('idpEntityId')]
    public ?string $idpEntityId;

    /**
     * @var ?string $spEntityId Identifier for the SAML connection when handling SAML operations.

    SP entity IDs are assigned by SSOReady, and need to be inputted into your customer's Identity Provider.
     */
    #[JsonProperty('spEntityId')]
    public ?string $spEntityId;

    /**
     * @var ?string $spAcsUrl URL the Identity Provider redirects to when transmitting SAML assertions. Stands for "Service Provider Assertion
    Consumer Service" URL.

    SP ACS URLs are assigned by SSOReady, and need to be inputted into your customer's Identity Provider.
     */
    #[JsonProperty('spAcsUrl')]
    public ?string $spAcsUrl;

    /**
     * @param array{
     *   id?: ?string,
     *   organizationId?: ?string,
     *   primary?: ?bool,
     *   idpRedirectUrl?: ?string,
     *   idpCertificate?: ?string,
     *   idpEntityId?: ?string,
     *   spEntityId?: ?string,
     *   spAcsUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->organizationId = $values['organizationId'] ?? null;
        $this->primary = $values['primary'] ?? null;
        $this->idpRedirectUrl = $values['idpRedirectUrl'] ?? null;
        $this->idpCertificate = $values['idpCertificate'] ?? null;
        $this->idpEntityId = $values['idpEntityId'] ?? null;
        $this->spEntityId = $values['spEntityId'] ?? null;
        $this->spAcsUrl = $values['spAcsUrl'] ?? null;
    }
}
