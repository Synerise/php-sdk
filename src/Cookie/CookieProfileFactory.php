<?php

namespace Synerise\Sdk\Cookie;

use Exception;
use Synerise\Sdk\Exception\NotFoundException;
use Synerise\Sdk\Model\Profile;
use Synerise\Sdk\Serialization\StringJsonParseNodeFactory;

class CookieProfileFactory
{
    private StringJsonParseNodeFactory $parseNodeFactory;

    /**
     * @param StringJsonParseNodeFactory|null $parseNodeFactory
     */
    public function __construct(
        ?StringJsonParseNodeFactory $parseNodeFactory = null
    ) {
        $this->parseNodeFactory = $parseNodeFactory ?: new StringJsonParseNodeFactory();
    }

    /**
     * Create Profile from cookies
     * @return Profile
     * @throws NotFoundException
     * @throws Exception
     */
    public function create(): Profile
    {
        if (!isset($_COOKIE[Constants::COOKIE_UUID]) || !isset($_COOKIE[Constants::COOKIE_P])) {
            throw new NotFoundException('Tracking cookies unavailable');
        }

        $profile = new Profile();
        $profile->setUuid($_COOKIE[Constants::COOKIE_UUID]);
        $profile->setBaseParams($this->getBaseParams());
        $profile->setExtraParams($this->getExtraParams());

        return $profile;
    }

    /**
     * Get base params from cookie
     * @return Profile\BaseParams
     * @throws Exception
     */
    protected function getBaseParams(): Profile\BaseParams
    {
        return $this->parseNodeFactory->getRootParseNode($_COOKIE[Constants::COOKIE_P], 'key-value')
            ->getObjectValue([Profile\BaseParams::class, 'createFromDiscriminatorValue']);
    }

    /**
     * Get extra params from cookie
     * @return array|null
     * @throws Exception
     */
    protected function getExtraParams(): ?array
    {
        if (isset($_COOKIE[Constants::COOKIE_PARAMS])) {}
        return isset($_COOKIE[Constants::COOKIE_PARAMS]) ? $this->parseNodeFactory->getRootParseNode($_COOKIE[Constants::COOKIE_PARAMS])
            ->getCollectionOfPrimitiveValues('string') : null;
    }
}