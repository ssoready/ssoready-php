<?php

namespace Ssoready\Management\SetupUrls\Requests;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;

class CreateSetupUrlRequest extends JsonSerializableType
{
    /**
     * @var ?string $organizationId The organization that the setup URL is for.
     */
    #[JsonProperty('organizationId')]
    public ?string $organizationId;

    /**
     * @var ?bool $canManageSaml Whether the setup URL lets the user manage SAML connections.
     */
    #[JsonProperty('canManageSaml')]
    public ?bool $canManageSaml;

    /**
     * @var ?bool $canManageScim Whether the setup URL lets the user manage SCIM directories.
     */
    #[JsonProperty('canManageScim')]
    public ?bool $canManageScim;

    /**
     * @param array{
     *   organizationId?: ?string,
     *   canManageSaml?: ?bool,
     *   canManageScim?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->organizationId = $values['organizationId'] ?? null;
        $this->canManageSaml = $values['canManageSaml'] ?? null;
        $this->canManageScim = $values['canManageScim'] ?? null;
    }
}
