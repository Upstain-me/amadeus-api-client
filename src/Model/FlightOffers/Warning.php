<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class Warning
 *
 * @method int getCode()
 * @method int getStatus()
 * @method string getTitle()
 * @method string getDetails()
 */
class Warning extends FromArrayModelBase
{
    /**
     * @var int
     * @Getter
     */
    protected int $code;

    /**
     * @var int
     * @Getter
     */
    protected int $status;

    /**
     * @var string
     * @Getter
     */
    protected string $title;

    /**
     * @var string
     * @Getter
     */
    protected string $details;
}
