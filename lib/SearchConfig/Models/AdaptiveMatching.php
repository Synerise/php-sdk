<?php

namespace Synerise\Api\SearchConfig\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

/**
 * Matching that works differently depending on the number of terms in the search query.
*/
class AdaptiveMatching implements AdditionalDataHolder, Parsable 
{
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var int|null $termsToActivate Indicates how long (number of words) a search query must be to activate this mechanism.All queries that are shorter than termsToActivate will use AllMatching.
    */
    private ?int $termsToActivate = null;
    
    /**
     * @var float|null $termsToMatch Indicates the percentage of all query terms that should be matched.This matching is done using MinimumMatching with the value set to:`termsToMatch * n`, where n is a number of all terms in the search query.**If you define termsToMatch, you can't define termsToSubtract.**
    */
    private ?float $termsToMatch = null;
    
    /**
     * @var int|null $termsToSubtract Indicates a fixed number that should be subtracted fromthe number of query terms that should match. This matching is done usingMinimumMatching with the value set to `n - termsToSubtract`, where n is a number of all terms in the search query.**If you define termsToSubtract, you can't define termsToMatch.**
    */
    private ?int $termsToSubtract = null;
    
    /**
     * @var AdaptiveMatching_type|null $type The type property
    */
    private ?AdaptiveMatching_type $type = null;
    
    /**
     * Instantiates a new AdaptiveMatching and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return AdaptiveMatching
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): AdaptiveMatching {
        return new AdaptiveMatching();
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
            'termsToActivate' => fn(ParseNode $n) => $o->setTermsToActivate($n->getIntegerValue()),
            'termsToMatch' => fn(ParseNode $n) => $o->setTermsToMatch($n->getFloatValue()),
            'termsToSubtract' => fn(ParseNode $n) => $o->setTermsToSubtract($n->getIntegerValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(AdaptiveMatching_type::class)),
        ];
    }

    /**
     * Gets the termsToActivate property value. Indicates how long (number of words) a search query must be to activate this mechanism.All queries that are shorter than termsToActivate will use AllMatching.
     * @return int|null
    */
    public function getTermsToActivate(): ?int {
        return $this->termsToActivate;
    }

    /**
     * Gets the termsToMatch property value. Indicates the percentage of all query terms that should be matched.This matching is done using MinimumMatching with the value set to:`termsToMatch * n`, where n is a number of all terms in the search query.**If you define termsToMatch, you can't define termsToSubtract.**
     * @return float|null
    */
    public function getTermsToMatch(): ?float {
        return $this->termsToMatch;
    }

    /**
     * Gets the termsToSubtract property value. Indicates a fixed number that should be subtracted fromthe number of query terms that should match. This matching is done usingMinimumMatching with the value set to `n - termsToSubtract`, where n is a number of all terms in the search query.**If you define termsToSubtract, you can't define termsToMatch.**
     * @return int|null
    */
    public function getTermsToSubtract(): ?int {
        return $this->termsToSubtract;
    }

    /**
     * Gets the type property value. The type property
     * @return AdaptiveMatching_type|null
    */
    public function getType(): ?AdaptiveMatching_type {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeIntegerValue('termsToActivate', $this->getTermsToActivate());
        $writer->writeFloatValue('termsToMatch', $this->getTermsToMatch());
        $writer->writeIntegerValue('termsToSubtract', $this->getTermsToSubtract());
        $writer->writeEnumValue('type', $this->getType());
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
     * Sets the termsToActivate property value. Indicates how long (number of words) a search query must be to activate this mechanism.All queries that are shorter than termsToActivate will use AllMatching.
     * @param int|null $value Value to set for the termsToActivate property.
    */
    public function setTermsToActivate(?int $value): void {
        $this->termsToActivate = $value;
    }

    /**
     * Sets the termsToMatch property value. Indicates the percentage of all query terms that should be matched.This matching is done using MinimumMatching with the value set to:`termsToMatch * n`, where n is a number of all terms in the search query.**If you define termsToMatch, you can't define termsToSubtract.**
     * @param float|null $value Value to set for the termsToMatch property.
    */
    public function setTermsToMatch(?float $value): void {
        $this->termsToMatch = $value;
    }

    /**
     * Sets the termsToSubtract property value. Indicates a fixed number that should be subtracted fromthe number of query terms that should match. This matching is done usingMinimumMatching with the value set to `n - termsToSubtract`, where n is a number of all terms in the search query.**If you define termsToSubtract, you can't define termsToMatch.**
     * @param int|null $value Value to set for the termsToSubtract property.
    */
    public function setTermsToSubtract(?int $value): void {
        $this->termsToSubtract = $value;
    }

    /**
     * Sets the type property value. The type property
     * @param AdaptiveMatching_type|null $value Value to set for the type property.
    */
    public function setType(?AdaptiveMatching_type $value): void {
        $this->type = $value;
    }

}
