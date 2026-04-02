<?php

namespace Synerise\Api\Search\Models;

use DateTime;
use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class DeletedSearch implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $match Tells how to match this deleted search on recent searches.- `query`: matches only recent searches with provided query- `all`: matches all recent searches
    */
    private ?string $match = null;
    
    /**
     * @var string|null $query Deleted search query. Required if `match` field is set to `query`.
    */
    private ?string $query = null;
    
    /**
     * @var DateTime|null $timestamp Time when the search was deleted. If not present current time is taken.
    */
    private ?DateTime $timestamp = null;
    
    /**
     * Instantiates a new DeletedSearch and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
        $this->setMatch('query');
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return DeletedSearch
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): DeletedSearch {
        return new DeletedSearch();
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
            'match' => fn(ParseNode $n) => $o->setMatch($n->getStringValue()),
            'query' => fn(ParseNode $n) => $o->setQuery($n->getStringValue()),
            'timestamp' => fn(ParseNode $n) => $o->setTimestamp($n->getDateTimeValue()),
        ];
    }

    /**
     * Gets the match property value. Tells how to match this deleted search on recent searches.- `query`: matches only recent searches with provided query- `all`: matches all recent searches
     * @return string|null
    */
    public function getMatch(): ?string {
        return $this->match;
    }

    /**
     * Gets the query property value. Deleted search query. Required if `match` field is set to `query`.
     * @return string|null
    */
    public function getQuery(): ?string {
        return $this->query;
    }

    /**
     * Gets the timestamp property value. Time when the search was deleted. If not present current time is taken.
     * @return DateTime|null
    */
    public function getTimestamp(): ?DateTime {
        return $this->timestamp;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('match', $this->getMatch());
        $writer->writeStringValue('query', $this->getQuery());
        $writer->writeDateTimeValue('timestamp', $this->getTimestamp());
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
     * Sets the match property value. Tells how to match this deleted search on recent searches.- `query`: matches only recent searches with provided query- `all`: matches all recent searches
     * @param string|null $value Value to set for the match property.
    */
    public function setMatch(?string $value): void {
        $this->match = $value;
    }

    /**
     * Sets the query property value. Deleted search query. Required if `match` field is set to `query`.
     * @param string|null $value Value to set for the query property.
    */
    public function setQuery(?string $value): void {
        $this->query = $value;
    }

    /**
     * Sets the timestamp property value. Time when the search was deleted. If not present current time is taken.
     * @param DateTime|null $value Value to set for the timestamp property.
    */
    public function setTimestamp(?DateTime $value): void {
        $this->timestamp = $value;
    }

}
