<?php

namespace SSOReady\Management\Organizations\Requests;

use SSOReady\Core\Json\JsonSerializableType;

class OrganizationsListOrganizationsRequest extends JsonSerializableType
{
    /**
     * @var ?string $pageToken Pagination token. Leave empty to get the first page of results.
     */
    public ?string $pageToken;

    /**
     * @param array{
     *   pageToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->pageToken = $values['pageToken'] ?? null;
    }
}
