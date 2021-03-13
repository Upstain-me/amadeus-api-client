<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class Segment extends FromArrayModelBase
{
    /**
     * @var FlightEndpoint
     */
    protected $departure;

    /**
     * @var FlightEndpoint
     */
    protected $arrival;

    /**
     * @var string
     */
    protected $carrierCode;

    /**
     * @var string
     */
    protected $number;

    /**
     * @var Aircraft
     */
    protected $aircraft;

    /**
     * @var string
     */
    protected $duration;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var int
     */
    protected $numberOfStops;

    /**
     * @var bool
     */
    protected $blackListedInEu;

    /**
     * @var Co2Emission[]
     */
    protected $co2Emissions;

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

    /**
     * @return FlightEndpoint
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @return FlightEndpoint
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * @return string
     */
    public function getCarrierCode()
    {
        return $this->carrierCode;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return Aircraft
     */
    public function getAircraft()
    {
        return $this->aircraft;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getNumberOfStops()
    {
        return $this->numberOfStops;
    }

    /**
     * @return bool
     */
    public function isBlackListedInEu()
    {
        return $this->blackListedInEu;
    }

    /**
     * @return Co2Emission[]
     */
    public function getCo2Emissions()
    {
        return $this->co2Emissions;
    }
}
