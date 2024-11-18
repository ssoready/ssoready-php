<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;

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
