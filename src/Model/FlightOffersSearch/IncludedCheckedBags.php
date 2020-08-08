<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class IncludedCheckedBags
 *
 * @method int getQuantity()
 */
class IncludedCheckedBags extends ResponseModelBase
{
    /**
     * @var int
     * @Getter
     */
    protected int $quantity;
}
