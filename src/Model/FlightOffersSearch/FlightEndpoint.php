<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class FlightEndpoint
 *
 * @method string getIataCode()
 * @method string getTerminal()
 * @method string getAt()
 */
class FlightEndpoint extends ResponseModelBase
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
