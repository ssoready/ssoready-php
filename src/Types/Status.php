<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;
use SSOReady\Core\Types\ArrayType;

/**
 * The `Status` type defines a logical error model that is suitable for different programming environments, including REST APIs and RPC APIs. It is used by [gRPC](https://github.com/grpc). Each `Status` message contains three pieces of data: error code, error message, and error details. You can find out more about this error model and how to work with it in the [API Design Guide](https://cloud.google.com/apis/design/errors).
 */
class Status extends JsonSerializableType
{
    /**
     * @var ?int $code The status code, which should be an enum value of [google.rpc.Code][google.rpc.code].
     */
    #[JsonProperty('code')]
    public ?int $code;

    /**
     * @var ?string $message A developer-facing error message, which should be in English. Any user-facing error message should be localized and sent in the [google.rpc.Status.details][google.rpc.status.details] field, or localized by the client.
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?array<GoogleProtobufAny> $details A list of messages that carry the error details. There is a common set of message types for APIs to use.
     */
    #[JsonProperty('details'), ArrayType([GoogleProtobufAny::class])]
    public ?array $details;

    /**
     * @param array{
     *   code?: ?int,
     *   message?: ?string,
     *   details?: ?array<GoogleProtobufAny>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->code = $values['code'] ?? null;
        $this->message = $values['message'] ?? null;
        $this->details = $values['details'] ?? null;
    }
}
