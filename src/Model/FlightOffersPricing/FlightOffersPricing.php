<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersPricing;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * @method string getType()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer[] getFlightOffers()
 */
class FlightOffersPricing extends FromArrayModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $type;

    /**
     * @var \Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer[]
     * @Getter
     */
    protected array $flightOffers;

    public function __construct($data)
    {
        $excludedProperties = [
            'flightOffers',
        ];
        parent::__construct($data, $excludedProperties);

        foreach ($data['flightOffers'] as $flightOffer) {
            $this->flightOffers[] = new FlightOffer($flightOffer);
        }
    }
}
