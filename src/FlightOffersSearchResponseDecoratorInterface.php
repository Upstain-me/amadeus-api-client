<?php

namespace Upstain\AmadeusApiClient;

use Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer;

/**
 * @package Upstain\AmadeusApiClient
 *
 * @template T of FlightOffer
 */
interface FlightOffersSearchResponseDecoratorInterface
{
    /**
     * @param FlightOffer $flightOffer
     * @return T
     */
    public function decorate(FlightOffer $flightOffer);
}
