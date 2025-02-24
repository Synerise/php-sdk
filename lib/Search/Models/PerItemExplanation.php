<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class PerItemExplanation implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var ExtendedScores|null $extendedScoreFactors Extended score factors. Only included if it is possible to gather them.
    */
    private ?ExtendedScores $extendedScoreFactors = null;
    
    /**
     * @var bool|null $matchedElasticFilter Indicates if the item was matched by an elastic filter.
    */
    private ?bool $matchedElasticFilter = null;
    
    /**
     * @var float|null $score Final score.
    */
    private ?float $score = null;
    
    /**
     * @var ScoreFactors|null $scoreFactors The scoreFactors property
    */
    private ?ScoreFactors $scoreFactors = null;
    
    /**
     * @var PerItemExplanation_sortValue|null $sortValue Value used to sort the items, if applicable.
    */
    private ?PerItemExplanation_sortValue $sortValue = null;
    
    /**
     * Instantiates a new PerItemExplanation and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return PerItemExplanation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): PerItemExplanation {
        return new PerItemExplanation();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the extendedScoreFactors property value. Extended score factors. Only included if it is possible to gather them.
     * @return ExtendedScores|null
    */
    public function getExtendedScoreFactors(): ?ExtendedScores {
        return $this->extendedScoreFactors;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'extendedScoreFactors' => fn(ParseNode $n) => $o->setExtendedScoreFactors($n->getObjectValue([ExtendedScores::class, 'createFromDiscriminatorValue'])),
            'matchedElasticFilter' => fn(ParseNode $n) => $o->setMatchedElasticFilter($n->getBooleanValue()),
            'score' => fn(ParseNode $n) => $o->setScore($n->getFloatValue()),
            'scoreFactors' => fn(ParseNode $n) => $o->setScoreFactors($n->getObjectValue([ScoreFactors::class, 'createFromDiscriminatorValue'])),
            'sortValue' => fn(ParseNode $n) => $o->setSortValue($n->getObjectValue([PerItemExplanation_sortValue::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the matchedElasticFilter property value. Indicates if the item was matched by an elastic filter.
     * @return bool|null
    */
    public function getMatchedElasticFilter(): ?bool {
        return $this->matchedElasticFilter;
    }

    /**
     * Gets the score property value. Final score.
     * @return float|null
    */
    public function getScore(): ?float {
        return $this->score;
    }

    /**
     * Gets the scoreFactors property value. The scoreFactors property
     * @return ScoreFactors|null
    */
    public function getScoreFactors(): ?ScoreFactors {
        return $this->scoreFactors;
    }

    /**
     * Gets the sortValue property value. Value used to sort the items, if applicable.
     * @return PerItemExplanation_sortValue|null
    */
    public function getSortValue(): ?PerItemExplanation_sortValue {
        return $this->sortValue;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('extendedScoreFactors', $this->getExtendedScoreFactors());
        $writer->writeBooleanValue('matchedElasticFilter', $this->getMatchedElasticFilter());
        $writer->writeFloatValue('score', $this->getScore());
        $writer->writeObjectValue('scoreFactors', $this->getScoreFactors());
        $writer->writeObjectValue('sortValue', $this->getSortValue());
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
     * Sets the extendedScoreFactors property value. Extended score factors. Only included if it is possible to gather them.
     * @param ExtendedScores|null $value Value to set for the extendedScoreFactors property.
    */
    public function setExtendedScoreFactors(?ExtendedScores $value): void {
        $this->extendedScoreFactors = $value;
    }

    /**
     * Sets the matchedElasticFilter property value. Indicates if the item was matched by an elastic filter.
     * @param bool|null $value Value to set for the matchedElasticFilter property.
    */
    public function setMatchedElasticFilter(?bool $value): void {
        $this->matchedElasticFilter = $value;
    }

    /**
     * Sets the score property value. Final score.
     * @param float|null $value Value to set for the score property.
    */
    public function setScore(?float $value): void {
        $this->score = $value;
    }

    /**
     * Sets the scoreFactors property value. The scoreFactors property
     * @param ScoreFactors|null $value Value to set for the scoreFactors property.
    */
    public function setScoreFactors(?ScoreFactors $value): void {
        $this->scoreFactors = $value;
    }

    /**
     * Sets the sortValue property value. Value used to sort the items, if applicable.
     * @param PerItemExplanation_sortValue|null $value Value to set for the sortValue property.
    */
    public function setSortValue(?PerItemExplanation_sortValue $value): void {
        $this->sortValue = $value;
    }

}
