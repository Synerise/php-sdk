<?php

namespace Synerise\Api\V4\Events\AssignedToCompany;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions:  <span style="color:red"><strong>WARNING:</strong></span>  - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event.  - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br>  <code>modifiedBy</code><br>  <code>apiKey</code><br>  <code>eventUUID</code><br>  <code>ip</code><br>  <code>time</code><br>  <code>businessProfileId</code>
*/
class AssignedToCompanyPostRequestBody_params implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var float|null $companyId Company ID
    */
    private ?float $companyId = null;
    
    /**
     * Instantiates a new AssignedToCompanyPostRequestBody_params and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AssignedToCompanyPostRequestBody_params
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AssignedToCompanyPostRequestBody_params {
        return new AssignedToCompanyPostRequestBody_params();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the companyId property value. Company ID
     * @return float|null
    */
    public function getCompanyId(): ?float {
        return $this->companyId;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'companyId' => fn(ParseNode $n) => $o->setCompanyId($n->getFloatValue()),
        ];
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeFloatValue('companyId', $this->getCompanyId());
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
     * Sets the companyId property value. Company ID
     * @param float|null $value Value to set for the companyId property.
    */
    public function setCompanyId(?float $value): void {
        $this->companyId = $value;
    }

}
