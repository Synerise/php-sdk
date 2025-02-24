<?php

namespace Synerise\Api\V4\Clients;

use Microsoft\Kiota\Abstractions\Enum;

class GetSortByQueryParameterType extends Enum {
    public const FIRST_NAME = "firstName";
    public const LAST_NAME = "lastName";
    public const LAST_ACTIVITY_DATE = "lastActivityDate";
    public const EMAIL = "email";
    public const CITY = "city";
    public const PHONE = "phone";
}
