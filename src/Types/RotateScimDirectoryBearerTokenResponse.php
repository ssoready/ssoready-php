<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;

class RotateScimDirectoryBearerTokenResponse extends JsonSerializableType
{
    /**
     * @var ?string $bearerToken The new, updated bearer token.

    Do not log or store this bearer token. It is an authentication token that your customer should securely input into
    their Identity Provider.
     */
    #[JsonProperty('bearerToken')]
    public ?string $bearerToken;

    /**
     * @param array{
     *   bearerToken?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->bearerToken = $values['bearerToken'] ?? null;
    }
}
