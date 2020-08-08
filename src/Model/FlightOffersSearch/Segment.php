<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class Segment
 *
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightEndpoint getDeparture()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightEndpoint getArrival()
 * @method string getCarrierCode()
 * @method string getNumber()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\Aircraft getAircraft()
 * @method string getDuration()
 * @method string getId()
 * @method int getNumberOfStops()
 * @method bool isBlackListedInEu()
 */
class Segment extends ResponseModelBase
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

    public function __construct($data)
    {
        $excludedProperties = [
            'departure',
            'arrival',
            'aircraft',
        ];
        parent::__construct($data, $excludedProperties);

        $this->departure = new FlightEndpoint($data['departure']);
        $this->arrival = new FlightEndpoint($data['arrival']);
        $this->aircraft = new Aircraft($data['aircraft']);
    }
}
