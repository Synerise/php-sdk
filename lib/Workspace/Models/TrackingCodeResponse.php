<?php

namespace Synerise\Api\Workspace\Models;

use Microsoft\Kiota\Abstractions\Serialization\AdditionalDataHolder;
use Microsoft\Kiota\Abstractions\Serialization\Parsable;
use Microsoft\Kiota\Abstractions\Serialization\ParseNode;
use Microsoft\Kiota\Abstractions\Serialization\SerializationWriter;

class TrackingCodeResponse implements AdditionalDataHolder, Parsable 
{
    /**
     * @var string|null $actionsBlacklist The actionsBlacklist property
    */
    private ?string $actionsBlacklist = null;
    
    /**
     * @var string|null $actionsWhitelist The actionsWhitelist property
    */
    private ?string $actionsWhitelist = null;
    
    /**
     * @var array<string, mixed>|null $additionalData Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
    */
    private ?array $additionalData = null;
    
    /**
     * @var string|null $code The code property
    */
    private ?string $code = null;
    
    /**
     * @var string|null $cookieDomain The cookieDomain property
    */
    private ?string $cookieDomain = null;
    
    /**
     * @var int|null $cookieExpiration The cookieExpiration property
    */
    private ?int $cookieExpiration = null;
    
    /**
     * @var int|null $created The created property
    */
    private ?int $created = null;
    
    /**
     * @var string|null $customizeMetadata The customizeMetadata property
    */
    private ?string $customizeMetadata = null;
    
    /**
     * @var string|null $domainName The domainName property
    */
    private ?string $domainName = null;
    
    /**
     * @var bool|null $enableAutoTracking The enableAutoTracking property
    */
    private ?bool $enableAutoTracking = null;
    
    /**
     * @var bool|null $enableCookieDomain The enableCookieDomain property
    */
    private ?bool $enableCookieDomain = null;
    
    /**
     * @var bool|null $enableCookieExpiration The enableCookieExpiration property
    */
    private ?bool $enableCookieExpiration = null;
    
    /**
     * @var bool|null $enableCustomizeMetadata The enableCustomizeMetadata property
    */
    private ?bool $enableCustomizeMetadata = null;
    
    /**
     * @var bool|null $enableDataLayer The enableDataLayer property
    */
    private ?bool $enableDataLayer = null;
    
    /**
     * @var bool|null $enableDynamicContent The enableDynamicContent property
    */
    private ?bool $enableDynamicContent = null;
    
    /**
     * @var bool|null $enableServiceWorkerScope The enableServiceWorkerScope property
    */
    private ?bool $enableServiceWorkerScope = null;
    
    /**
     * @var bool|null $enableTrackingDomain The enableTrackingDomain property
    */
    private ?bool $enableTrackingDomain = null;
    
    /**
     * @var bool|null $enableWebPush The enableWebPush property
    */
    private ?bool $enableWebPush = null;
    
    /**
     * @var string|null $entityStatus The entityStatus property
    */
    private ?string $entityStatus = null;
    
    /**
     * @var TrackingCodeResponse_googleAnalyticsVersion|null $googleAnalyticsVersion The googleAnalyticsVersion property
    */
    private ?TrackingCodeResponse_googleAnalyticsVersion $googleAnalyticsVersion = null;
    
    /**
     * @var int|null $id The id property
    */
    private ?int $id = null;
    
    /**
     * @var string|null $name The name property
    */
    private ?string $name = null;
    
    /**
     * @var TrackingCodeResponse_pageType|null $pageType The pageType property
    */
    private ?TrackingCodeResponse_pageType $pageType = null;
    
    /**
     * @var string|null $serviceWorkerScope The serviceWorkerScope property
    */
    private ?string $serviceWorkerScope = null;
    
    /**
     * @var string|null $trackingDomain The trackingDomain property
    */
    private ?string $trackingDomain = null;
    
    /**
     * @var TrackingCodeResponse_type|null $type The type property
    */
    private ?TrackingCodeResponse_type $type = null;
    
    /**
     * Instantiates a new TrackingCodeResponse and sets the default values.
    */
    public function __construct() {
        $this->setAdditionalData([]);
    }

    /**
     * Creates a new instance of the appropriate class based on discriminator value
     * @param ParseNode $parseNode The parse node to use to read the discriminator value and create the object
     * @return TrackingCodeResponse
    */
    public static function createFromDiscriminatorValue(ParseNode $parseNode): TrackingCodeResponse {
        return new TrackingCodeResponse();
    }

    /**
     * Gets the actionsBlacklist property value. The actionsBlacklist property
     * @return string|null
    */
    public function getActionsBlacklist(): ?string {
        return $this->actionsBlacklist;
    }

    /**
     * Gets the actionsWhitelist property value. The actionsWhitelist property
     * @return string|null
    */
    public function getActionsWhitelist(): ?string {
        return $this->actionsWhitelist;
    }

    /**
     * Gets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @return array<string, mixed>|null
    */
    public function getAdditionalData(): ?array {
        return $this->additionalData;
    }

    /**
     * Gets the code property value. The code property
     * @return string|null
    */
    public function getCode(): ?string {
        return $this->code;
    }

    /**
     * Gets the cookieDomain property value. The cookieDomain property
     * @return string|null
    */
    public function getCookieDomain(): ?string {
        return $this->cookieDomain;
    }

    /**
     * Gets the cookieExpiration property value. The cookieExpiration property
     * @return int|null
    */
    public function getCookieExpiration(): ?int {
        return $this->cookieExpiration;
    }

    /**
     * Gets the created property value. The created property
     * @return int|null
    */
    public function getCreated(): ?int {
        return $this->created;
    }

    /**
     * Gets the customizeMetadata property value. The customizeMetadata property
     * @return string|null
    */
    public function getCustomizeMetadata(): ?string {
        return $this->customizeMetadata;
    }

    /**
     * Gets the domainName property value. The domainName property
     * @return string|null
    */
    public function getDomainName(): ?string {
        return $this->domainName;
    }

    /**
     * Gets the enableAutoTracking property value. The enableAutoTracking property
     * @return bool|null
    */
    public function getEnableAutoTracking(): ?bool {
        return $this->enableAutoTracking;
    }

    /**
     * Gets the enableCookieDomain property value. The enableCookieDomain property
     * @return bool|null
    */
    public function getEnableCookieDomain(): ?bool {
        return $this->enableCookieDomain;
    }

    /**
     * Gets the enableCookieExpiration property value. The enableCookieExpiration property
     * @return bool|null
    */
    public function getEnableCookieExpiration(): ?bool {
        return $this->enableCookieExpiration;
    }

    /**
     * Gets the enableCustomizeMetadata property value. The enableCustomizeMetadata property
     * @return bool|null
    */
    public function getEnableCustomizeMetadata(): ?bool {
        return $this->enableCustomizeMetadata;
    }

    /**
     * Gets the enableDataLayer property value. The enableDataLayer property
     * @return bool|null
    */
    public function getEnableDataLayer(): ?bool {
        return $this->enableDataLayer;
    }

    /**
     * Gets the enableDynamicContent property value. The enableDynamicContent property
     * @return bool|null
    */
    public function getEnableDynamicContent(): ?bool {
        return $this->enableDynamicContent;
    }

    /**
     * Gets the enableServiceWorkerScope property value. The enableServiceWorkerScope property
     * @return bool|null
    */
    public function getEnableServiceWorkerScope(): ?bool {
        return $this->enableServiceWorkerScope;
    }

    /**
     * Gets the enableTrackingDomain property value. The enableTrackingDomain property
     * @return bool|null
    */
    public function getEnableTrackingDomain(): ?bool {
        return $this->enableTrackingDomain;
    }

    /**
     * Gets the enableWebPush property value. The enableWebPush property
     * @return bool|null
    */
    public function getEnableWebPush(): ?bool {
        return $this->enableWebPush;
    }

    /**
     * Gets the entityStatus property value. The entityStatus property
     * @return string|null
    */
    public function getEntityStatus(): ?string {
        return $this->entityStatus;
    }

    /**
     * The deserialization information for the current model
     * @return array<string, callable(ParseNode): void>
    */
    public function getFieldDeserializers(): array {
        $o = $this;
        return  [
            'actionsBlacklist' => fn(ParseNode $n) => $o->setActionsBlacklist($n->getStringValue()),
            'actionsWhitelist' => fn(ParseNode $n) => $o->setActionsWhitelist($n->getStringValue()),
            'code' => fn(ParseNode $n) => $o->setCode($n->getStringValue()),
            'cookieDomain' => fn(ParseNode $n) => $o->setCookieDomain($n->getStringValue()),
            'cookieExpiration' => fn(ParseNode $n) => $o->setCookieExpiration($n->getIntegerValue()),
            'created' => fn(ParseNode $n) => $o->setCreated($n->getIntegerValue()),
            'customizeMetadata' => fn(ParseNode $n) => $o->setCustomizeMetadata($n->getStringValue()),
            'domainName' => fn(ParseNode $n) => $o->setDomainName($n->getStringValue()),
            'enableAutoTracking' => fn(ParseNode $n) => $o->setEnableAutoTracking($n->getBooleanValue()),
            'enableCookieDomain' => fn(ParseNode $n) => $o->setEnableCookieDomain($n->getBooleanValue()),
            'enableCookieExpiration' => fn(ParseNode $n) => $o->setEnableCookieExpiration($n->getBooleanValue()),
            'enableCustomizeMetadata' => fn(ParseNode $n) => $o->setEnableCustomizeMetadata($n->getBooleanValue()),
            'enableDataLayer' => fn(ParseNode $n) => $o->setEnableDataLayer($n->getBooleanValue()),
            'enableDynamicContent' => fn(ParseNode $n) => $o->setEnableDynamicContent($n->getBooleanValue()),
            'enableServiceWorkerScope' => fn(ParseNode $n) => $o->setEnableServiceWorkerScope($n->getBooleanValue()),
            'enableTrackingDomain' => fn(ParseNode $n) => $o->setEnableTrackingDomain($n->getBooleanValue()),
            'enableWebPush' => fn(ParseNode $n) => $o->setEnableWebPush($n->getBooleanValue()),
            'entityStatus' => fn(ParseNode $n) => $o->setEntityStatus($n->getStringValue()),
            'googleAnalyticsVersion' => fn(ParseNode $n) => $o->setGoogleAnalyticsVersion($n->getEnumValue(TrackingCodeResponse_googleAnalyticsVersion::class)),
            'id' => fn(ParseNode $n) => $o->setId($n->getIntegerValue()),
            'name' => fn(ParseNode $n) => $o->setName($n->getStringValue()),
            'pageType' => fn(ParseNode $n) => $o->setPageType($n->getEnumValue(TrackingCodeResponse_pageType::class)),
            'serviceWorkerScope' => fn(ParseNode $n) => $o->setServiceWorkerScope($n->getStringValue()),
            'trackingDomain' => fn(ParseNode $n) => $o->setTrackingDomain($n->getStringValue()),
            'type' => fn(ParseNode $n) => $o->setType($n->getEnumValue(TrackingCodeResponse_type::class)),
        ];
    }

    /**
     * Gets the googleAnalyticsVersion property value. The googleAnalyticsVersion property
     * @return TrackingCodeResponse_googleAnalyticsVersion|null
    */
    public function getGoogleAnalyticsVersion(): ?TrackingCodeResponse_googleAnalyticsVersion {
        return $this->googleAnalyticsVersion;
    }

    /**
     * Gets the id property value. The id property
     * @return int|null
    */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * Gets the name property value. The name property
     * @return string|null
    */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * Gets the pageType property value. The pageType property
     * @return TrackingCodeResponse_pageType|null
    */
    public function getPageType(): ?TrackingCodeResponse_pageType {
        return $this->pageType;
    }

    /**
     * Gets the serviceWorkerScope property value. The serviceWorkerScope property
     * @return string|null
    */
    public function getServiceWorkerScope(): ?string {
        return $this->serviceWorkerScope;
    }

    /**
     * Gets the trackingDomain property value. The trackingDomain property
     * @return string|null
    */
    public function getTrackingDomain(): ?string {
        return $this->trackingDomain;
    }

    /**
     * Gets the type property value. The type property
     * @return TrackingCodeResponse_type|null
    */
    public function getType(): ?TrackingCodeResponse_type {
        return $this->type;
    }

    /**
     * Serializes information the current object
     * @param SerializationWriter $writer Serialization writer to use to serialize this model
    */
    public function serialize(SerializationWriter $writer): void {
        $writer->writeStringValue('actionsBlacklist', $this->getActionsBlacklist());
        $writer->writeStringValue('actionsWhitelist', $this->getActionsWhitelist());
        $writer->writeStringValue('code', $this->getCode());
        $writer->writeStringValue('cookieDomain', $this->getCookieDomain());
        $writer->writeIntegerValue('cookieExpiration', $this->getCookieExpiration());
        $writer->writeIntegerValue('created', $this->getCreated());
        $writer->writeStringValue('customizeMetadata', $this->getCustomizeMetadata());
        $writer->writeStringValue('domainName', $this->getDomainName());
        $writer->writeBooleanValue('enableAutoTracking', $this->getEnableAutoTracking());
        $writer->writeBooleanValue('enableCookieDomain', $this->getEnableCookieDomain());
        $writer->writeBooleanValue('enableCookieExpiration', $this->getEnableCookieExpiration());
        $writer->writeBooleanValue('enableCustomizeMetadata', $this->getEnableCustomizeMetadata());
        $writer->writeBooleanValue('enableDataLayer', $this->getEnableDataLayer());
        $writer->writeBooleanValue('enableDynamicContent', $this->getEnableDynamicContent());
        $writer->writeBooleanValue('enableServiceWorkerScope', $this->getEnableServiceWorkerScope());
        $writer->writeBooleanValue('enableTrackingDomain', $this->getEnableTrackingDomain());
        $writer->writeBooleanValue('enableWebPush', $this->getEnableWebPush());
        $writer->writeStringValue('entityStatus', $this->getEntityStatus());
        $writer->writeEnumValue('googleAnalyticsVersion', $this->getGoogleAnalyticsVersion());
        $writer->writeIntegerValue('id', $this->getId());
        $writer->writeStringValue('name', $this->getName());
        $writer->writeEnumValue('pageType', $this->getPageType());
        $writer->writeStringValue('serviceWorkerScope', $this->getServiceWorkerScope());
        $writer->writeStringValue('trackingDomain', $this->getTrackingDomain());
        $writer->writeEnumValue('type', $this->getType());
        $writer->writeAdditionalData($this->getAdditionalData());
    }

    /**
     * Sets the actionsBlacklist property value. The actionsBlacklist property
     * @param string|null $value Value to set for the actionsBlacklist property.
    */
    public function setActionsBlacklist(?string $value): void {
        $this->actionsBlacklist = $value;
    }

    /**
     * Sets the actionsWhitelist property value. The actionsWhitelist property
     * @param string|null $value Value to set for the actionsWhitelist property.
    */
    public function setActionsWhitelist(?string $value): void {
        $this->actionsWhitelist = $value;
    }

    /**
     * Sets the AdditionalData property value. Stores additional data not described in the OpenAPI description found when deserializing. Can be used for serialization as well.
     * @param array<string,mixed> $value Value to set for the AdditionalData property.
    */
    public function setAdditionalData(?array $value): void {
        $this->additionalData = $value;
    }

    /**
     * Sets the code property value. The code property
     * @param string|null $value Value to set for the code property.
    */
    public function setCode(?string $value): void {
        $this->code = $value;
    }

    /**
     * Sets the cookieDomain property value. The cookieDomain property
     * @param string|null $value Value to set for the cookieDomain property.
    */
    public function setCookieDomain(?string $value): void {
        $this->cookieDomain = $value;
    }

    /**
     * Sets the cookieExpiration property value. The cookieExpiration property
     * @param int|null $value Value to set for the cookieExpiration property.
    */
    public function setCookieExpiration(?int $value): void {
        $this->cookieExpiration = $value;
    }

    /**
     * Sets the created property value. The created property
     * @param int|null $value Value to set for the created property.
    */
    public function setCreated(?int $value): void {
        $this->created = $value;
    }

    /**
     * Sets the customizeMetadata property value. The customizeMetadata property
     * @param string|null $value Value to set for the customizeMetadata property.
    */
    public function setCustomizeMetadata(?string $value): void {
        $this->customizeMetadata = $value;
    }

    /**
     * Sets the domainName property value. The domainName property
     * @param string|null $value Value to set for the domainName property.
    */
    public function setDomainName(?string $value): void {
        $this->domainName = $value;
    }

    /**
     * Sets the enableAutoTracking property value. The enableAutoTracking property
     * @param bool|null $value Value to set for the enableAutoTracking property.
    */
    public function setEnableAutoTracking(?bool $value): void {
        $this->enableAutoTracking = $value;
    }

    /**
     * Sets the enableCookieDomain property value. The enableCookieDomain property
     * @param bool|null $value Value to set for the enableCookieDomain property.
    */
    public function setEnableCookieDomain(?bool $value): void {
        $this->enableCookieDomain = $value;
    }

    /**
     * Sets the enableCookieExpiration property value. The enableCookieExpiration property
     * @param bool|null $value Value to set for the enableCookieExpiration property.
    */
    public function setEnableCookieExpiration(?bool $value): void {
        $this->enableCookieExpiration = $value;
    }

    /**
     * Sets the enableCustomizeMetadata property value. The enableCustomizeMetadata property
     * @param bool|null $value Value to set for the enableCustomizeMetadata property.
    */
    public function setEnableCustomizeMetadata(?bool $value): void {
        $this->enableCustomizeMetadata = $value;
    }

    /**
     * Sets the enableDataLayer property value. The enableDataLayer property
     * @param bool|null $value Value to set for the enableDataLayer property.
    */
    public function setEnableDataLayer(?bool $value): void {
        $this->enableDataLayer = $value;
    }

    /**
     * Sets the enableDynamicContent property value. The enableDynamicContent property
     * @param bool|null $value Value to set for the enableDynamicContent property.
    */
    public function setEnableDynamicContent(?bool $value): void {
        $this->enableDynamicContent = $value;
    }

    /**
     * Sets the enableServiceWorkerScope property value. The enableServiceWorkerScope property
     * @param bool|null $value Value to set for the enableServiceWorkerScope property.
    */
    public function setEnableServiceWorkerScope(?bool $value): void {
        $this->enableServiceWorkerScope = $value;
    }

    /**
     * Sets the enableTrackingDomain property value. The enableTrackingDomain property
     * @param bool|null $value Value to set for the enableTrackingDomain property.
    */
    public function setEnableTrackingDomain(?bool $value): void {
        $this->enableTrackingDomain = $value;
    }

    /**
     * Sets the enableWebPush property value. The enableWebPush property
     * @param bool|null $value Value to set for the enableWebPush property.
    */
    public function setEnableWebPush(?bool $value): void {
        $this->enableWebPush = $value;
    }

    /**
     * Sets the entityStatus property value. The entityStatus property
     * @param string|null $value Value to set for the entityStatus property.
    */
    public function setEntityStatus(?string $value): void {
        $this->entityStatus = $value;
    }

    /**
     * Sets the googleAnalyticsVersion property value. The googleAnalyticsVersion property
     * @param TrackingCodeResponse_googleAnalyticsVersion|null $value Value to set for the googleAnalyticsVersion property.
    */
    public function setGoogleAnalyticsVersion(?TrackingCodeResponse_googleAnalyticsVersion $value): void {
        $this->googleAnalyticsVersion = $value;
    }

    /**
     * Sets the id property value. The id property
     * @param int|null $value Value to set for the id property.
    */
    public function setId(?int $value): void {
        $this->id = $value;
    }

    /**
     * Sets the name property value. The name property
     * @param string|null $value Value to set for the name property.
    */
    public function setName(?string $value): void {
        $this->name = $value;
    }

    /**
     * Sets the pageType property value. The pageType property
     * @param TrackingCodeResponse_pageType|null $value Value to set for the pageType property.
    */
    public function setPageType(?TrackingCodeResponse_pageType $value): void {
        $this->pageType = $value;
    }

    /**
     * Sets the serviceWorkerScope property value. The serviceWorkerScope property
     * @param string|null $value Value to set for the serviceWorkerScope property.
    */
    public function setServiceWorkerScope(?string $value): void {
        $this->serviceWorkerScope = $value;
    }

    /**
     * Sets the trackingDomain property value. The trackingDomain property
     * @param string|null $value Value to set for the trackingDomain property.
    */
    public function setTrackingDomain(?string $value): void {
        $this->trackingDomain = $value;
    }

    /**
     * Sets the type property value. The type property
     * @param TrackingCodeResponse_type|null $value Value to set for the type property.
    */
    public function setType(?TrackingCodeResponse_type $value): void {
        $this->type = $value;
    }

}
