<?php

namespace Synerise\Api\Recommendations\Models;

use Microsoft\Kiota\Abstractions\Enum;

class BasePostRecommendationsRequest_filtersJoiner extends Enum {
    public const A_N_D = "AND";
    public const O_R = "OR";
    public const R_E_P_L_A_C_E = "REPLACE";
}
