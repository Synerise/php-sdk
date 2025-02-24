<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * This object contains the marketing agreements of the Profile.You can also pass the values as strings (`"true"`;`"True"`/`"false"`;`"False"`) or integers (`1` for true and `0` for false).
*/
class Agreements implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $bluetooth Permission to use Bluetooth data for marketing purposes
    */
    private ?bool $bluetooth = null;
    
    /**
     * @var bool|null $email Permission to receive marketing information by e-mail. This field has no effect if [email is not a unique identifier](https://hub.synerise.com/docs/settings/configuration/non-unique-emails/).
    */
    private ?bool $email = null;
    
    /**
     * @var bool|null $push Permission to receive push notifications
    */
    private ?bool $push = null;
    
    /**
     * @var bool|null $rfid Permission to use RFID for marketing purposes
    */
    private ?bool $rfid = null;
    
    /**
     * @var bool|null $sms Permission to receive marketing information by SMS
    */
    private ?bool $sms = null;
    
    /**
     * @var bool|null $webPush Permission to receive webpush notifications
    */
    private ?bool $webPush = null;
    
    /**
     * @var bool|null $wifi Permission to use WiFi for marketing purposes
    */
    private ?bool $wifi = null;
    
    /**
     * Instantiates a new Agreements and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Agreements
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Agreements {
        return new Agreements();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the bluetooth property value. Permission to use Bluetooth data for marketing purposes
     * @return bool|null
    */
    public function getBluetooth(): ?bool {
        return $this->bluetooth;
    }

    /**
     * Gets the email property value. Permission to receive marketing information by e-mail. This field has no effect if [email is not a unique identifier](https://hub.synerise.com/docs/settings/configuration/non-unique-emails/).
     * @return bool|null
    */
    public function getEmail(): ?bool {
        return $this->email;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'bluetooth' => fn(ParseNode $n) => $o->setBluetooth($n->getBooleanValue()),
            'email' => fn(ParseNode $n) => $o->setEmail($n->getBooleanValue()),
            'push' => fn(ParseNode $n) => $o->setPush($n->getBooleanValue()),
            'rfid' => fn(ParseNode $n) => $o->setRfid($n->getBooleanValue()),
            'sms' => fn(ParseNode $n) => $o->setSms($n->getBooleanValue()),
            'webPush' => fn(ParseNode $n) => $o->setWebPush($n->getBooleanValue()),
            'wifi' => fn(ParseNode $n) => $o->setWifi($n->getBooleanValue()),
        ];
    }

    /**
     * Gets the push property value. Permission to receive push notifications
     * @return bool|null
    */
    public function getPush(): ?bool {
        return $this->push;
    }

    /**
     * Gets the rfid property value. Permission to use RFID for marketing purposes
     * @return bool|null
    */
    public function getRfid(): ?bool {
        return $this->rfid;
    }

    /**
     * Gets the sms property value. Permission to receive marketing information by SMS
     * @return bool|null
    */
    public function getSms(): ?bool {
        return $this->sms;
    }

    /**
     * Gets the webPush property value. Permission to receive webpush notifications
     * @return bool|null
    */
    public function getWebPush(): ?bool {
        return $this->webPush;
    }

    /**
     * Gets the wifi property value. Permission to use WiFi for marketing purposes
     * @return bool|null
    */
    public function getWifi(): ?bool {
        return $this->wifi;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('bluetooth', $this->getBluetooth());
        $writer->writeBooleanValue('email', $this->getEmail());
        $writer->writeBooleanValue('push', $this->getPush());
        $writer->writeBooleanValue('rfid', $this->getRfid());
        $writer->writeBooleanValue('sms', $this->getSms());
        $writer->writeBooleanValue('webPush', $this->getWebPush());
        $writer->writeBooleanValue('wifi', $this->getWifi());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the bluetooth property value. Permission to use Bluetooth data for marketing purposes
     * @param bool|null $value Value to set for the bluetooth property.
    */
    public function setBluetooth(?bool $value): void {
        $this->bluetooth = $value;
    }

    /**
     * Sets the email property value. Permission to receive marketing information by e-mail. This field has no effect if [email is not a unique identifier](https://hub.synerise.com/docs/settings/configuration/non-unique-emails/).
     * @param bool|null $value Value to set for the email property.
    */
    public function setEmail(?bool $value): void {
        $this->email = $value;
    }

    /**
     * Sets the push property value. Permission to receive push notifications
     * @param bool|null $value Value to set for the push property.
    */
    public function setPush(?bool $value): void {
        $this->push = $value;
    }

    /**
     * Sets the rfid property value. Permission to use RFID for marketing purposes
     * @param bool|null $value Value to set for the rfid property.
    */
    public function setRfid(?bool $value): void {
        $this->rfid = $value;
    }

    /**
     * Sets the sms property value. Permission to receive marketing information by SMS
     * @param bool|null $value Value to set for the sms property.
    */
    public function setSms(?bool $value): void {
        $this->sms = $value;
    }

    /**
     * Sets the webPush property value. Permission to receive webpush notifications
     * @param bool|null $value Value to set for the webPush property.
    */
    public function setWebPush(?bool $value): void {
        $this->webPush = $value;
    }

    /**
     * Sets the wifi property value. Permission to use WiFi for marketing purposes
     * @param bool|null $value Value to set for the wifi property.
    */
    public function setWifi(?bool $value): void {
        $this->wifi = $value;
    }

}
