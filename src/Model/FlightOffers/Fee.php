<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class Fee
 *
 * @method string getAmount()
 * @method string getType()
 */
class Fee extends FromArrayModelBase
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
    protected string $type;
}
