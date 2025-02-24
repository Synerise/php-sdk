<?php

namespace Synerise\Sdk\Cookie;

class Constants
{
    /**
     * Profile base params
     */
    public const COOKIE_P = '_snrs_p';

    /**
     * Profile extra params set by url
     */
    public const COOKIE_PARAMS = '_snrs_params';

    /**
     * Profile permanent uuid
     */
    public const COOKIE_PUUID = '_snrs_puuid';

    /**
     * Profile session uuid
     */
    public const COOKIE_UUID = '_snrs_uuid';

    /**
     * Profile reset uuid. This value will be set as uuid via frontend tracker on next request
     */
    public const COOKIE_RESET_UUID = '_snrs_reset_uuid';

    /**
     * Profile session A
     */
    public const COOKIE_SA = '_snrs_sa';

    /**
     * Profile session B
     */
    public const COOKIE_SB = '_snrs_sb';
}