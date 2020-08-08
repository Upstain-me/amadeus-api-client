<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class PricingOptions
 *
 * @method string[] getFareType()
 */
class PricingOptions extends ResponseModelBase
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
