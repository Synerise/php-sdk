<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SectionRecommendationsCampaignParameters extends BaseRecommendationsCampaignParameters implements Parsable 
{
    /**
     * @var string|null $metadataCatalogId The metadataCatalogId property
    */
    private ?string $metadataCatalogId = null;
    
    /**
     * Instantiates a new SectionRecommendationsCampaignParameters and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SectionRecommendationsCampaignParameters
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SectionRecommendationsCampaignParameters {
        return new SectionRecommendationsCampaignParameters();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'metadataCatalogId' => fn(ParseNode $n) => $o->setMetadataCatalogId($n->getStringValue()),
        ]);
    }

    /**
     * Gets the metadataCatalogId property value. The metadataCatalogId property
     * @return string|null
    */
    public function getMetadataCatalogId(): ?string {
        return $this->metadataCatalogId;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('metadataCatalogId', $this->getMetadataCatalogId());
    }

    /**
     * Sets the metadataCatalogId property value. The metadataCatalogId property
     * @param string|null $value Value to set for the metadataCatalogId property.
    */
    public function setMetadataCatalogId(?string $value): void {
        $this->metadataCatalogId = $value;
    }

}
