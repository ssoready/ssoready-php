<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;
use SSOReady\Core\Types\ArrayType;

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
