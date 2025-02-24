<?php

namespace Synerise\Api\V4\Events\ProductView;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\V4\Models\EventSource;

/**
 * Additional parameters. Remember that you can use [event enrichment](https://hub.synerise.com/docs/assets/events/adding-event-parameters/) to add the data automatically from a catalog.Aside from the required parameters (if any exist), all events accept custom, free-form parameters, with the following restrictions:  <span style="color:red"><strong>WARNING:</strong></span>  - If you want to send the `email` param, it must be exactly the same as the email of the profile which generated the event.  - Some params are reserved for system use. If you send them in the `params` object, they are ignored or overwritten with system-assigned values:<br>  <code>modifiedBy</code><br>  <code>apiKey</code><br>  <code>eventUUID</code><br>  <code>ip</code><br>  <code>time</code><br>  <code>businessProfileId</code>
*/
class ProductViewPostRequestBody_params implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $campaignHash If the event results from a recommendation, this is the from the `x-Correlation-Id` header of AI Recommendations download
    */
    private ?string $campaignHash = null;
    
    /**
     * @var string|null $category Item category
    */
    private ?string $category = null;
    
    /**
     * @var bool|null $fromRecommendation Set to `true` if the event is triggered by an element from a recommendation.
    */
    private ?bool $fromRecommendation = null;
    
    /**
     * @var string|null $name Item name
    */
    private ?string $name = null;
    
    /**
     * @var string|null $productId SKU of the item
    */
    private ?string $productId = null;
    
    /**
     * @var EventSource|null $source Source of the event. 
    */
    private ?EventSource $source = null;
    
    /**
     * @var string|null $url URL address of the item page
    */
    private ?string $url = null;
    
    /**
     * Instantiates a new ProductViewPostRequestBody_params and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ProductViewPostRequestBody_params
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ProductViewPostRequestBody_params {
        return new ProductViewPostRequestBody_params();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the campaignHash property value. If the event results from a recommendation, this is the from the `x-Correlation-Id` header of AI Recommendations download
     * @return string|null
    */
    public function getCampaignHash(): ?string {
        return $this->campaignHash;
    }

    /**
     * Gets the category property value. Item category
     * @return string|null
    */
    public function getCategory(): ?string {
        return $this->category;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'campaignHash' => fn(ParseNode $n) => $o->setCampaignHash($n->getStringValue()),
            'category' => fn(ParseNode $n) => $o->setCategory($n->getStringValue()),
            'fromRecommendation' => fn(ParseNode $n) => $o->setFromRecommendation($n->getBooleanValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'productId' => fn(ParseNode $n) => $o->setProductId($n->getStringValue()),
            'source' => fn(ParseNode $n) => $o->setSource($n->getEnumValue(EventSource::class)),
            'url' => fn(ParseNode $n) => $o->setUrl($n->getStringValue()),
        ];
    }

    /**
     * Gets the fromRecommendation property value. Set to `true` if the event is triggered by an element from a recommendation.
     * @return bool|null
    */
    public function getFromRecommendation(): ?bool {
        return $this->fromRecommendation;
    }

    /**
     * Gets the name property value. Item name
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the productId property value. SKU of the item
     * @return string|null
    */
    public function getProductId(): ?string {
        return $this->productId;
    }

    /**
     * Gets the source property value. Source of the event. 
     * @return EventSource|null
    */
    public function getSource(): ?EventSource {
        return $this->source;
    }

    /**
     * Gets the url property value. URL address of the item page
     * @return string|null
    */
    public function getUrl(): ?string {
        return $this->url;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('campaignHash', $this->getCampaignHash());
        $writer->writeStringValue('category', $this->getCategory());
        $writer->writeBooleanValue('fromRecommendation', $this->getFromRecommendation());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeStringValue('productId', $this->getProductId());
        $writer->writeEnumValue('source', $this->getSource());
        $writer->writeStringValue('url', $this->getUrl());
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
     * Sets the campaignHash property value. If the event results from a recommendation, this is the from the `x-Correlation-Id` header of AI Recommendations download
     * @param string|null $value Value to set for the campaignHash property.
    */
    public function setCampaignHash(?string $value): void {
        $this->campaignHash = $value;
    }

    /**
     * Sets the category property value. Item category
     * @param string|null $value Value to set for the category property.
    */
    public function setCategory(?string $value): void {
        $this->category = $value;
    }

    /**
     * Sets the fromRecommendation property value. Set to `true` if the event is triggered by an element from a recommendation.
     * @param bool|null $value Value to set for the fromRecommendation property.
    */
    public function setFromRecommendation(?bool $value): void {
        $this->fromRecommendation = $value;
    }

    /**
     * Sets the name property value. Item name
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the productId property value. SKU of the item
     * @param string|null $value Value to set for the productId property.
    */
    public function setProductId(?string $value): void {
        $this->productId = $value;
    }

    /**
     * Sets the source property value. Source of the event. 
     * @param EventSource|null $value Value to set for the source property.
    */
    public function setSource(?EventSource $value): void {
        $this->source = $value;
    }

    /**
     * Sets the url property value. URL address of the item page
     * @param string|null $value Value to set for the url property.
    */
    public function setUrl(?string $value): void {
        $this->url = $value;
    }

}
