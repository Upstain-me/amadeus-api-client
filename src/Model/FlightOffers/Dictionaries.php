<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class Dictionaries extends FromArrayModelBase
{
    /**
     * @var array<string, array<string, string>>
     */
    protected $locations;

    /**
     * @var array<string, string>
     */
    protected $aircraft;

    /**
     * @var array<string, string>
     */
    protected $currencies;

    /**
     * @var array<string, string>
     */
    protected $carriers;

    /**
     * @return array<string, array<string, string>>
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * @return array<string, string>
     */
    public function getAircraft()
    {
        return $this->aircraft;
    }

    /**
     * @return array<string, string>
     */
    public function getCurrencies()
    {
        return $this->currencies;
    }

    /**
     * @return array<string, string>
     */
    public function getCarriers()
    {
        return $this->carriers;
    }
}
