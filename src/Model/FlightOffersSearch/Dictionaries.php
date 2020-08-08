<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Plumbok\Annotation\Setter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class Dictionaries
 *
 * @method array getLocations()
 * @method void setLocations(array $locations)
 * @method array getAircraft()
 * @method void setAircraft(array $aircraft)
 * @method array getCurrencies()
 * @method void setCurrencies(array $currencies)
 * @method array getCarriers()
 * @method void setCarriers(array $carriers)
 */
class Dictionaries extends ResponseModelBase
{
    /**
     * @var array
     * @Getter
     * @Setter
     */
    protected $locations;

    /**
     * @var array
     * @Getter
     * @Setter
     */
    protected $aircraft;

    /**
     * @var array
     * @Getter
     * @Setter
     */
    protected $currencies;

    /**
     * @var array
     * @Getter
     * @Setter
     */
    protected $carriers;
}
