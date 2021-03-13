<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class Co2Emission extends FromArrayModelBase
{
    /**
     * @var int
     */
    protected $weight;

    /**
     * @var string
     */
    protected $weightUnit;

    /**
     * @var string
     */
    protected $cabin;

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getWeightUnit()
    {
        return $this->weightUnit;
    }

    /**
     * @return string
     */
    public function getCabin()
    {
        return $this->cabin;
    }
}
