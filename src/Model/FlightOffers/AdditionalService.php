<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class AdditionalService extends FromArrayModelBase
{
    /**
     * @var string
     */
    protected $amount;

    /**
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
