<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;

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
