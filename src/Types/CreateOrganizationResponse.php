<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;

class CreateOrganizationResponse extends JsonSerializableType
{
    /**
     * @var ?Organization $organization The created organization.
     */
    #[JsonProperty('organization')]
    public ?Organization $organization;

    /**
     * @param array{
     *   organization?: ?Organization,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->organization = $values['organization'] ?? null;
    }
}
