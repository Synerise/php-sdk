<?php

declare(strict_types=1);

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
        ?StringJsonParseNodeFactory $parseNodeFactory = null,
    ) {
        $this->parseNodeFactory = $parseNodeFactory ?: new StringJsonParseNodeFactory();
    }

    /**
     * Create Profile from cookies
     * @throws NotFoundException
     * @throws Exception
     * @return Profile
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
     * @throws Exception
     * @return Profile\BaseParams
     */
    protected function getBaseParams(): Profile\BaseParams
    {
        $params = $this->parseNodeFactory->getRootParseNode($_COOKIE[Constants::COOKIE_P], 'key-value')
            ->getObjectValue([Profile\BaseParams::class, 'createFromDiscriminatorValue']);

        if (!$params instanceof Profile\BaseParams) {
            throw new Exception('Failed to parse base params from cookie');
        }

        return $params;
    }

    /**
     * Get extra params from cookie
     * @return array<string, string>|null
     */
    protected function getExtraParams(): ?array
    {
        if (!isset($_COOKIE[Constants::COOKIE_PARAMS])) {
            return null;
        }

        $decoded = json_decode($_COOKIE[Constants::COOKIE_PARAMS], true);

        return is_array($decoded) ? $decoded : null;
    }
}
