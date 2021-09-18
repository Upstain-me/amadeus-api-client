<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

enum TravelClass: string
{
    case ECONOMY = 'ECONOMY';
    case PREMIUM_ECONOMY = 'PREMIUM_ECONOMY';
    case BUSINESS = 'BUSINESS';
    case FIRST = 'FIRST';
}
