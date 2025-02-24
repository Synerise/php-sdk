<?php

namespace Synerise\Api\Uauth\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Microsoft\Kiota\Abstractions\Types\TypeUtils;

class ApiKeyPermissionCheckResponse implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $businessProfileName The businessProfileName property
    */
    private ?string $businessProfileName = null;
    
    /**
     * @var array<bool>|null $permissions The permissions property
    */
    private ?array $permissions = null;
    
    /**
     * Instantiates a new ApiKeyPermissionCheckResponse and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ApiKeyPermissionCheckResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ApiKeyPermissionCheckResponse {
        return new ApiKeyPermissionCheckResponse();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the businessProfileName property value. The businessProfileName property
     * @return string|null
    */
    public function getBusinessProfileName(): ?string {
        return $this->businessProfileName;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'businessProfileName' => fn(ParseNode $n) => $o->setBusinessProfileName($n->getStringValue()),
            'permissions' => function (ParseNode $n) {
                $val = $n->getCollectionOfPrimitiveValues();
                if (is_array($val)) {
                    TypeUtils::validateCollectionValues($val, 'bool');
                }
                /** @var array<bool>|null $val */
                $this->setPermissions($val);
            },
        ];
    }

    /**
     * Gets the permissions property value. The permissions property
     * @return array<bool>|null
    */
    public function getPermissions(): ?array {
        return $this->permissions;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('businessProfileName', $this->getBusinessProfileName());
        $writer->writeCollectionOfPrimitiveValues('permissions', $this->getPermissions());
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
     * Sets the businessProfileName property value. The businessProfileName property
     * @param string|null $value Value to set for the businessProfileName property.
    */
    public function setBusinessProfileName(?string $value): void {
        $this->businessProfileName = $value;
    }

    /**
     * Sets the permissions property value. The permissions property
     * @param array<bool>|null $value Value to set for the permissions property.
    */
    public function setPermissions(?array $value): void {
        $this->permissions = $value;
    }

}
