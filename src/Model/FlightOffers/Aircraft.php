<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class Aircraft
 *
 * @method string getCode()
 */
class Aircraft extends FromArrayModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $code;
}
