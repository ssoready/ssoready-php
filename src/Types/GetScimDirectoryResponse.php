<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;

class GetScimDirectoryResponse extends JsonSerializableType
{
    /**
     * @var ?ScimDirectory $scimDirectory The requested SCIM directory.
     */
    #[JsonProperty('scimDirectory')]
    public ?ScimDirectory $scimDirectory;

    /**
     * @param array{
     *   scimDirectory?: ?ScimDirectory,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scimDirectory = $values['scimDirectory'] ?? null;
    }
}
