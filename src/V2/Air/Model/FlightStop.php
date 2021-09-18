<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class FlightStop
{
    public string $iataCode = '';
    public \DateInterval $duration;
    public \DateTimeInterface $arrivalAt;
    public \DateTimeInterface $departureAt;
}
