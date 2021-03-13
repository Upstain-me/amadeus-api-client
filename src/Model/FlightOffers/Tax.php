<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class Tax extends FromArrayModelBase
{
    /**
     * @var string
     */
    protected $amount;

    /**
     * @var string
     */
    protected $code;

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
    public function getCode()
    {
        return $this->code;
    }
}
