<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class FareDetail extends FromArrayModelBase
{
    /**
     * @var string
     */
    protected $segmentId;

    /**
     * @var string
     */
    protected $cabin;

    /**
     * @var string
     */
    protected $fareBasis;

    /**
     * @var string
     */
    protected $brandedFare;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var IncludedCheckedBags
     */
    protected $includedCheckedBags;

    public function __construct($data)
    {
        $excludedProperties = [
            'includedCheckedBags',
        ];
        parent::__construct($data, $excludedProperties);

        if ($data['includedCheckedBags']) {
            $this->includedCheckedBags = new IncludedCheckedBags($data['includedCheckedBags']);
        }
    }

    /**
     * @return string
     */
    public function getSegmentId()
    {
        return $this->segmentId;
    }

    /**
     * @return string
     */
    public function getCabin()
    {
        return $this->cabin;
    }

    /**
     * @return string
     */
    public function getFareBasis()
    {
        return $this->fareBasis;
    }

    /**
     * @return string
     */
    public function getBrandedFare()
    {
        return $this->brandedFare;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return IncludedCheckedBags
     */
    public function getIncludedCheckedBags()
    {
        return $this->includedCheckedBags;
    }
}
