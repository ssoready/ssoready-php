<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;

class CreateSamlConnectionResponse extends JsonSerializableType
{
    /**
     * @var ?SamlConnection $samlConnection The created SAML connection.
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
