<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

enum TravelerType
{
    case ADULT;
    case CHILD;
    case SENIOR;
    case YOUNG;
    case HELD_INFANT;
    case SEATED_INFANT;
    case STUDENT;
}
