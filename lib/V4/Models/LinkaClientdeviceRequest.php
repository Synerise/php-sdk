<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class LinkaClientdeviceRequest implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $bluetoothAddress Bluetooth MAC address of the device
    */
    private ?string $bluetoothAddress = null;
    
    /**
     * @var string|null $deviceId Unique Android or iOS device ID
    */
    private ?string $deviceId = null;
    
    /**
     * @var string|null $macAddress MAC address of the network adapter
    */
    private ?string $macAddress = null;
    
    /**
     * @var string|null $manufacturer Manufacturer of the device
    */
    private ?string $manufacturer = null;
    
    /**
     * @var string|null $model Model of the device
    */
    private ?string $model = null;
    
    /**
     * @var string|null $osVersion Operating system of the device
    */
    private ?string $osVersion = null;
    
    /**
     * @var string|null $product Additional information about the OS on the device
    */
    private ?string $product = null;
    
    /**
     * @var string|null $publicKey Public key used to encrypt push messages
    */
    private ?string $publicKey = null;
    
    /**
     * @var string|null $registrationId Registration ID for [Firebase Cloud Messaging](https://firebase.google.com/docs/cloud-messaging/)
    */
    private ?string $registrationId = null;
    
    /**
     * @var int|null $screenHeight Screen height in pixels
    */
    private ?int $screenHeight = null;
    
    /**
     * @var int|null $screenWidth Screen width in pixels
    */
    private ?int $screenWidth = null;
    
    /**
     * @var LinkaClientdeviceRequest_type|null $type Device type
    */
    private ?LinkaClientdeviceRequest_type $type = null;
    
    /**
     * Instantiates a new LinkaClientdeviceRequest and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return LinkaClientdeviceRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): LinkaClientdeviceRequest {
        return new LinkaClientdeviceRequest();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the bluetoothAddress property value. Bluetooth MAC address of the device
     * @return string|null
    */
    public function getBluetoothAddress(): ?string {
        return $this->bluetoothAddress;
    }

    /**
     * Gets the deviceId property value. Unique Android or iOS device ID
     * @return string|null
    */
    public function getDeviceId(): ?string {
        return $this->deviceId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'bluetoothAddress' => fn(ParseNode $n) => $o->setBluetoothAddress($n->getStringValue()),
            'deviceId' => fn(ParseNode $n) => $o->setDeviceId($n->getStringValue()),
            'macAddress' => fn(ParseNode $n) => $o->setMacAddress($n->getStringValue()),
            'manufacturer' => fn(ParseNode $n) => $o->setManufacturer($n->getStringValue()),
            'model' => fn(ParseNode $n) => $o->setModel($n->getStringValue()),
            'osVersion' => fn(ParseNode $n) => $o->setOsVersion($n->getStringValue()),
            'product' => fn(ParseNode $n) => $o->setProduct($n->getStringValue()),
            'publicKey' => fn(ParseNode $n) => $o->setPublicKey($n->getStringValue()),
            'registrationId' => fn(ParseNode $n) => $o->setRegistrationId($n->getStringValue()),
            'screenHeight' => fn(ParseNode $n) => $o->setScreenHeight($n->getIntegerValue()),
            'screenWidth' => fn(ParseNode $n) => $o->setScreenWidth($n->getIntegerValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(LinkaClientdeviceRequest_type::class)),
        ];
    }

    /**
     * Gets the macAddress property value. MAC address of the network adapter
     * @return string|null
    */
    public function getMacAddress(): ?string {
        return $this->macAddress;
    }

    /**
     * Gets the manufacturer property value. Manufacturer of the device
     * @return string|null
    */
    public function getManufacturer(): ?string {
        return $this->manufacturer;
    }

    /**
     * Gets the model property value. Model of the device
     * @return string|null
    */
    public function getModel(): ?string {
        return $this->model;
    }

    /**
     * Gets the osVersion property value. Operating system of the device
     * @return string|null
    */
    public function getOsVersion(): ?string {
        return $this->osVersion;
    }

    /**
     * Gets the product property value. Additional information about the OS on the device
     * @return string|null
    */
    public function getProduct(): ?string {
        return $this->product;
    }

    /**
     * Gets the publicKey property value. Public key used to encrypt push messages
     * @return string|null
    */
    public function getPublicKey(): ?string {
        return $this->publicKey;
    }

    /**
     * Gets the registrationId property value. Registration ID for [Firebase Cloud Messaging](https://firebase.google.com/docs/cloud-messaging/)
     * @return string|null
    */
    public function getRegistrationId(): ?string {
        return $this->registrationId;
    }

    /**
     * Gets the screenHeight property value. Screen height in pixels
     * @return int|null
    */
    public function getScreenHeight(): ?int {
        return $this->screenHeight;
    }

    /**
     * Gets the screenWidth property value. Screen width in pixels
     * @return int|null
    */
    public function getScreenWidth(): ?int {
        return $this->screenWidth;
    }

    /**
     * Gets the type property value. Device type
     * @return LinkaClientdeviceRequest_type|null
    */
    public function getType(): ?LinkaClientdeviceRequest_type {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('bluetoothAddress', $this->getBluetoothAddress());
        $writer->writeStringValue('deviceId', $this->getDeviceId());
        $writer->writeStringValue('macAddress', $this->getMacAddress());
        $writer->writeStringValue('manufacturer', $this->getManufacturer());
        $writer->writeStringValue('model', $this->getModel());
        $writer->writeStringValue('osVersion', $this->getOsVersion());
        $writer->writeStringValue('product', $this->getProduct());
        $writer->writeStringValue('publicKey', $this->getPublicKey());
        $writer->writeStringValue('registrationId', $this->getRegistrationId());
        $writer->writeIntegerValue('screenHeight', $this->getScreenHeight());
        $writer->writeIntegerValue('screenWidth', $this->getScreenWidth());
        $writer->writeEnumValue('type', $this->getType());
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
     * Sets the bluetoothAddress property value. Bluetooth MAC address of the device
     * @param string|null $value Value to set for the bluetoothAddress property.
    */
    public function setBluetoothAddress(?string $value): void {
        $this->bluetoothAddress = $value;
    }

    /**
     * Sets the deviceId property value. Unique Android or iOS device ID
     * @param string|null $value Value to set for the deviceId property.
    */
    public function setDeviceId(?string $value): void {
        $this->deviceId = $value;
    }

    /**
     * Sets the macAddress property value. MAC address of the network adapter
     * @param string|null $value Value to set for the macAddress property.
    */
    public function setMacAddress(?string $value): void {
        $this->macAddress = $value;
    }

    /**
     * Sets the manufacturer property value. Manufacturer of the device
     * @param string|null $value Value to set for the manufacturer property.
    */
    public function setManufacturer(?string $value): void {
        $this->manufacturer = $value;
    }

    /**
     * Sets the model property value. Model of the device
     * @param string|null $value Value to set for the model property.
    */
    public function setModel(?string $value): void {
        $this->model = $value;
    }

    /**
     * Sets the osVersion property value. Operating system of the device
     * @param string|null $value Value to set for the osVersion property.
    */
    public function setOsVersion(?string $value): void {
        $this->osVersion = $value;
    }

    /**
     * Sets the product property value. Additional information about the OS on the device
     * @param string|null $value Value to set for the product property.
    */
    public function setProduct(?string $value): void {
        $this->product = $value;
    }

    /**
     * Sets the publicKey property value. Public key used to encrypt push messages
     * @param string|null $value Value to set for the publicKey property.
    */
    public function setPublicKey(?string $value): void {
        $this->publicKey = $value;
    }

    /**
     * Sets the registrationId property value. Registration ID for [Firebase Cloud Messaging](https://firebase.google.com/docs/cloud-messaging/)
     * @param string|null $value Value to set for the registrationId property.
    */
    public function setRegistrationId(?string $value): void {
        $this->registrationId = $value;
    }

    /**
     * Sets the screenHeight property value. Screen height in pixels
     * @param int|null $value Value to set for the screenHeight property.
    */
    public function setScreenHeight(?int $value): void {
        $this->screenHeight = $value;
    }

    /**
     * Sets the screenWidth property value. Screen width in pixels
     * @param int|null $value Value to set for the screenWidth property.
    */
    public function setScreenWidth(?int $value): void {
        $this->screenWidth = $value;
    }

    /**
     * Sets the type property value. Device type
     * @param LinkaClientdeviceRequest_type|null $value Value to set for the type property.
    */
    public function setType(?LinkaClientdeviceRequest_type $value): void {
        $this->type = $value;
    }

}
