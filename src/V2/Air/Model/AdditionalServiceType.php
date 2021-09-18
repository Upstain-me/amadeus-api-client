<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

enum AdditionalServiceType
{
    case CHECKED_BAGS;
    case MEALS;
    case SEATS;
    case OTHER_SERVICES;
}
