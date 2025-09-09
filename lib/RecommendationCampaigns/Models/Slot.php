<?php

namespace Synerise\Api\RecommendationCampaigns\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Slot allows you to define a separate recommendation frame with its filters and other parameters
*/
class Slot implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var Slot_attribute|null $attribute The attribute for rows grouping in the section and attribute recommendation campaign.
    */
    private ?Slot_attribute $attribute = null;
    
    /**
     * @var DistinctFilter|null $distinctFilter Distinct filter allows to specify how many recommended items can have the same value of specified attributes.
    */
    private ?DistinctFilter $distinctFilter = null;
    
    /**
     * @var RecommendationsCampaignSlotFilterRules|null $filterRules Filters that apply to this campaign
    */
    private ?RecommendationsCampaignSlotFilterRules $filterRules = null;
    
    /**
     * @var int|null $itemMax The maximal number of items in the campaign or the maximal number of attribute values in the attribute recommendation campaign.
    */
    private ?int $itemMax = null;
    
    /**
     * @var int|null $itemMin The minimal number of items in the campaign or the minimal number of attribute values in the attribute recommendation campaign.
    */
    private ?int $itemMin = null;
    
    /**
     * @var string|null $name Slot name
    */
    private ?string $name = null;
    
    /**
     * @var int|null $numItems The number of products in each row in the section recommendation campaign.
    */
    private ?int $numItems = null;
    
    /**
     * @var int|null $numRows The number of rows in the section recommendation campaign.
    */
    private ?int $numRows = null;
    
    /**
     * Instantiates a new Slot and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return Slot
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): Slot {
        return new Slot();
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the attribute property value. The attribute for rows grouping in the section and attribute recommendation campaign.
     * @return Slot_attribute|null
    */
    public function getAttribute(): ?Slot_attribute {
        return $this->attribute;
    }

    /**
     * Gets the distinctFilter property value. Distinct filter allows to specify how many recommended items can have the same value of specified attributes.
     * @return DistinctFilter|null
    */
    public function getDistinctFilter(): ?DistinctFilter {
        return $this->distinctFilter;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'attribute' => fn(ParseNode $n) => $o->setAttribute($n->getObjectValue([Slot_attribute::class, 'createFromDiscriminatorValue'])),
            'distinctFilter' => fn(ParseNode $n) => $o->setDistinctFilter($n->getObjectValue([DistinctFilter::class, 'createFromDiscriminatorValue'])),
            'filterRules' => fn(ParseNode $n) => $o->setFilterRules($n->getObjectValue([RecommendationsCampaignSlotFilterRules::class, 'createFromDiscriminatorValue'])),
            'itemMax' => fn(ParseNode $n) => $o->setItemMax($n->getIntegerValue()),
            'itemMin' => fn(ParseNode $n) => $o->setItemMin($n->getIntegerValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'numItems' => fn(ParseNode $n) => $o->setNumItems($n->getIntegerValue()),
            'numRows' => fn(ParseNode $n) => $o->setNumRows($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the filterRules property value. Filters that apply to this campaign
     * @return RecommendationsCampaignSlotFilterRules|null
    */
    public function getFilterRules(): ?RecommendationsCampaignSlotFilterRules {
        return $this->filterRules;
    }

    /**
     * Gets the itemMax property value. The maximal number of items in the campaign or the maximal number of attribute values in the attribute recommendation campaign.
     * @return int|null
    */
    public function getItemMax(): ?int {
        return $this->itemMax;
    }

    /**
     * Gets the itemMin property value. The minimal number of items in the campaign or the minimal number of attribute values in the attribute recommendation campaign.
     * @return int|null
    */
    public function getItemMin(): ?int {
        return $this->itemMin;
    }

    /**
     * Gets the name property value. Slot name
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the numItems property value. The number of products in each row in the section recommendation campaign.
     * @return int|null
    */
    public function getNumItems(): ?int {
        return $this->numItems;
    }

    /**
     * Gets the numRows property value. The number of rows in the section recommendation campaign.
     * @return int|null
    */
    public function getNumRows(): ?int {
        return $this->numRows;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('attribute', $this->getAttribute());
        $writer->writeObjectValue('distinctFilter', $this->getDistinctFilter());
        $writer->writeObjectValue('filterRules', $this->getFilterRules());
        $writer->writeIntegerValue('itemMax', $this->getItemMax());
        $writer->writeIntegerValue('itemMin', $this->getItemMin());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeIntegerValue('numItems', $this->getNumItems());
        $writer->writeIntegerValue('numRows', $this->getNumRows());
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
     * Sets the attribute property value. The attribute for rows grouping in the section and attribute recommendation campaign.
     * @param Slot_attribute|null $value Value to set for the attribute property.
    */
    public function setAttribute(?Slot_attribute $value): void {
        $this->attribute = $value;
    }

    /**
     * Sets the distinctFilter property value. Distinct filter allows to specify how many recommended items can have the same value of specified attributes.
     * @param DistinctFilter|null $value Value to set for the distinctFilter property.
    */
    public function setDistinctFilter(?DistinctFilter $value): void {
        $this->distinctFilter = $value;
    }

    /**
     * Sets the filterRules property value. Filters that apply to this campaign
     * @param RecommendationsCampaignSlotFilterRules|null $value Value to set for the filterRules property.
    */
    public function setFilterRules(?RecommendationsCampaignSlotFilterRules $value): void {
        $this->filterRules = $value;
    }

    /**
     * Sets the itemMax property value. The maximal number of items in the campaign or the maximal number of attribute values in the attribute recommendation campaign.
     * @param int|null $value Value to set for the itemMax property.
    */
    public function setItemMax(?int $value): void {
        $this->itemMax = $value;
    }

    /**
     * Sets the itemMin property value. The minimal number of items in the campaign or the minimal number of attribute values in the attribute recommendation campaign.
     * @param int|null $value Value to set for the itemMin property.
    */
    public function setItemMin(?int $value): void {
        $this->itemMin = $value;
    }

    /**
     * Sets the name property value. Slot name
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the numItems property value. The number of products in each row in the section recommendation campaign.
     * @param int|null $value Value to set for the numItems property.
    */
    public function setNumItems(?int $value): void {
        $this->numItems = $value;
    }

    /**
     * Sets the numRows property value. The number of rows in the section recommendation campaign.
     * @param int|null $value Value to set for the numRows property.
    */
    public function setNumRows(?int $value): void {
        $this->numRows = $value;
    }

}
