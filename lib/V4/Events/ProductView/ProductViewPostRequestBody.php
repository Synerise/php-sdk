<?php

namespace Synerise\Api\V4\Events\ProductView;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\V4\Models\EventBase;

class ProductViewPostRequestBody extends EventBase implements Parsable 
{
    /**
     * @var ProductViewPostRequestBody_params|null $params Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions:  <span style="color:red"><strong>WARNING:</strong></span>  - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event.  - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br>  <code>modifiedBy</code><br>  <code>apiKey</code><br>  <code>eventUUID</code><br>  <code>ip</code><br>  <code>time</code><br>  <code>businessProfileId</code>
    */
    private ?ProductViewPostRequestBody_params $params = null;
    
    /**
     * Instantiates a new ProductViewPostRequestBody and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProductViewPostRequestBody
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProductViewPostRequestBody {
        return new ProductViewPostRequestBody();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'params' => fn(ParseNode $n) => $o->setParams($n->getObjectValue([ProductViewPostRequestBody_params::class, 'createFromDiscriminatorValue'])),
        ]);
    }

    /**
     * Gets the params property value. Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions:  <span style="color:red"><strong>WARNING:</strong></span>  - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event.  - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br>  <code>modifiedBy</code><br>  <code>apiKey</code><br>  <code>eventUUID</code><br>  <code>ip</code><br>  <code>time</code><br>  <code>businessProfileId</code>
     * @return ProductViewPostRequestBody_params|null
    */
    public function getParams(): ?ProductViewPostRequestBody_params {
        return $this->params;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeObjectValue('params', $this->getParams());
    }

    /**
     * Sets the params property value. Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions:  <span style="color:red"><strong>WARNING:</strong></span>  - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event.  - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br>  <code>modifiedBy</code><br>  <code>apiKey</code><br>  <code>eventUUID</code><br>  <code>ip</code><br>  <code>time</code><br>  <code>businessProfileId</code>
     * @param ProductViewPostRequestBody_params|null $value Value to set for the params property.
    */
    public function setParams(?ProductViewPostRequestBody_params $value): void {
        $this->params = $value;
    }

}
