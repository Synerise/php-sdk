<?php

namespace Synerise\Api\Recommendations\Recommendations\V2\Recommend\Campaigns\Item;

use Microsoft\Kiota\Abstractions\Enum;

class GetFiltersJoinerQueryParameterType extends Enum {
    public const A_N_D = "AND";
    public const O_R = "OR";
    public const R_E_P_L_A_C_E = "REPLACE";
}
