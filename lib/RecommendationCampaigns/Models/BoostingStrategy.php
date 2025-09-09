<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Boosting strategy allows you to promote or demote specific types of products in recommendation scoring
*/
class BoostingStrategy implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $condition The condition that indicates on which items the boost will be performed. The condition must comply with the rules of creating filters.
    */
    private ?string $condition = null;
    
    /**
     * @var string|null $name Boosting strategy name
    */
    private ?string $name = null;
    
    /**
     * @var float|null $strength How much influence the strategy has. Values less than 1.0 allow you to degrade items that meet the condition, values greater than 1.0 allow you to promote items that meet the condition. A strength with a value of 1.0 does not change the scoring.
    */
    private ?float $strength = null;
    
    /**
     * Instantiates a new BoostingStrategy and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return BoostingStrategy
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): BoostingStrategy {
        return new BoostingStrategy();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the condition property value. The condition that indicates on which items the boost will be performed. The condition must comply with the rules of creating filters.
     * @return string|null
    */
    public function getCondition(): ?string {
        return $this->condition;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'condition' => fn(ParseNode $n) => $o->setCondition($n->getStringValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'strength' => fn(ParseNode $n) => $o->setStrength($n->getFloatValue()),
        ];
    }

    /**
     * Gets the name property value. Boosting strategy name
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the strength property value. How much influence the strategy has. Values less than 1.0 allow you to degrade items that meet the condition, values greater than 1.0 allow you to promote items that meet the condition. A strength with a value of 1.0 does not change the scoring.
     * @return float|null
    */
    public function getStrength(): ?float {
        return $this->strength;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('condition', $this->getCondition());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeFloatValue('strength', $this->getStrength());
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
     * Sets the condition property value. The condition that indicates on which items the boost will be performed. The condition must comply with the rules of creating filters.
     * @param string|null $value Value to set for the condition property.
    */
    public function setCondition(?string $value): void {
        $this->condition = $value;
    }

    /**
     * Sets the name property value. Boosting strategy name
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the strength property value. How much influence the strategy has. Values less than 1.0 allow you to degrade items that meet the condition, values greater than 1.0 allow you to promote items that meet the condition. A strength with a value of 1.0 does not change the scoring.
     * @param float|null $value Value to set for the strength property.
    */
    public function setStrength(?float $value): void {
        $this->strength = $value;
    }

}
