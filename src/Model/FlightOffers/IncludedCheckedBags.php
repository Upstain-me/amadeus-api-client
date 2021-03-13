<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class IncludedCheckedBags extends FromArrayModelBase
{
    /**
     * @var int
     */
    protected $quantity;

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}
