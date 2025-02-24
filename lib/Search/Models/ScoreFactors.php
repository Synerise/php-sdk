<?php

namespace Synerise\Api\Search\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class ScoreFactors implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var float|null $pageVisitsPopularity Page views impact on score.
    */
    private ?float $pageVisitsPopularity = null;
    
    /**
     * @var float|null $personalization Personalization impact on score, if applicable.
    */
    private ?float $personalization = null;
    
    /**
     * @var float|null $transactionsPopularity Purchases impact on score.
    */
    private ?float $transactionsPopularity = null;
    
    /**
     * Instantiates a new ScoreFactors and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return ScoreFactors
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): ScoreFactors {
        return new ScoreFactors();
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
            'pageVisitsPopularity' => fn(ParseNode $n) => $o->setPageVisitsPopularity($n->getFloatValue()),
            'personalization' => fn(ParseNode $n) => $o->setPersonalization($n->getFloatValue()),
            'transactionsPopularity' => fn(ParseNode $n) => $o->setTransactionsPopularity($n->getFloatValue()),
        ];
    }

    /**
     * Gets the pageVisitsPopularity property value. Page views impact on score.
     * @return float|null
    */
    public function getPageVisitsPopularity(): ?float {
        return $this->pageVisitsPopularity;
    }

    /**
     * Gets the personalization property value. Personalization impact on score, if applicable.
     * @return float|null
    */
    public function getPersonalization(): ?float {
        return $this->personalization;
    }

    /**
     * Gets the transactionsPopularity property value. Purchases impact on score.
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
        $writer->writeFloatValue('pageVisitsPopularity', $this->getPageVisitsPopularity());
        $writer->writeFloatValue('personalization', $this->getPersonalization());
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
     * Sets the pageVisitsPopularity property value. Page views impact on score.
     * @param float|null $value Value to set for the pageVisitsPopularity property.
    */
    public function setPageVisitsPopularity(?float $value): void {
        $this->pageVisitsPopularity = $value;
    }

    /**
     * Sets the personalization property value. Personalization impact on score, if applicable.
     * @param float|null $value Value to set for the personalization property.
    */
    public function setPersonalization(?float $value): void {
        $this->personalization = $value;
    }

    /**
     * Sets the transactionsPopularity property value. Purchases impact on score.
     * @param float|null $value Value to set for the transactionsPopularity property.
    */
    public function setTransactionsPopularity(?float $value): void {
        $this->transactionsPopularity = $value;
    }

}
