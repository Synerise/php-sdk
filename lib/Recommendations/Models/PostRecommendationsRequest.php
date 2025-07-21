<?php

namespace Synerise\Api\Recommendations\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PostRecommendationsRequest extends BasePostRecommendationsRequest implements Parsable 
{
    /**
     * @var string|null $campaignId Campaign ID for establishing the context
    */
    private ?string $campaignId = null;
    
    /**
     * @var string|null $clientUUID Profile UUID. This parameter is required for these recommendation types:  - Personalized  - Last seen  - Recent interactions  - Section  - AttributeThis parameter can be passed in all recommendations. In recommendations which don't require the customer context, it can still be used to create filters.
    */
    private ?string $clientUUID = null;
    
    /**
     * @var string|null $slug Slug for establishing the context
    */
    private ?string $slug = null;
    
    /**
     * Instantiates a new PostRecommendationsRequest and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PostRecommendationsRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PostRecommendationsRequest {
        return new PostRecommendationsRequest();
    }

    /**
     * Gets the campaignId property value. Campaign ID for establishing the context
     * @return string|null
    */
    public function getCampaignId(): ?string {
        return $this->campaignId;
    }

    /**
     * Gets the clientUUID property value. Profile UUID. This parameter is required for these recommendation types:  - Personalized  - Last seen  - Recent interactions  - Section  - AttributeThis parameter can be passed in all recommendations. In recommendations which don't require the customer context, it can still be used to create filters.
     * @return string|null
    */
    public function getClientUUID(): ?string {
        return $this->clientUUID;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'campaignId' => fn(ParseNode $n) => $o->setCampaignId($n->getStringValue()),
            'clientUUID' => fn(ParseNode $n) => $o->setClientUUID($n->getStringValue()),
            'slug' => fn(ParseNode $n) => $o->setSlug($n->getStringValue()),
        ]);
    }

    /**
     * Gets the slug property value. Slug for establishing the context
     * @return string|null
    */
    public function getSlug(): ?string {
        return $this->slug;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('campaignId', $this->getCampaignId());
        $writer->writeStringValue('clientUUID', $this->getClientUUID());
        $writer->writeStringValue('slug', $this->getSlug());
    }

    /**
     * Sets the campaignId property value. Campaign ID for establishing the context
     * @param string|null $value Value to set for the campaignId property.
    */
    public function setCampaignId(?string $value): void {
        $this->campaignId = $value;
    }

    /**
     * Sets the clientUUID property value. Profile UUID. This parameter is required for these recommendation types:  - Personalized  - Last seen  - Recent interactions  - Section  - AttributeThis parameter can be passed in all recommendations. In recommendations which don't require the customer context, it can still be used to create filters.
     * @param string|null $value Value to set for the clientUUID property.
    */
    public function setClientUUID(?string $value): void {
        $this->clientUUID = $value;
    }

    /**
     * Sets the slug property value. Slug for establishing the context
     * @param string|null $value Value to set for the slug property.
    */
    public function setSlug(?string $value): void {
        $this->slug = $value;
    }

}
