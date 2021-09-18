<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

enum AdditionalServiceType: string
{
    case CHECKED_BAGS = 'CHECKED_BAGS';
    case MEALS = 'MEALS';
    case SEATS = 'SEATS';
    case OTHER_SERVICES = 'OTHER_SERVICES';
}
