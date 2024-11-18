<?php

namespace Ssoready\Management\ScimDirectories\Requests;

use Ssoready\Core\Json\JsonSerializableType;

class ScimDirectoriesListScimDirectoriesRequest extends JsonSerializableType
{
    /**
     * @var ?string $organizationId The organization the SCIM directories belong to.
     */
    public ?string $organizationId;

    /**
     * @var ?string $pageToken Pagination token. Leave empty to get the first page of results.
     */
    public ?string $pageToken;

    /**
     * @param array{
     *   organizationId?: ?string,
     *   pageToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->organizationId = $values['organizationId'] ?? null;
        $this->pageToken = $values['pageToken'] ?? null;
    }
}
