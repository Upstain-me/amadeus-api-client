<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class TravelerPricing extends FromArrayModelBase
{
    /**
     * @var string
     */
    protected $travelerId;

    /**
     * @var string
     */
    protected $fareOption;

    /**
     * @var string
     */
    protected $travelerType;

    /**
     * @var Price
     */
    protected $price;

    /**
     * @var FareDetail[]
     */
    protected $fareDetailsBySegment;

    public function __construct($data)
    {
        $excludedProperties = [
            'price',
            'fareDetailsBySegment',
        ];
        parent::__construct($data, $excludedProperties);

        $this->price = new Price($data['price']);

        if ($data['fareDetailsBySegment']) {
            foreach ($data['fareDetailsBySegment'] as $fareDetail) {
                $this->fareDetailsBySegment[] = new FareDetail($fareDetail);
            }
        }
    }

    /**
     * @return string
     */
    public function getTravelerId()
    {
        return $this->travelerId;
    }

    /**
     * @return string
     */
    public function getFareOption()
    {
        return $this->fareOption;
    }

    /**
     * @return string
     */
    public function getTravelerType()
    {
        return $this->travelerType;
    }

    /**
     * @return Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return FareDetail[]
     */
    public function getFareDetailsBySegment()
    {
        return $this->fareDetailsBySegment;
    }
}
