<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Recent searches configuration
*/
class RecentSearchesConfig implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var RecentSearchesConfig_timeSpan|null $timeSpan Defines period for which recent searches are to be returned
    */
    private ?RecentSearchesConfig_timeSpan $timeSpan = null;
    
    /**
     * @var int|null $windowSize Amount of recent searches items to be returned
    */
    private ?int $windowSize = null;
    
    /**
     * Instantiates a new RecentSearchesConfig and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return RecentSearchesConfig
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): RecentSearchesConfig {
        return new RecentSearchesConfig();
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
            'timeSpan' => fn(ParseNode $n) => $o->setTimeSpan($n->getObjectValue([RecentSearchesConfig_timeSpan::class, 'createFromDiscriminatorValue'])),
            'windowSize' => fn(ParseNode $n) => $o->setWindowSize($n->getIntegerValue()),
        ];
    }

    /**
     * Gets the timeSpan property value. Defines period for which recent searches are to be returned
     * @return RecentSearchesConfig_timeSpan|null
    */
    public function getTimeSpan(): ?RecentSearchesConfig_timeSpan {
        return $this->timeSpan;
    }

    /**
     * Gets the windowSize property value. Amount of recent searches items to be returned
     * @return int|null
    */
    public function getWindowSize(): ?int {
        return $this->windowSize;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeObjectValue('timeSpan', $this->getTimeSpan());
        $writer->writeIntegerValue('windowSize', $this->getWindowSize());
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
     * Sets the timeSpan property value. Defines period for which recent searches are to be returned
     * @param RecentSearchesConfig_timeSpan|null $value Value to set for the timeSpan property.
    */
    public function setTimeSpan(?RecentSearchesConfig_timeSpan $value): void {
        $this->timeSpan = $value;
    }

    /**
     * Sets the windowSize property value. Amount of recent searches items to be returned
     * @param int|null $value Value to set for the windowSize property.
    */
    public function setWindowSize(?int $value): void {
        $this->windowSize = $value;
    }

}
