<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class FlightEndpoint
 *
 * @method string getIataCode()
 * @method string getTerminal()
 * @method string getAt()
 */
class FlightEndpoint extends FromArrayModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $iataCode;

    /**
     * @var string
     * @Getter
     */
    protected string $terminal;

    /**
     * @var string
     * @Getter
     */
    protected string $at;
}
