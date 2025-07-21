<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class RecommendationCampaignsResponseV2 implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var array<RecommendationCampaignDefinitionV2Wrapper>|null $data Campaign details
    */
    private ?array $data = null;
    
    /**
     * @var RecommendationCampaignsResponseV2_extras|null $extras The extras property
    */
    private ?RecommendationCampaignsResponseV2_extras $extras = null;
    
    /**
     * @var RecommendationCampaignsResponseV2_meta|null $meta Pagination metadata
    */
    private ?RecommendationCampaignsResponseV2_meta $meta = null;
    
    /**
     * Instantiates a new RecommendationCampaignsResponseV2 and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationCampaignsResponseV2
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationCampaignsResponseV2 {
        return new RecommendationCampaignsResponseV2();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the data property value. Campaign details
     * @return array<RecommendationCampaignDefinitionV2Wrapper>|null
    */
    public function getData(): ?array {
        return $this->data;
    }

    /**
     * Gets the extras property value. The extras property
     * @return RecommendationCampaignsResponseV2_extras|null
    */
    public function getExtras(): ?RecommendationCampaignsResponseV2_extras {
        return $this->extras;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'data' => fn(ParseNode $n) => $o->setData($n->getCollectionOfObjectValues([RecommendationCampaignDefinitionV2Wrapper::class, 'createFromDiscriminatorValue'])),
            'extras' => fn(ParseNode $n) => $o->setExtras($n->getObjectValue([RecommendationCampaignsResponseV2_extras::class, 'createFromDiscriminatorValue'])),
            'meta' => fn(ParseNode $n) => $o->setMeta($n->getObjectValue([RecommendationCampaignsResponseV2_meta::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the meta property value. Pagination metadata
     * @return RecommendationCampaignsResponseV2_meta|null
    */
    public function getMeta(): ?RecommendationCampaignsResponseV2_meta {
        return $this->meta;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeCollectionOfObjectValues('data', $this->getData());
        $writer->writeObjectValue('extras', $this->getExtras());
        $writer->writeObjectValue('meta', $this->getMeta());
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
     * Sets the data property value. Campaign details
     * @param array<RecommendationCampaignDefinitionV2Wrapper>|null $value Value to set for the data property.
    */
    public function setData(?array $value): void {
        $this->data = $value;
    }

    /**
     * Sets the extras property value. The extras property
     * @param RecommendationCampaignsResponseV2_extras|null $value Value to set for the extras property.
    */
    public function setExtras(?RecommendationCampaignsResponseV2_extras $value): void {
        $this->extras = $value;
    }

    /**
     * Sets the meta property value. Pagination metadata
     * @param RecommendationCampaignsResponseV2_meta|null $value Value to set for the meta property.
    */
    public function setMeta(?RecommendationCampaignsResponseV2_meta $value): void {
        $this->meta = $value;
    }

}
