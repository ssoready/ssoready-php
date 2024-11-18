<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;

class GetSamlRedirectUrlResponse extends JsonSerializableType
{
    /**
     * @var ?string $redirectUrl Redirect your user to this URL to start a SAML login.
     */
    #[JsonProperty('redirectUrl')]
    public ?string $redirectUrl;

    /**
     * @param array{
     *   redirectUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->redirectUrl = $values['redirectUrl'] ?? null;
    }
}
