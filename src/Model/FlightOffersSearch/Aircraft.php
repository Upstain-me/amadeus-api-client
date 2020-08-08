<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class Aircraft
 *
 * @method string getCode()
 */
class Aircraft extends ResponseModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $code;
}
