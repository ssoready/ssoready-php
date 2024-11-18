<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;

class GetScimGroupResponse extends JsonSerializableType
{
    /**
     * @var ?ScimGroup $scimGroup The requested SCIM group.
     */
    #[JsonProperty('scimGroup')]
    public ?ScimGroup $scimGroup;

    /**
     * @param array{
     *   scimGroup?: ?ScimGroup,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scimGroup = $values['scimGroup'] ?? null;
    }
}
