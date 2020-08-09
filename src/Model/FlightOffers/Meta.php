<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class Meta
 *
 * @method int getCount()
 * @method mixed getLinks()
 */
class Meta extends FromArrayModelBase
{
    /**
     * @var int
     * @Getter
     */
    protected int $count;

    /**
     * @var mixed
     * @Getter
     */
    protected $links;
}
