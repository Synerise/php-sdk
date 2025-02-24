<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Item scoring settings that affect the presentation order of the results.`0` means the lowest importance of a parameter, `1` is the highest importance.
*/
class ScoringSchema implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var FallbackMatching|null $fallbackMatching Backup matching mode used in cases where the main matching mode(specified in `matching` parameter) does not provide enough results (at least 5)
    */
    private ?FallbackMatching $fallbackMatching = null;
    
    /**
     * @var Matching|null $matching Controls how many clauses should be present in query
    */
    private ?Matching $matching = null;
    
    /**
     * @var float|null $pageVisitsPopularity The importance of how often the item page is visited
    */
    private ?float $pageVisitsPopularity = null;
    
    /**
     * @var float|null $personalized The importance of how relevant a item is to a profile according to the AI model
    */
    private ?float $personalized = null;
    
    /**
     * @var Similarity|null $similarity Defines how matching documents are scored
    */
    private ?Similarity $similarity = null;
    
    /**
     * @var float|null $tieBreaker The importance of lesser phrase matches
    */
    private ?float $tieBreaker = null;
    
    /**
     * @var float|null $transactionsPopularity The importance of how often the item is included in transactions
    */
    private ?float $transactionsPopularity = null;
    
    /**
     * Instantiates a new ScoringSchema and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ScoringSchema
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ScoringSchema {
        return new ScoringSchema();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the fallbackMatching property value. Backup matching mode used in cases where the main matching mode(specified in `matching` parameter) does not provide enough results (at least 5)
     * @return FallbackMatching|null
    */
    public function getFallbackMatching(): ?FallbackMatching {
        return $this->fallbackMatching;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'fallbackMatching' => fn(ParseNode $n) => $o->setFallbackMatching($n->getObjectValue([FallbackMatching::class, 'createFromDiscriminatorValue'])),
            'matching' => fn(ParseNode $n) => $o->setMatching($n->getObjectValue([Matching::class, 'createFromDiscriminatorValue'])),
            'pageVisitsPopularity' => fn(ParseNode $n) => $o->setPageVisitsPopularity($n->getFloatValue()),
            'personalized' => fn(ParseNode $n) => $o->setPersonalized($n->getFloatValue()),
            'similarity' => fn(ParseNode $n) => $o->setSimilarity($n->getObjectValue([Similarity::class, 'createFromDiscriminatorValue'])),
            'tieBreaker' => fn(ParseNode $n) => $o->setTieBreaker($n->getFloatValue()),
            'transactionsPopularity' => fn(ParseNode $n) => $o->setTransactionsPopularity($n->getFloatValue()),
        ];
    }

    /**
     * Gets the matching property value. Controls how many clauses should be present in query
     * @return Matching|null
    */
    public function getMatching(): ?Matching {
        return $this->matching;
    }

    /**
     * Gets the pageVisitsPopularity property value. The importance of how often the item page is visited
     * @return float|null
    */
    public function getPageVisitsPopularity(): ?float {
        return $this->pageVisitsPopularity;
    }

    /**
     * Gets the personalized property value. The importance of how relevant a item is to a profile according to the AI model
     * @return float|null
    */
    public function getPersonalized(): ?float {
        return $this->personalized;
    }

    /**
     * Gets the similarity property value. Defines how matching documents are scored
     * @return Similarity|null
    */
    public function getSimilarity(): ?Similarity {
        return $this->similarity;
    }

    /**
     * Gets the tieBreaker property value. The importance of lesser phrase matches
     * @return float|null
    */
    public function getTieBreaker(): ?float {
        return $this->tieBreaker;
    }

    /**
     * Gets the transactionsPopularity property value. The importance of how often the item is included in transactions
     * @return float|null
    */
    public function getTransactionsPopularity(): ?float {
        return $this->transactionsPopularity;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('fallbackMatching', $this->getFallbackMatching());
        $writer->writeObjectValue('matching', $this->getMatching());
        $writer->writeFloatValue('pageVisitsPopularity', $this->getPageVisitsPopularity());
        $writer->writeFloatValue('personalized', $this->getPersonalized());
        $writer->writeObjectValue('similarity', $this->getSimilarity());
        $writer->writeFloatValue('tieBreaker', $this->getTieBreaker());
        $writer->writeFloatValue('transactionsPopularity', $this->getTransactionsPopularity());
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
     * Sets the fallbackMatching property value. Backup matching mode used in cases where the main matching mode(specified in `matching` parameter) does not provide enough results (at least 5)
     * @param FallbackMatching|null $value Value to set for the fallbackMatching property.
    */
    public function setFallbackMatching(?FallbackMatching $value): void {
        $this->fallbackMatching = $value;
    }

    /**
     * Sets the matching property value. Controls how many clauses should be present in query
     * @param Matching|null $value Value to set for the matching property.
    */
    public function setMatching(?Matching $value): void {
        $this->matching = $value;
    }

    /**
     * Sets the pageVisitsPopularity property value. The importance of how often the item page is visited
     * @param float|null $value Value to set for the pageVisitsPopularity property.
    */
    public function setPageVisitsPopularity(?float $value): void {
        $this->pageVisitsPopularity = $value;
    }

    /**
     * Sets the personalized property value. The importance of how relevant a item is to a profile according to the AI model
     * @param float|null $value Value to set for the personalized property.
    */
    public function setPersonalized(?float $value): void {
        $this->personalized = $value;
    }

    /**
     * Sets the similarity property value. Defines how matching documents are scored
     * @param Similarity|null $value Value to set for the similarity property.
    */
    public function setSimilarity(?Similarity $value): void {
        $this->similarity = $value;
    }

    /**
     * Sets the tieBreaker property value. The importance of lesser phrase matches
     * @param float|null $value Value to set for the tieBreaker property.
    */
    public function setTieBreaker(?float $value): void {
        $this->tieBreaker = $value;
    }

    /**
     * Sets the transactionsPopularity property value. The importance of how often the item is included in transactions
     * @param float|null $value Value to set for the transactionsPopularity property.
    */
    public function setTransactionsPopularity(?float $value): void {
        $this->transactionsPopularity = $value;
    }

}
