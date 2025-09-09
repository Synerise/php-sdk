<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class WithMetricsRecommendationsCampaignParameters extends BaseRecommendationsCampaignParameters implements Parsable 
{
    /**
     * @var string|null $boostMetric ID of the metric to boost the results by. Metric scores will be combined with recommendation scores, favoring the best-performing results.
    */
    private ?string $boostMetric = null;
    
    /**
     * @var float|null $boostMetricStrength How much influence the `boostMetric` has. Values less than 0 allow you to demote items that have high metric score, values greater than 0 allow you to promote items that have high metric score. A strength with a value of 0 does not change the scoring.
    */
    private ?float $boostMetricStrength = null;
    
    /**
     * @var int|null $shuffleNumItems When this parameter is provided, this many best item recommendations are provided. A number of them, no more than the value of `itemMax`, are chosen randomly for recommendation.
    */
    private ?int $shuffleNumItems = null;
    
    /**
     * @var string|null $sortMetric ID of the metric to sort the results by.
    */
    private ?string $sortMetric = null;
    
    /**
     * Instantiates a new WithMetricsRecommendationsCampaignParameters and sets the default values.
    */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return WithMetricsRecommendationsCampaignParameters
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): WithMetricsRecommendationsCampaignParameters {
        return new WithMetricsRecommendationsCampaignParameters();
    }

    /**
     * Gets the boostMetric property value. ID of the metric to boost the results by. Metric scores will be combined with recommendation scores, favoring the best-performing results.
     * @return string|null
    */
    public function getBoostMetric(): ?string {
        return $this->boostMetric;
    }

    /**
     * Gets the boostMetricStrength property value. How much influence the `boostMetric` has. Values less than 0 allow you to demote items that have high metric score, values greater than 0 allow you to promote items that have high metric score. A strength with a value of 0 does not change the scoring.
     * @return float|null
    */
    public function getBoostMetricStrength(): ?float {
        return $this->boostMetricStrength;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return array_merge(parent::getFieldDeserializers(), [
            'boostMetric' => fn(ParseNode $n) => $o->setBoostMetric($n->getStringValue()),
            'boostMetricStrength' => fn(ParseNode $n) => $o->setBoostMetricStrength($n->getFloatValue()),
            'shuffleNumItems' => fn(ParseNode $n) => $o->setShuffleNumItems($n->getIntegerValue()),
            'sortMetric' => fn(ParseNode $n) => $o->setSortMetric($n->getStringValue()),
        ]);
    }

    /**
     * Gets the shuffleNumItems property value. When this parameter is provided, this many best item recommendations are provided. A number of them, no more than the value of `itemMax`, are chosen randomly for recommendation.
     * @return int|null
    */
    public function getShuffleNumItems(): ?int {
        return $this->shuffleNumItems;
    }

    /**
     * Gets the sortMetric property value. ID of the metric to sort the results by.
     * @return string|null
    */
    public function getSortMetric(): ?string {
        return $this->sortMetric;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        parent::serialize($writer);
        $writer->writeStringValue('boostMetric', $this->getBoostMetric());
        $writer->writeFloatValue('boostMetricStrength', $this->getBoostMetricStrength());
        $writer->writeIntegerValue('shuffleNumItems', $this->getShuffleNumItems());
        $writer->writeStringValue('sortMetric', $this->getSortMetric());
    }

    /**
     * Sets the boostMetric property value. ID of the metric to boost the results by. Metric scores will be combined with recommendation scores, favoring the best-performing results.
     * @param string|null $value Value to set for the boostMetric property.
    */
    public function setBoostMetric(?string $value): void {
        $this->boostMetric = $value;
    }

    /**
     * Sets the boostMetricStrength property value. How much influence the `boostMetric` has. Values less than 0 allow you to demote items that have high metric score, values greater than 0 allow you to promote items that have high metric score. A strength with a value of 0 does not change the scoring.
     * @param float|null $value Value to set for the boostMetricStrength property.
    */
    public function setBoostMetricStrength(?float $value): void {
        $this->boostMetricStrength = $value;
    }

    /**
     * Sets the shuffleNumItems property value. When this parameter is provided, this many best item recommendations are provided. A number of them, no more than the value of `itemMax`, are chosen randomly for recommendation.
     * @param int|null $value Value to set for the shuffleNumItems property.
    */
    public function setShuffleNumItems(?int $value): void {
        $this->shuffleNumItems = $value;
    }

    /**
     * Sets the sortMetric property value. ID of the metric to sort the results by.
     * @param string|null $value Value to set for the sortMetric property.
    */
    public function setSortMetric(?string $value): void {
        $this->sortMetric = $value;
    }

}
