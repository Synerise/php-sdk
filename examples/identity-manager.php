<?php

use Synerise\Sdk\Api\ClientBuilder;
use Synerise\Sdk\Api\Config;
use Synerise\Sdk\Cookie\CookieAdapter;
use Synerise\Sdk\Cookie\CookieProfileManager;
use Synerise\Sdk\Helper\UuidGenerator;
use Synerise\Sdk\Tracking\IdentityManager;
use Synerise\Sdk\Tracking\ProfileMergeDoRequest;

/** @var CookieAdapter $cookieAdapter CookieAdapter implementation */
$profileManager = new CookieProfileManager($cookieAdapter);

/** @var UuidGenerator $uuidGenerator UuidGenerator implementation */
$identityManger = new IdentityManager($profileManager, $uuidGenerator);


/*
 * Initialize with default action (optional but recommended)
 */

/** @var Config $config Config implementation */
$clientBuilder = new ClientBuilder($config);
$mergeAction = new ProfileMergeDoRequest($clientBuilder);

/** @var UuidGenerator $uuidGenerator UuidGenerator implementation */
$identityManger = new IdentityManager($profileManager, $uuidGenerator, $mergeAction);