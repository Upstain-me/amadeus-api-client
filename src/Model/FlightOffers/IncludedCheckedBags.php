<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class IncludedCheckedBags
 *
 * @method int getQuantity()
 */
class IncludedCheckedBags extends FromArrayModelBase
{
    /**
     * @var int
     * @Getter
     */
    protected int $quantity;
}
