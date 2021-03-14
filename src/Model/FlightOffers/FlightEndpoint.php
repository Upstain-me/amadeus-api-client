<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class FlightEndpoint extends FromArrayModelBase
{
    /**
     * @var string
     */
    protected $iataCode;

    /**
     * @var string
     */
    protected $terminal;

    /**
     * @var string
     */
    protected $at;

    /**
     * @return string
     */
    public function getIataCode()
    {
        return $this->iataCode;
    }

    /**
     * @return string
     */
    public function getTerminal()
    {
        return $this->terminal;
    }

    /**
     * @return string
     */
    public function getAt()
    {
        return $this->at;
    }
}
