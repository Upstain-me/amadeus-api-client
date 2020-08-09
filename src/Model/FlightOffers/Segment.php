<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class Segment
 *
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\FlightEndpoint getDeparture()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\FlightEndpoint getArrival()
 * @method string getCarrierCode()
 * @method string getNumber()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\Aircraft getAircraft()
 * @method string getDuration()
 * @method string getId()
 * @method int getNumberOfStops()
 * @method bool isBlackListedInEu()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\Co2Emission[] getCo2Emissions()
 */
class Segment extends FromArrayModelBase
{
    /**
     * @var FlightEndpoint
     * @Getter
     */
    protected FlightEndpoint $departure;

    /**
     * @var FlightEndpoint
     * @Getter
     */
    protected FlightEndpoint $arrival;

    /**
     * @var string
     * @Getter
     */
    protected string $carrierCode;

    /**
     * @var string
     * @Getter
     */
    protected string $number;

    /**
     * @var Aircraft
     * @Getter
     */
    protected Aircraft $aircraft;

    /**
     * @var string
     * @Getter
     */
    protected string $duration;

    /**
     * @var string
     * @Getter
     */
    protected string $id;

    /**
     * @var int
     * @Getter
     */
    protected int $numberOfStops;

    /**
     * @var bool
     * @Getter
     */
    protected bool $blackListedInEu;

    /**
     * @var Co2Emission[]
     * @Getter
     */
    protected array $co2Emissions;

    public function __construct($data)
    {
        $excludedProperties = [
            'departure',
            'arrival',
            'aircraft',
            'co2Emissions',
        ];
        parent::__construct($data, $excludedProperties);

        $this->departure = new FlightEndpoint($data['departure']);
        $this->arrival = new FlightEndpoint($data['arrival']);
        $this->aircraft = new Aircraft($data['aircraft']);

        if (isset($data['co2Emissions'])) {
            $this->co2Emissions[] = new Co2Emission($data['co2Emissions']);
        }
    }
}
