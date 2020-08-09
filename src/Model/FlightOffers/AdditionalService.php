<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class AdditionalService
 *
 * @method string getAmount()
 * @method string getType()
 */
class AdditionalService extends FromArrayModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $amount;

    /**
     * @var string
     * @Getter
     */
    protected string $type;
}
