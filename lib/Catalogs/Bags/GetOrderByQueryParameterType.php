<?php

namespace Synerise\Api\Catalogs\Bags;

use Microsoft\Kiota\Abstractions\Enum;

class GetOrderByQueryParameterType extends Enum {
    public const ID = "id";
    public const AUTHOR = "author";
    public const LAST_MODIFIED = "lastModified";
    public const CREATION_DATE = "creationDate";
}
