<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;
use SSOReady\Core\Types\ArrayType;

class ListSamlConnectionsResponse extends JsonSerializableType
{
    /**
     * @var ?array<SamlConnection> $samlConnections The list of SAML connections.
     */
    #[JsonProperty('samlConnections'), ArrayType([SamlConnection::class])]
    public ?array $samlConnections;

    /**
     * @var ?string $nextPageToken Value to use as `pageToken` for the next page of data. Empty if there is no more data.
     */
    #[JsonProperty('nextPageToken')]
    public ?string $nextPageToken;

    /**
     * @param array{
     *   samlConnections?: ?array<SamlConnection>,
     *   nextPageToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->samlConnections = $values['samlConnections'] ?? null;
        $this->nextPageToken = $values['nextPageToken'] ?? null;
    }
}
