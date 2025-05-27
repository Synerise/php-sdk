<?php

namespace Synerise\Api\V4\Models;

use Microsoft\Kiota\Abstractions\Enum;

class DeviceType extends Enum {
    public const ANDROID = "android";
    public const IOS = "ios";
    public const WINDOWS = "windows";
}
