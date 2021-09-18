<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class PricingOptions
{
    public PricingOptionsFareType $fareType;

    /**
     * If true, returns the flight-offers with included checked bags only
     */
    public bool $includedCheckedBagsOnly = false;

    /**
     * If true, returns the flight-offers with refundable fares only
     */
    public bool $refundableFare = false;

    /**
     * If true, returns the flight-offers with no restriction fares only
     */
    public bool $noRestrictionFare = false;

    /**
     * If true, returns the flight-offers with no penalty fares only
     */
    public bool $noPenaltyFare = false;
}
