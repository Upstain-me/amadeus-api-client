<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

enum PricingOptionsFareType: string
{
    case PUBLISHED = 'PUBLISHED';
    case NEGOTIATED = 'NEGOTIATED';
    case CORPORATE = 'CORPORATE';
}
