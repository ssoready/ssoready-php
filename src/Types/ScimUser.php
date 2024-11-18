<?php

namespace Ssoready\Types;

use Ssoready\Core\Json\JsonSerializableType;
use Ssoready\Core\Json\JsonProperty;
use Ssoready\Core\Types\ArrayType;

class ScimUser extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier for this SCIM user.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $scimDirectoryId SCIM directory this SCIM user belongs to.
     */
    #[JsonProperty('scimDirectoryId')]
    public ?string $scimDirectoryId;

    /**
     * @var ?string $email The SCIM user's email address.
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?bool $deleted Whether the SCIM user has been deleted or deprovisioned from its SCIM directory.
     */
    #[JsonProperty('deleted')]
    public ?bool $deleted;

    /**
     * @var ?array<string, mixed> $attributes Arbitrary, potentially nested, attributes the Identity Provider included about the user.

    Typically, these `attributes` are used to pass along the user's first/last name, or whether they should be
    considered an admin within their company.
     */
    #[JsonProperty('attributes'), ArrayType(['string' => 'mixed'])]
    public ?array $attributes;

    /**
     * @param array{
     *   id?: ?string,
     *   scimDirectoryId?: ?string,
     *   email?: ?string,
     *   deleted?: ?bool,
     *   attributes?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->scimDirectoryId = $values['scimDirectoryId'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
        $this->attributes = $values['attributes'] ?? null;
    }
}
