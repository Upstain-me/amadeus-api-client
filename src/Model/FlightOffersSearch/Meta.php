<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class Meta
 *
 * @method int getCount()
 * @method mixed getLinks()
 */
class Meta extends ResponseModelBase
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
