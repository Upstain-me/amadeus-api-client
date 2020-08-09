<?php

namespace Upstain\AmadeusApiClient\Shopping;

use Upstain\AmadeusApiClient\AuthenticatedClient;

class Shopping
{
    /**
     * @var AuthenticatedClient
     */
    protected AuthenticatedClient $client;

    /**
     * @param AuthenticatedClient $client
     */
    public function __construct(AuthenticatedClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return FlightOffersSearch
     */
    public function flightOfferSearch(): FlightOffersSearch
    {
        return new FlightOffersSearch($this->client);
    }

    /**
     * @return FlightOffersPricing
     */
    public function flightOfferPricing(): FlightOffersPricing
    {
        return new FlightOffersPricing($this->client);
    }
}
