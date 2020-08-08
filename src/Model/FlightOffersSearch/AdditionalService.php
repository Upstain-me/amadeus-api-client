<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class AdditionalService
 *
 * @method string getAmount()
 * @method string getType()
 */
class AdditionalService extends ResponseModelBase
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
