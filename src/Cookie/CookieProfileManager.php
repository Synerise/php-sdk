<?php

namespace Synerise\Sdk\Cookie;

use Synerise\Sdk\Exception\NotFoundException;
use Synerise\Sdk\Model\Profile;
use Synerise\Sdk\Tracking\ProfileManager;

class CookieProfileManager implements ProfileManager
{
    /**
     * @var CookieAdapter
     */
    private CookieAdapter $cookieAdapter;

    /**
     * @var CookieProfileFactory
     */
    private CookieProfileFactory $profileFactory;

    /**
     * @var Profile
     */
    private Profile $profile;

    public function __construct(
        CookieAdapter $cookieAdapter,
        ?CookieProfileFactory $profileFactory = null
    ) {
        $this->cookieAdapter = $cookieAdapter;
        $this->profileFactory = $profileFactory ?: new CookieProfileFactory();
    }

    /**
     * @inheritDoc
     */
    public function getProfile(): Profile
    {
        if (!isset($this->profile)) {
            try {
                $this->profile = $this->profileFactory->create();
            } catch (NotFoundException $e) {
                throw $e;
            } catch (\Exception $e) {
                throw new \RuntimeException('There was a problem getting Profile', 0, $e);
            }
        }
        return $this->profile;
    }

    /**
     * @inheritDoc
     */
    public function resetProfile(string $uuid, ?string $emailHash = null)
    {
        if (empty($uuid)) {
            throw new \InvalidArgumentException('Failed to reset profile. Uuid cannot be empty');
        }
        $this->getProfile()->setUuid($uuid);
        if ($emailHash) {
            $this->getProfile()->getBaseParams()->setIdentityHash($emailHash);
        }
        $this->cookieAdapter->setValue(Constants::COOKIE_RESET_UUID, $uuid);
    }
}