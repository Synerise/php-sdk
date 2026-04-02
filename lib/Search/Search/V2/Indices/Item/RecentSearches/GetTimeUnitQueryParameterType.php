<?php

namespace Synerise\Api\Search\Search\V2\Indices\Item\RecentSearches;

use Microsoft\Kiota\Abstractions\Enum;

class GetTimeUnitQueryParameterType extends Enum {
    public const Y_E_A_R_S = "YEARS";
    public const M_O_N_T_H_S = "MONTHS";
    public const W_E_E_K_S = "WEEKS";
    public const D_A_Y_S = "DAYS";
    public const H_O_U_R_S = "HOURS";
    public const M_I_N_U_T_E_S = "MINUTES";
    public const S_E_C_O_N_D_S = "SECONDS";
}
