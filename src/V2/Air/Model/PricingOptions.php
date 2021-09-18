<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\V2\ArrayOfEnumsInitializer;
use Upstain\AmadeusApiClient\V2\PrimitiveInitializer;

class PricingOptions
{
    use PrimitiveInitializer;
    use ArrayOfEnumsInitializer;

    /**
     * @var PricingOptionsFareType[]
     */
    public array $fareType = [];

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

    public function __construct(array $data)
    {
        $this->setProperties($data, ['fareType']);
        $this->initArrayOfEnums(PricingOptionsFareType::class, $data, 'fareType', PricingOptionsFareType::PUBLISHED);
    }
}
