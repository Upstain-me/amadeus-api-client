<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\V2\PrimitiveInitializer;

/**
 * Defining a flight segment; including both operating and marketing details when applicable
 */
class Segment
{
    use PrimitiveInitializer;

    public string $id = '';
    public int $numberOfStops = 0;
    public bool $blacklistedInEU = false;

    /**
     * @var Co2Emission[]
     */
    public array $co2Emissions;

    public ?FlightEndPoint $departure = null;
    public ?FlightEndPoint $arrival = null;
    public string $carrierCode = '';
    public string $number = '';
    public ?AircraftEquipment $aircraft = null;
    public ?OperatingFlight $operatingFlight = null;
    public ?\DateInterval $duration = null;

    /**
     * @var FlightStop[]
     */
    public array $stops;

    public function __construct(array $data)
    {
        $excludedProperties = [
            'co2Emissions',
            'departure',
            'arrival',
            'aircraft',
            'operatingFlight',
            'duration',
        ];
        $this->setProperties($data, $excludedProperties);

        if (isset($data['co2Emissions']) && \is_array($data['co2Emissions']) && \count($data['co2Emissions']) > 0) {
            foreach ($data['co2Emissions'] as $co2Emission) {
                $this->co2Emissions[] = new Co2Emission($co2Emission);
            }
        }

        if (isset($data['departure'])) {
            $this->departure = new FlightEndPoint($data['departure']);
        }

        if (isset($data['arrival'])) {
            $this->arrival = new FlightEndPoint($data['arrival']);
        }

        if (isset($data['aircraft'])) {
            $this->aircraft = new AircraftEquipment($data['aircraft']);
        }

        if (isset($data['operatingFlight'])) {
            $this->operatingFlight = new OperatingFlight($data['operatingFlight']);
        }

        if (isset($data['duration'])) {
            $this->duration = new \DateInterval($data['duration']);
        }
    }
}
