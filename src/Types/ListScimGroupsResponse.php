<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;
use SSOReady\Core\Types\ArrayType;

class ListScimGroupsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ScimGroup> $scimGroups List of SCIM groups.
     */
    #[JsonProperty('scimGroups'), ArrayType([ScimGroup::class])]
    public ?array $scimGroups;

    /**
     * @var ?string $nextPageToken Value to use as `pageToken` for the next page of data. Empty if there is no more data.
     */
    #[JsonProperty('nextPageToken')]
    public ?string $nextPageToken;

    /**
     * @param array{
     *   scimGroups?: ?array<ScimGroup>,
     *   nextPageToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scimGroups = $values['scimGroups'] ?? null;
        $this->nextPageToken = $values['nextPageToken'] ?? null;
    }
}
