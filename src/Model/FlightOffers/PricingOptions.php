<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class PricingOptions extends FromArrayModelBase
{
    /**
     * @var string[]
     */
    protected $fareType;

    /**
     * @var bool
     */
    protected $includedCheckedBagsOnly;

    /**
     * @return string[]
     */
    public function getFareType()
    {
        return $this->fareType;
    }

    /**
     * @return bool
     */
    public function isIncludedCheckedBagsOnly()
    {
        return $this->includedCheckedBagsOnly;
    }
}
