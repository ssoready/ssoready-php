<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;
use Ssoready\Core\Types\ArrayType;

class Organization extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier for this organization.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $environmentId The environment this organization belongs to.
     */
    #[JsonProperty('environmentId')]
    public ?string $environmentId;

    /**
     * @var ?string $displayName An optional human-friendly name for this organization.
     */
    #[JsonProperty('displayName')]
    public ?string $displayName;

    /**
     * @var ?string $externalId An identifier you can attach to an organization. Meant to be used to correlate an SSOReady organization to your
    internal equivalent concept.

    External IDs are unique within an environment. No two organizations in the same environment can have
    the same external ID.
     */
    #[JsonProperty('externalId')]
    public ?string $externalId;

    /**
     * @var ?array<string> $domains A list of domains that users from this organization use.

    SAML connections and SCIM directories within this organization will only produce users whose email are included in
    `domains`. SSOReady will reject SAML and SCIM users that do not fall within `domains`.
     */
    #[JsonProperty('domains'), ArrayType(['string'])]
    public ?array $domains;

    /**
     * @param array{
     *   id?: ?string,
     *   environmentId?: ?string,
     *   displayName?: ?string,
     *   externalId?: ?string,
     *   domains?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->environmentId = $values['environmentId'] ?? null;
        $this->displayName = $values['displayName'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->domains = $values['domains'] ?? null;
    }
}
