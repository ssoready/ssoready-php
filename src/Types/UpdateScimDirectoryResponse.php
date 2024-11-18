<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;

class UpdateScimDirectoryResponse extends JsonSerializableType
{
    /**
     * @var ?ScimDirectory $scimDirectory The updated SCIM directory.
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
