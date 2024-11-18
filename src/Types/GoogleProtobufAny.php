<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;

/**
 * Contains an arbitrary serialized message along with a @type that describes the type of the serialized message.
 */
class GoogleProtobufAny extends JsonSerializableType
{
    /**
     * @var ?string $type The type of the serialized message.
     */
    #[JsonProperty('@type')]
    public ?string $type;

    /**
     * @param array{
     *   type?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
    }
}
