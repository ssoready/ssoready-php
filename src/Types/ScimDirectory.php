<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;

class ScimDirectory extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier for this SCIM directory.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $organizationId The organization this SCIM directory belongs to.
     */
    #[JsonProperty('organizationId')]
    public ?string $organizationId;

    /**
     * @var ?bool $primary Whether this is the primary SCIM directory for the organization.
     */
    #[JsonProperty('primary')]
    public ?bool $primary;

    /**
     * @var ?string $scimBaseUrl Base URL the Identity Provider uses to perform SCIM HTTP requests.

    SCIM base URLs are assigned by SSOReady, and need to be inputted into your customer's Identity Provider.
     */
    #[JsonProperty('scimBaseUrl')]
    public ?string $scimBaseUrl;

    /**
     * @var ?bool $hasClientBearerToken Whether this SCIM directory has a bearer token assigned.

    SSOReady only stores a hash of the bearer token. To get a bearer token value, you must rotate this SCIM directory's
    bearer token.
     */
    #[JsonProperty('hasClientBearerToken')]
    public ?bool $hasClientBearerToken;

    /**
     * @param array{
     *   id?: ?string,
     *   organizationId?: ?string,
     *   primary?: ?bool,
     *   scimBaseUrl?: ?string,
     *   hasClientBearerToken?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->organizationId = $values['organizationId'] ?? null;
        $this->primary = $values['primary'] ?? null;
        $this->scimBaseUrl = $values['scimBaseUrl'] ?? null;
        $this->hasClientBearerToken = $values['hasClientBearerToken'] ?? null;
    }
}
