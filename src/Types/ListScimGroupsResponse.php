<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;
use Ssoready\Core\Types\ArrayType;

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
