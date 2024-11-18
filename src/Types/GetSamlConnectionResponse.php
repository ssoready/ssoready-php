<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;

class GetSamlConnectionResponse extends JsonSerializableType
{
    /**
     * @var ?SamlConnection $samlConnection The requested SAML connection.
     */
    #[JsonProperty('samlConnection')]
    public ?SamlConnection $samlConnection;

    /**
     * @param array{
     *   samlConnection?: ?SamlConnection,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->samlConnection = $values['samlConnection'] ?? null;
    }
}
