<?php

namespace Synerise\Sdk\Model\Profile;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class BaseParams implements AdditionalDataHolder, Parsable
{
    /**
     * @var array<string, mixed>|null
     */
    private ?array $additionalData = null;

    /**
     * @var string|null
     */
    private ?string $allVisits;

    /**
     * @var string|null
     */
    private ?string $host;

    /**
     * @var string|null
     */
    private ?string $identityHash;

    /**
     * @var string|null
     */
    private ?string $userHash;

    /**
     * @var string|null
     */
    private ?string $permUuid;

    /**
     * @var string|null
     */
    private ?string $uuid;

    /**
     * @var string|null
     */
    private ?string $init;

    /**
     * @var string|null
     */
    private ?string $last;

    /**
     * @var string|null
     */
    private ?string $current;

    /**
     * @var string|null
     */
    private ?string $uniqueVisits;

    /**
     * @var string|null
     */
    private ?string $globalControlGroup;

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BaseParams
     */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BaseParams {
        return new BaseParams();
    }

    /**
     * Get host
     * @return string|null
     */
    public function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * Get identity hash
     * @return string|null
     */
    public function getIdentityHash(): ?string
    {
        return $this->identityHash;
    }

    /**
     * Get user hash
     * @return string|null
     */
    public function getUserHash(): ?string
    {
        return $this->userHash;
    }

    /**
     * Get permanent UUID
     * @return string|null
     */
    public function getPermUuid(): ?string
    {
        return $this->permUuid;
    }

    /**
     * Get UUID
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * Get initialization time
     * @return string|null
     */
    public function getInit(): ?string
    {
        return $this->init;
    }

    /**
     * Get last activity time
     * @return string|null
     */
    public function getLast(): ?string
    {
        return $this->last;
    }

    /**
     * Get current time
     * @return string|null
     */
    public function getCurrent(): ?string
    {
        return $this->current;
    }

    /**
     * Get unique visits count
     * @return string|null
     */
    public function getUniqueVisits(): ?string
    {
        return $this->uniqueVisits;
    }

    /**
     * Get all visits count
     * @return string|null
     */
    public function getAllVisits(): ?string
    {
        return $this->allVisits;
    }

    /**
     * Get global control group
     * @return string|null
     */
    public function getGlobalControlGroup(): ?string
    {
        return $this->globalControlGroup;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
     */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
     */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'allVisits' => fn(ParseNode $n) => $o->setAllVisits($n->getStringValue()),
            'current' => fn(ParseNode $n) => $o->setCurrent($n->getStringValue()),
            'globalControlGroup' => fn(ParseNode $n) => $o->setGlobalControlGroup($n->getStringValue()),
            'host' => fn(ParseNode $n) => $o->setHost($n->getStringValue()),
            'identityHash' => fn(ParseNode $n) => $o->setIdentityHash($n->getStringValue()),
            'init' => fn(ParseNode $n) => $o->setInit($n->getStringValue()),
            'last' => fn(ParseNode $n) => $o->setLast($n->getStringValue()),
            'permUuid' => fn(ParseNode $n) => $o->setPermUuid($n->getStringValue()),
            'uniqueVisits' => fn(ParseNode $n) => $o->setUniqueVisits($n->getStringValue()),
            'user_hash' => fn(ParseNode $n) => $o->setUserHash($n->getStringValue()),
            'uuid' => fn(ParseNode $n) => $o->setUuid($n->getStringValue())
        ];
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
     */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('allVisits', $this->getAllVisits());
        $writer->writeIntegerValue('current', $this->getCurrent());
        $writer->writeBooleanValue('globalControlGroup', $this->getGlobalControlGroup());
        $writer->writeStringValue('host', $this->getHost());
        $writer->writeIntegerValue('identityHash', $this->getIdentityHash());
        $writer->writeIntegerValue('init', $this->getInit());
        $writer->writeIntegerValue('last', $this->getLast());
        $writer->writeStringValue('permUuid', $this->getPermUuid());
        $writer->writeIntegerValue('uniqueVisits', $this->getUniqueVisits());
        $writer->writeIntegerValue('user_hash', $this->getUserHash());
        $writer->writeStringValue('uuid', $this->getUuid());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
     */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Set all visits count
     * @param string|null $allVisits
     * @return void
     */
    private function setAllVisits(?string $allVisits)
    {
        $this->allVisits = $allVisits;
    }

    /**
     * Set host
     * @param string|null $host
     * @return void
     */
    public function setHost(?string $host): void
    {
        $this->host = $host;
    }

    /**
     * Set identity hash
     * @param string|null $identityHash
     * @return void
     */
    public function setIdentityHash(?string $identityHash): void
    {
        $this->identityHash = $identityHash;
    }

    /**
     * Set user hash
     * @param string|null $userHash
     * @return void
     */
    public function setUserHash(?string $userHash): void
    {
        $this->userHash = $userHash;
    }

    /**
     * Set permanent UUID
     * @param string|null $permUuid
     * @return void
     */
    public function setPermUuid(?string $permUuid): void
    {
        $this->permUuid = $permUuid;
    }

    /**
     * Set UUID
     * @param string|null $uuid
     * @return void
     */
    public function setUuid(?string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * Set initialization time
     * @param string|null $init
     * @return void
     */
    public function setInit(?string $init): void
    {
        $this->init = $init;
    }

    /**
     * Set last visit time
     * @param string|null $last
     * @return void
     */
    public function setLast(?string $last): void
    {
        $this->last = $last;
    }

    /**
     * Set current time
     * @param string|null $current
     * @return void
     */
    public function setCurrent(?string $current): void
    {
        $this->current = $current;
    }

    /**
     * Set unique visits count
     * @param string|null $uniqueVisits
     * @return void
     */
    public function setUniqueVisits(?string $uniqueVisits): void
    {
        $this->uniqueVisits = $uniqueVisits;
    }

    /**
     * Set global control group
     * @param string|null $globalControlGroup
     * @return void
     */
    public function setGlobalControlGroup(?string $globalControlGroup): void
    {
        $this->globalControlGroup = $globalControlGroup;
    }
}