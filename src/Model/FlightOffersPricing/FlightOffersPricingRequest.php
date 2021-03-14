<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersPricing;

class FlightOffersPricingRequest
{
    /**
     * @var array<string, mixed>
     */
    protected array $rawData;

    /**
     * @param array<string, mixed> $flightOffersSearchResult
     * @return FlightOffersPricingRequest
     */
    public function fromArray(array $flightOffersSearchResult): FlightOffersPricingRequest
    {
        $this->rawData = $flightOffersSearchResult;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'data' => [
                'type' => 'flight-offers-pricing',
                'flightOffers' => $this->rawData,
            ],
        ];
    }
}
