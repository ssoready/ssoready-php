<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;
use Ssoready\Core\Types\ArrayType;

class ListScimDirectoriesResponse extends JsonSerializableType
{
    /**
     * @var ?array<ScimDirectory> $scimDirectories The list of SCIM directories.
     */
    #[JsonProperty('scimDirectories'), ArrayType([ScimDirectory::class])]
    public ?array $scimDirectories;

    /**
     * @var ?string $nextPageToken Value to use as `pageToken` for the next page of data. Empty if there is no more data.
     */
    #[JsonProperty('nextPageToken')]
    public ?string $nextPageToken;

    /**
     * @param array{
     *   scimDirectories?: ?array<ScimDirectory>,
     *   nextPageToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scimDirectories = $values['scimDirectories'] ?? null;
        $this->nextPageToken = $values['nextPageToken'] ?? null;
    }
}
