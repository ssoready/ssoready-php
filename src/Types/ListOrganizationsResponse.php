<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;
use SSOReady\Core\Types\ArrayType;

class ListOrganizationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Organization> $organizations List of organizations.
     */
    #[JsonProperty('organizations'), ArrayType([Organization::class])]
    public ?array $organizations;

    /**
     * @var ?string $nextPageToken Value to use as `pageToken` for the next page of data. Empty if there is no more data.
     */
    #[JsonProperty('nextPageToken')]
    public ?string $nextPageToken;

    /**
     * @param array{
     *   organizations?: ?array<Organization>,
     *   nextPageToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->organizations = $values['organizations'] ?? null;
        $this->nextPageToken = $values['nextPageToken'] ?? null;
    }
}
