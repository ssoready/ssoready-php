<?php

namespace Ssoready\Saml\Requests;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;

class RedeemSamlAccessCodeRequest extends JsonSerializableType
{
    /**
     * @var ?string $samlAccessCode The SAML access code to redeem.
     */
    #[JsonProperty('samlAccessCode')]
    public ?string $samlAccessCode;

    /**
     * @param array{
     *   samlAccessCode?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->samlAccessCode = $values['samlAccessCode'] ?? null;
    }
}
