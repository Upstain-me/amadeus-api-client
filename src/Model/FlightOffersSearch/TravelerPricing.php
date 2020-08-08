<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class TravelerPricing
 *
 * @method string getTravelerId()
 * @method string getFareOption()
 * @method string getTravelerType()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\Price getPrice()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\FareDetail[] getFareDetailsBySegment()
 */
class TravelerPricing extends ResponseModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $travelerId;

    /**
     * @var string
     * @Getter
     */
    protected string $fareOption;

    /**
     * @var string
     * @Getter
     */
    protected string $travelerType;

    /**
     * @var Price
     * @Getter
     */
    protected Price $price;

    /**
     * @var FareDetail[]
     * @Getter
     */
    protected array $fareDetailsBySegment;

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
}
