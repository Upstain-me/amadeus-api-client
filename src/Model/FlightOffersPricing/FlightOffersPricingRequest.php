<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersPricing;

use Plumbok\Annotation\Getter;

/**
 * Class FlightOffersPricingRequest
 *
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersPricing\FlightOffersPricing getData()
 */
class FlightOffersPricingRequest
{
    /**
     * @var FlightOffersPricing
     * @Getter
     */
    protected FlightOffersPricing $data;

    /**
     * @param array<string, mixed> $flightOffersSearchResult
     */
    public function fromArray(array $flightOffersSearchResult): FlightOffersPricingRequest
    {
        $this->data = new FlightOffersPricing([
            'type' => 'flight-offers-pricing',
            'flightOffers' => $flightOffersSearchResult
        ]);

        return $this;
    }
}
