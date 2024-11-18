<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;
use Ssoready\Core\Types\ArrayType;

class ListScimUsersResponse extends JsonSerializableType
{
    /**
     * @var ?array<ScimUser> $scimUsers List of SCIM users.
     */
    #[JsonProperty('scimUsers'), ArrayType([ScimUser::class])]
    public ?array $scimUsers;

    /**
     * @var ?string $nextPageToken Value to use as `pageToken` for the next page of data. Empty if there is no more data.
     */
    #[JsonProperty('nextPageToken')]
    public ?string $nextPageToken;

    /**
     * @param array{
     *   scimUsers?: ?array<ScimUser>,
     *   nextPageToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scimUsers = $values['scimUsers'] ?? null;
        $this->nextPageToken = $values['nextPageToken'] ?? null;
    }
}
