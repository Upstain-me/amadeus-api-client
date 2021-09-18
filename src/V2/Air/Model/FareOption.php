<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

enum FareOption
{
    case STANDARD;
    case INCLUSIVE_TOUR;
    case SPANISH_MELILLA_RESIDENT;
    case SPANISH_CEUTA_RESIDENT;
    case SPANISH_CANARY_RESIDENT;
    case SPANISH_BALEARIC_RESIDENT;
    case AIR_FRANCE_METROPOLITAN_DISCOUNT_PASS;
    case AIR_FRANCE_DOM_DISCOUNT_PASS;
    case AIR_FRANCE_COMBINED_DISCOUNT_PASS;
    case AIR_FRANCE_FAMILY;
    case ADULT_WITH_COMPANION;
    case COMPANION;
}
