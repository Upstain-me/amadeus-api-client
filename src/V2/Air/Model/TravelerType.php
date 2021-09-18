<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

enum TravelerType: string
{
    case ADULT = 'ADULT';
    case CHILD = 'CHILD';
    case SENIOR = 'SENIOR';
    case YOUNG = 'YOUNG';
    case HELD_INFANT = 'HELD_INFANT';
    case SEATED_INFANT = 'SEATED_INFANT';
    case STUDENT = 'STUDENT';
}
