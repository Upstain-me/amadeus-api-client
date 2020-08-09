<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class Tax
 *
 * @method string getAmount()
 * @method string getCode()
 */
class Tax extends FromArrayModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $amount;

    /**
     * @var string
     * @Getter
     */
    protected string $code;
}
