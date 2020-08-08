<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class Fee
 *
 * @method string getAmount()
 * @method string getType()
 */
class Fee extends ResponseModelBase
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
