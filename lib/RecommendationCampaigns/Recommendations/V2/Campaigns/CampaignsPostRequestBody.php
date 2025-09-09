<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns;

use Microsoft\Kiota\Abstractions\Serialization\ComposedTypeWrapper;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;
use Synerise\Api\RecommendationCampaigns\Models\AttributeRecommendationCampaignsCreateRequestV2;
use Synerise\Api\RecommendationCampaigns\Models\CrossSellRecommendationCampaignsCreateRequestV2;
use Synerise\Api\RecommendationCampaigns\Models\ItemComparisonRecommendationCampaignsCreateRequestV2;
use Synerise\Api\RecommendationCampaigns\Models\LastViewedRecommendationCampaignsCreateRequestV2;
use Synerise\Api\RecommendationCampaigns\Models\MetricsRecommendationCampaignsCreateRequestV2;
use Synerise\Api\RecommendationCampaigns\Models\PersonalizedRecommendationCampaignsCreateRequestV2;
use Synerise\Api\RecommendationCampaigns\Models\RecentInteractionsRecommendationCampaignsCreateRequestV2;
use Synerise\Api\RecommendationCampaigns\Models\SectionRecommendationCampaignsCreateRequestV2;
use Synerise\Api\RecommendationCampaigns\Models\SetComplementRecommendationCampaignsCreateRequestV2;
use Synerise\Api\RecommendationCampaigns\Models\SimilarRecommendationCampaignsCreateRequestV2;
use Synerise\Api\RecommendationCampaigns\Models\VisuallySimilarRecommendationCampaignsCreateRequestV2;

/**
 * Composed type wrapper for classes AttributeRecommendationCampaignsCreateRequestV2, CrossSellRecommendationCampaignsCreateRequestV2, ItemComparisonRecommendationCampaignsCreateRequestV2, LastViewedRecommendationCampaignsCreateRequestV2, MetricsRecommendationCampaignsCreateRequestV2, PersonalizedRecommendationCampaignsCreateRequestV2, RecentInteractionsRecommendationCampaignsCreateRequestV2, SectionRecommendationCampaignsCreateRequestV2, SetComplementRecommendationCampaignsCreateRequestV2, SimilarRecommendationCampaignsCreateRequestV2, VisuallySimilarRecommendationCampaignsCreateRequestV2
*/
class CampaignsPostRequestBody implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var AttributeRecommendationCampaignsCreateRequestV2|null $attributeRecommendationCampaignsCreateRequestV2 Composed type representation for type AttributeRecommendationCampaignsCreateRequestV2
    */
    private ?AttributeRecommendationCampaignsCreateRequestV2 $attributeRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * @var CrossSellRecommendationCampaignsCreateRequestV2|null $crossSellRecommendationCampaignsCreateRequestV2 Composed type representation for type CrossSellRecommendationCampaignsCreateRequestV2
    */
    private ?CrossSellRecommendationCampaignsCreateRequestV2 $crossSellRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * @var ItemComparisonRecommendationCampaignsCreateRequestV2|null $itemComparisonRecommendationCampaignsCreateRequestV2 Composed type representation for type ItemComparisonRecommendationCampaignsCreateRequestV2
    */
    private ?ItemComparisonRecommendationCampaignsCreateRequestV2 $itemComparisonRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * @var LastViewedRecommendationCampaignsCreateRequestV2|null $lastViewedRecommendationCampaignsCreateRequestV2 Composed type representation for type LastViewedRecommendationCampaignsCreateRequestV2
    */
    private ?LastViewedRecommendationCampaignsCreateRequestV2 $lastViewedRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * @var MetricsRecommendationCampaignsCreateRequestV2|null $metricsRecommendationCampaignsCreateRequestV2 Composed type representation for type MetricsRecommendationCampaignsCreateRequestV2
    */
    private ?MetricsRecommendationCampaignsCreateRequestV2 $metricsRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * @var PersonalizedRecommendationCampaignsCreateRequestV2|null $personalizedRecommendationCampaignsCreateRequestV2 Composed type representation for type PersonalizedRecommendationCampaignsCreateRequestV2
    */
    private ?PersonalizedRecommendationCampaignsCreateRequestV2 $personalizedRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * @var RecentInteractionsRecommendationCampaignsCreateRequestV2|null $recentInteractionsRecommendationCampaignsCreateRequestV2 Composed type representation for type RecentInteractionsRecommendationCampaignsCreateRequestV2
    */
    private ?RecentInteractionsRecommendationCampaignsCreateRequestV2 $recentInteractionsRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * @var SectionRecommendationCampaignsCreateRequestV2|null $sectionRecommendationCampaignsCreateRequestV2 Composed type representation for type SectionRecommendationCampaignsCreateRequestV2
    */
    private ?SectionRecommendationCampaignsCreateRequestV2 $sectionRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * @var SetComplementRecommendationCampaignsCreateRequestV2|null $setComplementRecommendationCampaignsCreateRequestV2 Composed type representation for type SetComplementRecommendationCampaignsCreateRequestV2
    */
    private ?SetComplementRecommendationCampaignsCreateRequestV2 $setComplementRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * @var SimilarRecommendationCampaignsCreateRequestV2|null $similarRecommendationCampaignsCreateRequestV2 Composed type representation for type SimilarRecommendationCampaignsCreateRequestV2
    */
    private ?SimilarRecommendationCampaignsCreateRequestV2 $similarRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * @var VisuallySimilarRecommendationCampaignsCreateRequestV2|null $visuallySimilarRecommendationCampaignsCreateRequestV2 Composed type representation for type VisuallySimilarRecommendationCampaignsCreateRequestV2
    */
    private ?VisuallySimilarRecommendationCampaignsCreateRequestV2 $visuallySimilarRecommendationCampaignsCreateRequestV2 = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return CampaignsPostRequestBody
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): CampaignsPostRequestBody {
        $result = new CampaignsPostRequestBody();
        return $result;
    }

    /**
     * Gets the AttributeRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type AttributeRecommendationCampaignsCreateRequestV2
     * @return AttributeRecommendationCampaignsCreateRequestV2|null
    */
    public function getAttributeRecommendationCampaignsCreateRequestV2(): ?AttributeRecommendationCampaignsCreateRequestV2 {
        return $this->attributeRecommendationCampaignsCreateRequestV2;
    }

    /**
     * Gets the CrossSellRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type CrossSellRecommendationCampaignsCreateRequestV2
     * @return CrossSellRecommendationCampaignsCreateRequestV2|null
    */
    public function getCrossSellRecommendationCampaignsCreateRequestV2(): ?CrossSellRecommendationCampaignsCreateRequestV2 {
        return $this->crossSellRecommendationCampaignsCreateRequestV2;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getAttributeRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getAttributeRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        } else if ($this->getCrossSellRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getCrossSellRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        } else if ($this->getItemComparisonRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getItemComparisonRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        } else if ($this->getLastViewedRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getLastViewedRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        } else if ($this->getMetricsRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getMetricsRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        } else if ($this->getPersonalizedRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getPersonalizedRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        } else if ($this->getRecentInteractionsRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getRecentInteractionsRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        } else if ($this->getSectionRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getSectionRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        } else if ($this->getSetComplementRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getSetComplementRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        } else if ($this->getSimilarRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getSimilarRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        } else if ($this->getVisuallySimilarRecommendationCampaignsCreateRequestV2() !== null) {
            return $this->getVisuallySimilarRecommendationCampaignsCreateRequestV2()->getFieldDeserializers();
        }
        return [];
    }

    /**
     * Gets the ItemComparisonRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type ItemComparisonRecommendationCampaignsCreateRequestV2
     * @return ItemComparisonRecommendationCampaignsCreateRequestV2|null
    */
    public function getItemComparisonRecommendationCampaignsCreateRequestV2(): ?ItemComparisonRecommendationCampaignsCreateRequestV2 {
        return $this->itemComparisonRecommendationCampaignsCreateRequestV2;
    }

    /**
     * Gets the LastViewedRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type LastViewedRecommendationCampaignsCreateRequestV2
     * @return LastViewedRecommendationCampaignsCreateRequestV2|null
    */
    public function getLastViewedRecommendationCampaignsCreateRequestV2(): ?LastViewedRecommendationCampaignsCreateRequestV2 {
        return $this->lastViewedRecommendationCampaignsCreateRequestV2;
    }

    /**
     * Gets the MetricsRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type MetricsRecommendationCampaignsCreateRequestV2
     * @return MetricsRecommendationCampaignsCreateRequestV2|null
    */
    public function getMetricsRecommendationCampaignsCreateRequestV2(): ?MetricsRecommendationCampaignsCreateRequestV2 {
        return $this->metricsRecommendationCampaignsCreateRequestV2;
    }

    /**
     * Gets the PersonalizedRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type PersonalizedRecommendationCampaignsCreateRequestV2
     * @return PersonalizedRecommendationCampaignsCreateRequestV2|null
    */
    public function getPersonalizedRecommendationCampaignsCreateRequestV2(): ?PersonalizedRecommendationCampaignsCreateRequestV2 {
        return $this->personalizedRecommendationCampaignsCreateRequestV2;
    }

    /**
     * Gets the RecentInteractionsRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type RecentInteractionsRecommendationCampaignsCreateRequestV2
     * @return RecentInteractionsRecommendationCampaignsCreateRequestV2|null
    */
    public function getRecentInteractionsRecommendationCampaignsCreateRequestV2(): ?RecentInteractionsRecommendationCampaignsCreateRequestV2 {
        return $this->recentInteractionsRecommendationCampaignsCreateRequestV2;
    }

    /**
     * Gets the SectionRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type SectionRecommendationCampaignsCreateRequestV2
     * @return SectionRecommendationCampaignsCreateRequestV2|null
    */
    public function getSectionRecommendationCampaignsCreateRequestV2(): ?SectionRecommendationCampaignsCreateRequestV2 {
        return $this->sectionRecommendationCampaignsCreateRequestV2;
    }

    /**
     * Gets the SetComplementRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type SetComplementRecommendationCampaignsCreateRequestV2
     * @return SetComplementRecommendationCampaignsCreateRequestV2|null
    */
    public function getSetComplementRecommendationCampaignsCreateRequestV2(): ?SetComplementRecommendationCampaignsCreateRequestV2 {
        return $this->setComplementRecommendationCampaignsCreateRequestV2;
    }

    /**
     * Gets the SimilarRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type SimilarRecommendationCampaignsCreateRequestV2
     * @return SimilarRecommendationCampaignsCreateRequestV2|null
    */
    public function getSimilarRecommendationCampaignsCreateRequestV2(): ?SimilarRecommendationCampaignsCreateRequestV2 {
        return $this->similarRecommendationCampaignsCreateRequestV2;
    }

    /**
     * Gets the VisuallySimilarRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type VisuallySimilarRecommendationCampaignsCreateRequestV2
     * @return VisuallySimilarRecommendationCampaignsCreateRequestV2|null
    */
    public function getVisuallySimilarRecommendationCampaignsCreateRequestV2(): ?VisuallySimilarRecommendationCampaignsCreateRequestV2 {
        return $this->visuallySimilarRecommendationCampaignsCreateRequestV2;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        if ($this->getAttributeRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getAttributeRecommendationCampaignsCreateRequestV2());
        } else if ($this->getCrossSellRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getCrossSellRecommendationCampaignsCreateRequestV2());
        } else if ($this->getItemComparisonRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getItemComparisonRecommendationCampaignsCreateRequestV2());
        } else if ($this->getLastViewedRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getLastViewedRecommendationCampaignsCreateRequestV2());
        } else if ($this->getMetricsRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getMetricsRecommendationCampaignsCreateRequestV2());
        } else if ($this->getPersonalizedRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getPersonalizedRecommendationCampaignsCreateRequestV2());
        } else if ($this->getRecentInteractionsRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getRecentInteractionsRecommendationCampaignsCreateRequestV2());
        } else if ($this->getSectionRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getSectionRecommendationCampaignsCreateRequestV2());
        } else if ($this->getSetComplementRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getSetComplementRecommendationCampaignsCreateRequestV2());
        } else if ($this->getSimilarRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getSimilarRecommendationCampaignsCreateRequestV2());
        } else if ($this->getVisuallySimilarRecommendationCampaignsCreateRequestV2() !== null) {
            $writer->writeObjectValue(null, $this->getVisuallySimilarRecommendationCampaignsCreateRequestV2());
        }
    }

    /**
     * Sets the AttributeRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type AttributeRecommendationCampaignsCreateRequestV2
     * @param AttributeRecommendationCampaignsCreateRequestV2|null $value Value to set for the AttributeRecommendationCampaignsCreateRequestV2 property.
    */
    public function setAttributeRecommendationCampaignsCreateRequestV2(?AttributeRecommendationCampaignsCreateRequestV2 $value): void {
        $this->attributeRecommendationCampaignsCreateRequestV2 = $value;
    }

    /**
     * Sets the CrossSellRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type CrossSellRecommendationCampaignsCreateRequestV2
     * @param CrossSellRecommendationCampaignsCreateRequestV2|null $value Value to set for the CrossSellRecommendationCampaignsCreateRequestV2 property.
    */
    public function setCrossSellRecommendationCampaignsCreateRequestV2(?CrossSellRecommendationCampaignsCreateRequestV2 $value): void {
        $this->crossSellRecommendationCampaignsCreateRequestV2 = $value;
    }

    /**
     * Sets the ItemComparisonRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type ItemComparisonRecommendationCampaignsCreateRequestV2
     * @param ItemComparisonRecommendationCampaignsCreateRequestV2|null $value Value to set for the ItemComparisonRecommendationCampaignsCreateRequestV2 property.
    */
    public function setItemComparisonRecommendationCampaignsCreateRequestV2(?ItemComparisonRecommendationCampaignsCreateRequestV2 $value): void {
        $this->itemComparisonRecommendationCampaignsCreateRequestV2 = $value;
    }

    /**
     * Sets the LastViewedRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type LastViewedRecommendationCampaignsCreateRequestV2
     * @param LastViewedRecommendationCampaignsCreateRequestV2|null $value Value to set for the LastViewedRecommendationCampaignsCreateRequestV2 property.
    */
    public function setLastViewedRecommendationCampaignsCreateRequestV2(?LastViewedRecommendationCampaignsCreateRequestV2 $value): void {
        $this->lastViewedRecommendationCampaignsCreateRequestV2 = $value;
    }

    /**
     * Sets the MetricsRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type MetricsRecommendationCampaignsCreateRequestV2
     * @param MetricsRecommendationCampaignsCreateRequestV2|null $value Value to set for the MetricsRecommendationCampaignsCreateRequestV2 property.
    */
    public function setMetricsRecommendationCampaignsCreateRequestV2(?MetricsRecommendationCampaignsCreateRequestV2 $value): void {
        $this->metricsRecommendationCampaignsCreateRequestV2 = $value;
    }

    /**
     * Sets the PersonalizedRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type PersonalizedRecommendationCampaignsCreateRequestV2
     * @param PersonalizedRecommendationCampaignsCreateRequestV2|null $value Value to set for the PersonalizedRecommendationCampaignsCreateRequestV2 property.
    */
    public function setPersonalizedRecommendationCampaignsCreateRequestV2(?PersonalizedRecommendationCampaignsCreateRequestV2 $value): void {
        $this->personalizedRecommendationCampaignsCreateRequestV2 = $value;
    }

    /**
     * Sets the RecentInteractionsRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type RecentInteractionsRecommendationCampaignsCreateRequestV2
     * @param RecentInteractionsRecommendationCampaignsCreateRequestV2|null $value Value to set for the RecentInteractionsRecommendationCampaignsCreateRequestV2 property.
    */
    public function setRecentInteractionsRecommendationCampaignsCreateRequestV2(?RecentInteractionsRecommendationCampaignsCreateRequestV2 $value): void {
        $this->recentInteractionsRecommendationCampaignsCreateRequestV2 = $value;
    }

    /**
     * Sets the SectionRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type SectionRecommendationCampaignsCreateRequestV2
     * @param SectionRecommendationCampaignsCreateRequestV2|null $value Value to set for the SectionRecommendationCampaignsCreateRequestV2 property.
    */
    public function setSectionRecommendationCampaignsCreateRequestV2(?SectionRecommendationCampaignsCreateRequestV2 $value): void {
        $this->sectionRecommendationCampaignsCreateRequestV2 = $value;
    }

    /**
     * Sets the SetComplementRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type SetComplementRecommendationCampaignsCreateRequestV2
     * @param SetComplementRecommendationCampaignsCreateRequestV2|null $value Value to set for the SetComplementRecommendationCampaignsCreateRequestV2 property.
    */
    public function setSetComplementRecommendationCampaignsCreateRequestV2(?SetComplementRecommendationCampaignsCreateRequestV2 $value): void {
        $this->setComplementRecommendationCampaignsCreateRequestV2 = $value;
    }

    /**
     * Sets the SimilarRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type SimilarRecommendationCampaignsCreateRequestV2
     * @param SimilarRecommendationCampaignsCreateRequestV2|null $value Value to set for the SimilarRecommendationCampaignsCreateRequestV2 property.
    */
    public function setSimilarRecommendationCampaignsCreateRequestV2(?SimilarRecommendationCampaignsCreateRequestV2 $value): void {
        $this->similarRecommendationCampaignsCreateRequestV2 = $value;
    }

    /**
     * Sets the VisuallySimilarRecommendationCampaignsCreateRequestV2 property value. Composed type representation for type VisuallySimilarRecommendationCampaignsCreateRequestV2
     * @param VisuallySimilarRecommendationCampaignsCreateRequestV2|null $value Value to set for the VisuallySimilarRecommendationCampaignsCreateRequestV2 property.
    */
    public function setVisuallySimilarRecommendationCampaignsCreateRequestV2(?VisuallySimilarRecommendationCampaignsCreateRequestV2 $value): void {
        $this->visuallySimilarRecommendationCampaignsCreateRequestV2 = $value;
    }

}
