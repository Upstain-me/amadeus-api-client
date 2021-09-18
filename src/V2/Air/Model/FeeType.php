<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

enum FeeType
{
    case TICKETING;
    case FORM_OF_PAYMENT;
    case SUPPLIER;
}
