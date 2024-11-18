<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;

class GetOrganizationResponse extends JsonSerializableType
{
    /**
     * @var ?Organization $organization The requested organization.
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
