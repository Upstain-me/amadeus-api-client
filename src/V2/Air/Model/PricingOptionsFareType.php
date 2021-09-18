<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

enum PricingOptionsFareType
{
    case PUBLISHED;
    case NEGOTIATED;
    case CORPORATE;
}
