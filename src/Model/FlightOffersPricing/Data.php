<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersPricing;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class Data
 *
 * @method string getType()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersPricing\FlightOffer[] getFlightOffers()
 */
class Data extends FromArrayModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $type;

    /**
     * @var mixed
     */
    protected $bookingRequirements;

    /**
     * @var FlightOffer[]
     * @Getter
     */
    protected array $flightOffers;

    public function __construct($data)
    {
        $excludedProperties = [
            'type',
            'bookingRequirements',
        ];
        parent::__construct($data, $excludedProperties);

        if (isset($data['flightOffers'])) {
            foreach ($data['flightOffers'] as $flightOffer) {
                $this->flightOffers[] = new FlightOffer($flightOffer);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getBookingRequirements()
    {
        return $this->bookingRequirements;
    }
}
