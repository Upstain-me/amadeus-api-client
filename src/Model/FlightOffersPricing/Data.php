<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersPricing;

use Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer;

class Data
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var mixed
     */
    protected $bookingRequirements;

    /**
     * @var array<int, FlightOffer|mixed>
     */
    protected $flightOffers;

    /**
     * @param string $type
     * @param mixed $bookingRequirements
     * @param FlightOffer[] $flightOffers
     */
    public function __construct(string $type, $bookingRequirements, array $flightOffers)
    {
        $this->type = $type;
        $this->bookingRequirements = $bookingRequirements;
        $this->flightOffers = $flightOffers;
    }

    /**
     * @return mixed
     */
    public function getBookingRequirements()
    {
        return $this->bookingRequirements;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return array<int, mixed>|FlightOffer[]
     */
    public function getFlightOffers()
    {
        return $this->flightOffers;
    }
}
