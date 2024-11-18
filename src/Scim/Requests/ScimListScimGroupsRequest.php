<?php

namespace SSOReady\Scim\Requests;

use SSOReady\Core\Json\JsonSerializableType;

class ScimListScimGroupsRequest extends JsonSerializableType
{
    /**
     * @var ?string $scimDirectoryId The SCIM directory to list from.

    One of `scimDirectoryId`, `organizationId`, or `organizationExternalId` must be specified.
     */
    public ?string $scimDirectoryId;

    /**
     * @var ?string $organizationId The ID of the organization to list from. The primary SCIM directory of this organization is used.

    One of `scimDirectoryId`, `organizationId`, or `organizationExternalId` must be specified.
     */
    public ?string $organizationId;

    /**
     * @var ?string $organizationExternalId The `externalId` of the organization to list from. The primary SCIM directory of this organization is used.

    One of `scimDirectoryId`, `organizationId`, or `organizationExternalId` must be specified.
     */
    public ?string $organizationExternalId;

    /**
     * @var ?string $pageToken Pagination token. Leave empty to get the first page of results.
     */
    public ?string $pageToken;

    /**
     * @param array{
     *   scimDirectoryId?: ?string,
     *   organizationId?: ?string,
     *   organizationExternalId?: ?string,
     *   pageToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scimDirectoryId = $values['scimDirectoryId'] ?? null;
        $this->organizationId = $values['organizationId'] ?? null;
        $this->organizationExternalId = $values['organizationExternalId'] ?? null;
        $this->pageToken = $values['pageToken'] ?? null;
    }
}
