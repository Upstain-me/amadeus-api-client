<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class FareDetail
 *
 * @method string getSegmentId()
 * @method string getCabin()
 * @method string getFareBasis()
 * @method string getBrandedFare()
 * @method string getClass()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\IncludedCheckedBags getIncludedCheckedBags()
 */
class FareDetail extends FromArrayModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $segmentId;

    /**
     * @var string
     * @Getter
     */
    protected string $cabin;

    /**
     * @var string
     * @Getter
     */
    protected string $fareBasis;

    /**
     * @var string
     * @Getter
     */
    protected string $brandedFare;

    /**
     * @var string
     * @Getter
     */
    protected string $class;

    /**
     * @var IncludedCheckedBags
     * @Getter
     */
    protected IncludedCheckedBags $includedCheckedBags;

    public function __construct($data)
    {
        $excludedProperties = [
            'includedCheckedBags'
        ];
        parent::__construct($data, $excludedProperties);

        if ($data['includedCheckedBags']) {
            $this->includedCheckedBags = new IncludedCheckedBags($data['includedCheckedBags']);
        }
    }
}
