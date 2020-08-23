<?php

namespace Upstain\AmadeusApiClient;

use Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer;

/**
 * @package Upstain\AmadeusApiClient
 */
interface FlightOffersSearchResponseDecoratorInterface
{
    /**
     * @param FlightOffer $flightOffer
     * @return FlightOffer
     */
    public function decorate(FlightOffer $flightOffer): FlightOffer;
}
