<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class SetComplementRecommendationsCampaignParameters extends BaseRecommendationsCampaignParameters implements Parsable 
{
    /**
     * @var int|null $itemSimilarity Similarity between items in the cart and the recommended items. Higher values decrease the similarity.
    */
    private ?int $itemSimilarity = null;
    
    /**
     * @var float|null $personalizedBoostingStrength How much influence the personalized scoring has. Greater values allow you to promote items that have high personalized score. A strength with a value of 0 does not change the scoring.
    */
    private ?float $personalizedBoostingStrength = null;
    
    /**
     * @var float|null $recommendationVariety Similarity between recommended items - higher values will result in more variety within the recommended item set.
    */
    private ?float $recommendationVariety = null;
    
    /**
     * Instantiates a new SetComplementRecommendationsCampaignParameters and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return SetComplementRecommendationsCampaignParameters
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): SetComplementRecommendationsCampaignParameters {
        return new SetComplementRecommendationsCampaignParameters();
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'itemSimilarity' => fn(ParseNode $n) => $o->setItemSimilarity($n->getIntegerValue()),
            'personalizedBoostingStrength' => fn(ParseNode $n) => $o->setPersonalizedBoostingStrength($n->getFloatValue()),
            'recommendationVariety' => fn(ParseNode $n) => $o->setRecommendationVariety($n->getFloatValue()),
        ]);
    }

    /**
     * Gets the itemSimilarity property value. Similarity between items in the cart and the recommended items. Higher values decrease the similarity.
     * @return int|null
    */
    public function getItemSimilarity(): ?int {
        return $this->itemSimilarity;
    }

    /**
     * Gets the personalizedBoostingStrength property value. How much influence the personalized scoring has. Greater values allow you to promote items that have high personalized score. A strength with a value of 0 does not change the scoring.
     * @return float|null
    */
    public function getPersonalizedBoostingStrength(): ?float {
        return $this->personalizedBoostingStrength;
    }

    /**
     * Gets the recommendationVariety property value. Similarity between recommended items - higher values will result in more variety within the recommended item set.
     * @return float|null
    */
    public function getRecommendationVariety(): ?float {
        return $this->recommendationVariety;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeIntegerValue('itemSimilarity', $this->getItemSimilarity());
        $writer->writeFloatValue('personalizedBoostingStrength', $this->getPersonalizedBoostingStrength());
        $writer->writeFloatValue('recommendationVariety', $this->getRecommendationVariety());
    }

    /**
     * Sets the itemSimilarity property value. Similarity between items in the cart and the recommended items. Higher values decrease the similarity.
     * @param int|null $value Value to set for the itemSimilarity property.
    */
    public function setItemSimilarity(?int $value): void {
        $this->itemSimilarity = $value;
    }

    /**
     * Sets the personalizedBoostingStrength property value. How much influence the personalized scoring has. Greater values allow you to promote items that have high personalized score. A strength with a value of 0 does not change the scoring.
     * @param float|null $value Value to set for the personalizedBoostingStrength property.
    */
    public function setPersonalizedBoostingStrength(?float $value): void {
        $this->personalizedBoostingStrength = $value;
    }

    /**
     * Sets the recommendationVariety property value. Similarity between recommended items - higher values will result in more variety within the recommended item set.
     * @param float|null $value Value to set for the recommendationVariety property.
    */
    public function setRecommendationVariety(?float $value): void {
        $this->recommendationVariety = $value;
    }

}
