<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class PricingOptions
 *
 * @method string[] getFareType()
 */
class PricingOptions extends FromArrayModelBase
{
    /**
     * @var string[]
     * @Getter
     */
    protected array $fareType;

    /**
     * @var bool
     * Getter
     */
    protected bool $includedCheckedBagsOnly;
}
