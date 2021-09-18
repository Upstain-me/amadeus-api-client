<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

/**
 * Defining a flight segment; including both operating and marketing details when applicable
 */
class Segment
{
    public string $id = '';
    public int $numberOfStops = 0;
    public bool $blacklistedInEU = false;

    /**
     * @var Co2Emission[]
     */
    public array $co2Emissions;

    public FlightEndPoint $departure;
    public FlightEndPoint $arrival;
    public string $carrierCode = '';
    public string $number = '';
    public AircraftEquipment $aircraft;
    public OperatingFlight $operatingFlight;
    public \DateInterval $duration;

    /**
     * @var FlightStop[]
     */
    public array $stops;
}
