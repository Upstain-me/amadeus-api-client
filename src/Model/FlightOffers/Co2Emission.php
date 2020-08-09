<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class Co2Emission
 *
 * @method int getWeight()
 * @method string getWeightUnit()
 * @method string getCabin()
 */
class Co2Emission extends FromArrayModelBase
{
    /**
     * @var int
     * @Getter
     */
    protected int $weight;

    /**
     * @var string
     * @Getter
     */
    protected string $weightUnit;

    /**
     * @var string
     * @Getter
     */
    protected string $cabin;
}
