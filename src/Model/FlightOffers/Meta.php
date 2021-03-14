<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class Meta extends FromArrayModelBase
{
    /**
     * @var int
     */
    protected $count;

    /**
     * @var mixed
     */
    protected $links;

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return mixed
     */
    public function getLinks()
    {
        return $this->links;
    }
}
