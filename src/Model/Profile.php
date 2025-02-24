<?php

namespace Synerise\Sdk\Model;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Sdk\Model\Profile\BaseParams;

class Profile implements Parsable
{
    /**
     * @var string|null
     */
    private ?string $uuid;

    /**
     * @var BaseParams|null
     */
    private ?BaseParams $baseParams;

    /**
     * @var array|null
     */
    private ?array $extraParams;

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Profile
     */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Profile {
        return new Profile();
    }

    /**
     * Get base params
     * @return BaseParams
     */
    public function getBaseParams(): ?BaseParams
    {
        return $this->baseParams;
    }

    /**
     * Get extra params as array
     * @return string[]|null
     */
    public function getExtraParams(): ?array
    {
        return $this->extraParams;
    }

    /**
     * Get uuid
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }


    /**
     * Get single value from extra params if exists
     * @param string $name
     * @return string|null
     */
    public function getExtraParam(string $name): ?string
    {
        return $this->getExtraParams()[$name] ?? null;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
     */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'baseParams' => fn(ParseNode $n) => $o->setBaseParams($n->getObjectValue([BaseParams::class, 'createFromDiscriminatorValue'])),
            'extraParams' => fn(ParseNode $n) => $o->setExtraParams($n->getCollectionOfPrimitiveValues()),
            'uuid' => fn(ParseNode $n) => $o->setUuid($n->getStringValue()),
        ];
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
     */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('baseParams', $this->getBaseParams());
        $writer->writeCollectionOfPrimitiveValues('extraParams', $this->getExtraParams());
        $writer->writeStringValue('uuid', $this->getUuid());
    }

    public function setBaseParams(?BaseParams $baseParams)
    {
        $this->baseParams = $baseParams;
    }

    public function setExtraParams(?array $extraParams)
    {
        $this->extraParams = $extraParams;
    }


    public function setUuid(?string $uuid)
    {
        $this->uuid = $uuid;
    }
}