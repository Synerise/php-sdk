<?php

namespace Synerise\Sdk\Tracking;

use Detection\Exception\MobileDetectException;
use Detection\MobileDetect;
use RuntimeException;
use Synerise\Api\V4\Models\EventSource;

class DefaultEventSourceProvider implements EventSourceProvider
{
    /**
     * MobileDetect analyzes user-agent to determine source
     * @var MobileDetect|null
     */
    protected ?MobileDetect $mobileDetect = null;

    /**
     * Initialize default source provider.
     * Requires suggested mobiledetect/mobiledetectlib package.
     */
    public function __construct()
    {
        if (class_exists('\Detection\MobileDetect')) {
            $this->mobileDetect = new MobileDetect();
        }
    }

    /**
     * @inheritDoc
     */
    public function getEventSource(): EventSource
    {
        if ($this->mobileDetect) {
            try {
                if ($this->mobileDetect->isMobile() || $this->mobileDetect->isTablet()) {
                    return new EventSource(EventSource::W_E_B__M_O_B_I_L_E);
                } else {
                    return new EventSource(EventSource::W_E_B__D_E_S_K_T_O_P);
                }
            } catch (MobileDetectException $e) {
                throw new RuntimeException('EventSourceProvider warning', 0, $e);
            }
        }
        throw new RuntimeException('EventSourceProvider requires implementation. Check composer suggestions for default implementation');
    }
}