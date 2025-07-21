<?php

namespace Synerise\Api\RecommendationCampaigns\Recommendations\V2\Campaigns\Item\Copy;

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
use Synerise\Api\RecommendationCampaigns\Models\SectionRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\SetComplementRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\SimilarRecommendationCampaignsDefinitionV2;
use Synerise\Api\RecommendationCampaigns\Models\VisuallySimilarRecommendationCampaignsDefinitionV2;

/**
 * Composed type wrapper for classes AttributeRecommendationCampaignsDefinitionV2, CrossSellRecommendationCampaignsDefinitionV2, ItemComparisonRecommendationCampaignsDefinitionV2, LastViewedRecommendationCampaignsDefinitionV2, MetricsRecommendationCampaignsDefinitionV2, PersonalizedRecommendationCampaignsDefinitionV2, RecentInteractionsRecommendationCampaignsDefinitionV2, SectionRecommendationCampaignsDefinitionV2, SetComplementRecommendationCampaignsDefinitionV2, SimilarRecommendationCampaignsDefinitionV2, VisuallySimilarRecommendationCampaignsDefinitionV2
*/
class RecommendationCampaignDefinitionV2 implements ComposedTypeWrapper, Parsable 
{
    /**
     * @var AttributeRecommendationCampaignsDefinitionV2|null $attributeRecommendationCampaignsDefinitionV2 Composed type representation for type AttributeRecommendationCampaignsDefinitionV2
    */
    private ?AttributeRecommendationCampaignsDefinitionV2 $attributeRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * @var CrossSellRecommendationCampaignsDefinitionV2|null $crossSellRecommendationCampaignsDefinitionV2 Composed type representation for type CrossSellRecommendationCampaignsDefinitionV2
    */
    private ?CrossSellRecommendationCampaignsDefinitionV2 $crossSellRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * @var ItemComparisonRecommendationCampaignsDefinitionV2|null $itemComparisonRecommendationCampaignsDefinitionV2 Composed type representation for type ItemComparisonRecommendationCampaignsDefinitionV2
    */
    private ?ItemComparisonRecommendationCampaignsDefinitionV2 $itemComparisonRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * @var LastViewedRecommendationCampaignsDefinitionV2|null $lastViewedRecommendationCampaignsDefinitionV2 Composed type representation for type LastViewedRecommendationCampaignsDefinitionV2
    */
    private ?LastViewedRecommendationCampaignsDefinitionV2 $lastViewedRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * @var MetricsRecommendationCampaignsDefinitionV2|null $metricsRecommendationCampaignsDefinitionV2 Composed type representation for type MetricsRecommendationCampaignsDefinitionV2
    */
    private ?MetricsRecommendationCampaignsDefinitionV2 $metricsRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * @var PersonalizedRecommendationCampaignsDefinitionV2|null $personalizedRecommendationCampaignsDefinitionV2 Composed type representation for type PersonalizedRecommendationCampaignsDefinitionV2
    */
    private ?PersonalizedRecommendationCampaignsDefinitionV2 $personalizedRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * @var RecentInteractionsRecommendationCampaignsDefinitionV2|null $recentInteractionsRecommendationCampaignsDefinitionV2 Composed type representation for type RecentInteractionsRecommendationCampaignsDefinitionV2
    */
    private ?RecentInteractionsRecommendationCampaignsDefinitionV2 $recentInteractionsRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * @var SectionRecommendationCampaignsDefinitionV2|null $sectionRecommendationCampaignsDefinitionV2 Composed type representation for type SectionRecommendationCampaignsDefinitionV2
    */
    private ?SectionRecommendationCampaignsDefinitionV2 $sectionRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * @var SetComplementRecommendationCampaignsDefinitionV2|null $setComplementRecommendationCampaignsDefinitionV2 Composed type representation for type SetComplementRecommendationCampaignsDefinitionV2
    */
    private ?SetComplementRecommendationCampaignsDefinitionV2 $setComplementRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * @var SimilarRecommendationCampaignsDefinitionV2|null $similarRecommendationCampaignsDefinitionV2 Composed type representation for type SimilarRecommendationCampaignsDefinitionV2
    */
    private ?SimilarRecommendationCampaignsDefinitionV2 $similarRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * @var VisuallySimilarRecommendationCampaignsDefinitionV2|null $visuallySimilarRecommendationCampaignsDefinitionV2 Composed type representation for type VisuallySimilarRecommendationCampaignsDefinitionV2
    */
    private ?VisuallySimilarRecommendationCampaignsDefinitionV2 $visuallySimilarRecommendationCampaignsDefinitionV2 = null;
    
    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecommendationCampaignDefinitionV2
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecommendationCampaignDefinitionV2 {
        $result = new RecommendationCampaignDefinitionV2();
        $mappingValueNode = $parseNode->getChildNode("type");
        if ($mappingValueNode !== null) {
            $mappingValue = $mappingValueNode->getStringValue();
            if ('attribute' === $mappingValue) {
                $result->setAttributeRecommendationCampaignsDefinitionV2(new AttributeRecommendationCampaignsDefinitionV2());
            } else if ('cross-sell' === $mappingValue) {
                $result->setCrossSellRecommendationCampaignsDefinitionV2(new CrossSellRecommendationCampaignsDefinitionV2());
            } else if ('item-comparison' === $mappingValue) {
                $result->setItemComparisonRecommendationCampaignsDefinitionV2(new ItemComparisonRecommendationCampaignsDefinitionV2());
            } else if ('last-viewed' === $mappingValue) {
                $result->setLastViewedRecommendationCampaignsDefinitionV2(new LastViewedRecommendationCampaignsDefinitionV2());
            } else if ('metrics' === $mappingValue) {
                $result->setMetricsRecommendationCampaignsDefinitionV2(new MetricsRecommendationCampaignsDefinitionV2());
            } else if ('personalized' === $mappingValue) {
                $result->setPersonalizedRecommendationCampaignsDefinitionV2(new PersonalizedRecommendationCampaignsDefinitionV2());
            } else if ('recent-interactions' === $mappingValue) {
                $result->setRecentInteractionsRecommendationCampaignsDefinitionV2(new RecentInteractionsRecommendationCampaignsDefinitionV2());
            } else if ('section' === $mappingValue) {
                $result->setSectionRecommendationCampaignsDefinitionV2(new SectionRecommendationCampaignsDefinitionV2());
            } else if ('set-complement' === $mappingValue) {
                $result->setSetComplementRecommendationCampaignsDefinitionV2(new SetComplementRecommendationCampaignsDefinitionV2());
            } else if ('similar' === $mappingValue) {
                $result->setSimilarRecommendationCampaignsDefinitionV2(new SimilarRecommendationCampaignsDefinitionV2());
            } else if ('visually-similar' === $mappingValue) {
                $result->setVisuallySimilarRecommendationCampaignsDefinitionV2(new VisuallySimilarRecommendationCampaignsDefinitionV2());
            }
        }
        return $result;
    }

    /**
     * Gets the AttributeRecommendationCampaignsDefinitionV2 property value. Composed type representation for type AttributeRecommendationCampaignsDefinitionV2
     * @return AttributeRecommendationCampaignsDefinitionV2|null
    */
    public function getAttributeRecommendationCampaignsDefinitionV2(): ?AttributeRecommendationCampaignsDefinitionV2 {
        return $this->attributeRecommendationCampaignsDefinitionV2;
    }

    /**
     * Gets the CrossSellRecommendationCampaignsDefinitionV2 property value. Composed type representation for type CrossSellRecommendationCampaignsDefinitionV2
     * @return CrossSellRecommendationCampaignsDefinitionV2|null
    */
    public function getCrossSellRecommendationCampaignsDefinitionV2(): ?CrossSellRecommendationCampaignsDefinitionV2 {
        return $this->crossSellRecommendationCampaignsDefinitionV2;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        if ($this->getAttributeRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getAttributeRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        } else if ($this->getCrossSellRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getCrossSellRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        } else if ($this->getItemComparisonRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getItemComparisonRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        } else if ($this->getLastViewedRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getLastViewedRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        } else if ($this->getMetricsRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getMetricsRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        } else if ($this->getPersonalizedRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getPersonalizedRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        } else if ($this->getRecentInteractionsRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getRecentInteractionsRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        } else if ($this->getSectionRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getSectionRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        } else if ($this->getSetComplementRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getSetComplementRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        } else if ($this->getSimilarRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getSimilarRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        } else if ($this->getVisuallySimilarRecommendationCampaignsDefinitionV2() !== null) {
            return $this->getVisuallySimilarRecommendationCampaignsDefinitionV2()->getFieldDeserializers();
        }
        return [];
    }

    /**
     * Gets the ItemComparisonRecommendationCampaignsDefinitionV2 property value. Composed type representation for type ItemComparisonRecommendationCampaignsDefinitionV2
     * @return ItemComparisonRecommendationCampaignsDefinitionV2|null
    */
    public function getItemComparisonRecommendationCampaignsDefinitionV2(): ?ItemComparisonRecommendationCampaignsDefinitionV2 {
        return $this->itemComparisonRecommendationCampaignsDefinitionV2;
    }

    /**
     * Gets the LastViewedRecommendationCampaignsDefinitionV2 property value. Composed type representation for type LastViewedRecommendationCampaignsDefinitionV2
     * @return LastViewedRecommendationCampaignsDefinitionV2|null
    */
    public function getLastViewedRecommendationCampaignsDefinitionV2(): ?LastViewedRecommendationCampaignsDefinitionV2 {
        return $this->lastViewedRecommendationCampaignsDefinitionV2;
    }

    /**
     * Gets the MetricsRecommendationCampaignsDefinitionV2 property value. Composed type representation for type MetricsRecommendationCampaignsDefinitionV2
     * @return MetricsRecommendationCampaignsDefinitionV2|null
    */
    public function getMetricsRecommendationCampaignsDefinitionV2(): ?MetricsRecommendationCampaignsDefinitionV2 {
        return $this->metricsRecommendationCampaignsDefinitionV2;
    }

    /**
     * Gets the PersonalizedRecommendationCampaignsDefinitionV2 property value. Composed type representation for type PersonalizedRecommendationCampaignsDefinitionV2
     * @return PersonalizedRecommendationCampaignsDefinitionV2|null
    */
    public function getPersonalizedRecommendationCampaignsDefinitionV2(): ?PersonalizedRecommendationCampaignsDefinitionV2 {
        return $this->personalizedRecommendationCampaignsDefinitionV2;
    }

    /**
     * Gets the RecentInteractionsRecommendationCampaignsDefinitionV2 property value. Composed type representation for type RecentInteractionsRecommendationCampaignsDefinitionV2
     * @return RecentInteractionsRecommendationCampaignsDefinitionV2|null
    */
    public function getRecentInteractionsRecommendationCampaignsDefinitionV2(): ?RecentInteractionsRecommendationCampaignsDefinitionV2 {
        return $this->recentInteractionsRecommendationCampaignsDefinitionV2;
    }

    /**
     * Gets the SectionRecommendationCampaignsDefinitionV2 property value. Composed type representation for type SectionRecommendationCampaignsDefinitionV2
     * @return SectionRecommendationCampaignsDefinitionV2|null
    */
    public function getSectionRecommendationCampaignsDefinitionV2(): ?SectionRecommendationCampaignsDefinitionV2 {
        return $this->sectionRecommendationCampaignsDefinitionV2;
    }

    /**
     * Gets the SetComplementRecommendationCampaignsDefinitionV2 property value. Composed type representation for type SetComplementRecommendationCampaignsDefinitionV2
     * @return SetComplementRecommendationCampaignsDefinitionV2|null
    */
    public function getSetComplementRecommendationCampaignsDefinitionV2(): ?SetComplementRecommendationCampaignsDefinitionV2 {
        return $this->setComplementRecommendationCampaignsDefinitionV2;
    }

    /**
     * Gets the SimilarRecommendationCampaignsDefinitionV2 property value. Composed type representation for type SimilarRecommendationCampaignsDefinitionV2
     * @return SimilarRecommendationCampaignsDefinitionV2|null
    */
    public function getSimilarRecommendationCampaignsDefinitionV2(): ?SimilarRecommendationCampaignsDefinitionV2 {
        return $this->similarRecommendationCampaignsDefinitionV2;
    }

    /**
     * Gets the VisuallySimilarRecommendationCampaignsDefinitionV2 property value. Composed type representation for type VisuallySimilarRecommendationCampaignsDefinitionV2
     * @return VisuallySimilarRecommendationCampaignsDefinitionV2|null
    */
    public function getVisuallySimilarRecommendationCampaignsDefinitionV2(): ?VisuallySimilarRecommendationCampaignsDefinitionV2 {
        return $this->visuallySimilarRecommendationCampaignsDefinitionV2;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        if ($this->getAttributeRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getAttributeRecommendationCampaignsDefinitionV2());
        } else if ($this->getCrossSellRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getCrossSellRecommendationCampaignsDefinitionV2());
        } else if ($this->getItemComparisonRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getItemComparisonRecommendationCampaignsDefinitionV2());
        } else if ($this->getLastViewedRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getLastViewedRecommendationCampaignsDefinitionV2());
        } else if ($this->getMetricsRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getMetricsRecommendationCampaignsDefinitionV2());
        } else if ($this->getPersonalizedRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getPersonalizedRecommendationCampaignsDefinitionV2());
        } else if ($this->getRecentInteractionsRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getRecentInteractionsRecommendationCampaignsDefinitionV2());
        } else if ($this->getSectionRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getSectionRecommendationCampaignsDefinitionV2());
        } else if ($this->getSetComplementRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getSetComplementRecommendationCampaignsDefinitionV2());
        } else if ($this->getSimilarRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getSimilarRecommendationCampaignsDefinitionV2());
        } else if ($this->getVisuallySimilarRecommendationCampaignsDefinitionV2() !== null) {
            $writer->writeObjectValue(null, $this->getVisuallySimilarRecommendationCampaignsDefinitionV2());
        }
    }

    /**
     * Sets the AttributeRecommendationCampaignsDefinitionV2 property value. Composed type representation for type AttributeRecommendationCampaignsDefinitionV2
     * @param AttributeRecommendationCampaignsDefinitionV2|null $value Value to set for the AttributeRecommendationCampaignsDefinitionV2 property.
    */
    public function setAttributeRecommendationCampaignsDefinitionV2(?AttributeRecommendationCampaignsDefinitionV2 $value): void {
        $this->attributeRecommendationCampaignsDefinitionV2 = $value;
    }

    /**
     * Sets the CrossSellRecommendationCampaignsDefinitionV2 property value. Composed type representation for type CrossSellRecommendationCampaignsDefinitionV2
     * @param CrossSellRecommendationCampaignsDefinitionV2|null $value Value to set for the CrossSellRecommendationCampaignsDefinitionV2 property.
    */
    public function setCrossSellRecommendationCampaignsDefinitionV2(?CrossSellRecommendationCampaignsDefinitionV2 $value): void {
        $this->crossSellRecommendationCampaignsDefinitionV2 = $value;
    }

    /**
     * Sets the ItemComparisonRecommendationCampaignsDefinitionV2 property value. Composed type representation for type ItemComparisonRecommendationCampaignsDefinitionV2
     * @param ItemComparisonRecommendationCampaignsDefinitionV2|null $value Value to set for the ItemComparisonRecommendationCampaignsDefinitionV2 property.
    */
    public function setItemComparisonRecommendationCampaignsDefinitionV2(?ItemComparisonRecommendationCampaignsDefinitionV2 $value): void {
        $this->itemComparisonRecommendationCampaignsDefinitionV2 = $value;
    }

    /**
     * Sets the LastViewedRecommendationCampaignsDefinitionV2 property value. Composed type representation for type LastViewedRecommendationCampaignsDefinitionV2
     * @param LastViewedRecommendationCampaignsDefinitionV2|null $value Value to set for the LastViewedRecommendationCampaignsDefinitionV2 property.
    */
    public function setLastViewedRecommendationCampaignsDefinitionV2(?LastViewedRecommendationCampaignsDefinitionV2 $value): void {
        $this->lastViewedRecommendationCampaignsDefinitionV2 = $value;
    }

    /**
     * Sets the MetricsRecommendationCampaignsDefinitionV2 property value. Composed type representation for type MetricsRecommendationCampaignsDefinitionV2
     * @param MetricsRecommendationCampaignsDefinitionV2|null $value Value to set for the MetricsRecommendationCampaignsDefinitionV2 property.
    */
    public function setMetricsRecommendationCampaignsDefinitionV2(?MetricsRecommendationCampaignsDefinitionV2 $value): void {
        $this->metricsRecommendationCampaignsDefinitionV2 = $value;
    }

    /**
     * Sets the PersonalizedRecommendationCampaignsDefinitionV2 property value. Composed type representation for type PersonalizedRecommendationCampaignsDefinitionV2
     * @param PersonalizedRecommendationCampaignsDefinitionV2|null $value Value to set for the PersonalizedRecommendationCampaignsDefinitionV2 property.
    */
    public function setPersonalizedRecommendationCampaignsDefinitionV2(?PersonalizedRecommendationCampaignsDefinitionV2 $value): void {
        $this->personalizedRecommendationCampaignsDefinitionV2 = $value;
    }

    /**
     * Sets the RecentInteractionsRecommendationCampaignsDefinitionV2 property value. Composed type representation for type RecentInteractionsRecommendationCampaignsDefinitionV2
     * @param RecentInteractionsRecommendationCampaignsDefinitionV2|null $value Value to set for the RecentInteractionsRecommendationCampaignsDefinitionV2 property.
    */
    public function setRecentInteractionsRecommendationCampaignsDefinitionV2(?RecentInteractionsRecommendationCampaignsDefinitionV2 $value): void {
        $this->recentInteractionsRecommendationCampaignsDefinitionV2 = $value;
    }

    /**
     * Sets the SectionRecommendationCampaignsDefinitionV2 property value. Composed type representation for type SectionRecommendationCampaignsDefinitionV2
     * @param SectionRecommendationCampaignsDefinitionV2|null $value Value to set for the SectionRecommendationCampaignsDefinitionV2 property.
    */
    public function setSectionRecommendationCampaignsDefinitionV2(?SectionRecommendationCampaignsDefinitionV2 $value): void {
        $this->sectionRecommendationCampaignsDefinitionV2 = $value;
    }

    /**
     * Sets the SetComplementRecommendationCampaignsDefinitionV2 property value. Composed type representation for type SetComplementRecommendationCampaignsDefinitionV2
     * @param SetComplementRecommendationCampaignsDefinitionV2|null $value Value to set for the SetComplementRecommendationCampaignsDefinitionV2 property.
    */
    public function setSetComplementRecommendationCampaignsDefinitionV2(?SetComplementRecommendationCampaignsDefinitionV2 $value): void {
        $this->setComplementRecommendationCampaignsDefinitionV2 = $value;
    }

    /**
     * Sets the SimilarRecommendationCampaignsDefinitionV2 property value. Composed type representation for type SimilarRecommendationCampaignsDefinitionV2
     * @param SimilarRecommendationCampaignsDefinitionV2|null $value Value to set for the SimilarRecommendationCampaignsDefinitionV2 property.
    */
    public function setSimilarRecommendationCampaignsDefinitionV2(?SimilarRecommendationCampaignsDefinitionV2 $value): void {
        $this->similarRecommendationCampaignsDefinitionV2 = $value;
    }

    /**
     * Sets the VisuallySimilarRecommendationCampaignsDefinitionV2 property value. Composed type representation for type VisuallySimilarRecommendationCampaignsDefinitionV2
     * @param VisuallySimilarRecommendationCampaignsDefinitionV2|null $value Value to set for the VisuallySimilarRecommendationCampaignsDefinitionV2 property.
    */
    public function setVisuallySimilarRecommendationCampaignsDefinitionV2(?VisuallySimilarRecommendationCampaignsDefinitionV2 $value): void {
        $this->visuallySimilarRecommendationCampaignsDefinitionV2 = $value;
    }

}
