<?php

namespace SSOReady\Types;

use SSOReady\Core\Json\JsonSerializableType;
use SSOReady\Core\Json\JsonProperty;
use SSOReady\Core\Types\ArrayType;

class ScimGroup extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier for this SCIM group.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $scimDirectoryId SCIM directory this SCIM group belongs to.
     */
    #[JsonProperty('scimDirectoryId')]
    public ?string $scimDirectoryId;

    /**
     * @var ?string $displayName A human-friendly name for the SCIM group.
     */
    #[JsonProperty('displayName')]
    public ?string $displayName;

    /**
     * @var ?bool $deleted Whether the SCIM group has been deleted or deprovisioned from its SCIM directory.

    Identity Providers are inconsistent about reliably deleting SCIM groups. Many Identity Providers will deprovision
    the users inside a group, but not the group itself. For this reason, it's typical to ignore this field until a
    specific need arises.
     */
    #[JsonProperty('deleted')]
    public ?bool $deleted;

    /**
     * @var ?array<string, mixed> $attributes Arbitrary, potentially nested, attributes the Identity Provider included about the group.

    Identity Providers are inconsistent about supporting sending custom attributes on groups. For this reason, it's
    typical to not rely on them until a specific need arises.
     */
    #[JsonProperty('attributes'), ArrayType(['string' => 'mixed'])]
    public ?array $attributes;

    /**
     * @param array{
     *   id?: ?string,
     *   scimDirectoryId?: ?string,
     *   displayName?: ?string,
     *   deleted?: ?bool,
     *   attributes?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->scimDirectoryId = $values['scimDirectoryId'] ?? null;
        $this->displayName = $values['displayName'] ?? null;
        $this->deleted = $values['deleted'] ?? null;
        $this->attributes = $values['attributes'] ?? null;
    }
}
