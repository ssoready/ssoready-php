<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;

class CreateSetupUrlResponse extends JsonSerializableType
{
    /**
     * @var ?string $url The one-time, short-lived self-serve setup URL.

    Do not log or store this URL. Because this URL is one-time, loading it yourself means your customer will not be
    able to load it after you.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @param array{
     *   url?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->url = $values['url'] ?? null;
    }
}
