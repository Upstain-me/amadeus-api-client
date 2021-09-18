<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class Itinerary
{
    public \DateInterval $duration;

    /**
     * @var Segment[]
     */
    public array $segments = [];
}