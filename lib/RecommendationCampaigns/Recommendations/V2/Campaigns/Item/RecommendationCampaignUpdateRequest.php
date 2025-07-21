<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Item;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\RecommendationCampaigns\Models\AttributeRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\CrossSellRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\ItemComparisonRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\LastViewedRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\MetricsRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\PersonalizedRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\RecentInteractionsRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\RecommendationCampaignDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\RecommendationCampaignUpdateFromAnotherCampaign;
use Synerise\Api\RecommendationCampaigns\Models\SectionRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\SetComplementRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\SimilarRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\VisuallySimilarRecommendationCampaignsDefinitionV2;

/**
 * Composed type wrapper for classes RecommendationCampaignDefinitionV2, RecommendationCampaignUpdateFromAnotherCampaign
*/
class RecommendationCampaignUpdateRequest implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var RecommendationCampaignDefinitionV2|null $recommendationCampaignDefinitionV2 Composed type representation for type RecommendationCampaignDefinitionV2
    */
    private ?RecommendationCampaignDefinitionV2 $recommendationCampaignDefinitionV2 = null;
    
    /**
     * @var RecommendationCampaignUpdateFromAnotherCampaign|null $recommendationCampaignUpdateFromAnotherCampaign Composed type representation for type RecommendationCampaignUpdateFromAnotherCampaign
    */
    private ?RecommendationCampaignUpdateFromAnotherCampaign $recommendationCampaignUpdateFromAnotherCampaign = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationCampaignUpdateRequest
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationCampaignUpdateRequest {
        $result = new RecommendationCampaignUpdateRequest();
        $mappingValueNode = $parseNode->getChildNode("type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            if ('' === $mappingValue) {
                $result->setRecommendationCampaignDefinitionV2(new RecommendationCampaignDefinitionV2());
            } else if ('RecommendationCampaignUpdateFromAnotherCampaign' === $mappingValue) {
                $result->setRecommendationCampaignUpdateFromAnotherCampaign(new RecommendationCampaignUpdateFromAnotherCampaign());
            }
        }
        return $result;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getRecommendationCampaignDefinitionV2() !== null) {
            return $this->getRecommendationCampaignDefinitionV2()->getFieldDeserializers();
        } else if ($this->getRecommendationCampaignUpdateFromAnotherCampaign() !== null) {
            return $this->getRecommendationCampaignUpdateFromAnotherCampaign()->getFieldDeserializers();
        }
        return [];
    }

    /**
     * Gets the RecommendationCampaignDefinitionV2 property value. Composed type representation for type RecommendationCampaignDefinitionV2
     * @return RecommendationCampaignDefinitionV2|null
    */
    public function getRecommendationCampaignDefinitionV2(): ?RecommendationCampaignDefinitionV2 {
        return $this->recommendationCampaignDefinitionV2;
    }

    /**
     * Gets the RecommendationCampaignUpdateFromAnotherCampaign property value. Composed type representation for type RecommendationCampaignUpdateFromAnotherCampaign
     * @return RecommendationCampaignUpdateFromAnotherCampaign|null
    */
    public function getRecommendationCampaignUpdateFromAnotherCampaign(): ?RecommendationCampaignUpdateFromAnotherCampaign {
        return $this->recommendationCampaignUpdateFromAnotherCampaign;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        if ($this->getRecommendationCampaignDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getRecommendationCampaignDefinitionV2());
        } else if ($this->getRecommendationCampaignUpdateFromAnotherCampaign() !== null) {
            $writer->writeObjectValue(null, $this->getRecommendationCampaignUpdateFromAnotherCampaign());
        }
    }

    /**
     * Sets the RecommendationCampaignDefinitionV2 property value. Composed type representation for type RecommendationCampaignDefinitionV2
     * @param RecommendationCampaignDefinitionV2|null $value Value to set for the RecommendationCampaignDefinitionV2 property.
    */
    public function setRecommendationCampaignDefinitionV2(?RecommendationCampaignDefinitionV2 $value): void {
        $this->recommendationCampaignDefinitionV2 = $value;
    }

    /**
     * Sets the RecommendationCampaignUpdateFromAnotherCampaign property value. Composed type representation for type RecommendationCampaignUpdateFromAnotherCampaign
     * @param RecommendationCampaignUpdateFromAnotherCampaign|null $value Value to set for the RecommendationCampaignUpdateFromAnotherCampaign property.
    */
    public function setRecommendationCampaignUpdateFromAnotherCampaign(?RecommendationCampaignUpdateFromAnotherCampaign $value): void {
        $this->recommendationCampaignUpdateFromAnotherCampaign = $value;
    }

}
