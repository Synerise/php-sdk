<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Explanation for performed search.
*/
class Explanation implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var bool|null $personalized Indicates whether the search results were personalized.
    */
    private ?bool $personalized = null;
    
    /**
     * @var int|null $promotedItemsCount Promoted items count.
    */
    private ?int $promotedItemsCount = null;
    
    /**
     * @var FinalQuery|null $query The query property
    */
    private ?FinalQuery $query = null;
    
    /**
     * @var RulesConsequencesExplanation|null $rulesConsequences Applied rules consequences.
    */
    private ?RulesConsequencesExplanation $rulesConsequences = null;
    
    /**
     * @var Explanation_sortDetails|null $sortDetails Applied sorting details.
    */
    private ?Explanation_sortDetails $sortDetails = null;
    
    /**
     * Instantiates a new Explanation and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Explanation
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Explanation {
        return new Explanation();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'personalized' => fn(ParseNode $n) => $o->setPersonalized($n->getBooleanValue()),
            'promotedItemsCount' => fn(ParseNode $n) => $o->setPromotedItemsCount($n->getIntegerValue()),
            'query' => fn(ParseNode $n) => $o->setQuery($n->getObjectValue([FinalQuery::class, 'createFromDiscriminatorValue'])),
            'rulesConsequences' => fn(ParseNode $n) => $o->setRulesConsequences($n->getObjectValue([RulesConsequencesExplanation::class, 'createFromDiscriminatorValue'])),
            'sortDetails' => fn(ParseNode $n) => $o->setSortDetails($n->getObjectValue([Explanation_sortDetails::class, 'createFromDiscriminatorValue'])),
        ];
    }

    /**
     * Gets the personalized property value. Indicates whether the search results were personalized.
     * @return bool|null
    */
    public function getPersonalized(): ?bool {
        return $this->personalized;
    }

    /**
     * Gets the promotedItemsCount property value. Promoted items count.
     * @return int|null
    */
    public function getPromotedItemsCount(): ?int {
        return $this->promotedItemsCount;
    }

    /**
     * Gets the query property value. The query property
     * @return FinalQuery|null
    */
    public function getQuery(): ?FinalQuery {
        return $this->query;
    }

    /**
     * Gets the rulesConsequences property value. Applied rules consequences.
     * @return RulesConsequencesExplanation|null
    */
    public function getRulesConsequences(): ?RulesConsequencesExplanation {
        return $this->rulesConsequences;
    }

    /**
     * Gets the sortDetails property value. Applied sorting details.
     * @return Explanation_sortDetails|null
    */
    public function getSortDetails(): ?Explanation_sortDetails {
        return $this->sortDetails;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeBooleanValue('personalized', $this->getPersonalized());
        $writer->writeIntegerValue('promotedItemsCount', $this->getPromotedItemsCount());
        $writer->writeObjectValue('query', $this->getQuery());
        $writer->writeObjectValue('rulesConsequences', $this->getRulesConsequences());
        $writer->writeObjectValue('sortDetails', $this->getSortDetails());
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
     * Sets the personalized property value. Indicates whether the search results were personalized.
     * @param bool|null $value Value to set for the personalized property.
    */
    public function setPersonalized(?bool $value): void {
        $this->personalized = $value;
    }

    /**
     * Sets the promotedItemsCount property value. Promoted items count.
     * @param int|null $value Value to set for the promotedItemsCount property.
    */
    public function setPromotedItemsCount(?int $value): void {
        $this->promotedItemsCount = $value;
    }

    /**
     * Sets the query property value. The query property
     * @param FinalQuery|null $value Value to set for the query property.
    */
    public function setQuery(?FinalQuery $value): void {
        $this->query = $value;
    }

    /**
     * Sets the rulesConsequences property value. Applied rules consequences.
     * @param RulesConsequencesExplanation|null $value Value to set for the rulesConsequences property.
    */
    public function setRulesConsequences(?RulesConsequencesExplanation $value): void {
        $this->rulesConsequences = $value;
    }

    /**
     * Sets the sortDetails property value. Applied sorting details.
     * @param Explanation_sortDetails|null $value Value to set for the sortDetails property.
    */
    public function setSortDetails(?Explanation_sortDetails $value): void {
        $this->sortDetails = $value;
    }

}
