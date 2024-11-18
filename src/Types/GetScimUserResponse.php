<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;

class GetScimUserResponse extends JsonSerializableType
{
    /**
     * @var ?ScimUser $scimUser The requested SCIM user.
     */
    #[JsonProperty('scimUser')]
    public ?ScimUser $scimUser;

    /**
     * @param array{
     *   scimUser?: ?ScimUser,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scimUser = $values['scimUser'] ?? null;
    }
}
