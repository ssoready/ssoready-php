<?php

namespace Ssoready\Management\SamlConnections\Requests;

use Ssoready\Core\Json\JsonSerializableType;

class SamlConnectionsListSamlConnectionsRequest extends JsonSerializableType
{
    /**
     * @var ?string $organizationId The organization the SAML connections belong to.
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
